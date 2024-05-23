@extends('master')

@section('title', 'Login Page')

@section('content')
    <div class="container-fluid">
        <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                        <img src="{{ asset('admin/images/error/login-img.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title">Login</h5>
                            <form class="form-body" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-envelope-fill"></i></div>
                                            <input type="email"
                                                class="form-control radius-30 ps-5 @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" name="email" placeholder="Email Address">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
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
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end"> <a href="{{ route('auth#forgot_password') }}"
                                            target="_blank">Forgot Password
                                            ?</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-0">Don't have an account yet? <a
                                                href="{{ route('auth#register') }}">Register here</a>
                                        </p>
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
