<script>
    document.title = "Betal International | OTP Verify"
</script>
@include('welcome')
<style>
    @media (max-width: 992px) {
        .rowww {
            margin-top: 96px;
        }
    }

    @media (min-width: 992px) {
        .rowww {
            margin-top: 168px;
        }

    }

    @media (max-width: 400px) {
        .rowww {
            margin-top: 76px;
        }


    }
</style>
<section class="wrapper rowww">
    <div class="container-fluid ">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4   text-dark rounded text-center "
            style="margin-top:100px">
            <form class="rounded   bg-white shadow p-5" method="post" action="{{ '/otpverify' }}">
                @csrf
                <h3 class=" fw-bolder fs-4 mb-2 text-success">Vefify Account</h5>
                    <div class="input-group mt-5  mb-3">
                        <input name="otp" type="text" value="" class="form-control form-control-lg"
                            id="password" placeholder="Enter The OTP" required="true" aria-label="password"
                            aria-describedby="basic-addon1" />
                    </div>

                    <button type="submit" class="btn btn-primary submit_btn btn-lg my-4"
                        name="verify">Confirm</button>
            </form>
        </div>
</section>
{{-- otp not match message --}}
@if (session('otperror'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session('otperror') }}'
        })
    </script>
    @php
        session()->forget('otperror');
    @endphp
@endif
{{-- Otp sent message --}}
@if (session('otpSend'))
    <script>
        Toast.fire({
            icon: 'info',
            title: '{{ session('otpSend') }}'
        })
    </script>
    @php
        session()->forget('otpSend');
    @endphp
@endif

@include('footermain')
