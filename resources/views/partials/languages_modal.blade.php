<div class="modal fade" id="delete-{{ $language->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId-{{ $language->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete-{{ $language->id }}">Stai per eliminare
                    <strong>DEFINITIVAMENTE</strong> un dato
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Stai per eliminare per sempre un elemento, sei sicuro di voler continuare? Se lo fai, non sarà più
                possibile recuperare i dati.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border border-secondary fw-bold ms_btn_hover_secondary"
                    data-bs-dismiss="modal">Chiudi</button>
                <form action="{{ route('admin.languages.destroy', $language->id) }}" method="post">
                    @csrf

                    @method ('delete')

                    <button type="submit" class="btn border border-danger fw-bold ms_btn_hover_danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
