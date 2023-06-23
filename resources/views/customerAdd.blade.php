@include('welcome')

<style>
    @media(max-width : 520px) {
        .brandImage {
            width: 200px;
            height: 200px;
        }
    }



    :root {
        --red: #A50318;
        --light-red: #aa4f5b9c;
    }

    .signup--container {
        outline: 2px solid var(--red);
        margin: 48px auto;
        max-width: 800px;
        padding: 10px 30px;
    }

    .address--picker select {
        width: 48.86%;
    }

    .btn--register {
        background-color: var(--red);
        font-weight: bold;
        border: none;
    }

    .btn--register:focus,
    .btn--register:hover {
        outline: 3px solid var(--light-red);
    }

    /* while using text (login) */
    .signup--footer a {
        color: #A50318;
    }

    /* while using button (login) */
    .btn--login {
        background-color: #A50318;
        border: none;
    }

    .error--text {
        color: var(--red);
        display: none;
    }

    input[type="password"] {
        padding-right: 30px !important;
    }

    .btn--toggle-password {
        width: 30px;
        position: absolute;
        right: 0;
        top: 50%;
    }

    @media (max-width: 375px) {
        .signup--container {
            width: calc(100% - 40px);
            margin: 0 20px;
            padding: 10px 20px;
        }
    }

    @media (max-width: 810px) {

        .signup--container {

            margin: 48px 20px !important;
        }
    }
</style>

<section class="signup--container rounded-1 main-reg ">
    <div class="signup--header">
        <h2 class="text-center fw-bold mt-2">Registration</h2>
    </div>
    <p class="error--text text-center mb-2">something went wrong!!</p>

    <div class="signup--form mt-4">

        <form method="post" action="{{ '/customerAdd/' }}" enctype="multipart/form-data">
            @csrf
       
           
            <div class="row">

                <div class="col col-12 col-md-6">

                    <div class="form--item mb-2 d-flex flex-column">
                        <label for="name" class="mb-1">Name</label>
                        <input type="text" name="user_name"
                            class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="name" value="{{ old('user_name') }}">
                            @error('user_name')
                            <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form--item mb-2 d-flex flex-column">
                        <label for="tel" class="mb-1">Phone number</label>
                        <input type="tel" name="contact" pattern="[0-9]+" title="Only Numbers Are allowed"
                            class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="tel" value="{{old('contact')}}">
                            @error('contact')
                            <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form--item mb-2 d-flex flex-column position-relative">
                        <label for="password" class="mb-1">Password</label>
                        <input type="password" name="password"
                            class="py-1 px-2 border form-control border-dark-subtle rounded-1" id="password" value="{{old('password')}}">
                          
                        <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                    <div class="form--item mb-2 d-flex flex-column position-relative">
                        <label for="con-password" class="mb-1">Confirm password</label>
                        <input type="password" name="password_confirmation"
                            class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="password_confirmation" value="{{old('password_confirmation')}}">
                        
                        <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('con-password')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col col-12 col-md-6">
                    <div class="form--item mb-2 d-flex flex-column">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" name="email"
                            class="rounded-1 border form-control py-1 px-2 border-dark-subtle" value="{{old('email')}}"id="email">
                            @error('email')
                            <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="address" class="mb-1">Address</label>

                    <div class="address--picker d-flex flex-wrap justify-content-between mb-1" id="address">

                        <select name="province" class="form-select form-control form-select-lg" id="province"
                            onchange="fetchDistrict(this.value)" class="edit">
                            <option value="" disabled selected>Province</option>
                            @foreach ($province as $province)
                                <option value="{{ $province->province_id }}">{{ $province->province }}</option>
                            @endforeach
                        </select>

                        <select name="district" id="district" class="py-1 form-control form-select px-2 rounded-1"
                            onchange="fetchMunicipalities(this.value)">
                            <option value="">District</option>
                        </select>

                        <select name="municipality" id="municipality"
                            class="mt-2 form-control form-select py-1 px-2 rounded-1">
                            <option value="">Local body</option>
                        </select>

                        <select name="ward" id="ward" class="mt-2 form-control form-select py-1 px-2">
                            <option value="">Ward</option>
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

                    <button type="submit"
                        class="btn--register text-white mt-3 w-100 py-2 rounded-1">Register</button>

                    <div class="signup--footer mt-2">
                        <!-- while using text (login) -->
                        <p class="text-center">Already have an account? <a href="{{ '/customerAdd' }}">Login</a></p>

                        <!-- while using button (login) -->
                        <!-- <p class="text-center mt-3">Already have an account?</p>
                                                                            <button type="button" class="btn--login d-block text-white rounded-1 fw-bold py-1 mx-auto w-50">Login</button> -->

                    </div>
                </div>
        </form>
    </div>
    </div>
</section>

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
                document.getElementById('district').innerHTML = html;
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
                document.getElementById('municipality').innerHTML = html;
            })
    }

    const togglePassword = document.querySelectorAll('.btn--toggle-password');

    togglePassword.forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
            } else {
                input.type = 'password';
                btn.innerHTML = `<i class="fa-solid fa-eye"></i>`;
            }
        })
    })
</script>

@include('footermain')
