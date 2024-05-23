@extends('admin.layout.master')

@section('title', 'Edit Category')

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
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="d-flex justify-content-center">
            <div class="card align-items-center w-50">
                <div class="card-header py-3">
                    <h6 class="mb-0">Edit Your Category</h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <form class="row g-3" method="POST" action="{{ route('edit#category') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="category_id" value="{{ $datas->id }}">
                                        <div class="col-12 form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" value="{{ old('CategoryName',$datas->name) }}" class="form-control @error('CategoryName') is-invalid @enderror" placeholder="Category name" name="CategoryName">
                                        </div>
                                        @error('CategoryName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <div class="col-12 form-group">
                                            <label class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="col-12 mt-4 d-flex justify-content-between">
                                            <div class="d-grid">
                                                <a class="btn btn-primary" href="{{ route('category#list') }}">Back</a>
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>

    </main>
    <!--end page main-->
@endsection
