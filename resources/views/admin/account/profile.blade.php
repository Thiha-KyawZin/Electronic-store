@extends('admin.layout.master')

@section('title', 'Pofile_details')

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
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show col-5 offset-7" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="profile-avatar me-5">
                                @if ($data->image != null)
                                    <img src="{{ asset('storage/profile_image/' . Auth::user()->image) }}"
                                        class="rounded-circle shadow" alt="" style="height:150px" />
                                @else
                                    @if ($data->gender == 'male')
                                        <img src="{{ asset('storage/profile_image/Male_default.jpg') }}"
                                            class="rounded-circle shadow" alt="" style="height:150px" />
                                    @else
                                        <img src="{{ asset('storage/profile_image/Female_default.jpg') }}"
                                            class="rounded-circle shadow" alt="" style="height:150px" />
                                    @endif
                                @endif
                            </div>
                            <div class="fw-bold">
                                <div class="" style="font-size: 1rem"><i class="bi bi-person-fill me-1"></i>Name :
                                    {{ $data->name }}</div>
                                <div class="" style="font-size: 1rem"><i class="bi bi-envelope-fill me-1"></i>Email :
                                    {{ $data->email }}</div>
                                <div class="" style="font-size: 1rem"><i class="bi bi-telephone-fill me-1"></i>Phone :
                                    {{ $data->phone }}</div>
                                <div class="" style="font-size: 1rem"><i
                                        class="bi bi-gender-ambiguous me-1"></i>Gender : {{ $data->gender }}</div>
                                <div class="" style="font-size: 1rem"><i class="bi bi-gear-fill me-1"></i>Role :
                                    {{ $data->role }}</div>
                                <div class="" style="font-size: 1rem"><i class="bi bi-geo-alt-fill me-1"></i>Address :
                                    {{ $data->house_no }},{{ $data->street }},{{ $data->township }},{{ $data->city }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            @if (url()->previous() == route('account#list'))
                                <a class="" href="{{ url()->previous() }}">
                                    <button type="submit" class="btn btn-outline-primary">Back</button>
                                </a>
                            @else
                                <a class="" href="{{ route('product#list') }}">
                                    <button type="submit" class="btn btn-outline-primary">Back</button>
                                </a>
                            @endif
                            @if ($data->id == Auth::user()->id)
                                <a class="" href="{{ route('profile#edit') }}">
                                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                                </a>
                            @else
                                <a class="" href="{{ route('profile#edit') }}" style="pointer-events: none">
                                    <button type="submit" class="btn btn-outline-primary" disabled>Edit</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->

    </main>
    <!--end page main-->
@endsection
