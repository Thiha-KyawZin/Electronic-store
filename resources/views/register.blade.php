@extends('master')

@section('title', 'Register Page')

@section('content')
    <div class="container-fluid">
        <div class="authentication-card h-100">
            <div class="card shadow rounded-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                        <img src="{{ asset('admin/images/error/login-img.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title">Register</h5>
                            <form class="form-body" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12 ">
                                        <label for="inputName" class="form-label">Name</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-person-circle"></i></div>
                                            <input type="text"
                                                class="form-control radius-30 ps-5 @error('name') is-invalid @enderror"
                                                id="inputName" name="name" placeholder="Enter Name"
                                                value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-envelope-fill"></i></div>
                                            <input type="email"
                                                class="form-control radius-30 ps-5 @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" name="email" placeholder="Email Address"
                                                value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-lock-fill"></i></div>
                                            <input type="password"
                                                class="form-control radius-30 ps-5 @error('password') is-invalid @enderror"
                                                name="password" id="inputChoosePassword" placeholder="Enter Password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Confirm Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-lock-fill"></i></div>
                                            <input type="password"
                                                class="form-control radius-30 ps-5 @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="inputChoosePassword"
                                                placeholder="Enter Password">
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputimage" class="form-label">Image</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-image-fill"></i></div>
                                            <input type="file" class="form-control radius-30 ps-5" id="inputimage"
                                                name="profile_image">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputphone" class="form-label">Phone</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-telephone-fill"></i></div>
                                            <input type="text"
                                                class="form-control radius-30 ps-5 @error('phone') is-invalid @enderror"
                                                id="inputphone" name="phone" placeholder="09xxxxxxx"
                                                value="{{ old('phone') }}">
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex">
                                        <div class="col-6">
                                            <label for="inputtown_ship" class="form-label">Choose Township</label>
                                            <div class="ms-auto position-relative">
                                                <select name="township" class="form-select" id="sel2"
                                                    value="{{ old('township') }}">
                                                    <option data-option="Yangon" value="Ahlon" selected>Ahlon</option>
                                                    <option data-option="Yangon" value="Bahan">Bahan</option>
                                                    <option data-option="Yangon" value="Botataung">Botataung</option>
                                                    <option data-option="Yangon" value="Dagon Seikkan">Dagon Seikkan
                                                    </option>
                                                    <option data-option="Yangon" value="Dagon">Dagon</option>
                                                    <option data-option="Yangon" value="East Dagon">East Dagon</option>
                                                    <option data-option="Yangon" value="Hlaing">Hlaing</option>
                                                    <option data-option="Yangon" value="Hlaingthaya">Hlaingthaya</option>
                                                    <option data-option="Yangon" value="Insein">Insein</option>
                                                    <option data-option="Yangon" value="Kamayut">Kamayut</option>
                                                    <option data-option="Yangon" value="Kyauktada">Kyauktada</option>
                                                    <option data-option="Yangon" value="Kyimyindaing">Kyimyindaing</option>
                                                    <option data-option="Yangon" value="Lanmadaw">Lanmadaw</option>
                                                    <option data-option="Yangon" value="Latha">Latha</option>
                                                    <option data-option="Yangon" value="Mayangon">Mayangon</option>
                                                    <option data-option="Yangon" value="Mingaladon">Mingaladon</option>
                                                    <option data-option="Yangon" value="North Dagon">North Dagon</option>
                                                    <option data-option="Yangon" value="North Okkalapa">North Okkalapa
                                                    </option>
                                                    <option data-option="Yangon" value="Pabedan">Pabedan</option>
                                                    <option data-option="Yangon" value="Pazundaung">Pazundaung</option>
                                                    <option data-option="Yangon" value="Sanchaung">Sanchaung</option>
                                                    <option data-option="Yangon" value="Shwepyitha">Shwepyitha</option>
                                                    <option data-option="Yangon" value="South Dagon">South Dagon</option>
                                                    <option data-option="Yangon" value="South Okkalapa">South Okkalapa
                                                    </option>
                                                    <option data-option="Yangon" value="Tamwe">Tamwe</option>
                                                    <option data-option="Yangon" value="Thaketa">Thaketa</option>
                                                    <option data-option="Yangon" value="Thingangyun">Thingangyun</option>
                                                    <option data-option="Yangon" value="Yankin">Yankin</option>
                                                    <option data-option="Mandalay" value="Aungmyethazan">Aungmyethazan</option>
                                                    <option data-option="Mandalay" value="Chanayethazan">Chanayethazan</option>
                                                    <option data-option="Mandalay" value="Chanmyathaz">Chanmyathaz</option>
                                                    <option data-option="Mandalay" value="Patheingyi">Patheingyi</option>
                                                    <option data-option="Mandalay" value="Nyaung-U">Nyaung-U</option>
                                                    <option data-option="Mandalay" value="Pyin Oo lwin">Pyin Oo lwin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5 offset-1">
                                            <label for="inputtown_ship" class="form-label">Choose City/State</label>
                                            <div class="ms-auto position-relative">
                                                <select name="city" class="form-select" id="sel1"
                                                    onchange="giveSelection(this.value)">
                                                    <option value="Yangon" selected>Yangon</option>
                                                    <option value="Mandalay">Mandalay</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <div class="col-5">
                                            <label for="inputtown_ship" class="form-label">Choose Gender</label>
                                            <div class="d-flex mt-2">
                                                <div class="form-check">
                                                    <input type="radio" name="gender" id="male"
                                                        class="form-check-input" value="male" checked>
                                                    <label class="form-check-label" for="male">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check ms-3">
                                                    <input type="radio" name="gender" id="female"
                                                        class="form-check-input" value="female">
                                                    <label class="form-check-label" for="female">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 offset-2">
                                            <label for="inputhouse_no." class="form-label">House No.</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-house-fill"></i>
                                                </div>
                                                <input type="text"
                                                    class="form-control radius-30 ps-5 @error('house_no') is-invalid @enderror"
                                                    name="house_no" id="inputhouse_no." placeholder="House No."
                                                    value="{{ old('house_no') }}">
                                            </div>
                                            @error('house_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputstreet" class="form-label">Street</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-geo-alt-fill"></i></div>
                                            <input type="text"
                                                class="form-control radius-30 ps-5 @error('street') is-invalid @enderror"
                                                id="inputName" name="street" placeholder="Enter Street"
                                                value="{{ old('street') }}">
                                        </div>
                                        @error('street')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">I Agree to the
                                                Trems & Conditions</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary radius-30">Sign in</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-0">Already have an account? <a
                                                href="{{ route('auth#login') }}">Login
                                                here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var sel1 = document.querySelector("#sel1");
        var sel2 = document.querySelector("#sel2");
        var options2 = sel2.querySelectorAll("option");

        function giveSelection(selValue) {
            sel2.innerHTML = "";
            for (var i = 0; i < options2.length; i++) {
                if (options2[i].dataset.option === selValue) {
                    sel2.appendChild(options2[i]);
                }
            }
        }
        giveSelection(sel1.value);
    </script>
@endsection
