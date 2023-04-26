<!-- Modal -->
<form method="POST" id="add-product-form" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModalLabel">Ajouter un article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        @csrf
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
                            <label for="size" class="form-label">tailles disponible</label>
                            <select class="form-select" id="size" name="size[]" aria-label="Selectionner les tailles disponible">
                                <option selected>Selectionner les tailles disponible</option>
                                @foreach($sizes as $size)
                                <option value="{{$size['id']}}">{{$size['label']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="categories" class="form-label">Categorie(s)</label>
                            <select class="form-select" name="categories[]" id="categories" aria-label="Selectionner les tailles disponible">
                                <option selected>Selectionner les categories correspondantes</option>
                                @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['label']}}</option>
                                @endforeach
                            </select>
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
                                <input class="form-check-input" name="published"  value="status" type="checkbox" role="switch" id="published">
                                <label class="form-check-label" for="published">Caché</label>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
