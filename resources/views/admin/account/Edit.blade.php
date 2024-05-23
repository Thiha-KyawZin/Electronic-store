@extends('admin.layout.master')

@section('title', 'Pofile_Edit')

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
            <div class="col-12 col-lg-8 ">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="mb-0">My Account</h5>
                        <hr>
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">User Information</h6>
                            </div>
                            <div class="card-body">
                                <form class="row g-3" method="POST" action="{{ route('profile#update',Auth::user()->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-6">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Email address</label>
                                        <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="inputtown_ship" class="form-label">Choose Gender</label>
                                                <div class="d-flex mt-2">
                                                    <div class="form-check">
                                                        <input type="radio" name="gender" id="male" class="form-check-input"
                                                            value="male" {{ Auth::user()->gender == 'male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input type="radio" name="gender" id="female" class="form-check-input"
                                                            value="female" @checked(Auth::user()->gender == 'female')>
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control ">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Street</label>
                                        <input type="text" name="street" class="form-control  @error('street') is-invalid @enderror" value="{{ Auth::user()->street }}">
                                        @error('street')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-3">
                                        <label for="inputhouse_no." class="form-label">House No.</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                <i class="bi bi-house-fill"></i>
                                            </div>
                                            <input type="text"
                                                class="form-control radius-30 ps-5 @error('house_no') is-invalid @enderror"
                                                name="house_no" id="inputhouse_no." placeholder="House No."
                                                value="{{ Auth::user()->house_no }}">
                                        </div>
                                        @error('house_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-5">
                                        <label for="inputtown_ship" class="form-label">Choose Township</label>
                                        <div class="ms-auto position-relative">
                                            <select name="township" class="form-select" id="sel2">
                                                <option data-option="Yangon" value="Ahlon" {{ Auth::user()->township == 'Ahlon' ? 'selected' : '' }} >Ahlon</option>
                                                <option data-option="Yangon" value="Bahan" {{ Auth::user()->township == 'Bahan' ? 'selected' : '' }}>Bahan</option>
                                                <option data-option="Yangon" value="Botataung" {{ Auth::user()->township == 'Botataung' ? 'selected' : '' }}>Botataung</option>
                                                <option data-option="Yangon" value="Dagon Seikkan" {{ Auth::user()->township == 'Dagon Seikkan' ? 'selected' : '' }}>Dagon Seikkan</option>
                                                <option data-option="Yangon" value="Dagon" {{ Auth::user()->township == 'Dagon' ? 'selected' : '' }}>Dagon</option>
                                                <option data-option="Yangon" value="East Dagon" {{ Auth::user()->township == 'East Dagon' ? 'selected' : '' }}>East Dagon</option>
                                                <option data-option="Yangon" value="Hlaing" {{ Auth::user()->township == 'Hlaing' ? 'selected' : '' }}>Hlaing</option>
                                                <option data-option="Yangon" value="Hlaingthaya" {{ Auth::user()->township == 'Hlaingthaya' ? 'selected' : '' }}>Hlaingthaya</option>
                                                <option data-option="Yangon" value="Insein" {{ Auth::user()->township == 'Insein' ? 'selected' : '' }}>Insein</option>
                                                <option data-option="Yangon" value="Kamayut" {{ Auth::user()->township == 'Kamayut' ? 'selected' : '' }}>Kamayut</option>
                                                <option data-option="Yangon" value="Kyauktada" {{ Auth::user()->township == 'Kyauktada' ? 'selected' : '' }}>Kyauktada</option>
                                                <option data-option="Yangon" value="Kyimyindaing" {{ Auth::user()->township == 'Kyimyindaing' ? 'selected' : '' }}>Kyimyindaing</option>
                                                <option data-option="Yangon" value="Lanmadaw" {{ Auth::user()->township == 'Lanmadaw' ? 'selected' : '' }}>Lanmadaw</option>
                                                <option data-option="Yangon" value="Latha" {{ Auth::user()->township == 'Latha' ? 'selected' : '' }}>Latha</option>
                                                <option data-option="Yangon" value="Mayangon" {{ Auth::user()->township == 'Mayangon' ? 'selected' : '' }}>Mayangon</option>
                                                <option data-option="Yangon" value="Mingaladon" {{ Auth::user()->township == 'Mingaladon' ? 'selected' : '' }}>Mingaladon</option>
                                                <option data-option="Yangon" value="North Dagon" {{ Auth::user()->township == 'North Dagon' ? 'selected' : '' }}>North Dagon</option>
                                                <option data-option="Yangon" value="North Okkalapa" {{ Auth::user()->township == 'North Okkalapa' ? 'selected' : '' }}>North Okkalapa</option>
                                                <option data-option="Yangon" value="Pabedan" {{ Auth::user()->township == 'Pabedan' ? 'selected' : '' }}>Pabedan</option>
                                                <option data-option="Yangon" value="Pazundaung" {{ Auth::user()->township == 'Pazundaung' ? 'selected' : '' }}>Pazundaung</option>
                                                <option data-option="Yangon" value="Sanchaung" {{ Auth::user()->township == 'Sanchaung' ? 'selected' : '' }}>Sanchaung</option>
                                                <option data-option="Yangon" value="Shwepyitha" {{ Auth::user()->township == 'Shwepyitha' ? 'selected' : '' }}>Shwepyitha</option>
                                                <option data-option="Yangon" value="South Dagon" {{ Auth::user()->township == 'South Dagon' ? 'selected' : '' }}>South Dagon</option>
                                                <option data-option="Yangon" value="South Okkalapa" {{ Auth::user()->township == 'South Okkalapa' ? 'selected' : '' }}>South Okkalapa</option>
                                                <option data-option="Yangon" value="Tamwe" {{ Auth::user()->township == 'Tamwe' ? 'selected' : '' }}>Tamwe</option>
                                                <option data-option="Yangon" value="Thaketa" {{ Auth::user()->township == 'Thaketa' ? 'selected' : '' }}>Thaketa</option>
                                                <option data-option="Yangon" value="Thingangyun" {{ Auth::user()->township == 'Thingangyun' ? 'selected' : '' }}>Thingangyun</option>
                                                <option data-option="Yangon" value="Yankin" {{ Auth::user()->township == 'Yankin' ? 'selected' : '' }}>Yankin</option>
                                                <option data-option="Mandalay" value="Aungmyethazan" {{ Auth::user()->township == 'Aungmyethazan' ? 'selected' : '' }}>Aungmyethazan</option>
                                                <option data-option="Mandalay" value="Chanayethazan" {{ Auth::user()->township == 'Chanayethazan' ? 'selected' : '' }}>Chanayethazan</option>
                                                <option data-option="Mandalay" value="Chanmyathaz" {{ Auth::user()->township == 'Chanmyathaz' ? 'selected' : '' }}>Chanmyathaz</option>
                                                <option data-option="Mandalay" value="Patheingyi" {{ Auth::user()->township == 'Patheingyi' ? 'selected' : '' }}>Patheingyi</option>
                                                <option data-option="Mandalay" value="Nyaung-U" {{ Auth::user()->township == 'Nyaung-U' ? 'selected' : '' }}>Nyaung-U</option>
                                                <option data-option="Mandalay" value="Pyinoolwin" {{ Auth::user()->township == 'Pyinoolwin' ? 'selected' : '' }}>Pyinoolwin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="inputtown_ship" class="form-label">Choose City</label>
                                        <div class="ms-auto position-relative">
                                            <select name="city" class="form-select" id="sel1" onchange="giveSelection(this.value)">
                                                <option value="Yangon" {{ Auth::user()->city == 'Yangon' ? 'selected' : '' }}>Yangon</option>
                                                <option value="Mandalay" {{ Auth::user()->city == 'Mandalay' ? 'selected' : '' }}>Mandalay</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="" href="{{ route('profile#detail',Auth::user()->id) }}">
                                            <button type="button" class="btn btn-outline-primary px-4">Back</button>
                                        </a>
                                        <div class="">
                                            <button type="submit" class="btn btn-outline-primary px-4">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </main>
    <!--end page main-->

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
