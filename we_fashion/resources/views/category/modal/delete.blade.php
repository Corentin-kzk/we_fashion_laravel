<!-- Modal -->
<form action="{{ route('admin.categories.destroy', $category) }}" id="delete-form" method="POST">
    @csrf
    @method('delete')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal-{{$category->id}}" tabindex="-1" aria-labelledby="deleteModal-{{$category->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Etes vous de vouloir supprimer une categorie </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h2 class="text-danger fs-1"><i class="bi bi-trash-fill"></i></h2>
                    <p class="fs-3">{{$category->name}}</p>
                    <p class="text-danger fs-4">Vous ne pourrez pas revenir en arriére</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger text-light">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</form>
