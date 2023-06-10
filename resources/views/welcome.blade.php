
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('admin/bootstrap-5.2.3-dist/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/css/productCard.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/css/lightSlider.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/css/toast.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/css/uiLogin.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/css/productDetail.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/productDetail.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/productcardmain.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/foot.css')}}" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
  {{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"> --}}
  <link rel="stylesheet" href="{{asset('admin/css/sty.css')}}" />
  <script src=" {{asset('admin/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js')}}" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src=" {{asset('admin/js/lightSlider.js')}}"></script>
  
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
  <style>
    .cont {
      background: #440474;
      box-shadow: 0 5px 15px rgb(0 0 0 / 6%);
    }
    @media (max-width: 1470px) {
      .brandIcon {
        font-size: 19px;
      }
    }
    .dropdown-submenu {
      position: relative;
    }
    ul.dropp {
      /* background-color: #f1f1f1; */
      /* background: #0d1137; */
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      color: black;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    a.menuu:hover {
      background-color: #ddd;
      color: #0A58CA;
    }
    /* .dropdown:hover .dropp {background-color: #440474;} */
    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
    .navbar-nav li:hover>ul.dropdown-menu {
      display: block;
    }
    @media (max-width: 400px) {
      .BrandText {
        padding-left: 0%;
        font-size: 14px;
      }
      .BrandImage {
        height: 50px;
        width: 50px;
      }
    }
    .dropbtn {
      background-color: #440474;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .dropdown:hover .dropbtn {
      background-color: #440474;
    }
    .colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}
.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #f8bb86 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

  </style>
</head>

<body>
  @include('sweetalert::alert')
  <nav class="navbar cont fixed-top w-100 navbar-expand-lg navbar-dark">
    <div class="container-fluid text-white">
      <a class="navbar-brand brandIcon d-lg-none" href="" id="BrandName">
        <img src="{{ asset('admin/img/mirtyunjayaam-logo.png')}}" class="rounded BrandImage" width="70" height="70"
          alt="BrandImage" />&nbsp;
        <span class="text-white BrandText">Mirtyunjyaam Enterprises</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse p-2 flex-column" id="mynavbar">
        <div
          class="d-flex justify-content-center align-items-center justify-content-lg-between flex-column flex-lg-row w-100">
          <form action="{{ route('products.search') }}" class="d-flex">
            <input class="form-control me-1" type="search" name="search" placeholder="Search" id="Search" aria-label="Search" />
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form> 
         
          <a class="navbar-brand brandIcon d-block d-none mx-auto d-lg-block" href="" id="BrandName">
            <img src="{{ asset('admin/img/mirtyunjayaam-logo.png') }}" class="rounded BrandImage" width="70" height="70"
              alt="BrandImage" />&nbsp;
            <span class="text-white BrandText">Mirtyunjyaam Enterprises</span>
          </a>
          <ul class="navbar-nav navlinkss ">
            @if (is_null(session('customer')))


            <div class="dropdown">
              <button class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<span
                  class>Account</span></button>
              <div class="dropdown-content">
                <a href="{{'/customerAdd/create/'}}">Sign Up</a>
                <a href="{{'/customerAdd/'}}">Log In</a>
              </div>
            </div>
            @endif
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link mx-2 text-white" href="/CartView/">
               
<lord-icon
    src="https://cdn.lordicon.com/medpcfcy.json"
    trigger="boomerang"
    colors="primary:#ffffff"
    style="width:30px;height:30px;">
</lord-icon>
                {{-- &nbsp;<span class>My Cart</span> --}}
              </a>
            </li>
          </ul>
          <li class="nav-item navbar-dropdown dropdown-user dropdown px-3">

<!-- toggeler -->

@if (!is_null(session('customer')))
@php
//    dd(Session::get('customer'));
@endphp


<a role="button" class="nav-link  hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
  <div class="avatar avatar-online">
    <img src="{{ asset('/storage/editor/'.Session::get('customer')['image'])}}" height="30px" alt class=" rounded-circle" />My Profile
  </div>
</a>


<!-- main -->
<ul class="dropdown-menu dropdown-menu-end">
  <li>
    <a class="dropdown-item" href="#">
      <div class="d-flex">
        <div class="flex-shrink-0 me-3">
          <div class="avatar avatar-online">
            <img src="{{ asset('/storage/editor/'.Session::get('customer')['image']) }}" height="50px" alt class="w-px-40 rounded-circle" />My Profile
          </div>
        </div>
        <div class="flex-grow-1">
          {{-- <span class="fw-semibold d-block">{{ Session::get('user')['user_name'] }}</span> --}}
          {{-- <small class="text-muted">{{ Session::get('user')['role'] }}</small> --}}
        </div>
      </div>
    </a>
  </li>

  <li>
    <div class="dropdown-divider"></div>
  </li>

  <li>
    <a class="dropdown-item" href="{{'/viewprofile'}}">
      <i class="bx bx-user me-2"></i>
      <span class="align-middle">My Profile</span>
    </a>
  </li>

  <li>
    <div class="dropdown-divider"></div>
  </li>

  <li>
    <a class="dropdown-item" href="{{'/myorder'}}">
      <i class="bx bx-user me-2"></i>
      <span class="align-middle">My Orders</span>
    </a>
  </li>

  <li>
    <div class="dropdown-divider"></div>
  </li>

  <li>
    <a class="dropdown-item" href="/customerlogout/{{Session::get('customer')['id'] }}">
      <i class="bx bx-power-off me-2"></i>
      <span class="align-middle">Log Out</span>
    </a>
  </li>

</ul>
</li>
@endif
        </div>

        <div class="d-block w-100">
          <ul class="navbar-nav d-flex justify-content-center align-items-center pt-3 navlinkss">
            <li class="nav-item d-flex mx-2">
              <a class="nav-link" href="{{'/'}}">
                <span>Home</span>
              </a>
            </li>
            
            {{-- <li class="nav-item d-flex mx-2">
              <a class="nav-link" href="javascript:void(0)">Link</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">Link</a>
            </li>
            <li class="nav-item dropdown dropend">
              <a href="#" id="menu" data-bs-toggle="dropdown" class="nav-link dropdown-toggle"
                data-bs-display="static">Dropdown</a>
              <ul class="dropdown-menu dropp ">
                <li class="dropdown-submenu">
                  <a href="#" data-bs-toggle="dropdown" class="dropdown-item dropdown-toggle menuu ">Submenu 1</a>
                  <ul class="dropdown-menu dropp">
                    <li>
                      <a href="#" class="dropdown-item  menuu">Item 1</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <script>
        const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  iconColor: 'white',
  showConfirmButton: false,
  customClass: {
    popup: 'colored-toast'
  },
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
function fetcchCart(cartvalue) {
                var controller = "/CartVieww/";
                var host = location.origin + controller;
                var url = location.origin + controller + cartvalue;
                fetch(url, {
                        method: 'GET',
                        headers: {
                          'Accept': 'application/json',
                        },
                    })
                    .then(response => response.json())
                .then(response => {
                  let html = response.status; 
                    Toast.fire({
                    icon: 'success',
                    title: html,
                    }) 
                Toast.fire({
                  icon: 'success',
                  title: html,
                })
                }) 
}

  </script>
