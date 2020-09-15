<!-- Modal -->
<div class="modal fade" id="role-{{ $permission->id }}" tabindex="-1" role="dialog" aria-labelledby="role-{{ $permission->id }}Label" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="role-{{ $permission->id }}Label"><b>Apakah yakin menghapus role ini?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="d-flex justify-content-arround">
            <div class="w-100">
            <form action="{{ route('permissions.delete', $permission) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger btn-block">Ya</button>
            </form>
            </div>
            <div class="mx-1"></div>
            <div class="w-100">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
    </div>
</div>
</div>