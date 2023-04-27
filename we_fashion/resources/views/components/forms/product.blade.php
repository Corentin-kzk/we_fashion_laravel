<form method="POST" id="add-product-form" action="{{route($product->exists ? 'admin.product.update' : 'admin.product.store', $product)}}" enctype="multipart/form-data" novalidate>
    <div class="row g-3">
        @csrf
        @method($product->exists ? 'PUT' : 'POST')
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" @class(['form-control','is-invalid'=> $errors->has('name') ]) value="{{ $product->exists ? $product->name : "" }}" id="name" name="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-md-12">
            <label for="description" class="form-label">Description du produit</label>
            <textarea @class(['form-control','is-invalid'=> $errors->has('description') ]) id="description" rows="3" name="description" value="{{ $product->exists ? $product->description : "" }}"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Prix</label>
            <input type="number" @class(['form-control','is-invalid'=> $errors->has('price') ]) value="{{ $product->exists ? $product->price : null }}" name="price" id="price">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 col-md-12">
            <label class="form-label" for="picture">Image</label>
            <input type="file" @class(['form-control','is-invalid'=> $errors->has('picture') ]) name="picture" id="picture">
            @error('picture')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-md-12">
            @include('components.forms.formInputs.select', ['name'=> 'sizes', 'label'=>'Tailles disponible', 'values'=> $product->sizes()->pluck('id'), 'options' => $sizes])
        </div>
        <div class="mb-3 col-md-12">
            @include('components.forms.formInputs.select', ['name'=> 'categories', 'label'=>'Categorie(s)', 'values'=> $product->categories()->pluck('id'), 'options' => $categories])
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Le produit est-il soldé ?</label>
            <div class="form-check form-switch">
                <input  @class(['form-check-input','is-invalid'=> $errors->has('status') ]) name="status" value="status" type="checkbox" role="switch" @checked(boolval($product->status)) id="status">
                <label class="form-check-label" for="status">Soldé</label>
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Le produit doit-il etre caché ?</label>
            <div class="form-check form-switch">
                <input @class(['form-check-input','is-invalid'=> $errors->has('published') ]) name="published" value="published" type="checkbox" role="switch"  @checked(boolval(!$product->published)) id="published">
                <label class="form-check-label" for="published">Caché</label>
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
