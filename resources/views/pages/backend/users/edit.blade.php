@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Users-Update
@endsection


@section('contnet')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Update User</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-f1d388f8-6223-48cd-b720-917f0290eedd"
                    id="dom-f1d388f8-6223-48cd-b720-917f0290eedd">
                    <form class="row g-3" action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ $user->name }}" class="@error('name') is-invalid @enderror" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email"
                                value="{{ $user->email }}" class="@error('email') is-invalid @enderror" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="name">Password</label>
                            <input class="form-control" id="password" name="password" type="text"
                                class="@error('password') is-invalid @enderror" />
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="role_as">Category</label>
                            <select class="form-select" aria-label="Default select example" id="role_as" name="role_as"
                                class="@error('role_as') is-invalid @enderror">
                                <option disabled selected="">Open this select menu</option>
                                <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role_as')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
