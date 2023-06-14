
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
  {{-- <link rel="stylesheet" href="{{asset('admin/css/uiLogin.css')}}" /> --}}
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
      
     .feture{
      border-bottom: 3px solid #a50318 ;
      width: fit-content;
      padding-bottom: 10px;
      margin-bottom: 50px;
     }

* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

       ul {
          margin-bottom: 0 !important;
        }

        .navitemsss{
            color: var(--black) !important;
            text-decoration: none !important;
        }

        /* temporary code above */

        :root {
            --red: #A50318;
            --light-red: #aa4f5b9c;
            --black: #0c0c0c;
            --white: #ffffff;
        }

        .btn--search {
            top: 0;
            right: 10px;
            height: 100%;
        }

        header .logo {
            width: 100px;
        }

        /* remove default margin from bootstrap */
        ul {
            margin-bottom: 0;
            padding-left: 0;
        }

        header {
            padding: 0 40px;
            background-color: var(--white);
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            height: 80px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }

        header nav ul li,
        .account--dropdown-container a {
            border-bottom: 2px solid transparent;
        }

        header .middle ul li:hover,
        .account--dropdown-container a:hover {
            border-bottom: 2px solid var(--red);
        }

        #search {
            width: 200px;
            padding-right: 30px !important;
        }

        #search:focus,
        #search:active {
            outline: 1px solid black;
        }

        /* ======= mobile menu ======= */
        .mobile--menu {
            width: 28px;
            height: 20px;
            display: none;
        }

        .bar {
            height: 3px;
            background-color: var(--black);
            margin-bottom: 4px;
            transition: 0.3s;
        }

        .mobile--menu.active .bar1 {
            transform: rotate(-45deg) translate(-4px, 6px);
        }

        .mobile--menu.active .bar2 {
            opacity: 0;
        }

        .mobile--menu.active .bar3 {
            transform: rotate(45deg) translate(-4px, -6px);
        }

        /* account dropdown menu */

        .account--icon {
            position: relative;
            cursor: pointer;
        }

        .account--dropdown {
            position: absolute;
            display: none;
        }

        .account:hover .account--dropdown {
            display: block;
        }

        .account--dropdown-container {
            margin-top: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            background-color: var(--white);
            padding: 10px 20px;
        }

        .account--dropdown a {
            display: block !important;
            margin: 10px 0;
        }

        /* mobile menu */
        @media (max-width: 860px) {
            .middle {
                position: fixed;
                right: -100%;
                width: 95%;
                top: 90px;
                max-width: 250px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
                background-color: var(--white);
                overflow: hidden;
                transition: 0.3s ease-out;
            }

            .middle.active {
                right: 40px;
            }

            .middle ul {
                display: block !important;
                padding: 10px 20px;
            }

            .middle ul li {
                margin: 10px 0 !important;
            }

            .middle ul li:hover,
            .account--dropdown-container a {
                border-bottom: 2px solid transparent !important;
            }

            .mobile--menu {
                display: block;
            }
        }

        @media (max-width: 600px) {
            .right {
                position: fixed;
                right: -100%;
                width: 95%;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
                background: white;
                max-width: 250px;
                transition: 0.3s ease-out;
            }

            .right ul {
                width: fit-content;
                display: block !important;
            }

            .right ul li {
                margin: 10px 0;
                text-align: center;
                padding: 0 10px;
            }

              #search {
                width: 100%;
              }

            .right ul li i {
                font-size: 1.2rem;
            }

            .right.active {

                right: 40px;
            }
        }

        @media (max-width: 425px) {
            header {
                padding: 0 20px !important;
            }

            .middle.active,
            .right.active {
                right: 20px;
            }
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
  <header class="d-flex justify-content-between position-relative align-items-center">
    <a href="{{'/'}}">
    <img src="{{ asset('admin/img/logo.jpg')}}" alt="logo" class="logo">
  </a>

    <nav class="middle">
        <ul class="d-flex align-self-center" class="myUlclass">
            <li class="mx-2 mx-lg-3"><a href="{{'/'}}" class="navitemsss">Home</a></li>
            <li class="mx-2 mx-lg-3"><a href="#" class="navitemsss">About us</a></li>
            <li class="mx-2 mx-lg-3"><a href="#" class="navitemsss">Products</a></li>
            <li class="mx-2 mx-lg-3"><a href="#" class="navitemsss">Contact us</a></li>
        </ul>
    </nav>

    <nav class="right">
        <ul class="d-flex align-items-center" class="myUlclass">
            <li class="mx-2 mx-lg-3">
                <form action="{{ route('products.search') }}" class="position-relative">
                    <input type="search" name="search" class="py-1 rounded-1 border border-dark-subtle px-2"
                        id="search" placeholder="Search">
                    <button type="submit" class="btn--search bg-transparent position-absolute border-0 ">
                        <i class="fa-solid fa-search text-secondary"></i>
                    </button>
                </form>
            </li>
            <div class="d-flex justify-content-evenly">
              @if (is_null(session('customer')))
                <li class="mx-2 mx-lg-3 account px-2">
                    <i class="fa-solid fa-user account--icon"></i>
                    <div class="account--dropdown">
                        <div class="account--dropdown-container">
                            <a href="{{'/customerAdd/create/'}}" class="navitemsss">Signup</a>
                            <a href="{{'/customerAdd/'}}" class="navitemsss">Login</a>
                        </div>
                    </div>
                </li>
                @else
                <li class="mx-2 mx-lg-3 account ">
                  <a  href="/customerlogout/{{Session::get('customer')['id'] }}" class="navitemsss">
                    <i class="fa fa-sign-out "></i>
                  </a>
                </li>
                @endif
                <li class="mx-2 mx-lg-3">
                    <a href="/CartView/" class="navitemsss">
                        <i class="fa-solid fa-shopping-cart"></i>
                    </a>
                </li>
            </div>
        </ul>
    </nav>
    <div class="mobile--menu">
        <div class="bar bar1"></div>
        <div class="bar bar2"></div>
        <div class="bar bar3"></div>
    </div>
</header>




{{-- @if (!is_null(session('customer'))) 

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

</ul>
</li>
@endif
        </div>

      </div>
    </div>
  </nav> --}} 





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



const mobileMenu = document.querySelector('.mobile--menu');
        const middle = document.querySelector('.middle');
        const right = document.querySelector('.right');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            middle.classList.toggle('active')
            right.classList.toggle('active')

            if (window.innerWidth < 600) {
                right.style.top = middle.offsetHeight + 100 + "px"
            }

        });
        window.addEventListener("resize",function(){
          if (window.innerWidth < 600) {
                right.style.top = middle.offsetHeight + 100 + "px"
            }
        });
      

  </script>
