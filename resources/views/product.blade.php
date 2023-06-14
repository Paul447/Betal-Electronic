@include('welcome')
@include('slider')

@include('categories')
<style>
 
     .feture{
      border-bottom: 3px solid #a50318 ;
      width: fit-content;
      padding-bottom: 10px;
      margin-bottom: 50px;
     }
   
</style>
<br>
  <body style="">
    <div class="toast">Please Login First To Add To Cart!</div>
    <section id="product1" class="section-p1"><br><br>
      <h2 class="feture mx-auto">Featured Products</h2>

      @if (!is_null($featured))
      <div class="products-container d-flex justify-content-center">

        @foreach ($featured as $featured )

        <div class="product-card">
          <a href="{{'/productdetails/'.$featured ->product_id}}">
          <div class="product-image">
            <img src="{{asset('/storage/thumbnails/' . $featured->thumbnail) }}" class="imgs" id="CardImage" />
          </div>
        </a>
                 
    <div class="product-info">
      <span>{{$featured ->brand_name}}
       
      </span>
      <a href="{{'/productdetails/'.$featured ->product_id}}" style="text-decoration: none;">
      <h4 class="product-name">{{$featured ->product_name}}</h4>
      </a>
      <p class="product-price fw-bold text-dark">
        @php
        $price = DB::table('add_product_batches')
            ->where('product', $featured->product_id)
            ->first();
            $xy = $price->availablequantity;
            
       
          $hello = DB::table('add_product_batches')
          ->where('product', $featured->product_id)->whereNotNull('availablequantity')
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
    <a href="{{'/productdetails/'.$featured ->product_id}}" class="view-details"  ><i class="fas fa-info-circle"></i></a>
    @if (!is_null(session('customer')))
    <button class="add-to-cart"
        id="addToCartFromCard" value="{{$featured ->product_id}}" onclick="fetcchCart(this.value);"
      ><i class="fas fa-cart-plus"></i></button>
        
    @else
    <button id="" class="show-toast add-to-cart" style="background-color: #a50318"><i class="fas fa-cart-plus"></i></a>
    @endif
  </div>
      </div>
   
      {{-- <div class="ribbon-wrap">
        <div class="ribbon"></div>
      </div> --}}
    </div>
{{-- </p> 
                    <a href="{{'/productdetails/'.$featured ->product_id}}" class="btn btn-success">View Details</a>
                  </div>

                    <button class="fa-solid fa-cart-shopping cart addtoCartFrompCard"
                        id="addToCartFromCard" value="{{$featured ->product_id}}" onclick="fetcchCart(this.value);"
                      ></button>
                  <div class="ribbon-wrap">
                    <div class="ribbon">Available</div>
                  </div>
                </div> --}}
        @endforeach
              </div>
      @endif
     
 
  
    </section>


@include('footermain')

<script>
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
{{-- Logged In successfully message --}}
@if (session('message'))
<script>
Toast.fire({
icon: 'success',
title: '{{session('message')}}'
})
</script>
@php
session()->forget('message');
@endphp
@endif

{{-- Registered Successfully message --}}
@if (session('Registered'))
<script>
Toast.fire({
icon: 'success',
title: '{{session('Registered')}}'
})
</script>
@php
session()->forget('Registered');
@endphp
@endif
<script>
  Echo.join(`chat`)
    .here((users) => {
      console.log(users);
    })
    .joining((user) => {
        console.log(user);
    })
    .leaving((user) => {
        console.log(user.name);
    })
    .error((error) => {
        console.error(error);
    });
</script>
