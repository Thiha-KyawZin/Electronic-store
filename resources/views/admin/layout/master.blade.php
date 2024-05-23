<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('admin/cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css') }}">


    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />

    <title>@yield('title')</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3">
                    <i class="bi bi-list"></i>
                </div>

                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item search-toggle-icon">
                            <a class="nav-link" href="#">
                                <div class="">
                                    <i class="bi bi-search"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="dropdown dropdown-user-setting">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center gap-3">
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/profile_image/'.Auth::user()->image) }}" class="user-img" alt="" />
                            @else
                                @if (Auth::user()->gender == 'male')
                                    <img src="{{ asset('storage/profile_image/Male_default.jpg') }}" class="user-img" alt="" />
                                @else
                                    <img src="{{ asset('storage/profile_image/Female_default.jpg') }}" class="user-img" alt="" />
                                @endif
                            @endif
                            <div class="d-none d-sm-block">
                                <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                <small class="mb-0 dropdown-user-designation">{{ Auth::user()->email }}</small>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile#detail',Auth::user()->id) }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-person-fill"></i></div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="{{ route('auth#forgot_password') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-shield-lock-fill"></i></div>
                                    <div class="ms-3"><span>Forgot Password</span></div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="{{ route('profile#update_password') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-key-fill"></i></div>
                                    <div class="ms-3"><span>Update Password</span></div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="{{ route('account#list') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-people-fill"></i></div>
                                    <div class="ms-3"><span>Account List</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-outline-danger w-75">Logout</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <h4 class="logo-text">T___O Store</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class="bi bi-list"></i></div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-basket2-fill"></i></div>
                        <div class="menu-title">eCommerce</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('product#list') }}"><i class="bi bi-circle"></i>Products List</a>
                        </li>
                        <li>
                            <a href="{{ route('category#list') }}"><i class="bi bi-circle"></i>Categories List</a>
                        </li>
                        <li>
                            <a href="ecommerce-orders.html"><i class="bi bi-circle"></i>Orders</a>
                        </li>
                        <li>
                            <a href="ecommerce-orders-detail.html"><i class="bi bi-circle"></i>Order details</a>
                        </li>
                        <li>
                            <a href="ecommerce-transactions.html"><i class="bi bi-circle"></i>Transactions</a>
                        </li>
                    </ul>
                </li>
                    <ul>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-outline-danger w-75">Logout</button>
                                </div>
                            </form>
                        </li>
                    </ul>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        @yield('content')

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">Copyright © 2023. All right reserved.</div>
        </footer>
        <!--end footer-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->
</body>

<!-- Bootstrap bundle JS -->
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/js/pace.min.js') }}"></script>
<!--app-->
<script src="{{ asset('admin/js/app.js') }}"></script>

</html>
