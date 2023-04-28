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
        'image' => 'string',
    ];

    protected $validationMessages = [
        'required' => 'Le champ :attribute est obligatoire.',
        'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        'min' => [
            'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
        ],
        'max' => [
            'string' => 'Le champ :attribute ne peut pas contenir plus de :max caractères.',
        ],
        'numeric' => 'Le champ :attribute doit être un nombre.',
        'between' => [
            'numeric' => 'Le champ :attribute doit être compris entre :min et :max.',
        ],
        'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    ];

    protected $destinationPath = 'images/';
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return View('index', ["products" => Product::with('sizes')->orderBy('created_at', 'desc')->with('categories')->paginate(6)]);
    }
    /**
     * Show the form for creating the specified resource.
     */
    public function create()
    {

        return view('product.create', ['product' => new Product, 'sizes' => Size::pluck('label', 'id'), 'categories' => Categorie::pluck('label', 'id')]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faker = Container::getInstance()->make(Generator::class);
        //uplaod Image
        $picture = '';
        if ($image = $request->file('picture')) {
            $picture = time() . "." . $image->getClientOriginalExtension();
            $picture = $image->storeAs('public/images', $picture);
        }
        $request->validate($this->validationRules, $this->validationMessages);

        // dd($request->input('published'), $request->input('status'));
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image =  $picture;
        $product->reference = $faker->regexify('^#W_F\d{4}[a-zA-Z]{2}[0-9a-zA-Z]{0,6}$');
        $product->status = $request->input('status') === "1" ? true : false;
        $product->published =  $request->input('published') === "1" ? false  :  true;
        $product->save();

        // Ajouter les relations avec les catégories
        $categories = Categorie::whereIn('id', $request->input('categories'))->get();
        $product->categories()->attach($categories);
        // Ajouter les relations avec les tailles
        $sizes = Size::whereIn('id', $request->input('sizes'))->get();
        $product->sizes()->attach($sizes);
        $product->save();
        return redirect()->route('admin.products')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
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
        $request->validate($this->validationRules, $this->validationMessages);

        $product->sizes()->sync($request->input('sizes') ?? []);
        $product->categories()->sync($request->input('categories') ?? []);
        $product->status = $request->input('status') === "1" ? true : false;
        $product->published =  $request->input('published') === "1" ? false  :  true;
        $product->update();
        return redirect()->route('admin.products')
            ->with('success', 'Post updated successfully');
    }
    /**
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')
            ->with('success', 'Post deleted successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function Solde(): View
    {
        return View('index', ["products" => Product::where('published', true)->where('status', true)->orderBy('created_at', 'desc')->with('sizes')->with('categories')->paginate(6)]);
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
            return View('index', ["products" => $product]);
        } else {
            abort(404, 'Ressource non trouvée');
        }
    }
}
