@extends('admin.layout.master')

@section('title','Product List')

@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 justify-content-between">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('product#list') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Products List
                        </li>
                    </ol>
                </nav>
            </div>
            {{-- Message --}}
            <div class="">
                @if (session('createsuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('createsuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('updatesuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('updatesuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('deletesuccess'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('deletesuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('product#create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                class="bi bi-plus-square-fill me-2"></i>Add
                            Product</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header py-3">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-3 col-md-6 me-auto">
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-search"></i>
                            </div>
                            <input class="form-control ps-5" type="text" placeholder="search produts" />
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>All category</option>
                            <option>Fashion</option>
                            <option>Electronics</option>
                            <option>Furniture</option>
                            <option>Sports</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Latest added</option>
                            <option>Cheap first</option>
                            <option>Most viewed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($products) != 0)
                    <div class="product-grid">
                        <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3">
                            @foreach ($products as $product)
                                <div class="col">
                                    <div class="card border shadow-none mb-0">
                                        <div class="card-body text-center m-auto">
                                            <div class="mb-4 d-flex" style="height: 300px">
                                                <img src="{{ asset('storage/product_image/'.$product->image) }}" class="img-fluid align-self-center m-auto"/>
                                            </div>
                                            <h6 class="product-title fw-bold text-truncate d-inline-block" style="width: 200px;">{{ $product->name }}</h6>
                                            <p class="product-price fs-5 mb-1">
                                                <span>{{ number_format($product->price) }} MMK</span>
                                            </p>
                                            <div class="rating mb-0">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </div>
                                            <small>74 Reviews</small>
                                            <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                                                <a href="{{ route('product#edit',$product->id) }}" class="btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-pencil-fill"></i>
                                                    Edit</a>
                                                <a href="{{ route('delete#product',$product->id) }}" class="btn btn-sm btn-outline-danger"><i
                                                        class="bi bi-trash-fill"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end row-->
                    </div>
                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>
                @else
                    <h4 class="text-muted text-center">There is no Products Here!</h4>
                @endif
            </div>
        </div>
    </main>
    <!--end page main-->
@endsection
