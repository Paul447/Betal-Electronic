<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('admin/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/productcardmain.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/toast.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/foot.css') }}" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/css/sty.css') }}" />
    <script src=" {{ asset('admin/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('sweetalert::alert')
    <header class="d-flex justify-content-between  align-items-center">
        <a href="{{ '/' }}">
            <img src="{{ asset('admin/img/logo.jpg') }}" alt="logo" class="logo">
        </a>

        <nav class="middle">
            <ul class="d-flex align-self-center" class="myUlclass">
                <li class="mx-2 mx-lg-3"><a href="{{ '/' }}" class="navitemsss">Home</a></li>
                <li class="mx-2 mx-lg-3"><a href="{{ '/newarrivals' }}" class="navitemsss">New Arrivals</a></li>
                <li class="mx-2 mx-lg-3"><a href="#" class="navitemsss">Blogs</a></li>
                {{-- <li class="mx-2 mx-lg-3"><a href="#" class="navitemsss">Contact us</a></li> --}}
            </ul>
        </nav>

        <nav class="right">
            <ul class="d-flex align-items-center" class="myUlclass">
                <li class="mx-2 mx-lg-3">
                    <form action="{{ route('products.search') }}" class="position-relative search-form">
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
                                    <a href="{{ '/customerAdd/create/' }}" class="navitemsss">Signup</a>
                                    <a href="{{ '/customerAdd/' }}" class="navitemsss">Login</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="mx-2 mx-lg-3 account ">
                            <a href="/customerlogout/{{ Session::get('customer')['id'] }}" class="navitemsss">
                                <i class="fa fa-sign-out "></i>
                            </a>
                        </li>
                        <li class="mx-2 mx-lg-3 account px-2">
                            <i class="fa-solid fa-user account--icon"></i>
                            <div class="account--dropdown">
                                <div class="account--dropdown-container">
                                    <a class="navitemsss" href="{{ '/viewprofile' }}">
                                        My Profile
                                    </a>
                                    <a class="navitemsss" href="{{ '/myorder' }}">

                                        My Orders
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endif
                    <li class="mx-2 mx-lg-3">
                        <a href="/CartView/" class="navitemsss">
                            <i class="fa-solid fa-shopping-cart"></i>
                        </a>
                    </li>


                </div>
        </nav>
        <div class="mobile--menu">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
        </div>
    </header>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                responsive: {
                    0: {
                        items: 5
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 8
                    }
                }
            });
        });
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
                const toastContainer = Swal.getContainer()
                toastContainer.style.marginTop = '70px';
            }
        })

        function fetcchCart(cartvalue) {
            var controller = "/CartVieww/";
            var host = location.origin + controller;
            var url = location.origin + controller + cartvalue + "/1";
            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(response => {
                    let error = response.uifail;
                    let html = response.uisuccess;
                    if (error) {
                        Toast.fire({
                            icon: 'error',
                            title: error,
                        })
                    }
                    if (html) {
                        Toast.fire({
                            icon: 'success',
                            title: html,
                        })
                    }
                })
        }

        function fetccchCart(cartvalue, quantitySent, reset) {
            var controller = "/CartVieww/";
            let quantity = isNaN(parseInt($("#quantity").val())) ? quantitySent : parseInt($("#quantity").val());
            var host = location.origin + controller;
            if (reset) {
                var url = location.origin + controller + cartvalue + "/" + quantity + "/" + reset;
            } else {
                var url = location.origin + controller + cartvalue + "/" + quantity;
            }

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(response => {
                    let html = response.uisuccess;
                    let error = response.uifail;
                    if (html) {
                        Toast.fire({
                            icon: 'success',
                            title: html,
                        })
                    }
                    if (error) {
                        Toast.fire({
                            icon: 'error',
                            title: error,
                        })
                    }
                })


            if (reset) {
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
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
        window.addEventListener("resize", function() {
            if (window.innerWidth < 600) {
                right.style.top = middle.offsetHeight + 100 + "px"
            }
        });
    </script>