<script>
    document.title = "Betal International | Cart"
</script>
@include('welcome')

<div class="container cont d-flex justify-content-center align-content-center ">
    <div class="table-responsive w-100">
        <h2 class="feture mx-auto  mt-5 mb-5 "> Cart Item</h2>
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th scope="col" class="fixed-column"></th>
                    <th scope="col" class="fixed-column">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if($productIddata->isEmpty())
                <tr class="text-center mb-5 align-item-center align-item-basline">
                    <td colspan="7" class="fs-5">No Product added To cart</td>
                </tr>
                @endif
                @foreach ($productIddata as $cartData)
                <tr>
                    <td>
                        <button class="btn btn-danger" onclick="deleteRecord({{ $cartData->id }})"><span class="bi bi-trash" style="font-size: 15px;"></span></button>
                    </td>
                    <form id="delete-form-{{ $cartData->id }}" action="{{ url('/cart', $cartData->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <td><img src="{{ asset('/storage/thumbnails/' . $cartData->thumbnail) }}" alt="Product Image" class="product-image" loading="lazy"></td>
                    <td>{{ $cartData->product_name }}</td>
                    <td>@php
                        $hello = DB::table('add_product_batches')
                        ->where('product', $cartData->product_id)
                        ->whereNotNull('availablequantity')
                        ->where('availablequantity', '<>', 0)
                            ->orderBy('batchid', 'asc')
                            ->limit(1)
                            ->pluck('sellingprice')
                            ->first();
                            $val = 'Out Of Stock';

                            @endphp
                            @if (is_null($hello))
                            {{ $val }}
                            @else
                            Rs.{{ $hello }}
                            @endif
                    </td>
                    <td>
                        <div class="d-flex flex-row justify-content-center">
                            <button class="cart_dec btn btn-link px-2" name="{{ $cartData->product_id }}" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                <i class="fas fa-minus"></i>
                            </button>
                            @php
                            $hello = DB::table('add_product_batches')
                            ->where('product', $cartData->product_id)
                            ->whereNotNull('availablequantity')
                            ->where('availablequantity', '<>', 0)
                                ->orderBy('batchid', 'asc')
                                ->limit(1)
                                ->pluck('availablequantity')
                                ->first();

                                @endphp
                                <input id="CartDataValue" type="number" min="1" max="{{ $hello }}" name="{{ $cartData->product_name }}" value="{{ $cartData->quantity }}" type="number" id="quantity" class="itemQty form-control form-control-sm" style="width: 50px" onchange="fetccchCart({{ $cartData->product_id }}, this.value, 1)" />

                                <button class="cart_inc btn btn-link px-2" name="{{ $cartData->product_id }}" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </button>
                        </div>
                    </td>
                    <td> @php

                        $hello = DB::table('add_product_batches')
                        ->where('product', $cartData->product_id)
                        ->whereNotNull('availablequantity')
                        ->where('availablequantity', '<>', 0)
                            ->orderBy('batchid', 'asc')
                            ->limit(1)
                            ->pluck('sellingprice')
                            ->first();
                            $val = 'Out Of Stock';

                            $total = $hello * $cartData->quantity;
                            echo 'Rs.' . ' ' . $total;
                            @endphp</td>
                    <td>
                        <input class="form-check-input" type="checkbox" id="checkbox1" value="{{ $total }},{{ $cartData->product_id }},{{ $cartData->quantity }},{{ $cartData->product_name }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="container mt-3">
    <h2 class="feture mx-auto  mt-5 mb-5 "> Check Out? </h2>
    <div class="row justify-content-center mb-4">
        <div class="col col-md-4 col-md-mx-4 order-md-2 mb-4 prodetail">
            <section id="cart-add" class="section-p1">
                <div id="subTotal">
                    <h3>Cart Totals</h3>
                    <table id="table2">
                        <tbody>
                            <tr>
                                <td>Cart SubTotal</td>
                                <td class="cardTotals" id="sumDiv"></td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>free</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td style="font-weight: bold" class="cardTotals" id="sumDiv">$0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-md-7 order-md-1 mine me-2">
            <h4 class="mb-3 mt-3 fw-bold">Shipping Details</h4>
            <form class="needs-validation" method="post" id="myForm" action="{{ '/confirm' }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName"><i class="fa fa-user"></i> Full Name</label>
                        <input type="hidden" name="selectedProductId" id="selectedValuesInput">
                        <input type="hidden" name="selectedCart" id="selectedCartQty">
                        <input type="hidden" name="totalCartData" id="ttlAmount">
                        <input type="hidden" name="pname" id="productName">
                        <input type="text" class="form-control mt-2" id="firstName" placeholder="Enter your Full Name" value="" name="name" required pattern="[A-Z].[A-Z a-z]+" title="Name must be in only character, First Letter Must be Capital" />
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address"><i class="fa fa-institution"></i> Address</label>
                        <input type="text" class="form-control mt-2" id="address" required="" name="address" placeholder="Enter Primary Address..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone"><i class="fa fa-phone"></i> Phone Number</label>
                        <input type="number" class="form-control mt-2" id="phone" required="" name="phone" placeholder="Enter Phone Number..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control mt-2" id="zip" name="zipcode" placeholder="Zip Code..." required="" />
                    </div>
                </div>
                <hr class="mb-2" />
                <div class="col">
                    <button class="normal" type="submit" onclick="myfunctionCheck">Proceed to checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const checkbox = document.querySelectorAll(".form-check-input");
    const selectedProductId = [];
    const selectedCartValue = [];
    const producttName = [];
    let sum = 0;
    checkbox.forEach((btnCheck) => {
        btnCheck.addEventListener("change", (event) => {
            const value = event.target.value;
            const parts = value.split(",");
            const total = parseInt(parts[0], 10);
            const productId = parseInt(parts[1], 10);
            const cartQty = parseInt(parts[2], 10);
            const pname = (parts[3]);
            if (btnCheck.checked) {
                sum += total;
                selectedProductId.push(productId);
                selectedCartValue.push(cartQty);
                producttName.push(pname);
            } else if (!isNaN(total)) {
                sum -= total;
                const index = selectedProductId.indexOf(productId);

                if (index > -1) {
                    selectedProductId.splice(index, 1);
                    selectedCartValue.splice(index, 1);
                    producttName.splice(index, 1);
                }
            }
            const sumDiv = document.getElementById("sumDiv");
            sumDiv.textContent = `Rs: ${sum}`;
            const mine = document.getElementById('ttlAmount');
            mine.value = JSON.stringify(sum);
            const MineCartValue = document.getElementById('selectedCartQty');
            MineCartValue.value = JSON.stringify(selectedCartValue);
            const selectedValuesInput = document.getElementById('selectedValuesInput');
            selectedValuesInput.value = JSON.stringify(selectedProductId);
            const selectedProductName = document.getElementById('productName');
            selectedProductName.value = JSON.stringify(producttName);
        });
    });

    function myfunctionCheck() {
        const myForm = document.getElementById('myForm');
        myForm.submit();
    }
    const cartIncBtn = document.querySelectorAll(".cart_inc");
    const cartDecBtn = document.querySelectorAll(".cart_dec");
    const inputValue = document.querySelectorAll(".itemQty");
    cartIncBtn.forEach((btnInc, i) => {
        btnInc.addEventListener("click", (e) => {
            e.preventDefault()
            var productId = btnInc.getAttribute("name");
            var inpvalue = 1;
            const datavalue = [];
            datavalue[0] = inpvalue;
            datavalue[1] = productId;
            var controller = "/CheckOutDetail/";
            var url = location.origin + controller + datavalue;
            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },

                })
                .then(response => response.json())
                .then(response => {
                    let html = response.uisuccess;
                    Toast.fire({
                        icon: 'info',
                        title: html,
                    })
                })
            setTimeout(function() {
                location.reload();
            }, 1000);
        })
    });

    cartDecBtn.forEach((btnInc, i) => {
        btnInc.addEventListener("click", (e) => {
            e.preventDefault()
            var productId = btnInc.getAttribute("name");
            var inpvalue = -1;
            const datavalue = [];
            datavalue[0] = inpvalue;
            datavalue[1] = productId;
            var controller = "/CheckOutDetail/";
            var url = location.origin + controller + datavalue;
            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },

                })
                .then(response => response.json())
                .then(response => {
                    let html = response.uisuccess;
                    Toast.fire({
                        icon: 'info',
                        title: html,
                    })
                })
            setTimeout(function() {
                location.reload();
            }, 1000);
        })
    });



    function fetchData(pdetailValue) {
        var controller = "/CartViewww/";
        var x = document.getElementById("CartDataValue").value;
        const data = [];
        data[0] = x;
        data[1] = pdetailValue;
        var url = location.origin + controller + data;

        fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
        })
    }

    function deleteRecord(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "No, cancel!",
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>



@if (session('DeletedItem'))
<script>
    Toast.fire({
        icon: 'success',
        title: '{{ session('
        DeletedItem ') }}'
    })
</script>
@php
session()->forget('DeletedItem');
@endphp
@endif

{{-- @if (session('Qty'))
    <script>
    Toast.fire({
    icon: 'success',
    title: '{{session('Qty')}}'
})
</script>
@php
session()->forget('Qty');
@endphp
@endif --}}
{{-- @if (session('uifail'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('uifail') }}',
})
</script>
@php
session()->forget('uifail');
@endphp
@endif

@if (session('uisuccess'))
<script>
    Toast.fire({
        icon: 'success',
        title: '{{ session('
        uisuccess ') }}'
    })
</script>
@php
session()->forget('uisuccess');
@endphp
@endif --}}

@include('footermain')