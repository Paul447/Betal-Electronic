<script>
    document.title = "Betal International | Checkout Page"
</script>
@include('welcome')

<div class="container mt-5 checkout-container">
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="img\logo.png" alt="" width="130" height="130"> -->
        <h1 class="feture text-center mx-auto fs-1">Checkout Page</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-mx-4 order-md-2 mb-4 prodetail h-50">
            <h4 class="d-flex justify-content-between align-items-center mb-3 mt-3">
                <span class="text-muted">Your cart</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item">
                    <!-- <div>
                        <h6 class="text-nowrap">Product name: </h6>
                        <h6>Quantity: </h6>
                        <h6>Price: </h6>
                    </div>

                    <div>
                        <p class="text-muted d-flex float-start">&nbsp;{{ $product }}</p>
                        <p class="text-muted d-flex float-start">{{ $quantity }}</p>
                        <p class="text-muted">{{ $price }}</p>
                    </div> -->
                    <table class="checkout-table">
                        <tr>
                            <td>Product name: </td>
                            <td>
                                <p class="text-muted">{{ $product }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Quantity: </td>
                            <td>
                                <p class="text-muted">{{ $quantity }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Price: </td>
                            <td>
                                <p class="text-muted">{{ $price }}</p>
                            </td>
                        </tr>
                    </table>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (NRP)</span>
                    <strong>Rs {{ $total }}</strong>
                </li>
            </ul>
        </div>

        <div class="col-md-7 order-md-1 mine me-2">
            <h4 class="mb-3 mt-3 fw-bold">Shipping Details</h4>
            <form class="needs-validation" method="post" action="{{ url('/buy/confirm') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product_id }}">
                <input type="hidden" name="quantity" value="{{ $quantity }}">
                <input type="hidden" name="product_name" value="{{ $product }}">
                <input type="hidden" name="price" value="{{ $price }}">
                <input type="hidden" name="total" value="{{ $total }}">
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="firstName"><i class="fa fa-user"></i>&nbsp;Full Name</label>
                        <input type="text" class="form-control mt-2" id="firstName" placeholder="Enter your Full Name" value="" name="name" required pattern="[A-Z].[A-Z a-z]+" title="Name must be in only charater,First Letter Must be Capital" />
                        @error('name')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="address"><i class="fa fa-institution"></i> &nbsp;Address</label>
                        <input type="text" class="form-control mt-2" id="address" required="" name="address" placeholder="Enter Primary Address..." />
                        @error('address')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone"><i class="fa fa-phone"></i> &nbsp;Phone Number</label>
                        <input type="number" class="form-control mt-2" id="address" required="" name="phone" placeholder="Enter Phone Number..." />
                        @error('phone')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Zip Code</label>
                        <input type="text" class="form-control mt-2" id="zip" name="zipcode" placeholder="Zip Code..." required="" />
                        @error('zipcode')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="mb-2" />
                <button class="normal" type="submit">
                    Continue to checkout
                </button>
            </form>
        </div>
    </div>
</div>
@include('footermain')