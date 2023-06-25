@include('admin.layouts.sidebar')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<style>
    .hello {
        color: rgb(68, 4, 116);

    }

    .hello:hover {
        color: white;
        background-color: rgb(68, 4, 116);
    }

    .my-custom-scrollbar {
        position: relative;
        height: 600px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
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
<h2>
    <!-- SideBar -->

</h2>

<div class="container">
    @yield('addproduct')
    @yield('viewproduct')
    @yield('addbrand')
    @yield('viewbrand')
    @yield('addcategory')
    @yield('viewcategory')
    @yield('addvarition')
    @yield('viewvarition')
    @yield('variationoption')
    @yield('viewvariationoption')
    @yield('addproductimage')
    @yield('viewproductimage')
    @yield('viewUsers')
    @yield('viewprofile')
    @yield('viewOrderDetail')
    @yield('viewOrderDetailPreview')
    @yield('orderProDetView')
    @yield('addBatch')
    @yield('addProductBatch')
    @yield('calculation')
    @yield('viewBatchesProdDet')
    @yield('verifyDelivery')
    @yield('viewdelivery')
    @yield('add_banner')
    @yield('view_banners')



    @if (request()->route()->uri == 'home')
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <canvas id="" width="200" height="100"></canvas>
        <h3 class="justify-content-center d-flex">Batch Based Sales Chart</h3>
        <canvas id="sales-chart" style="width: 657px; max-width: 800px; margin: 0px auto; display: block; height: 328px;"
            width="1314" height="656" class="chartjs-render-monitor"></canvas>
        <h3 class="justify-content-center d-flex">Batch Based Profit Chart</h3>
        <canvas id="myChart" style="width: 657px; max-width: 800px; margin: 0px auto; display: block; height: 328px;"
            width="1314" height="656" class="chartjs-render-monitor"></canvas>
        {{-- <canvas id="profit-chart" style="width: 657px; max-width: 800px; margin: 0px auto; display: block; height: 328px;" width="1314" height="656" class="chartjs-render-monitor"></canvas> --}}
        <script>
            var salesData = @json($salesData);
            var batchNumbers = Object.keys(salesData);
            var soldQuantities = batchNumbers.map(function(batchNumber) {
                return salesData[batchNumber]['quantity_sold'];
            });
            var availableQuantities = batchNumbers.map(function(batchNumber) {
                return salesData[batchNumber]['available_quantity'];
            });

            var ctx = document.getElementById('sales-chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: batchNumbers,
                    datasets: [{
                        label: 'Quantity Sold',
                        data: soldQuantities,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Available Quantity',
                        data: availableQuantities,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


            var salesDatum = @json($salesDatum);
            var batchNumberss = Object.keys(salesDatum);
            var soldQuantitiess = batchNumberss.map(function(batchNumber) {
                return salesDatum[batchNumber]['Achieved_Profit'];
            });
            var availableQuantitiess = batchNumberss.map(function(batchNumber) {
                return salesDatum[batchNumber]['Milestone_Profit'];
            });


            // Define the sales data as a PHP array
            var data = @json(array_values($salesDatum));

            // Define the chart data as a JavaScript object
            var chartData = {
                labels: [],
                datasets: [{
                        label: 'Achieved Profit',
                        data: [],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Milestone Profit',
                        data: [],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            };

            // Loop through the sales data and add it to the chart data
            data.forEach(function(item) {
                chartData.labels.push(item.batch_number);
                chartData.datasets[0].data.push(item.Achieved_Profit);
                chartData.datasets[1].data.push(item.Milestone_Profit);
            });

            // Create a new chart instance
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>





        <div class="container px-4">
            <div class="row g-3 my-2 justify-content-center">
                <div class="col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded hello">
                        <div class="txtcolor col-6 col-sm-8">
                            <h3 class="fs-2">{{ $hello }}</h3>
                            <p class="fs-6 fw-bold txtcolor">Products</p>
                        </div>
                        <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3 mine"></i>
                    </div>
                </div>

                <div class="col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded hello">
                        <div class="txtcolor col-6 col-sm-8">
                            <h3 class="fs-2">Rs.{{ $reveneu }}</h3>
                            <p class="fs-6 fw-bold txtcolor">Revenue</p>
                        </div>
                        <i
                            class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3 mine"></i>
                    </div>
                </div>

                <div class="col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ '/admin/order/create' }}" style="text-decoration: none;">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded hello">
                            <div class="txtcolor col-6 col-sm-8">
                                <h3 class="fs-2">{{ $counted }}</h3>
                                <p class="fs-6 fw-bold txtcolor">Order</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3 mine"></i>
                        </div>
                    </a>
                </div>

                <div class="col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ '/admin/order/calculation' }}" style="text-decoration: none;">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded hello">
                            <div class="txtcolor col-6 col-sm-8">
                                <h3 class="fs-2">%{{ $formattedNum }}</h3>
                                <p class="fs-6 fw-bold txtcolor">Increase</p>
                            </div>
                            <i
                                class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3 mine"></i>
                        </div>
                    </a>
                </div>

                <div class="col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ '/admin/order' }}" style="text-decoration: none;">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded hello ">
                            <div class="txtcolor col-6 col-sm-8">
                                <h3 class="fs-2">{{ $user }}</h3>
                                <p class="fs-6 fw-bold ">Users</p>
                            </div>
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3 mine"></i>
                        </div>
                    </a>
                </div>

            </div>
    @endif
</div>
<div class="primaryproductcall" id="primaryproductcall">

</div>

<div class="line"></div>

<h2>
    <!-- Hello World -->
</h2>
<p>
    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum. -->
</p>
</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->


<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
            $("#sidebar").toggleClass("active");
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
        }
    })
</script>
@if (session('NoOrder'))
    <script>
        Toast.fire({
            icon: 'warning',
            title: '{{ session('NoOrder') }}'
        })
    </script>
    @php
        session()->forget('NoOrder');
    @endphp
@endif
@if (session('deliveredSuccess'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('deliveredSuccess') }}'
        })
    </script>
    @php
        session()->forget('deliveredSuccess');
    @endphp
@endif

@if (session('BatchCreated'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('BatchCreated') }}'
        })
    </script>
    @php
        session()->forget('BatchCreated');
    @endphp
@endif

@if (session('BatchProduct'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('BatchProduct') }}'
        })
    </script>
    @php
        session()->forget('BatchProduct');
    @endphp
@endif



<!-- <script>
    $(document).ready(function() {
        $(".PrimaryProduct").click(function() {
            $("#primaryproductcall").load("PrimaryProductForm.html");
        });
    });
</script> -->
