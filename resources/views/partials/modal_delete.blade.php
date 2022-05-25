<!-- Modal -->
<div class="modal fade" id="model-delete{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('perjalanan.delete', $d->id) }}" method="post">
                <div class="modal-body text-center my-4">
                
                        @csrf
                        @method('delete')

                        <h4>Yakin catatan akan dihapus</h4>

                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">OK</button>
            </div>
        </form>
        </div>
    </div>
</div>