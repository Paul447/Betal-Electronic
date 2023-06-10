@extends('admin.index')
@section('orderProDetView')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Table </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
    <link rel="stylesheet" href="style.css">
    
</head>
<style>
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}

body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
  
}
.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}
.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}
.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}
.status.pending {
    background-color: #ebc474;
}
</style>
<body>
    <div class="container">
       <div class="left">
        <h1>
            Order Details
        </h1>
        @php 
   
        $var = 0; 
        @endphp
        <div class="ordertable w-50">
            <table>
                <tr><th scope="col" rowspan="2">Order ID</th></tr>
                @foreach($orderProDet as $dta)
                @php
                $time = $dta->created_at;
                @endphp
                @endforeach
                <td>{{$time}}</td>
                <tr><th scope="col" rowspan="2">Payment Details</th></tr>
                <td>Online Payment</td>
                <tr><th scope="col" rowspan="2">Total Price</th></tr>
                @foreach($orderProDet as $dta)
                @php
                $var += $dta->price; 
                @endphp
                @endforeach
                <td>Rs.{{$var  }}</td>
            </table>
        </div>
       </div>
    <div class="right">
        <h1>Customer Details</h1>
        <div class="customertable w-50">
            <table>
                <tr><th scope="col" rowspan="2">Customer Name</th></tr>
                @php
                  $myname = DB::table('orders')
                            ->where('created_at','=',$varr)
                            ->pluck('customer')
                            ->first();
              
                $customername = DB::table('users')->where('id','=',$myname)->pluck('user_name')->first();
                @endphp
                <td>{{$customername}}</td>
                <tr><th scope="col" rowspan="2">Contact Number</th></tr>
                <td>{{$phone}}</td>
                <tr><th scope="col" rowspan="2">Address</th></tr>
                <td>{{$addrr}}</td>
                <tr><th scope="col" rowspan="2">Delivary Location</th></tr>
            
                <td>{{$addrr}}</td>
            </table>
        </div>
    </div> 
    <h1>
        Order Summary
    </h1>

    <table>
        <thead>
          <tr>
            <th>Sn.</th>
            <th > Customer ID </th>
            <th>Product Name</th>
            <th> Quantity </th>
            <th>Product Price</th>
            <th> Total</th>
            <th> Payment Status</th> 
          </tr>
        </thead>
        <tbody>
          @php 
                    $i=1;
                    
                    @endphp
                    @foreach($orderProDet as $dta)
                    <tr>  
                        <td>{{$i}} </td>
                        <td>{{$dta->customer}} </td>
                       
                        <td> 
                            @php
                            $hello = DB::table('products')->where('product_id',$dta->product)->get();
                             foreach($hello as $hell){
                                 echo $hell->product_name;
                             }
                          
                            @endphp
                        </td>
                        <td> {{$dta->quantity}}</td>
                        @php
                        $price = DB::table('productprices')
                            ->where('product', $dta->product)
                            ->latest()
                            ->first();
                    @endphp
                        <td>   Rs.{{ $price->price }} </td>
                        <td> <strong> Rs.{{$dta->price}} @php
                        $var += $dta->price; 
                            
                        @endphp</strong></td>
                     
                        <td>  <p class="status delivered text-uppercase">{{$dta->paymentstatus}}</p></td>
                    </tr>
                    @php
                    $i++; 
                    @endphp
                    @endforeach
                    
        </tbody>
      </table>
    </div>
  </body>
</html>

<script>
    (function() {
	'use strict';

var TableFilter = (function() {
 var Arr = Array.prototype;
		var input;
  
		function onInputEvent(e) {
			input = e.target;
			var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
			Arr.forEach.call(table1, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, filter);
				});
			});
		}

		function filter(row) {
			var text = row.textContent.toLowerCase();
       //console.log(text);
      var val = input.value.toLowerCase();
      //console.log(val);
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = onInputEvent;
				});
			}
		};
 
	})();

  /*console.log(document.readyState);
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
      console.log(document.readyState);
			TableFilter.init();
		}
	}); */
  
 TableFilter.init(); 
})();
</script>
@endsection
