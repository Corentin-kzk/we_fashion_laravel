<form method="POST" action="{{route($category->exists ? 'admin.categories.update' : 'admin.categories.store', $category)}}" enctype="multipart/form-data" novalidate>
    <div class="row g-3">
        @csrf
        @method($category->exists ? 'PUT' : 'POST')
        <div class="mb-3 col-md-12">
            <label for="label" class="form-label">Nom du produit</label>
            <input type="text" @class(['form-control','is-invalid'=> $errors->has('label') ]) value="{{ $category->exists ? $category->label : "" }}" id="label" name="label">
            @error('label')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
