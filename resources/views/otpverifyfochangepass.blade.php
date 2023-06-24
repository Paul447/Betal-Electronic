@include('welcome')
<div class="container p-0 mb-5 main-reg mbottom">
    <form action="{{ url('/customerLogin/verify') }}" class="rowww" method="post">
        @csrf
        <div class="card col-sm-10  offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-flex justify-content-center mt-5 "
            id="Cardd">
            <div class="fs-2 fw-bold text-center mt-3">
                OTP verify
            </div>
            <div class="card-body px-4">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <div class="mb-2">
                    <p class="mb-1">OTP</p>
                    <input type="number" class="form-control mt-0" id="otp" aria-describedby="emailHelp"
                        name="otp">
                </div>
                <input type="submit" class="btn btnn btn-lg btn-block fw-bold fs-6 mx-auto w-100 mb-3 mt-4 "
                    value="Verify">

                @if (isset($retry))
                    <span>remaining retry <b>{{ $retry }}</b></span>
                @endif
            </div>
        </div>
    </form>
</div>
@include('footermain')
