<!-- Modal -->
<form action="{{ route('admin.product.destroy', $product) }}" id="delete-form" method="POST">
    @csrf
    @method('delete')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal-{{$product->id}}" tabindex="-1" aria-labelledby="deleteModal-{{$product->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Etes vous de vouloir supprimer l'article suivant ? </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h2 class="text-danger"><i class="bi bi-trash-fill"></i></h2>
                    <p>Etes vous de vouloir supprimer l'article :</p>
                    <p>{{$product->name}}</p>
                    <span>{{$product->reference}}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger text-light">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</form>
