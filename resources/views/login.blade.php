<script>
    document.title = "Betal International | Login"
</script>
@include('welcome')

<div class="container p-0 mb-5 main-reg mbottom">
    <form action="/customerlogin" class="rowww" method="post">
        @csrf
        <div class="card col-sm-10  offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-flex justify-content-center mt-5 "
            id="Cardd">
            <div class="fs-2 fw-bold text-center mt-3">
                Login
            </div>
            {{-- <h5 class="errorView fs-6 fw-light text-center mt-3 mb-0">Sorry Something Went Wrong!!</h5> --}}
            <div class="card-body">
                <div class="mb-2">
                    <p class="mb-1">Username</p>
                    <input type="email" class="form-control mt-0" id="hi" aria-describedby="emailHelp"
                        name="uname">
                </div>

                <div class="form--item  mb-1 d-flex flex-column position-relative">
                    <p class="mb-1">Password</p>
                    <input type="password" class="form-control" id="hello" aria-describedby="emailHelp"
                        name="pass" id="password">
                    <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <a href="{{url('customerLogin/forgot')}}" class="d-flex justify-content-end mt-1 mb-3 text-dark"
                    style="text-decoration: none;">Forgot Password?</a>

                <input type="submit" class="btn btnn btn-lg btn-block fw-bold fs-6 mx-auto w-100" value="Login">
                <p class="d-flex justify-content-center mt-3 mb-3">Or</p>
                <a href="#"
                    class="google googlebutton btn btn-light btn-lg btn-block d-flex justify-content-start align-items-center text-dark fs-6"
                    id="google">
                    <img src="{{ asset('admin/img/google.ico') }}" height="40px" width="40px" class="mx-4"
                        class="google" alt="Google logo" id="google">
                    Continue With Google
                </a>
                <p class="d-flex justify-content-center mt-3 mb-3">Don't have an Account?</p>
                <a href="{{ url('/customerAdd/create') }}"
                    class="btn btnn btn-lg btn-block fw-bold fs-6 d-flex justify-content-center mx-auto">Sign Up</a>
            </div>
        </div>
    </form>
</div>

<script type="module" src=" {{ asset('admin/js/googleauth.js') }}"></script>
@include('footermain')

