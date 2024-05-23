@extends('admin.layout.master')

@section('title', 'Account List')

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
                        <li class="breadcrumb-item active" aria-current="page">Account List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        @foreach ($datas as $data)
                            <tbody>
                                <tr class="">
                                    <td class="col-1">
                                        @if ($data->image)
                                            <img src="{{ asset('storage/profile_image/'.$data->image) }}" style="height:70px" alt="" />
                                        @else
                                            @if ($data->gender == 'male')
                                                <img src="{{ asset('storage/profile_image/Male_default.jpg') }}" style="height:70px" alt="" />
                                            @else
                                                <img src="{{ asset('storage/profile_image/Female_default.jpg') }}" style="height:70px" alt="" />
                                            @endif
                                        @endif
                                    </td>
                                    <td class="col-2">{{ $data->name }}</td>
                                    <td class="col-2">{{ $data->email }}</td>
                                    <td class="col-1">{{ $data->gender }}</td>
                                    <td class="col-1">{{ $data->phone }}</td>
                                    <td class="col-3">
                                        {{ $data->township }},{{ $data->city }}
                                    </td>
                                    <td class="col-2">
                                        @if ($data->id == Auth::user()->id)
                                            <select name="" class="form-control">
                                                <option value="admin" @if ($data->role == 'admin') selected @endif
                                                    disabled>Admin</option>
                                                <option value="user" @if ($data->role == 'user') selected @endif
                                                    disabled>User</option>
                                            </select>
                                        @else
                                            <select name="" class="form-control rolestatus">
                                                <option value="admin" @if ($data->role == 'admin') selected @endif>
                                                    Admin</option>
                                                <option value="user" @if ($data->role == 'user') selected @endif>
                                                    User</option>
                                            </select>
                                        @endif
                                    </td>
                                    <td class="col-1">
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ route('profile#detail',$data->id) }}" class=""
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="View detail" aria-label="Views"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            @if ($data->id == Auth::user()->id)
                                                <a href="{{ route('profile#edit') }}" class=""
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @else
                                                {{-- <a href="" class=""
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views"><i
                                                        class="bi bi-eye-fill"></i></a> --}}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>

    </main>
    <!--end page main-->
@endsection
