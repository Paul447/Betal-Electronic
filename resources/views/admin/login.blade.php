@include('admin.layouts.header')
<!DOCTYPE html>
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
            @if(null !== Session::get('logerror')) {{Session::get('logerror')}}
            <?php session::forget('logerror'); ?>
            @endif
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
	<script type="text/javascript " src="{{asset('admin/js/main.js')}}"></script>
	<script type="text/javascript " src="{{asset('admin/js/favIcon.js')}}"></script>
</body>
</html>
