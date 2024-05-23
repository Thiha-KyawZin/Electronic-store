@extends('admin.layout.master')

@section('title', 'Product Create')

@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('product#list') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form class="row g-3" method="POST" enctype="multipart/form-data" action="{{ route('create#product') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Product title</label>
                                    <input type="text" class="form-control @error('ProductName') is-invalid @enderror" value="{{ old('ProductName') }}" placeholder="Product title" name="ProductName">
                                    @error('ProductName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Full description</label>
                                    <textarea class="form-control @error('ProductDescription') is-invalid @enderror" placeholder="Full description"  rows="4" cols="4" name="ProductDescription">{{ old('ProductDescription') }}</textarea>
                                    @error('ProductDescription')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 row">
                                    <div class="col-6">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{ old('price') }}">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Category</label>
                                        <select class="form-select @error('Category') is-invalid @enderror" name="Category">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories_datas as $categories_data)
                                                <option value="{{ $categories_data->id }}" @selected(old('Category') == $categories_data->id)>{{ $categories_data->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('Category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-4 d-flex justify-content-between">
                                    <div class="d-grid">
                                        <a class="btn btn-primary" href="{{ route('product#list') }}">Back</a>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">Submit Item</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </main>
    <!--end page main-->

@endsection
