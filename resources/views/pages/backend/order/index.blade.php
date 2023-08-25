@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Order
@endsection


@section('contnet')
    <div class="card mb-3" id="customersTable">
        <div class="card-header">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <label>Fillter by Date</label>
                        <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}"
                            class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Fillter by Status</label>
                        <select name="status" class="form-select">
                            <option disabled selected>Select Status</option>
                            <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In
                                Progress</option>
                            <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                            <option value="out-for-delivery"
                                {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for
                                delivery</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <button type="submit" style="margin-top: 8px" class="btn btn-primary">Fillter</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Orders</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="table-customers-actions">
                        <div class="d-flex">
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap">Tracking No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap">User Name</th>
                                <th class="sort pe-1 align-middle white-space-nowrap">Payment Mode</th>
                                <th class="sort pe-1 align-middle white-space-nowrap">Orderd Date</th>
                                <th class="sort pe-1 align-middle white-space-nowrap">Status</th>
                                <th class="sort pe-1 align-middle white-space-nowrap">Actions</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-customers-body">
                            @forelse ($orders as $items)
                                <tr>
                                    <td>{{ $items->tracking_no }}</td>
                                    <td>{{ $items->fullname }}</td>
                                    <td>{{ $items->payment_mode }}</td>
                                    <td>{{ $items->created_at->format('d-m-y') }}</td>
                                    <td>{{ $items->status_message }}</td>
                                    <td><a href="{{ route('order.show', $items->id) }}" class="view">view</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="alert-danger text-center" colspan="7">No Orders available.</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                    <div class="card-footer d-flex align-items-center justify-content-center">

                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
