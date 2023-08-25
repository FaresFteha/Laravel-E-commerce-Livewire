<div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                    <tr>
                        <th>
                            <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox"
                                    data-bulk-select='{"body":"table-customers-body","actions":"table-customers-actions","replacedElement":"table-customers-replace-element"}' />
                            </div>
                        </th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Product Name</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Category</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Brand</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Slug</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Quantity</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Status</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Trending</th>
                        <th class="sort pe-1 align-middle white-space-nowrap">Featured</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-customers-body">
                    @forelse ($products as $product)
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="customer-0"
                                        data-bulk-select-row="data-bulk-select-row" />
                                </div>
                            </td>
                            <td class="name align-middle white-space-nowrap py-2"><a
                                    href="{{ route('product.show', $product->id) }}">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs--1">{{ $product->name }}</h5>
                                        </div>
                                    </div>
                                </a></td>
                            <td class="email align-middle py-2">
                                @if ($product->Category->name)
                                    {{ $product->Category->name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td class="phone align-middle white-space-nowrap py-2">{{ $product->brand }}</td>
                            <td class="address align-middle white-space-nowrap ps-5 py-2">{{ $product->slug }}</td>
                            <td class="address align-middle white-space-nowrap ps-5 py-2">{{ $product->quantity }}</td>
                            <td class="joined align-middle py-2">
                                @if ($product->status)
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-success">{{ $product->Status() }}<span
                                            class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                @else
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-secondary">{{ $product->Status() }}<span
                                            class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                            </td>
                            <td class="joined align-middle py-2">
                                @if ($product->trending)
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-success">{{ $product->Trending() }}<span
                                            class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                @else
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-secondary">{{ $product->Trending() }}<span
                                            class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                            </td>
                            <td class="joined align-middle py-2">
                                @if ($product->featured)
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-success">{{ $product->Featured() }}<span
                                            class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                @else
                                    <span
                                        class="badge badge rounded-pill d-block badge-soft-secondary">{{ $product->Featured() }}<span
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
                                        <div class="bg-white py-2"><a class="dropdown-item"
                                                href="{{ route('product.edit', $product->id) }}">Edit</a>

                                            <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#destoryProduct{{ $product->id }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('pages.backend.product.modal.delete')
                    @empty
                        <tr>
                            <td class="alert-danger text-center" colspan="6">No Orders available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-center">
        {{ $products->links() }}
    </div>
</div>
