<script>
    document.title = "Betal International | Checkout Page"
</script>
@include('welcome')
<style>
    .prodetail {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    .mine {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }
</style>


<div class="container mt-5">
    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="img\logo.png" alt="" width="130" height="130"> -->
        <h1 class="text-danger fs-1">Checkout Page</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-mx-4 order-md-2 mb-4 prodetail h-50">
            <h4 class="d-flex justify-content-between align-items-center mb-3 mt-3">
                <span class="text-muted">Your cart</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <h6 class="text-muted">Quantity:</h6>
                        <h6 class="text-muted">Price:</h6>
                    </div>

                    <br />

                    <div>
                        <span class="text-muted d-flex float-start">{{ $product }}</span><br />
                        <span class="text-muted d-flex float-start">{{ $quantity }}</span><br />
                        <span class="text-muted">{{ $price }}</span>
                    </div>
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
                        <input type="text" class="form-control mt-2" id="firstName"
                            placeholder="Enter your Full Name" value="" name="name" required
                            pattern="[A-Z].[A-Z a-z]+"
                            title="Name must be in only charater,First Letter Must be Capital" />
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="address"><i class="fa fa-institution"></i> &nbsp;Address</label>
                        <input type="text" class="form-control mt-2" id="address" required="" name="address"
                            placeholder="Enter Primary Address..." />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone"><i class="fa fa-phone"></i> &nbsp;Phone Number</label>
                        <input type="number" class="form-control mt-2" id="address" required="" name="phone"
                            placeholder="Enter Phone Number..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Zip Code</label>

                        <input type="text" class="form-control mt-2" id="zip" name="zipcode"
                            placeholder="Zip Code..." required="" />
                    </div>
                </div>

                <hr class="mb-2" />
                <button class="btn btn-outline-success btn-md btn-block float-end mb-5" type="submit">
                    Continue to checkout
                </button>
            </form>
        </div>
    </div>
</div>

