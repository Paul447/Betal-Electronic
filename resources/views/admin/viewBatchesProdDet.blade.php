@extends('admin.index')
@section('viewBatchesProdDet')
<style>

</style>
    <!-- Striped Rows -->
    <div class="container  " style="margin-top: 85px;" id="tabul">
        <!-- <div class="container mt-3"> -->
        <div class="table-wrapper-scroll-y my-custom-scrollbar shadow-lg p-5 mb-5  rounded">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Batch Product Revenue Table
            </h2>
            <input type="text" class="table-filter" data-table="order-table" placeholder="Item to filter.." />
            <table class="table   table-striped table-hover   border border-dark border-3 order-table table">
                <thead>
                    <tr class="p-3 mb-5 rounded border  border-dark border-3">
                        <th>S.N</th>
                        <th>Product Name</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>Availabe Quantity</th>
                        <th>SoldQuantity</th>
                        <th>Profit</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $i=1;
                    @endphp
                    @foreach($data as $datum )
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$datum->product_name}}</td>
                            <td>
                                {{$datum->costprice}}
                            </td>

                            <td>
                                {{$datum->sellingprice}}

                            
                            </td>
                            <td>{{$datum->availablequantity}}</td>
                            <td>{{$datum->soldquantity}}</td>
                            <td>{{$datum->profit}}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                   
                </tbody>
            </table>
        </div>
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

 
  
 TableFilter.init(); 
})();
    </script>
@endsection
