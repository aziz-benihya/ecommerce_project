<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Flasher\Laravel\Facade\Flasher;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
      
    public function home()
    {
        $product = Product::all();
        if (Auth::id()) {
        $user = Auth::user();
        $user_id = $user->id;
        $count= Cart::where('user_id', $user_id)->count();

        }
        else {
            $count = '';
        }
    
        return view('home.index', compact('product'), compact('count'));
    }
    
    public function login_home()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count= Cart::where('user_id', $user_id)->count();
    
            }
            else {
                $count = '';
            }
        return view('home.index', compact('product'), compact('count'));
    }
    
    public function product_details($id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count= Cart::where('user_id', $user_id)->count();
    
            }
            else {
                $count = '';
            }
        $data = Product::find($id);
        return view('home.product_details', compact('data', 'count'));
    }
    
    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        
        // Using the Flasher facade:
        Flasher::addInfo('Product Added to the cart Successfully');
        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count= Cart::where('user_id', $user_id)->count();
            $cart = Cart::where('user_id', $user_id)->get();
            }
            else {
                $count = '';
            }
        
        return view('home.mycart', compact('count', 'cart'));
    }
    public function remove_cart($id)
{
    // Find and delete the cart item
    Cart::where('id', $id)->delete();
    
    // Return with success message
    return redirect()->back()->with('message', 'Product removed from cart successfully');
}


public function confirm_order(Request $request)
{
    $name = $request->name;
    $address = $request->address;
    $phone = $request->phone;
    $userid = Auth::user()->id;
    $cart = Cart::where('user_id', $userid)->get();

    foreach ($cart as $carts) {
        $order = new Order;
        $order->name = $name;
        $order->rec_address = $address; 
        $order->phone = $phone;
        $order->user_id = $userid;
        $order->product_id = $carts->product_id;
        $order->save();
    }
    // Delete the cart items after confirming the order
    $cart_remove = Cart::where('user_id', $userid)->get();
    foreach ($cart_remove as $remove) {
        $data= Cart::find($remove->id);
        $data->delete();
    
    }

    return redirect()->back();
    
    
}

}
