@extends('admin.layout.master')

@section('title', 'Category List')

@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 justify-content-between">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('product#list') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Category List</li>
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
                        <a href="{{ route('category#create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                class="bi bi-plus-square-fill me-2"></i>Add
                            Category</a>
                    </div>
                </div>
            </div>
        </div>

        @if (count($categories) != 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="col-1">{{ $category->id }}</td>
                                        <td class="col-2">
                                            <img src="{{ asset('storage/category_image/'.$category->image) }}" alt="" style="width: 75px">
                                        </td>
                                        <td class="col-3 offset-1">{{ $category->name }}</td>
                                        <td class="col-2">
                                            {{ $category->created_at->timezone('Asia/Yangon')->format('g:i:A/d-m-Y') }}</td>
                                        <td class="col-2">
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="{{ route('category#edit', $category->id) }}"
                                                    class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="" data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <a href="{{ route('delete#category', $category->id) }}"
                                                    class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="" data-bs-original-title="Delete" aria-label="Delete"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h4 class="text-muted text-center">There is no Categorys Here!</h4>
        @endif

    </main>
    <!--end page main-->
@endsection
