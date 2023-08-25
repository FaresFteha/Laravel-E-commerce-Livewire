@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-User
@endsection


@section('contnet')
    <div class="card mb-3" id="customersTable">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Users</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="table-customers-actions">
                        <div class="d-flex">
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                        </div>
                    </div>
                    <div id="table-customers-replace-element">
                        <a href="{{ route('user.create') }}">
                            <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus"
                                    data-fa-transform="shrink-3 down-2"></span><span
                                    class="d-none d-sm-inline-block ms-1">New</span></button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort pe-1 align-middle white-space-nowrap">Full name</th>
                            <th class="sort pe-1 align-middle white-space-nowrap">email</th>
                            <th class="sort pe-1 align-middle white-space-nowrap">role as</th>
                            <th class="align-middle no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                        @forelse ($users as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="phone align-middle white-space-nowrap py-2">{{ $item->name }}</td>
                                <td class="phone align-middle white-space-nowrap py-2">{{ $item->email }}</td>
                                <td class="joined align-middle py-2">
                                    @if ($item->role_as == '1')
                                        <span class="badge badge rounded-pill d-block badge-soft-success"> Admin </span>
                                    @else
                                        <span class="badge badge rounded-pill d-block badge-soft-secondary"> User</span>
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
                                                    href="{{ route('user.edit', $item->id) }}">Edit</a>

                                                <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#destoryUser{{ $item->id }}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('pages.backend.users.modal.delete')
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
    </div>
@endsection

@section('js')
@endsection
