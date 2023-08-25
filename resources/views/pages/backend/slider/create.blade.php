@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Categories-Sliders
@endsection


@section('contnet')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Create Sliders</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-f1d388f8-6223-48cd-b720-917f0290eedd"
                    id="dom-f1d388f8-6223-48cd-b720-917f0290eedd">
                    <form class="row g-3" action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-md-6">
                            <label class="form-label" for="name">Title</label>
                            <input class="form-control" id="name" name="title" type="text"
                                value="{{ old('title') }}" class="@error('title') is-invalid @enderror" />
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control form-control-modern" name="description" rows="6"
                                class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <h4 class="card-big-info-title">Slider Image</h4>
                        <div class="mb-3">
                            <label class="form-label" for="customFile">Image</label>
                            <input class="form-control" id="customFile" type="file" name="photo" />
                        </div>

                        <h4 class="card-big-info-title">Slider Status</h4>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="gridCheck" name="status" type="checkbox" />
                                <label class="form-check-label" for="gridCheck">Status</label>
                            </div>
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
