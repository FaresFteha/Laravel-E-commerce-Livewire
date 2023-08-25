<div>
    <div class="card mb-3" id="customersTable">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Brand</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="orders-bulk-actions">
                        <div class="d-flex">
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Delete</button>
                        </div>
                    </div>
                    <div id="table-customers-replace-element">

                        <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="modal"
                            data-bs-target="#AddBrand"><span class="fas fa-plus"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">New</span></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Insert Brand Modal --}}
        @include('livewire.back-end.brand.modals.add')
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>

                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Name</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Slug</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Category</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="phone">Status</th>
                            <th class="align-middle no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                        @forelse ($brands as $items)
                            <tr class="btn-reveal-trigger">
                                <td class="name align-middle white-space-nowrap py-2">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="flex-1">
                                            <h5 class=" mb-0 fs--1"><strong>{{ $items->name }}</strong></h5>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                                <td class="email align-middle py-2"><strong>{{ $items->slug }}</strong></td>
                                <td class="email align-middle py-2"><strong>{{ $items->categories->name }}</strong></td>

                                <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                    @if ($items->status)
                                        <span
                                            class="badge badge rounded-pill d-block badge-soft-success">{{ $items->status() }}<span
                                                class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    @else
                                        <span
                                            class="badge badge rounded-pill d-block badge-soft-secondary">{{ $items->status() }}<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                    @endif
                                </td>

                                <td class="align-middle white-space-nowrap py-2 text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                            type="button" id="customer-dropdown-1" data-bs-toggle="dropdown"
                                            data-boundary="window" aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="customer-dropdown-1">
                                            <div class="bg-white py-2">
                                                <a class="dropdown-item" wire:click="editbrand({{ $items->id }})"
                                                    type="button" data-bs-toggle="modal" data-bs-target="#editBrand"
                                                    href="#">Edit</a>

                                                <a class="dropdown-item text-danger" href="#"
                                                    wire:click="removID({{ $items->id }})" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#deleteBrand">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('livewire.back-end.brand.modals.edit')
                            @include('livewire.back-end.brand.modals.delete')
                        @empty
                            <tr>
                                <td class="alert-danger text-center" colspan="4">No data in table</td>
                            </tr>
                            
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center">
            {{ $brands->links() }}
        </div>
    </div </div>
    @push('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#AddBrand').modal('hide');
                $('#editBrand').modal('hide');
                $('#deleteBrand').modal('hide');
            });
        </script>
    @endpush
