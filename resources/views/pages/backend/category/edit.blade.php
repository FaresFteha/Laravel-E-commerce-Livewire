@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Categories-Create
@endsection


@section('contnet')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Create Garegory</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-f1d388f8-6223-48cd-b720-917f0290eedd"
                    id="dom-f1d388f8-6223-48cd-b720-917f0290eedd">
                    <form class="row g-3" action="{{ route('category.update', 'update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="id" name="id" value="{{ $category->id }}">
                        <h4 class="card-big-info-title">Category publc Details</h4>
                        <div class="col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ $category->name }}" class="@error('name') is-invalid @enderror" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="slug">Slug</label>
                            <input class="form-control" id="slug" name="slug" type="text"
                                value="{{ $category->slug }}" class="@error('slug') is-invalid @enderror" />
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control form-control-modern" name="description" rows="6"
                                class="@error('description') is-invalid @enderror">{{ $category->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <h4 class="card-big-info-title">Category SEO Tags</h4>
                        <div class="col-md-6">
                            <label class="form-label" for="meta_title">Meta Title</label>
                            <input class="form-control" id="meta_title" name="meta_title" type="text"
                                value="{{ $category->meta_title }}" class="@error('meta_title') is-invalid @enderror" />
                            @error('meta_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="meta_keywoed">Meta Keywoed</label>
                            <input class="form-control" id="meta_keywoed" name="meta_keywoed" type="text"
                                value="{{ $category->meta_keywoed }}"
                                class="@error('meta_keywoed') is-invalid @enderror" />
                            @error('meta_keywoed')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="meta_description">Meta Description</label>
                            <textarea class="form-control form-control-modern" id="meta_description" name="meta_description" rows="6"
                                class="@error('meta_description') is-invalid @enderror">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <h4 class="card-big-info-title">Category Image</h4>
                        <div class="mb-3">
                            <label class="form-label" for="customFile">Image</label>
                            <input class="form-control" id="customFile" type="file" name="photo" />
                            <img class="rounded-circle shadow-sm" style="width: 100px" height="100px"
                                src="{{ asset('storage/Attachments/Category-Attachments/' . $category->photo) }}"
                                alt="Ctegory Photo" />
                        </div>

                        <h4 class="card-big-info-title">Category Status</h4>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="gridCheck" type="checkbox" name="status"
                                    {{ $category->status == '1' ? 'checked' : '' }} />
                                <label class="form-check-label" for="gridCheck">Status</label>
                            </div>
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
