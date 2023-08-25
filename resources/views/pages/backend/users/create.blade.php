@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Users-Create
@endsection


@section('contnet')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Create User</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-f1d388f8-6223-48cd-b720-917f0290eedd"
                    id="dom-f1d388f8-6223-48cd-b720-917f0290eedd">
                    <form class="row g-3" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ old('name') }}" class="@error('name') is-invalid @enderror" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email"
                                value="{{ old('email') }}" class="@error('email') is-invalid @enderror" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" id="password" name="password" type="text"
                                value="{{ old('password') }}" class="@error('password') is-invalid @enderror" />
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="Password-Confirm">Password-Confirm</label>
                            <input class="form-control" id="Password-Confirm" type="text"
                                value="{{ old('Password-Confirm') }}"
                                class="@error('Password-Confirm') is-invalid @enderror" />
                            @error('Password-Confirm')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="role_as">Category</label>
                            <select class="form-select" aria-label="Default select example" id="role_as" name="role_as"
                                class="@error('role_as') is-invalid @enderror">
                                <option disabled selected="">Open this select menu</option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                            @error('role_as')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
