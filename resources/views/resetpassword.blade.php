@include('welcome')


<div class="container p-0 mb-5 main-reg mbottom">
    <form action="{{url('/customerLogin/otpverifypass')}}" class="rowww" method="post">
        @csrf
        <div class="card col-sm-10  offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-flex justify-content-center mt-5 "
            id="Cardd">
            <div class="fs-2 fw-bold text-center mt-3">
                Forgot Password?
            </div>
            <div class="card-body px-4">
                <div class="mb-2">
                    <p class="mb-1">Email</p>
                    <input type="email" class="form-control mt-0" id="hi" aria-describedby="emailHelp"
                        name="uname">
                </div>
                <input type="submit" class="btn btnn btn-lg btn-block fw-bold fs-6 mx-auto w-100 mb-3 mt-4 "
                    value="Send code to mail">
                <a href=""
                    class="btn btnn btn-lg btn-block fw-bold fs-6 d-flex justify-content-center mx-auto "><i class="fa-sharp fa-solid fa-arrow-left me-3 pt-1"></i>Back to
                    Login</a>
                <p class="text-center mt-3 mb-2">Don't have an Account?<a href="{{ '/customerAdd/create' }}">SignUp</a></p>
            </div>
        </div>
    </form>
</div>


@include('footermain')

