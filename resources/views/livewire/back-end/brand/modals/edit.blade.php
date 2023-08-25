<div wire:ignore.self class="modal fade" id="editBrand" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" wire:click="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" id="modalExampleDemoLabel">Updating a Brand </h4>
                </div>
                {{-- Loadig Wire --}}
                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>...Loading
                </div>
                <div class="p-4 pb-0">

                    {{-- remove Loading --}}
                    <div wire:loading.remove>
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label class="form-label" for="category_id">Category</label>
                                <select class="form-select" aria-label="Default select example" id="category_id"
                                wire:model.defer="category_id">
                                    <option disabled selected="">Open this select menu</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label" for="name">Name:</label>
                                <input class="form-control" wire:model.defer="name" type="text" />
                                @error('name')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="slug">Slug:</label>
                                <input class="form-control" wire:model.defer="slug" type="text" />
                                @error('slug')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input class="form-check-input" id="gridCheck" wire:model.defer="status"
                                    type="checkbox" />
                                <label class="form-check-label" for="gridCheck">Status</label>
                            </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" wire:click="closeModal()"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" type="button">Update</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
