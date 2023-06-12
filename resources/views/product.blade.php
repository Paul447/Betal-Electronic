@include('welcome')
@include('slider')

@include('categories')
<style>
   @media (max-width: 992px) {
       .section-p1{
        margin-top: 96px;
      }
    }
    @media (min-width: 992px) {
      .section-p1{
        margin-top: 168px;
      }

    }
    @media (max-width: 400px) {
      .section-p1 {
        margin-top: 76px;
      }
    }   
</style>
<br>
  <body style="">
    <div class="toast">Please Login First To Add To Cart!</div>
    <section id="product1" class="section-p1"><br><br>
      <h2 class="mt-5">Featured Products</h2>
      @if (!is_null($featured))
      <div class="products-container d-flex justify-content-center">

        @foreach ($featured as $featured )

        <div class="product-card ">
          <div class="product-image">
            <img src="{{asset('/storage/thumbnails/' . $featured->thumbnail) }}" class="imgs" id="CardImage" />
    </div>
                 
    <div class="product-info">
      <span>{{$featured ->brand_name}}
       
      </span>
      <h4 class="product-name">{{$featured ->product_name}}</h4>
      <p class="product-price">
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
    <a href="{{'/productdetails/'.$featured ->product_id."/".$featured ->slug}}" class="view-details" style="text-decoration: none;" ><i class="fas fa-info-circle"></i></a>
    @if (!is_null(session('customer')))
    <button class="add-to-cart"
        id="addToCartFromCard" value="{{$featured ->product_id}}" onclick="fetcchCart(this.value);"
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
