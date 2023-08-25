<div class="modal fade" id="destoryUser{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" id="modalExampleDemoLabel">Delete</h4>
                </div>
                <div class="p-4 pb-0">
                    <form action="{{ route('user.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">You are sure the delete?</label>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                    type="button">Yes,Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
