<script>
    document.title = "Betal International | Register"
</script>
@include('welcome')

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
                        <input type="text" name="user_name" class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="name" value="{{ old('user_name') }}">
                        @error('user_name')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form--item mb-2 d-flex flex-column">
                        <label for="tel" class="mb-1">Phone number</label>
                        <input type="tel" name="contact" pattern="[0-9]+" title="Only Numbers Are allowed" class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="tel" value="{{ old('contact') }}">
                        @error('contact')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form--item mb-2 d-flex flex-column position-relative">
                        <label for="password" class="mb-1">Password</label>
                        <input type="password" name="password" class="py-1 px-2 border form-control border-dark-subtle rounded-1" id="password" value="{{ old('password') }}">

                        <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form--item mb-2 d-flex flex-column position-relative">
                        <label for="con-password" class="mb-1">Confirm password</label>
                        <input type="password" name="password_confirmation" class="rounded-1 form-control border py-1 px-2 border-dark-subtle" id="password_confirmation" value="{{ old('password_confirmation') }}">

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
                        <input type="email" name="email" class="rounded-1 border form-control py-1 px-2 border-dark-subtle" value="{{ old('email') }}" id="email">
                        @error('email')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="address" class="mb-1">Address</label>

                    <div class="address--picker d-flex flex-wrap justify-content-between mb-1" id="address">

                        <select name="province" class="form-select-sm form-control px-2 py-1" id="province"
                            onchange="fetchDistrict(this.value)" class="edit">
                            <option value="" disabled selected>Province</option>
                            @foreach ($province as $province)
                            <option value="{{ $province->province_id }}">{{ $province->province }}</option>
                            @endforeach
                        </select>

                        <select name="district" id="district" class="py-1 form-control form-select-sm px-2 rounded-1" onchange="fetchMunicipalities(this.value)">
                            <option value="">District</option>
                        </select>

                        <select name="municipality" id="municipality" class="mt-2 form-control form-select-sm py-1 px-2 rounded-1">
                            <option value="">Local body</option>
                        </select>

                        <select name="ward" id="ward" class="mt-2 form-control form-select-sm py-1 px-2">
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

                    <button type="submit" class="btn--register text-white mt-3 w-100 py-2 rounded-1">Register</button>

                    <div class="signup--footer mt-2">
                        <p class="text-center">Already have an account? <a href="{{ '/customerAdd' }}">Login</a></p>
                    </div>
                </div>
        </form>
    </div>
</section>

<script>

</script>

@include('footermain')