@include('admin.layouts.header')

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
          <div class="sidebar-header">
           <img src="{{ asset('admin/img/mirtyunjayaam-logo.png')}}" class="rounded-circle" height="200px" width="200px"alt="">
          </div>
          <ul class="list-unstyled components">
            <p>Mirtyunjayaam Ecomm</p>
            <li class="dropdown nav-items">
              <a href="{{'/home'}}" class="nav-link" >Home</a>
            </li>

            <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#product"
                aria-expanded="false"
                >
                Product</a
              >
              <ul class="list-unstyled collapse" id="product">
                <li>
                  <a href="{{'/admin/product/create'}}" class="nav-link" id="">Add Product</a>
                </li>
                <li>
                  <a href="{{'/admin/product/'}}" class="nav-link">View Product Data</a>
                </li>
              </ul>
            </li>

            <!-- Brand add and view  -->
            <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#brand"
                aria-expanded="false"
                >Brand</a
              >
              <ul class="list-unstyled collapse" id="brand">
                <li>
                  <a href="{{'/admin/brand/create'}}" class="nav-link" id="">Add Brand</a>
                </li>
                <li>
                  <a href="{{'/admin/brand'}}" class="nav-link">View Brand Data</a>
                </li>
              </ul>
            </li>


            <!-- Banner add and view  -->
            <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#banner"
                aria-expanded="false"
                >Banner</a
              >
              <ul class="list-unstyled collapse" id="banner">
                <li>
                  <a href="{{'/admin/banner/create'}}" class="nav-link" id="">Add Banner</a>
                </li>
                <li>
                  <a href="{{'/admin/banner'}}" class="nav-link">View Banner Data</a>
                </li>
              </ul>
            </li>


            <!-- Category Add And View -->

            <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#category"
                aria-expanded="false"
                >Category</a
              >
              <ul class="list-unstyled collapse" id="category">
                <li>
                  <a href="{{'/admin/category/create'}}" class="nav-link" id="">Add Category</a>
                </li>
                <li>
                  <a href="{{'/admin/category/'}}" class="nav-link">View Category Data</a>
                </li>
              </ul>
            </li>
            
            <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#batch"
                aria-expanded="false"
                >Batch</a
              >
              <ul class="list-unstyled collapse" id="batch">
                <li>
                  <a href="{{'/admin/batch/create'}}" class="nav-link" id="">Add Batch</a>
                </li>
                <li>
                  <a href="{{'/admin/batch/show'}}" class="nav-link" id="">Assign Batch Product</a>
                </li>
              </ul>
            </li>

            <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#delivery"
                aria-expanded="false"
                >Delivery</a
              >
              <ul class="list-unstyled collapse" id="delivery">
                <li>
                  <a href="{{'/admin/delivery'}}" class="nav-link" id="">Verify Delivery</a>
                </li>
              </ul>
            </li>


            <!-- Varition -->
            <!-- It could be like colour size of the product and storage space of the computer  -->
            {{-- <li class="dropdown nav-items">
              <a
                href="#homeSubmenu"
                class="dropdown dropdown-toggle nav-link"
                data-bs-toggle="collapse"
                data-bs-target="#Varition"
                aria-expanded="false"
                >Varition</a>

              <ul class="list-unstyled collapse" id="Varition">
                <li>
                  <a href="{{'/admin/variation/create'}}" class="nav-link" id="">Add Varition</a>
                </li>
                <li>
                  <a href="{{'/admin/variation/'}}" class="nav-link">View Varition Data</a>
                </li>
              </ul>
            </li>
            <li class="dropdown nav-items">
                <a
                  href="#homeSubmenu"
                  class="dropdown dropdown-toggle nav-link"
                  data-bs-toggle="collapse"
                  data-bs-target="#Varitionoption"
                  aria-expanded="false"
                  >Varition Option</a>

                <ul class="list-unstyled collapse" id="Varitionoption">
                  <li>
                    <a href="{{'/admin/variationoption/create'}}" class="nav-link" id="">Add VaritionOption</a>
                  </li>
                  <li>
                    <a href="{{'/admin/variationoption/'}}" class="nav-link">View VaritionOption</a>
                  </li>
                </ul>
              </li> --}}


            <li>
              <a href="#" class="nav-link">About</a>
            </li>
          </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
              </button>
              <button
                class="btn btn-dark d-inline-block d-lg-none ml-auto"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <i class="fas fa-align-justify"></i>
              </button>


              <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarSupportedContent"
              >
                <ul class="nav navbar-nav ml-auto">
                  {{-- <li class="nav-item"><div class="input-group">
                    <div class="input-group">
                      <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                      <button type="button" class="btn btn-outline-primary">search</button>
                    </div>
                  </li> --}}


                  <!-- User -->
                  <li class="nav-item navbar-dropdown dropdown-user dropdown px-3">

                    <!-- toggeler -->
                    <a role="button" class="nav-link  hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="{{ asset('admin/img/mirtyunjayaam-logo.png')}}" height="30px" alt class=" rounded-circle" />
                      </div>
                    </a>

                    <!-- main -->
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="#">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="{{ asset('/storage/editor/'.Session::get('user')['image']) }}" height="50px" alt class="w-px-40 rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block">{{ Session::get('user')['user_name'] }}</span>
                              <small class="text-muted">{{ Session::get('user')['role'] }}</small>
                            </div>
                          </div>
                        </a>
                      </li>

                      <li>
                        <div class="dropdown-divider"></div>
                      </li>

                      <li>
                        <a class="dropdown-item" href="{{url('/admin/profile/'. Session::get('user')['id'])}}">
                          <i class="bx bx-user me-2"></i>
                          <span class="align-middle">My Profile</span>
                        </a>
                      </li>

                      <li>
                        <div class="dropdown-divider"></div>
                      </li>

                      <li>
                        <a class="dropdown-item" href="{{'/logout'}}">
                          <i class="bx bx-power-off me-2"></i>

                          <span class="align-middle">Log Out</span>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!--/ User -->

                </ul>
              </div>
            </div>
          </nav>
