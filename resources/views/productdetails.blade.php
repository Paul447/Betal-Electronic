@include('welcome')

<style>
  @media (max-width: 992px) {
       .productContainer{
        margin-top: 96px;
      }
    }
    @media (min-width: 992px) {
      .productContainer {
        margin-top: 168px;
      }
      #CouHead {
        font-size: 12px;
      }
    }
    @media (max-width: 400px) {
      .productContainer {
        margin-top: 76px;
      }

      .coutext {
        font-size: 0.8em;
      }
      .MidText {
        font-size: 1.2em;
      }
    }
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    /* font-family: "Roboto Mono", monospace; */
    font-weight: 600;
}

</style>
<div class="toast">Please Login First To Add To Cart!</div>
<div class="container-fluid mt-2 mb-3  " style="background-color:#eee;">
  <div class="row no-gutters mx-4 align-content-center productContainer justify-content-center pb-5" >
    <div class="col-sm-10 mt-5 col-lg-6 col-xl-5 pr-2">
      <div class="card">
        <div class="demo">
          <ul id="lightSlider">

            {{-- <li data-thumb="./img/IMG_1631.JPG">
              <img class="pDetailimg"  src="./img/IMG_1631.JPG" />
            </li> --}}
            @foreach ($data as $product)

            @endforeach
            @php

            $image = DB::table('productimages')
                ->where('product_id', $product->product_id)
                ->first();
            $images = explode('|', $image->image);
        @endphp
        @foreach ($images as $item)

        <li data-thumb="{{ asset('/storage/product/' . $item) }}">
            <img class="pDetailimg" src="{{ asset('/storage/product/' . $item) }}" />
          </li>
        @endforeach

          </ul>
        </div>
      </div>
    </div>

    <div class="col-sm-10 mt-5  col-lg-6 col-xl-7">
      <div class="card">
        {{-- <div class="ribbon-wrap">
          <div class="ribbon">Hello World</div>
        </div> --}}

        <div class="about d-flex flex-column align-items-center">
          <h3 class="font-weight-bold product-Title text-uppercase">
            {{$product->product_name}}
          </h3>
          <h4 class="font-weight-bold product-Price">      @php
            $price = DB::table('add_product_batches')
                ->where('product', $product->product_id)
                ->first();
                $xy = $price->availablequantity;
                
           
              $hello = DB::table('add_product_batches')
              ->where('product', $product->product_id)->whereNotNull('availablequantity')
                    ->where('availablequantity', '<>', 0)
              ->orderBy('batchid', 'asc')->limit(1)->pluck('sellingprice')->first();
                    $val = "Out Of Stock";   
            
            
        @endphp
     @if(is_null($hello))
            {{$val}}
     @else
        Rs.{{$hello}}
    @endif</h4>
          <h5 class="brandName">{{$product->brand_name}}</h5>
        </div>
        <hr />
        <div class="flex-row product-description justify-content-center">
          <div class="mt-2">
            <h3
              class="font-weight-bold justify-content-center flex-row d-flex mb-2"
            >
              Description
            </h3>
            <p class="description">
                {{$product->discription}}
            </p>
            <div class="bullets d-flex flex-column justify-content-center">
              <div class="d-flex xyz align-items-center">
                <span class="dot"></span>
                <span class="bullet-text">
                    @php
                    $category = DB::table('productcategories')
                    ->where('product_id', $product->product_id)
                    ->join('categories','category_id','=','categorys_id')->get();

                @endphp
                @foreach ($category as $cat)
                {{$cat->category_name}}
                <br>
                @endforeach
                </span>
              </div>
            </div>
          </div>
          <hr />
          {{-- <label class="d-flex fs-4 fw-bold justify-content-center mb-3">Choose Quantity</label>
        <div class="input-group spinner w-25 mx-auto">
          <span class="input-group-text input-group-btn" id="basic-addon1"><button class="btn btn-default" type="button" id="minus-btn"><i class="fas fa-minus"></i></button>
          </span>

          <input type="text" class="form-control" id="itemValue" value="1" min="1" max="100">

          <span class="input-group-text input-group-btn" id="basic-addon2"><button class="btn btn-default" type="button" id="plus-btn"><i class="fas fa-plus"></i></button>
          </span>

        </div> --}}
          {{-- <div class="buttons d-flex flex-row justify-content-center pb-3">
            <button class="btn btn-outline-warning cart mx-3" value="{{$product->product_id}}" onclick="fetchData(this.value);">
              Add to Cart
            </button>
           <button class="btn btn-warning buy" value="{{$product->product_id}}" onclick="fetchpDetail(this.value);" >Buy it Now</button>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>

<section id="product1" class="section-p1">
  <h2>Relatable Product</h2>
  <p>Check This Out?</p>
  <div class="products-container d-flex justify-content-center">
  @foreach ($getProductDetail as $product )

  <div class="product-card ">
    <div class="product-image">
      <img src="{{asset('/storage/thumbnails/' . $product->thumbnail) }}" class="imgs" id="CardImage" />
</div>

<div class="product-info">
  <span>{{$product->brand_name}}
    {{$value = session()->get('succes')}}
  </span>
  <h4 class="product-name">{{$product->product_name}}</h4>
  <p class="product-price">



@php

    

  $hello = DB::table('add_product_batches')
  ->where('product', $product->product_id)->whereNotNull('availablequantity')
        ->where('availablequantity', '<>', 0)
  ->orderBy('batchid', 'asc')->limit(1)->pluck('sellingprice')->first();
        $val = "Out Of Stock";   


@endphp
@if(is_null($hello))
{{$val}}
@else
Rs.{{$hello}}
@endif
</p> 
<div class="product-buttons">
  <a href="{{'/productdetails/'.$product->product_id."/".$product->slug}}" class="view-details" style="text-decoration: none;" ><i class="fas fa-info-circle"></i></a>
  @if (!is_null(session('customer')))
  <button class="add-to-cart"
      id="addToCartFromCard" value="{{$product->product_id}}" onclick="fetcchCart(this.value);"
    ><i class="fas fa-cart-plus"></i></button>
      
  @else
  <button id="" class="show-toast add-to-cart"><i class="fas fa-cart-plus"></i></a>
  @endif
</div>
    </div>
 
    {{-- <div class="ribbon-wrap">
      <div class="ribbon"></div>
    </div> --}}
  </div>
@endforeach

  </div>
</section>

<script>
  $("#lightSlider").lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9,
  });
  $(document).ready(function(){

  $("#plus-btn").click(function(){
    var value = parseInt($("input").val());
    if (value < 100) {
      value = value + 1;
      $("input").val(value);
    }
  });


  $("#minus-btn").click(function(){
    var value = parseInt($("input").val());
    if (value > 1) {
      value = value - 1;
      $("input").val(value);
    }
  });
});

function fetchData(pdetailValue){
  var controller = "/CartViewww/";
  var x = document.getElementById("itemValue").value;
  const data = [];
  data[0]= x;
  data[1]= pdetailValue;
  var url = location.origin + controller + data;

  fetch(url, {
                        method: 'GET',
                        headers: {
                          'Accept': 'application/json',
                        },
                        // body: JSON.stringify(data)

          })
}


function fetchpDetail(detailValue){
  var controll = "/buy/";
  var x = document.getElementById("itemValue").value;
  const dataa = [];
  dataa[0]= x;
  dataa[1]= detailValue;
  var urll = location.origin + controll + dataa;

  fetch(urll,{
                        method: 'GET',
                        headers: {
                          'Accept': 'application/json',
                        },


          })
}
const showToastButton = document.querySelectorAll(".show-toast");
    var toast = document.querySelector('.toast');
    showToastButton.forEach((btnToast , i)=>{
      btnToast.addEventListener("click", (e) => {
        Toast.fire({
        icon: 'info',
        title: 'Please Login First to Countinue'
      })
            }
            )
      });

</script>
@include('footermain')
