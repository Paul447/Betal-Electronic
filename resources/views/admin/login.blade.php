@include('admin.layouts.header')
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <div class="container p-0 mb-5 main-reg mbottom ">
        <form action="/login" method="post">
            @csrf
            <div class="card col-sm-10  offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mx-auto d-flex justify-content-center mt-5 "
                id="Cardd">
                <div class="fs-2 fw-bold text-center mt-3">
                    Login
                </div>

                <h5 class="errorView fs-6 fw-light text-center mt-3 mb-0">
                    @if (null !== Session::get('logerror'))
                        {{ Session::get('logerror') }}
                        <?php session::forget('logerror'); ?>
                    @endif
                </h5>

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
                    <input type="submit" class="btn btnn btn-lg btn-block fw-bold fs-6 mx-auto w-100" value="Login">
                </div>
            </div>
        </form>
    </div>
</body>



{{-- <!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>

    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('admin/css/login.css')}}"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style></style>
  </head>
  <body>
    <div class="container">
      <div
        class="row align-items-center rowww justify-content-center rounded px-5 ps-5 pt-2 pb-2 mb-4"
        style="margin-top: 95px"
      >
        <div
          class="col col-sm-7 col-md-12 col-lg-6 col-xl-6 text-dark rounded align-items-center text-center pt-4"
        >
          <img
            class="wave"
            class="wave"
            width="500px"
            height="500px"
            src="{{asset('admin/img/mirtyunjayaam-logo.png')}}"
          />
        </div>

        <div
          class="col col-sm-7 col-md-12 col-lg-6 col-xl-6 login-content mx-auto rounded text-center pt-4"
        >


          <form action="/login" class="mx-auto" method="post">
                      <img src="{{asset('admin/img/avatar.svg')}}">
                      <h2 class="title">Welcome</h2>

                <span class="text-danger pb-1">
                    
                <span>
                      <div class="input-div one">
                        <div class="i">
                          <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                          <h5>Username</h5>
                          @csrf
                          <input type="text" class="input" name="uname" />
                        </div>
                      </div>
                      <div class="input-div pass">
                        <div class="i">
                          <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                          <h5>Password</h5>
                          <input type="password" class="input" name="pass" />
                        </div>
                      </div>

                      <input type="submit" class="btn" value="Login " />
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript " src="{{asset('admin/js/favIcon.js')}}"></script>
  </body>
  </html> --}}
<script type="text/javascript " src="{{ asset('admin/js/login.js') }}"></script>
