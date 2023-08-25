<div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                    <tr>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Name</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Slug</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="phone">Status</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-customers-body">
                    @forelse ($categories as $items)
                        <tr class="btn-reveal-trigger">
                            <td class="name align-middle white-space-nowrap py-2">
                                <div class="d-flex d-flex align-items-center">
                                    <div class="avatar avatar-xl me-2">
                                        @if ($items->photo)
                                            <img class="rounded-circle"
                                                src="{{ asset('storage/Attachments/Category-Attachments/' . $items->photo) }}"
                                                alt="{{ $items->name }}" />
                                        @else
                                            <img class="rounded-circle"
                                                src="{{ asset('asset/backend/src/img/team/empty-thumb.png') }}"
                                                alt="{{ $items->name }}" />
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h5 class=" mb-0 fs--1"><a type="button" data-bs-toggle="modal"
                                                data-bs-target="#showCategoryDetails{{ $items->id }}"
                                                href="#">{{ $items->name }}</a></h5>
                                    </div>
                                </div>
                                </a>
                            </td>
                            <td class="email align-middle py-2"><strong>{{ $items->slug }}</strong></td>
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
                                            <a class="dropdown-item"
                                                href="{{ route('category.edit', $items->id) }}">Edit</a>
                                            <a class="dropdown-item text-danger"
                                                wire:click="deleteCategory({{ $items->id }} , '{{ $items->photo }}')"
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target="#destoryCategory">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('pages.backend.category.modals.show')
                        @include('pages.backend.category.modals.destory')
                    @empty
                    <tr>
                        <td class="alert-danger text-center" colspan="5">No data in table
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-center">
        {{ $categories->links() }}
    </div>
</div>
