@extends('admin.layout.master')

@section('title','Edit Product')

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
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded row">
                            <div>
                                <form class="row" method="POST" enctype="multipart/form-data" action="{{ route('edit#product') }}">
                                    @csrf
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <img src="{{ asset('storage/product_image/'.$data->image) }}" class="img-fluid m-auto"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <input type="hidden" name="product_id" value="{{ $data->id }}">
                                        <div class="col-12 my-2">
                                            <label class="form-label">Product title</label>
                                            <input type="text" class="form-control @error('ProductName') is-invalid @enderror" value="{{ old('ProductName',$data->name) }}" placeholder="Product title" name="ProductName">
                                            @error('ProductName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 my-2">
                                            <label class="form-label">Full description</label>
                                            <textarea class="form-control @error('ProductDescription') is-invalid @enderror" placeholder="Full description"  rows="4" cols="4" name="ProductDescription">{{ old('ProductDescription',$data->description) }}</textarea>
                                            @error('ProductDescription')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 my-2">
                                            <label class="form-label">Image</label>
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 row my-2">
                                            <div class="col-6">
                                                <label class="form-label">Price</label>
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{ old('price',$data->price) }}">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Category</label>
                                                <select class="form-select @error('Category') is-invalid @enderror" name="Category">
                                                    <option value="">Choose Category</option>
                                                    @foreach ($category_datas as $category_data)
                                                        <option value="{{ $category_data->id }}" @selected($data->category_id == $category_data->id)>{{ $category_data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('Category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
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
        </div>
        <!--end row-->

    </main>
    <!--end page main-->
@endsection
