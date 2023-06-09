@extends('admin.index')
@section('viewproduct')
    <style>
    </style>
    <!-- Striped Rows -->
    <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;" id="tabul">
        <!-- <div class="container mt-3"> -->
        <div class="table-responsive w-100">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Product Detail Table
            </h2>
            <input type="text" class="table-filter" data-table="order-table" placeholder="Item to filter.." />
            <table class="table table-striped table-fixed order-table">
                <thead>
                    <tr>

                        <th scope="col" class="fixed-column">S.N</th>
                        <th scope="col" class="fixed-column">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Brand Name</th>
                        {{-- <th>Added By</th> --}}
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)
                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                @php
                                    $price = DB::table('add_product_batches')
                                        ->where('product', $product->product_id)
                                        ->first();
                                    $xy = $price->availablequantity;
                                    
                                    $hello = DB::table('add_product_batches')
                                        ->where('product', $product->product_id)
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
                                @php
                                    
                                    $image = DB::table('productimages')
                                        ->where('product_id', $product->product_id)
                                        ->first();
                                    $images = explode('|', $image->image);
                                @endphp
                                @foreach ($images as $item)
                                    {{-- @php
                          echo $item;
                        @endphp --}}

                                    <img src="{{ asset('/storage/product/' . $item) }}" alt="" height="50px"
                                        width="50px">
                                @endforeach
                            </td>
                            <td>{{ $product->status }}</td>
                            <td><img src="{{ asset('/storage/thumbnails/' . $product->thumbnail) }}" height="50px"
                                    width="50px"></td>
                            <td>{{ $product->brand_name }}</td>
                            @php
                                
                            @endphp
                            {{-- @if (Auth::guard()->user()->role == 'Admin')
                                <td>
                                    <a href="{{ url('/admin/editor/' . $product->id . '/viewadmin') }}">
                                        {{ $product->user_name }}
                                    </a>
                                </td>
                            @endif --}}
                            <td>
                                @php
                                    $category = DB::table('productcategories')
                                        ->where('product_id', $product->product_id)
                                        ->join('categories', 'category_id', '=', 'categorys_id')
                                        ->get();
                                    
                                @endphp
                                @foreach ($category as $cat)
                                    {{ $cat->category_name }}
                                    <br>
                                @endforeach
                            </td>

                            <td>
                                <a class="btn btn-primary text-white" href="{{ url('/admin/product') . '/' .  $product->product_id . '/edit' }}"
                                    style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a>

                                @if ($product->is_disabled)
                                    <a class="btn-primary btn delete_btn"
                                        href="{{ '/admin/product/enable/' . $product->product_id }}" class="text-white"
                                        style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Enable </a>&nbsp;
                                @else
                                    <a class="btn-danger btn delete_btn"
                                        href="{{ '/admin/product/disable/' . $product->product_id }}" class="text-white"
                                        style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Disable </a>&nbsp;
                                @endif

                                @if ($product->featured == 'unfeatured')
                                    <a
                                        href="/admin/product/feature/{{ $product->product_id }}"class="btn btn-success mb-1">
                                        Featured</a>&nbsp;
                                @endif
                                @if ($product->featured == 'featured')
                                    <a href="/admin/product/unfeature/{{ $product->product_id }}"
                                        class="btn btn-warning">UnFeatured</a>
                                @endif


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
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
