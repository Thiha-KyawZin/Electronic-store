@extends('master')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                        <img src="{{ asset('admin/images/error/auth-img-7.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title">Reset Password</h5>
                            <form class="form-body" action="{{ route('password#reset') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <input type="hidden" name="token" value="{{ $token }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">New Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-lock-fill"></i></div>
                                            <input type="password"
                                                class="form-control radius-30 ps-5 @error('password') is-invalid @enderror"
                                                name="password" id="inputChoosePassword" placeholder="Enter Password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Confirm New Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-lock-fill"></i></div>
                                            <input type="password"
                                                class="form-control radius-30 ps-5 @error('password') is-invalid @enderror"
                                                name="confirm_password" id="inputChoosePassword" placeholder="Enter Password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary radius-30">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
