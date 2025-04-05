<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Flasher\Laravel\Facade\Flasher;

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

}
