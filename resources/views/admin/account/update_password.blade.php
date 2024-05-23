@extends('admin.layout.master')

@section('title', 'Update Password')

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
                        <li class="breadcrumb-item active" aria-current="page">Update Password</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="d-flex justify-content-center">
            <div class="card align-items-center w-50">
                <div class="card-header py-3">
                    <h6 class="mb-0">Update Your Password</h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <form class="row g-3" method="POST" action="{{ route('update#password') }}">
                                        @csrf
                                        <div class="col-12 form-group">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" class="form-control @if (session('failed')) is-invalid @endif @error('OldPassword') is-invalid @enderror" placeholder="Old Password" name="OldPassword">
                                        </div>
                                        @error('OldPassword')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if (session('failed'))
                                        <span class="text-danger">{{ session('failed') }}</span>

                                        @endif

                                        <div class="col-12 form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control @error('NewPassword') is-invalid @enderror" placeholder="New Password" name="NewPassword">
                                        </div>
                                        @error('NewPassword')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="col-12 form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control @error('ConfirmPassword') is-invalid @enderror" placeholder="Confirm Password" name="ConfirmPassword">
                                        </div>
                                        @error('ConfirmPassword')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="col-12 mt-4 d-flex justify-content-between">
                                            <div class="d-grid">
                                                <a class="btn btn-primary" href="{{ route('category#list') }}">Back</a>
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Update</button>
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
