
@include('welcome')
@include('slider')

<style>
   /* @media (max-width: 992px) {
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

  
    } */


</style>
<br>
<div class="toast">Please Login First To Add To Cart!</div>
  <body style="">
   
    <section id="product1" class="section-p1"><br><br>
      @foreach ($catoName as $catname )
      <h2 class="mx-auto feture" id="hello">{{$catname->category_name}}</h2>
      @endforeach
      <div class="products-container d-flex justify-content-center">

@foreach ($data as $product )

<div class="product-card">
  <div class="product-image">
          <img src="{{asset('/storage/thumbnails/' . $product->thumbnail) }}" class="imgs" id="CardImage" />
  </div>

         <div class="product-info">
            <span>{{$product->brand_name}}
            </span>
            <h4 class="product-name">{{$product->product_name}}</h4>
            <p class="product-price">
          
              @php
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
      @endif

      </p> 
      <div class="product-buttons">
        <a href="{{'/productdetails/'.$product->product_id}}" class="view-details" style="text-decoration: none;" ><i class="fas fa-info-circle"></i></a>
        @if (!is_null(session('customer')))
        <button class="add-to-cart"
            id="addToCartFromCard" value="{{$product->product_id}}" onclick="fetcchCart(this.value);"
          ><lord-icon
          src="https://cdn.lordicon.com/medpcfcy.json"
          trigger="boomerang"
          colors="primary:#ffffff"
          style="width:30px;height:30px;">
      </lord-icon></button>
            
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
     
      @if (session('cart'))
      <script>
      Toast.fire({
      icon: 'success',
      title: '{{session('cart')}}'
      })
      </script>
      @php
      session()->forget('cart');
      @endphp
      @endif
      @if (session('QtyUpdated'))
      <script>
      Toast.fire({
      icon: 'success',
      title: '{{session('QtyUpdated')}}'
      })
      </script>
      @php
      session()->forget('QtyUpdated');
      @endphp
      @endif
      {{-- @if (session('addedToCart'))
      <script>
           Swal.fire({
            title: 'Hello!',
            text: '{{session('addedToCart')}}',
            icon: 'success',
            confirmButtonText: 'OK'
    });
      </script>
    @php
    session()->forget('addedToCart');
    @endphp
@endif --}}
      
    </section>
 

@include('footermain')

<script>

function fetcchCart(cartvalue) {
                var controller = "/CartVieww/";
                var host = location.origin + controller;
                var url = location.origin + controller + cartvalue;
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