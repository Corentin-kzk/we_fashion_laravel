<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Faker\Generator;
use Illuminate\Container\Container;

class ProductController extends Controller
{
    protected $validationRules = [
        'name' => 'required|string|min:5|max:100',
        'description' => 'nullable|string',
        'price' => 'required|numeric|between:0,999999.99',
        'image' => 'nullable|string',
        'published' => 'boolean',
    ];

    protected $destinationPath = 'images/';
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return View('index', ["products" => Product::with('sizes')->orderBy('created_at', 'desc')->with('categories')->paginate(6), 'counter' => count(Product::get(['id']))]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth()->user()->userType === 'admin') {
            $faker = Container::getInstance()->make(Generator::class);
            //uplaod Image
            $picture = '';
            if ($image = $request->file('picture')) {
                $picture = time() . "." . $image->getClientOriginalExtension();
                $picture = $image->storeAs('public/images', $picture);
            }
            // status handler
            $status = $request->input('status') ?  'en solde'  : 'standard';
            // published handler
            $published = $request->input('published') ?  false : true;

            $request->validate($this->validationRules);
            $product = new Product;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->image =  $picture;
            $product->reference = $faker->regexify('^#W_F\d{4}[a-zA-Z]{2}[0-9a-zA-Z]{0,6}$');
            $product->status = $status;
            $product->published = $published;
            $product->save();
            return redirect()->route('admin.products')
                ->with('success', 'Product created successfully.');
        } else {
            return view('index');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::where('published', true)->orderBy('created_at', 'desc')->with('sizes')->find($product->id);
        return View('product.index', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return view('product.update', ["product" => $product, 'sizes' => Size::pluck('label', 'id'), 'categories' => Categorie::pluck('label', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update();
        return redirect()->route('admin.products')
                        ->with('success','Post updated successfully');
    }

    /**
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')
                        ->with('success','Post deleted successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function Solde(): View
    {
        return View('index', ["products" => Product::where('published', true)->where('status', 'en solde')->orderBy('created_at', 'desc')->with('sizes')->with('categories')->paginate(6), 'counter' => count(Product::where('published', true)->where('status', 'en solde')->get(['id']))]);
    }

    /**
     * Display a listing of the resource.
     */
    public function category($slug): View
    {
        $haveCategory = Categorie::where('slug', '=', $slug);
        if ($haveCategory) {
            $product = Product::where('published', true)->whereHas('categories', function ($query) use ($slug) {
                $query->where('slug', '=', $slug);
            })->whereDoesntHave('categories', function ($query) use ($slug) {
                $query->where('slug', '<>', $slug);
            })->with('sizes')->with('categories')->orderBy('created_at', 'desc')->paginate(6);
            return View('index', ["products" => $product, 'counter' => count(Product::where('published', true)->whereHas('categories', function ($query) use ($slug) {
                $query->where('slug', '=', $slug);
            })->whereDoesntHave('categories', function ($query) use ($slug) {
                $query->where('slug', '<>', $slug);
            })->get())]);
        } else {
            abort(404, 'Ressource non trouvée');
        }
    }
}
