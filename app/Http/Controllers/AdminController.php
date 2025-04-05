<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        // Validation du champ
        $request->validate([
            'category' => 'required|unique:categories,category_name|max:255',
        ]);

        // Création de la catégorie
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        // Ajouter un message de succès
        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Catégorie supprimée avec succès !');
        } else {
            return redirect()->back()->with('error', 'Catégorie introuvable !');
        }
    }

    public function edit_category($id)
    {   
        $data = Category::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Catégorie introuvable !');
        }

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        // Validation du champ
        $request->validate([
            'category' => 'required|unique:categories,category_name|max:255',
        ]);

        $data = Category::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Catégorie introuvable !');
        }

        $data->category_name = $request->category;
        $data->save();

        return redirect('/view_category')->with('success', 'Category updated successfully!');
    }


    public function add_product()
    { 
        $category=Category::all();
        return view('admin.add_product' ,compact('category'));
    }
    
    public function upload_product(Request $request)
    { 
        $data=new Product;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->qty;
        $data->category=$request->category;
      
       $image=$request->image;
       if($image)
       {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);

        $data->image =$imagename;
       }

       $data->save();
       return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function view_product()
    {
        $product=Product::paginate(4);
      
        return view ('admin.view_product',compact('product'));
    }
    public function delete_product($id)
{
    // Trouver le produit par ID
    $data = Product::find($id);
    $image_path =public_path('products/'.$data->image); 
    if(file_exists($image_path))
    {
        unlink($image_path);
    }

    // Vérifier si le produit existe
    if ($data) {
        $data->delete(); // Supprimer le produit
        return redirect()->back();
        
}
}
public function update_product($id)
{ 
    $data=Product::find($id);
    $category=Category::all();
    return view('admin.update_page',compact('data', 'category'));

}
public function edit_product(Request $request, $id)
{
    $data=Product::find($id);
   
    $data->title=$request->title;
    $data->description=$request->description;
    $data->price=$request->price;
    $data->quantity=$request->quantity;
    $data->category=$request->category;

    $image=$request->image;
    if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);

        $data->image =$imagename;
    }

    $data->save();
    return redirect('/view_product')->with('success', 'Product updated successfully!');

}
    
    public function search_product(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'like', '%' . $search . '%')->paginate(4);
        return view('admin.view_product', compact('product'));
    }
    public function view_order()
    {
        $data= Order::all();
        
        return view('admin.order',compact('data'));
    }

}