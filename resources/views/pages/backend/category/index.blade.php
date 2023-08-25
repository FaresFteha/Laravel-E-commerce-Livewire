@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Categories
@endsection


@section('contnet')
    <div class="card mb-3" id="customersTable">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Category</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="orders-bulk-actions">
                        <div class="d-flex">
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Delete</button>
                        </div>
                    </div>
                    <div id="table-customers-replace-element">
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus"
                                    data-fa-transform="shrink-3 down-2"></span><span
                                    class="d-none d-sm-inline-block ms-1">New</span></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <livewire:back-end.category.index />
    </div>
@endsection

@section('js')
@endsection
