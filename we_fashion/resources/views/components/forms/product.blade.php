<form method="PUT" id="add-product-form" action="{{route($product->exists ? 'admin.product.update' : 'admin.product.store', $product)}}" enctype="multipart/form-data">
    <div class="row g-3">
        @csrf
        @method('PUT')
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3 col-md-12">
            <label for="description" class="form-label">Description du produit</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>

        <div class="mb-3 col-md-12">
            <label class="form-label" for="picture">Image</label>
            <input type="file" class="form-control" name="picture" id="picture">
        </div>
        <div class="mb-3 col-md-12">
            @include('components.select', ['name'=> 'size', 'label'=>'Tailles disponible', 'values'=> $product->sizes()->pluck('id'), 'options' => $sizes])
        </div>
        <div class="mb-3 col-md-12">
            @include('components.select', ['name'=> 'ategories', 'label'=>'Categorie(s)', 'values'=> $product->categories()->pluck('id'), 'options' => $categories])
        </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Le produit est-il soldé ?</label>
            <div class="form-check form-switch">
                <input class="form-check-input" name="status" value="status" type="checkbox" role="switch" id="status">
                <label class="form-check-label" for="status">Soldé</label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Le produit doit-il etre caché ?</label>
            <div class="form-check form-switch">
                <input class="form-check-input" name="published" value="status" type="checkbox" role="switch" id="published">
                <label class="form-check-label" for="published">Caché</label>
            </div>
        </div>
    </div>
    <button type="submit"  class="btn btn-primary">Envoyer</button>
</form>
