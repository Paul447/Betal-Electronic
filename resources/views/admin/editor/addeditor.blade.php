@extends('admin.index')
@section('addeditor')
    <style>
        .MainText {
            color: #440474;
        }

        /* @media(max-width : 685){
                                                      .roww{
                                                        height: auto;
                                                      }
                                                    } */
        @media(max-width : 520px) {
            .brandImage {
                width: 200px;
                height: 200px;
            }
        }
    </style>
    <div class="container ">
        <div class="row align-items-center rowww justify-content-center rounded border border-1 shadow-sm px-5 ps-5 pt-2 pb-2 mb-4"
            style="margin-top: 50px">
            <div class="col col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 text-dark rounded text-center pt-4">
                <img src="{{ asset('admin/img/mirtyunjayaam-logo.png') }}" class="brandImage" width="400px" height="400px"
                    alt="brandLogo" />
            </div>
            <div class="col col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 text-dark rounded text-center">
                <form class="" method="post" action="{{ $url }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="fw-bolder fs-2 mb-5 mt-4 MainText">
                        {{ $title }}
                    </h1>

                    <div class="input-group mt-3 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>

                        <input name="user_name" type="text" value="" class="form-control form-control-lg"
                            id="Name" placeholder="Enter Your Name" required pattern="[A-Z].[A-Z a-z]+" required
                            title="Name must be in only character, First Letter Must be in captial" />
                    </div>

                    <div class="input-group mt-3 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>

                        <input name="email" type="email" value="" class="form-control form-control-lg"
                            id="email" placeholder="Enter Your E-Mail" />
                    </div>

                    <div class="input-group mt-3 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-images"></i></span>

                        <input name="image" type="file" value="" class="form-control form-control-lg"
                            id="EditorImage"  required />
                    </div>
                    <p class="text-danger text-start">
                        <strong class="text-warning">Warning</strong> : Image size must be
                        less the 2MB
                    </p>

                    <div class="input-group mt-3 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-book"></i>
                        </span>

                        <input name="contact" type="number" value="" class="form-control form-control-lg"
                            id="editorContact" required pattern="[0-9]+" placeholder="Enter Your Contact No"
                            autocomplete="off" title="Only Numbers Are allowed" />
                    </div>

                    <div class="input-group mt-3 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                        <select name="province" class="form-select  form-select-lg" id="province"
                            onchange="fetchDistrict(this.value)" class="edit">
                            {{-- mukesh dost dekh leb --}}
                            <option value="" disabled selected>Province</option>
                            @foreach ($province as $province)
                                <option value="{{ $province->province_id }}">{{ $province->province }}</option>
                            @endforeach
                        </select>

                        <select class="form-select ms-2 form-select-lg" name="district" id="output" class="edit"
                            onchange="fetchMunicipalities(this.value)">
                            <option value="District">District</option>
                        </select>

                        <select name="municipality" class="form-select ms-2 form-select-lg" id="Municipality"
                            class="edit">
                            <option value="District" selected>Municipality</option>
                        </select>

                        <select name="ward" class="form-select ms-2  form-select-lg" id="ward" class="edit">
                            <option selected>ward</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                        </select>
                    </div>

                    {{-- <div class="input-group mt-3 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>

                        <input name="password" type="password" value="" class="form-control form-control-lg"
                            id="password" placeholder="Enter Your Password" required="true" aria-label="password"
                            aria-describedby="basic-addon1" />

                        <span class="input-group-text" id="basic-addon1" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div> --}}
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="role"
                            value="Editor"checked >Editor
                        <label class="form-check-label" for="radio2"></label>
                    </div>
                    @if(session('user')['role']=='SuperAdmin')
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="role" value="Admin"
                            >Admin
                        <label class="form-check-label" for="radio1"></label>
                    </div>

                    @endif
                    <a href="" class="btn btn-secondary btn-lg my-4 float-end mx-3" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary submit_btn btn-lg my-4 float-end" name="submit">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function fetchDistrict(province) {
            var controller = "/getDistrict/";
            var host = location.origin + controller;
            var url = location.origin + controller + province;
            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(response => {
                    let html = `<option selected disabled value="">Select</option>`;
                    for (const x of response.districts) {
                        html += `<option value="${x.district_id}">${x.district}</option>`;
                    }
                    document.getElementById('output').innerHTML = html;
                })
        }


        function fetchMunicipalities(district) {

            var controller = "/getMunicipality/";
            var host = location.origin + controller;
            var url = location.origin + controller + district;

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(response => {
                    let html = `<option selected disabled value="">Select</option>`;
                    for (const x of response.municipalitites) {
                        html += `<option value="${x.municipalities_id}">${x.municipalities}</option>`;
                    }
                    document.getElementById('Municipality').innerHTML = html;
                })
        }

        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
@endsection
