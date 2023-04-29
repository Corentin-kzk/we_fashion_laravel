<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories',['categories' => Categorie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Categorie();
        return view('category.form', ['category'=> $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'label' => 'string|required'
        ]);
        $category = new Categorie();
        $category->label = $request->input('label');

        $category->slug =  Str::slug($request->input('label'));

        $category->save();
        return redirect()->route('admin.categories.index')
        ->with('success', 'Category create successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $category)
    {
        return view('category.form', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $category)
    {
        $category->label = $request->input('label');
        $category->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',  $request->input('label'))));
        $category->update();
        return redirect()->route('admin.categories.index')
        ->with('success', 'Category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }


}
