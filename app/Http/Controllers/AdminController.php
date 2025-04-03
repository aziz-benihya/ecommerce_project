<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
}
