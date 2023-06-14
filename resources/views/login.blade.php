@include('welcome')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
      

        :root {
            --red: #A50318;
            --light-red: #aa4f5b9c;
        }

        #Cardd {
            width: 375px;
            min-width: 350px;
            border-radius: 5px !important;
            border-color: #a50318;
            border-width: 2px;
            padding: 0;
            margin: 0;
            /* margin-bottom: 20px; */
        }

        .errorView {
            color: #a50318;
        }

        .btnn {
            background-color: #a50318;
            color: #ffffff;
        }

        .btnn:focus,
        .btnn:hover {
            /* opacity: 0.9; */
            background-color: #a50318;
            color: #ffffff;
            outline: 3px solid var(--light-red) !important;
            /* outline-color: #a50318; */
            /* outline-style: outset; */
        }

        .googlebutton {
            background-color: aliceblue;
            text-decoration: none;
            height: 45px;
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

        .googlebutton:hover {
            background-color: #fff;
            outline-color: #ffff;
            outline-style: outset;
        }


    </style>
</head>

<body>
    <div class="container p-0 mb-5 main-reg mbottom">
        <form action="/customerlogin" class="rowww" method="post">
            @csrf
            <div class="card col-sm-10  offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-flex justify-content-center mt-5 " id="Cardd">
                <div class="fs-2 fw-bold text-center mt-3">
                    Login
                </div>
                <h5 class="errorView fs-6 fw-light text-center mt-3 mb-0">Sorry Something Went Wrong!!</h5>
                <div class="card-body">
                    <div class="mb-2">
                        <p class="mb-1">Username</p>
                        <input type="email" class="form-control mt-0" id="hi" aria-describedby="emailHelp" name="uname">
                    </div>

                    <div class="form--item  mb-1 d-flex flex-column position-relative">
                        <p class="mb-1">Password</p>
                        <input type="password" class="form-control" id="hello" aria-describedby="emailHelp" name="pass" id="password">
                        <button type="button" class="btn--toggle-password bg-transparent border-0 text-center">
                          <i class="fa-solid fa-eye"></i>
                      </button>
                    </div>

                    <a href="" class="d-flex justify-content-end mt-1 mb-3 text-dark" style="text-decoration: none;">Forgot Password?</a>

                    <input type="submit" class="btn btnn btn-lg btn-block fw-bold fs-6 mx-auto w-100" value="Login">
                    <p class="d-flex justify-content-center mt-3 mb-3">Or</p>
                    <a href="#" class="google googlebutton btn btn-light btn-lg btn-block d-flex justify-content-start align-items-center text-dark fs-6" id="google">
                        <img src="{{ asset('admin/img/google.ico') }}" height="40px" width="40px" class="mx-4" class="google" alt="Google logo" id="google">
                        Continue With Google
                    </a>
                    <p class="d-flex justify-content-center mt-3 mb-3">Don't have an Account?</p>
                    <a href="#" class="btn btnn btn-lg btn-block fw-bold fs-6 d-flex justify-content-center mx-auto">Sign Up</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script>
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
