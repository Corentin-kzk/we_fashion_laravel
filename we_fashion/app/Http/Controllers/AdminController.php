<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return View('admin.index');
    }
    public function products()
    {
        return view('admin.products', ['products' => Product::orderBy('created_at', 'desc')->paginate(15), 'categories' => Categorie::all(['id', 'label'])->toArray(), 'sizes' => Size::all(['id','label'])->toArray()]);
    }
}
