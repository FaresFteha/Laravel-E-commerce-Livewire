@extends('layouts.backend.master')
@section('css')
@endsection

@section('title')
    C-Panel-Product-Create
@endsection


@section('contnet')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Create Product</h5>
                </div>
            </div>
        </div>

        <div class="card-body bg-light">
            <div class="tab-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home"
                            role="tab" aria-controls="tab-home" aria-selected="true">Home</a></li>

                    <li class="nav-item"><a class="nav-link" id="SEO-tab" data-bs-toggle="tab" href="#tab-profile"
                            role="tab" aria-controls="tab-profile" aria-selected="false">SEO Tags</a></li>

                    <li class="nav-item"><a class="nav-link" id="Details-tab" data-bs-toggle="tab" href="#tab-contact"
                            role="tab" aria-controls="tab-contact" aria-selected="false">Details</a></li>

                    <li class="nav-item"><a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab"
                            href="#pill-tab-contact" role="tab" aria-controls="pill-tab-contact"
                            aria-selected="false">Images</a></li>

                    <li class="nav-item"><a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab"
                            href="#pill-tab-color" role="tab" aria-controls="pill-tab-color"
                            aria-selected="false">Colors</a></li>

                </ul>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="tab-content border-x border-bottom p-3" id="myTabContent">

                        {{-- Home Detai --}}
                        <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Product Name</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ old('name') }}" class="@error('name') is-invalid @enderror" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="slug">Product Slug</label>
                                <input class="form-control" id="slug" name="slug" type="text"
                                    value="{{ old('slug') }}" class="@error('slug') is-invalid @enderror" />
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="category_id">Category</label>
                                <select class="form-select" aria-label="Default select example" id="category_id"
                                    name="category_id" class="@error('category_id') is-invalid @enderror">
                                    <option disabled selected="">Open this select menu</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="brand">Brand</label>
                                <select class="form-select" aria-label="Default select example" id="brand"
                                    name="brand" class="@error('brand') is-invalid @enderror">
                                    <option disabled selected="">Open this select menu</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="small_description">Small Description (500 Words)</label>
                                <textarea class="form-control form-control-modern" name="small_description" rows="6"
                                    class="@error('small_description') is-invalid @enderror">{{ old('small_description') }}</textarea>
                                @error('small_description')
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

                        </div>

                        {{-- SEO Tags --}}
                        <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="SEO-tab">
                            <div class="col-md-6">
                                <label class="form-label" for="meta_title">Meta Title</label>
                                <input class="form-control" id="meta_title" name="meta_title" type="text"
                                    value="{{ old('meta_title') }}" class="@error('meta_title') is-invalid @enderror" />
                                @error('meta_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="meta_keywoed">Meta Keywoed</label>
                                <input class="form-control" id="meta_keywoed" name="meta_keywoed" type="text"
                                    value="{{ old('meta_keywoed') }}"
                                    class="@error('meta_keywoed') is-invalid @enderror" />
                                @error('meta_keywoed')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="meta_description">Meta Description</label>
                                <textarea class="form-control form-control-modern" id="meta_description" name="meta_description" rows="6"
                                    class="@error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Details Tags --}}
                        <div class="tab-pane fade" id="tab-contact" role="tabpanel" aria-labelledby="Details-tab">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="orginal_price">Orginal Price</label>
                                    <input class="form-control" type="number" name="orginal_price"
                                        aria-label="orginal_price" value="{{ old('orginal_price') }}"
                                        class="@error('orginal_price') is-invalid @enderror" />
                                    @error('orginal_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label" for="selling_price">Selling Price</label>
                                    <input class="form-control" type="number" name="selling_price"
                                        aria-label="selling_price" value="{{ old('selling_price') }}"
                                        class="@error('selling_price') is-invalid @enderror" />
                                    @error('selling_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label" for="quantity">Quantity</label>
                                    <input class="form-control" type="number" name="quantity" aria-label="quantity"
                                        value="{{ old('quantity') }}" class="@error('quantity') is-invalid @enderror" />
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" id="gridCheck" name="trending"
                                                type="checkbox" />
                                            <label class="form-check-label" for="gridCheck">Trending</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" id="gridCheck" name="status"
                                                type="checkbox" />
                                            <label class="form-check-label" for="gridCheck">Status</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" id="gridCheck" name="featured "
                                                type="checkbox" />
                                            <label class="form-check-label" for="gridCheck">Featured </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Images Tags --}}
                        <div class="tab-pane fade" id="pill-tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="mb-3">
                                <label class="form-label" for="formFileMultiple">Images</label>
                                <input class="form-control" id="formFileMultiple" name="image[]" type="file"
                                    multiple="multiple" />
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pill-tab-color" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">

                                @forelse ($colors as $item)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb3">
                                        <label class="form-check-label" for="inlineCheckbox1">Color: </label>
                                        <input class="form-check-input" id="inlineCheckbox1" type="checkbox"
                                            name="colors[]" value="{{ $item->id }}" />{{ $item->name }}
                                            <br>
                                                <label class="form-label" for="inputEmail4">Quantity:</label>
                                                <input class="form-control" id="inputEmail4"  type="number" name="colorquantity[{{ $item->id }}]"  />
                                    </div>
                                </div>
                                @empty
                                    <h4>No Colors</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
