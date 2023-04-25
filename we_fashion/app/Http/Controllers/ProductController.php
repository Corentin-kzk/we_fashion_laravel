<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return View('index', ["products"=> Product::with('sizes')->with('categories')->paginate(6), 'counter' => count(Product::get(['id'])) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::where('published', true)->with('sizes')->find($product->id);
        return View('product.index', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

        /**
     * Display a listing of the resource.
     */
    public function Solde(): View
    {
        return View('index', ["products"=> Product::where('published', true)->where('status', 'en solde')->orderBy('created_at', 'desc')->with('sizes')->with('categories')->paginate(6), 'counter' => count(Product::where('published', true)->where('status', 'en solde')->get(['id'])) ]);
    }

        /**
     * Display a listing of the resource.
     */
    public function category($slug): View
    {
        $haveCategory = Categorie::where('slug','=', $slug);
        if ($haveCategory) {
            $product = Product::where('published', true)->whereHas('categories', function($query)use ($slug) {
                $query->where('slug', '=', $slug);
            })->whereDoesntHave('categories', function($query) use ($slug) {
                $query->where('slug', '<>', $slug);
            })->with('sizes')->with('categories')->orderBy('created_at', 'desc')->paginate(6);
        return View('index', ["products"=> $product, 'counter' => count(Product::where('published', true)->whereHas('categories', function($query)use ($slug) {
            $query->where('slug', '=', $slug);
        })->whereDoesntHave('categories', function($query) use ($slug) {
            $query->where('slug', '<>', $slug);
        })->with('sizes')->with('categories')->orderBy('created_at', 'desc')->get()) ]);
        } else {
            abort(404, 'Ressource non trouvée');
        }
    }
}
