@include('welcome')
<style>
   @media (max-width: 992px) {
       .rowww{
        margin-top: 150px;
      }
    }
    @media (min-width: 992px) {
      .rowww{
        margin-top: 210px;
      }

    }
    @media (max-width: 400px) {
      .rowww{
        margin-top: 78px;
      }
    }
   
    
</style>
<div class="container rowww">
    <div class="row align-items-center rowww justify-content-center border border-2 rounded px-5 ps-5 pt-2 pb-2 mb-4"
      style="margin-top: 95px">
      <div class="col col-sm-7 col-md-12 col-lg-6 col-xl-6 text-dark rounded align-items-center text-center pt-2">
        <img class="wave" class="wave" width="500px" height="500px" src="{{ asset('admin/img/mirtyunjayaam-logo.png') }}" />
      </div>

      <div class="col col-sm-7 col-md-12 col-lg-6 col-xl-6 login-content mx-auto rounded text-center pt-4">
        <form action="/customerlogin" class="mx-auto fomm" method="post">
            @csrf
          <img src="{{ asset('admin/img/avatar.svg') }}" />
          <h2 class="title">Welcome</h2>

          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Username</h5>

              <input type="text" class="input" name="uname" />
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <input type="password" class="input" name="pass" id="password"/>

            </div>

          </div>
          <div class="form-check d-flex  mt-2 d-flex justify-content-center">
            <input class="form-check-input" type="checkbox" value="" id="showPassword" >
            <label class="form-check-label" for="flexCheckDefault">
             Show Password
            </label>
          </div>
          <div class="form-check d-flex  mt-2 d-flex justify-content-center">
          <img class="google" src="{{asset('/storage/png-clipart-google-logo-google-logo-google-search-icon-google-text-logo.png')}}"  height="60px" width="60px" style="object-fit:contain;" alt="" id="google">
          </div>

          <input type="submit" class="btnn" name="logIN" value="Login " /><br />

        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript " src="{{asset('admin/js/main.js')}}"></script>
	<script type="text/javascript " src="{{asset('admin/js/favIcon.js')}}"></script>
  <script>
    // function myFunction() {
    //   var x = document.getElementById("myInput");
    //   if (x.type === "password") {
    //     x.type == "text";
    //   } else {
    //     x.type = "password";
    //   }
    // }
    const passwordInput = document.getElementById('password');
const showPasswordCheckbox = document.getElementById('showPassword');

showPasswordCheckbox.addEventListener('change', function() {
  if (this.checked) {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
  }
});
  </script>
  {{-- Login Credentail not match message --}}
  
  @if (session('logerror'))
  <script>
  Toast.fire({
  icon: 'error',
  title: '{{session('logerror')}}'
  })
  </script>
  @php
  session()->forget('logerror');
  @endphp
  @endif
  @include('footermain')
  <script type ="module" src=" {{asset('admin/js/googleauth.js')}}"></script>
