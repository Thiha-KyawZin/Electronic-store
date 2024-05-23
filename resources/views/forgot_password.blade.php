@extends('master')

@section('title', 'Forgot Paassword')

@section('content')
    <div class="container-fluid">
        <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                        <img src="{{ asset('admin/images/error/forgot-password-frent-img.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body p-4 p-sm-5">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('FailMessage'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('FailMessage') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <h5 class="card-title">Forgot Password?</h5>
                            <p class="card-text mb-5">Enter your registered email to reset the password</p>
                            <form class="form-body" action="{{ route('forgot#password') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="inputEmailid" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control form-control-lg radius-30 @error('email') is-invalid @enderror"
                                            id="inputEmailid" placeholder="Email" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid gap-3">
                                            <button type="submit" class="btn btn-lg btn-primary radius-30">Send</button>
                                            @if (Auth::user())
                                                <a href="{{ route('product#list') }}"
                                                    class="btn btn-lg btn-light radius-30">Back to
                                                    Home</a>
                                            @else
                                                <a href="{{ route('auth#login') }}"
                                                    class="btn btn-lg btn-light radius-30">Back to
                                                    Login</a>
                                            @endif
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
