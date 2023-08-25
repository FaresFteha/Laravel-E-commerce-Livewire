<div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                    <tr>
                        <th class="sort pe-1 align-middle white-space-nowrap">Color Name</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Code</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">status</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-customers-body">
                    @forelse ($colors as $item)
                        <tr class="btn-reveal-trigger">
                            <td class="name align-middle white-space-nowrap py-2">
                                <div class="d-flex d-flex align-items-center">
                                    <div class="flex-1">
                                        <h5 class="mb-0 fs--1">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="phone align-middle white-space-nowrap py-2">{{ $item->code }}</td>
                            <td class="joined align-middle py-2">
                                @if ($item->status)
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-success">{{ $item->Status() }}<span
                                            class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                @else
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-secondary">{{ $item->Status() }}<span
                                            class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                            </td>
                            <td class="align-middle white-space-nowrap py-2 text-end">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                        type="button" id="customer-dropdown-0" data-bs-toggle="dropdown"
                                        data-boundary="window" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0"
                                        aria-labelledby="customer-dropdown-0">
                                        <div class="bg-white py-2"
                                        ><a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editColor{{ $item->id }}">Edit</a>

                                            <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#destoryColor{{ $item->id }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('pages.backend.color.modal.edit')
                        @include('pages.backend.color.modal.delete')

                    @empty
                        <tr>
                            <td class="alert-danger text-center" colspan="4"> No data in table
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-center">
        {{ $colors->links() }}
    </div>
</div>
