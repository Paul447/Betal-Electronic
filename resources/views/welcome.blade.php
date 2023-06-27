<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('admin/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/productcardmain.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/toast.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/foot.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/css/sty.css') }}" />
    <script src=" {{ asset('admin/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');


        a {
            text-decoration: none;
        }

        .brandname {
            text-align: center !important;
        }

        .hp-mod-price-text {
            text-decoration: line-through
        }

        .inline {
            display: inline-block
        }

        .categorycontainer {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        a {
            background-color: transparent;
            -webkit-text-decoration-skip: objects
        }


        img {
            border-style: none
        }

        .card-categories-ul {
            width: 100%;
            background-color: #fff;
            min-height: 297px
        }

        .card-categories-ul li:nth-of-type(8n) {
            margin-right: 0
        }

        .card-categories-name {
            text-align: center;
            margin-top: 10px
        }

        .card-categories-name .text {
            margin: 8px 12px 0;
            font-size: 14px;
            color: #212121;
            line-height: 18px;
            height: 36px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        a {
            color: #000;
            text-decoration: none;
            /* text-align: center; */
        }

        .card-categories-li {
            min-width: 150px;
            max-width: 180px;
            /* width: 12.5%; */
            height: 148.5px;
            border-right: 1px solid #e2e2e2;
            border-bottom: 1px solid #e2e2e2;
            background-color: #fff
        }

        .card-categories-li:nth-child(8n) {
            border-right: 0;
        }

        .card-categories-li:nth-child(10),
        .card-categories-li:nth-child(11),
        .card-categories-li:nth-child(12),
        .card-categories-li:nth-child(13),
        .card-categories-li:nth-child(14),
        .card-categories-li:nth-child(15),
        .card-categories-li:nth-child(16),
        .card-categories-li:nth-child(9) {
            border-bottom: 0;
        }

        .card-categories-li-content {
            width: 100%;
            height: 100%;
            display: block;
            padding-top: 16px;
        }

        .hp-mod-card-hover:hover {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .25);
            -webkit-transform: all .3s ease-in-out;
            -ms-transform: all .3s ease-in-out;
            transform: all .3s ease-in-out;
            position: relative;
        }

        .card-categories-image-container {
            margin: 0 auto;
            width: 80px;
            height: 80px
        }

        .card-categories-image-container .image {
            width: 100%;
            height: 100%
        }

        .card-channels-img-wrap .image {
            width: 100%;
            height: 100%;
            border-radius: 16px
        }

        img.slide {
            height: 75vh;
        }

        .Slidder {
            margin-top: 20px;
        }

        .carousel-item {
            z-index: -1;
        }

        #demo {
            width: 85%;
        }

        @media (max-width:768px) {
            img.slide {
                height: 280px;
            }
        }

        @media(max-width:512px) {
            img.slide {
                height: 200px;
                margin-bottom: -15px;
            }
        }



        :root {
            --footer-bg: #d9d9d9;
            --footer-text: #0a0a0a;
            --primary-red: #a50318;
        }

        footer {
            background-color: var(--footer-bg);
            color: var(--footer-text);
            margin-top: 40px;
            padding: 40px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        footer .section--title {
            width: fit-content;
        }

        .divider {
            margin-top: 5px;
            margin-bottom: 30px;
            height: 2px;
            background-color: var(--primary-red);
            width: 85%;
        }

        footer a {
            margin-right: 20px;
            color: var(--footer-text);
        }

        footer a:hover {
            color: var(--primary-red);
        }

        footer a i {
            color: var(--primary-red);
            font-size: 1.5rem;
        }

        .text--stay-connected {
            margin-bottom: 15px;
        }

        .copyright {
            margin-top: 50px;
            font-size: 0.825rem;
        }

        footer li {
            margin: 15px 0;
        }

        footer .fas {
            margin-right: 10px;
            color: var(--primary-red);
        }

        footer a i:hover {
            color: var(--footer-text);
        }

        .map iframe {
            width: 100%;
            height: 100%;
        }

        .map {
            width: 380px;
            height: 220px;
        }

        /* media queries */
        @media (max-width: 1120px) {
            .map {
                width: 280px;
                height: 220px;
            }

            footer {
                padding: 40px 20px;
            }
        }

        @media (max-width: 985px) {
            footer {
                flex-wrap: wrap;
            }

            footer .map {
                width: 100%;
                height: 300px;
                margin-top: 40px;
            }
        }

        @media (max-width: 695px) {
            footer {
                padding: 40px 20px;
                flex-direction: column-reverse;
            }

            .map {
                margin: 0 0 20px 0 !important;
            }

            .section--title {
                margin-top: 20px;
            }

        }

        * {
            font-family: "Roboto", sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        .main {
            margin-top: 80px !important;
        }

        .main-reg {
            margin-top: 120px !important;
        }

        .feture {
            border-bottom: 3px solid #a50318;
            width: fit-content;
            padding-bottom: 10px;
            /* margin-bottom: 50px; */
        }



        ul {
            margin-bottom: 0 !important;
        }

        .navitemsss {
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
            z-index: 1000;
            position: fixed !important;

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

        ol,
        ul {
            padding: 0;
        }

        a {
            text-decoration: none;
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

        .products-container {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */

        }

        .product-card {
            flex-basis: calc(25% - 20px);
            margin: 20px;
            display: flex;
            flex-direction: column;

            justify-content: space-between;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            min-width: 250px;
            max-width: 280px !important;
            font-family: 'Roboto', sans-serif;
        }

        .product-card>*:not(:first-child) {
            padding-left: 20px;
            padding-right: 20px;

        }

        .product-card>*:last-child {
            padding-bottom: 20px;
        }

        .product-card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .product-image {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            margin: 0 auto;
            width: 100%;
            height: 200px;

        }

        .product-image img {
            display: block;
            width: auto;
            height: 100%;
            transition: transform 0.5s ease;
            border-radius: 10px;
        }

        .product-image:hover img {
            transform: scale(1.1);
        }

        .product-image:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .product-image:hover:before {
            opacity: 1;
        }

        .product-info {
            padding: 20px;
        }

        .product-name {
            font-size: 1.0rem;
            font-weight: 700;
            margin: 8px 0;
            color: #333;
            text-transform: uppercase;
            text-align: center;
        }

        .product-price {
            font-size: 1.1rem;
            margin: 8px 0 16px 0;
            color: #343a40 !important;
            text-align: center;
        }

        .product-description {
            margin: 20px 0;
            color: #666;
            line-height: 1.5;
            text-align: justify;
        }

        .product-buttons {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .view-details,
        .add-to-cart {
            background-color: #a50318;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            border-radius: 5px;
            font-size: 1.2rem;
            width: 100%;
            max-width: 200px;
            margin: 0 10px;
        }

        .view-details:focus,
        .add-to-cart:focus,
        .view-details:hover,
        .add-to-cart:hover {
            background-color: #a50318;
            color: #ffffff;
            outline: 3px solid var(--light-red) !important;
        }

        .product-card span {
            padding-top: 8px;
        }



        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .product-card {
                max-width: 100%;
            }



            .product-name {
                font-size: 0.9rem;
            }

            .product-price {
                font-size: 1.3rem;
                margin: 10px 0;
            }

            .product-description {
                font-size: 1rem;
            }

            .view-details,
            .add-to-cart {
                font-size: 1.1rem;
            }
        }

        @media screen and (max-width: 992px) {
            .product-card {
                flex-basis: calc(33.33% - 20px);
            }
        }

        @media screen and (max-width: 768px) {


            .product-card {
                flex-basis: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 576px) {
            .product-card {
                flex-basis: 100%;
            }
        }
    </style>
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
            let quantity = parseInt($("#quantity").val());
            var host = location.origin + controller;
            var url = location.origin + controller + cartvalue + "/" + quantity;
            console.log(url);
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
        window.addEventListener("resize", function() {
            if (window.innerWidth < 600) {
                right.style.top = middle.offsetHeight + 100 + "px"
            }
        });
    </script>
    @if (session('errormessage'))
        <script>
            Toast.fire({
                icon: 'error',
                title: '{{ session('errormessage') }}'
            })
        </script>
        @php
            session()->forget('errormessage');
        @endphp
    @endif
