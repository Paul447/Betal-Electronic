@include('welcome')
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
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
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    h3 {
      font-size: 1.4rem;
      font-weight: 800;
    }
    .section-p1 {
      padding: 40px 80px;
    }
    @media (max-width: 799px) {
      .section-p1 {
        padding: 40px 40px;
      }
    }

    @media (max-width: 477px) {
      .section-p1 {
        padding: 20px;
      }
    }
    #cart {
      overflow-x: auto;
    }
    #cart table {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed;
      white-space: nowrap;
    }
    #cart table img {
      width: 70px;
    }
    #cart table td:nth-child(1) {
      width: 100px;
      text-align: center;
    }
    #cart table td:nth-child(3) {
      width: 250px;
      text-align: center;
    }
    #cart table td:nth-child(2),
    #cart table td:nth-child(4),
    #cart table td:nth-child(5),
    #cart table td:nth-child(6) {
      width: 150px;
      text-align: center;
    }
    #cart table td:nth-child(5) input {
      width: 70px;
      padding: 10px 5px 10px 15px;
    }
    #cart table thead {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      border: 1px solid #e2e9e1;
      border-left: none;
      border-right: none;
    }
    #cart table thead td {
      font-weight: 700;
      text-transform: uppercase;
      font-size: 13px;
      padding: 18px 0;
    }
    #cart table tbody tr {
      transition: 0.4s ease;
    }
    #cart table tbody td {
      padding-top: 15px;
    }
    #cart table tbody td i.delete {
      cursor: pointer;
    }
    #cart-add {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    #subTotal h3 {
      padding-bottom: 15px;
    }

    #subTotal button {
      float: right;
      background-color: #440474;
      color: #fff;
      padding: 12px 20px;
    }
    #subTotal {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      width: 100%;
      margin-bottom: 30px;
      border: 1px solid #e2e9e1;
      padding: 30px;
    }
    #subTotal table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }
    #subTotal table td {
      width: 50px;
      border: 1px solid #e2e9e1;
      padding: 10px;
      font-size: 13px;
    }
    button.normal {
      font-size: 14px;
      font-weight: 600;
      padding: 15px 30px;
      color: black;
      background-color: #fff;
      border-radius: 4px;
      cursor: pointer;
      border: none;
      outline: none;
      transition: 0.2s;
    }

    @media (max-width: 992px) {
       .rowww{
        margin-top: 96px;
      }
    }
    @media (min-width: 992px) {
      .rowww{
        margin-top: 168px;
      }

    }
    @media (max-width: 400px) {
      .rowww{
        margin-top: 76px;
      }


    }
  </style>

    <section id="cart" class="section-p1 rowww">
      <table width="100%">
        <thead>
          <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product</td>
            <td>Price</td>
            <td>Qty</td>
            <td >SubTotal</td>
            <td class="d-flex justify-content-center">Check To Buy</td>
          </tr>
        </thead>
        <tbody id="cartItems">
@foreach ($productIddata as $cartData)
        <tr>

        <td><button onclick="deleteRecord({{$cartData->id}})" class="btn btn-danger"><span class="bi bi-trash" style="font-size: 15px;"></span></button></td>
        <form id="delete-form-{{ $cartData->id }}" action="{{ url('/cart', $cartData->id)}}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
      </form>
        <td><img src="{{ asset('/storage/thumbnails/' . $cartData->thumbnail) }}" alt=""></td>
        <td style="overflow: auto">{{$cartData->product_name}}</td>

        <td class="d-flex justify-content-center align-item-center mt-4">
          @php
          $hello = DB::table('add_product_batches')
          ->where('product', $cartData->product_id)->whereNotNull('availablequantity')
                ->where('availablequantity', '<>', 0)
          ->orderBy('batchid', 'asc')->limit(1)->pluck('sellingprice')->first();
                $val = "Out Of Stock";   
        
        
        @endphp
        @if(is_null($hello))
        {{$val}}
        @else
        Rs.{{$hello}}
        @endif

        </td>
        <td>
          <div class="d-flex flex-row justify-content-center">
            <button
              class="cart_dec btn btn-link px-2"
              name = "{{$cartData->product_id}}"
              onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
            >
              <i class="fas fa-minus"></i>
            </button>
            @php
              $hello = DB::table('add_product_batches')
              ->where('product', $cartData->product_id)->whereNotNull('availablequantity')
                    ->where('availablequantity', '<>', 0)
              ->orderBy('batchid', 'asc')->limit(1)->pluck('availablequantity')->first();
                     
             @endphp
            <input
              id="CartDataValue"
              type="number"
              min="1"
              max="{{$hello}}"
              name="{{$cartData->product_name}}"
              value="{{$cartData->quantity}}"
              type="number"
              class="itemQty form-control form-control-sm"
              style="width: 50px"
              disabled
            />

            <button
              class="cart_inc btn btn-link px-2"
              name ="{{$cartData->product_id}}"
              onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
              
            >
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </td>
  
        <td class="d-flex justify-content-center">
          @php

    

  $hello = DB::table('add_product_batches')
  ->where('product', $cartData->product_id)->whereNotNull('availablequantity')
        ->where('availablequantity', '<>', 0)
  ->orderBy('batchid', 'asc')->limit(1)->pluck('sellingprice')->first();
        $val = "Out Of Stock";   

        $total = $hello * $cartData->quantity;
          echo "Rs.". " ".$total;
@endphp        
        </td>
        <td>
          <div class="form-check d-flex justify-content-center">
            <input class="form-check-input" type="checkbox" value="{{$total}},{{$cartData->product_id}},{{$cartData->quantity}},{{$cartData->product_name}}" id="flexCheckDefault">
          </div>
        </td>
      </tr>
        
        @endforeach
</tbody>
      </table>
    </section>
    <div class="container w-100">
<div class="row justify-content-center mb-4">

  <div class="col col-md-4 col-md-mx-4 order-md-2 mb-4 prodetail h-50">
    <section id="cart-add" class="section-p1">
      <div id="subTotal">
        <h3>Cart Totals</h3>
        <table id="table2">
          <tbody>
            <tr>
              <td>Cart SubTotal
              </td>
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
        {{-- <form action="/check" method="POST">
          @csrf
          <input type="hidden" name="selectedValues" id="selectedValuesInput">
       
        </form> --}}
      </div>
    </section>
  </div>
  <div class="col-md-7 order-md-1 mine me-2">
    <h4 class="mb-3 mt-3 fw-bold">Shipping Details</h4>
    <form class="needs-validation" method="post"  id="myForm" action="{{'/confirm'}}"> 
      @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName"
            ><i class="fa fa-user"></i>&nbsp;Full Name</label>
          
          <input type="hidden" name="selectedProductId" id="selectedValuesInput">
          <input type="hidden" name="selectedCart" id="selectedCartQty">
          <input type="hidden" name="totalCartData" id="ttlAmount">
          <input type="hidden" name="pname" id="productName">
          <input
            type="text"
            class="form-control mt-2"
            id="firstName"
            placeholder="Enter your Full Name"
            value=""
            name="name"
            required
            pattern="[A-Z].[A-Z a-z]+"
            title="Name must be in only charater,First Letter Must be Capital"
          />
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <label for="address"
            ><i class="fa fa-institution"></i> &nbsp;Address</label
          >
          <input
            type="text"
            class="form-control mt-2"
            id="address"
            required=""
            name="address"
            placeholder="Enter Primary Address..."
          />
        </div>

        <div class="col-md-6 mb-3">
          <label for="phone"
            ><i class="fa fa-phone"></i> &nbsp;Phone Number</label
          >
          <input
            type="number"
            class="form-control mt-2"
            id="address"
            required=""
            name="phone"
            placeholder="Enter Phone Number..."
          />
        </div>
        <div class="col-md-6 mb-3">
          <label for="phone">Zip Code</label>

          <input
            type="text"
            class="form-control mt-2"
            id="zip"
            name="zipcode"
            placeholder="Zip Code..."
            required=""
          />
        </div>
      </div>

      <hr class="mb-2" />
      <div class="col ">
      <button class="normal bg-success text-white" type="submit" onclick="myfunctionCheck">Proceed to checkout</button>
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
    console.log(value);
    const parts = value.split(",");
    const total = parseInt(parts[0], 10);
    const productId = parseInt(parts[1], 10);
    const cartQty = parseInt(parts[2],10);
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
        selectedCartValue.splice(index,1);
        producttName.splice(index,1);
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

 function myfunctionCheck(){
const myForm = document.getElementById('myForm');
myForm.submit();
}
      const cartIncBtn = document.querySelectorAll(".cart_inc");
      const cartDecBtn =  document.querySelectorAll(".cart_dec");
      const inputValue = document.querySelectorAll(".itemQty");
      cartIncBtn.forEach((btnInc , i)=>{
      btnInc.addEventListener("click", (e) => {
              e.preventDefault()
              var productId = btnInc.getAttribute("name");
              var inpvalue = 1;
              const datavalue = [];
              datavalue[0]=inpvalue;
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
                        let html = response.changedQty; 
                        Toast.fire({
                          icon: 'info',
                          title: html,
                        }) 
                      }) 
                    setTimeout(function() {
                    location.reload();
                  }, 1000);        
            }
            )
      });
      cartDecBtn.forEach((btnInc , i)=>{
      btnInc.addEventListener("click", (e) => {
              e.preventDefault()
              var productId = btnInc.getAttribute("name");
              var inpvalue = -1;
              const datavalue = [];
              datavalue[0]=inpvalue;
              datavalue[1] = productId;
              var controller = "/CheckOutDetail/";
              var url = location.origin + controller + datavalue;
              fetch(url, {
                                    method: 'GET',
                                    headers: {
                                      'Accept': 'application/json',
                                    },
                                    // body: JSON.stringify(data)
                      })
                      .then(response => response.json())
                      .then(response => {
                        let html = response.changedQty; 
                        Toast.fire({
                          icon: 'info',
                          title: html,
                        }) 
                      }) 
                    setTimeout(function() {
                    location.reload();
                  }, 1000);   
            }
            )
      });

     

 function fetchData(pdetailValue){
  var controller = "/CartViewww/";
  var x = document.getElementById("CartDataValue").value;
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
    @if(session('SuccessfullyPaid'))
    <script>
      Swal.fire({
        icon: 'success',
        title: '{{session('SuccessfullyPaid')}}',
      })
    </script>
    @php 
    session()->forget('SuccessfullyPaid');
    @endphp
    @endif


    @if(session('UnsuccessfullyPaid'))
    <script>
      Swal.fire({
        icon: 'error',
        title: '{{session('UnsuccessfullyPaid')}}',
      })
    </script>
    @php 
    session()->forget('UnsuccessfullyPaid');
    @endphp
    @endif


    @if (session('DeletedItem'))
    <script>
    Toast.fire({
    icon: 'success',
    title: '{{session('DeletedItem')}}'
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
    
    @include('footermain')
