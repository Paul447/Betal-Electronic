@extends('admin.index')
@section('orderProDetView')
    <style>
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


    <div class="container cont d-flex justify-content-center align-content-center ">
        <div class="table-responsive w-100">
            @php
                $var = 0;
            @endphp
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Order Summary
            </h2>
            <table class="table table-striped table-fixed">

                @php
                    
                    $var = 0;
                @endphp

                <tr>
                    <th scope="col" rowspan="2">Order ID</th>
                </tr>
                @foreach ($orderProDet as $dta)
                    @php
                        $time = $dta->created_at;
                    @endphp
                @endforeach
                <td>{{ $time }}</td>
                <tr>
                    <th scope="col" rowspan="2">Payment Details</th>
                </tr>
                <td>Online Payment</td>
                <tr>
                    <th scope="col" rowspan="2">Total Price</th>
                </tr>
                @foreach ($orderProDet as $dta)
                    @php
                        $var += $dta->price;
                    @endphp
                @endforeach
                <td>Rs.{{ $var }}</td>
            </table>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-content-center" id="tabul">
        <div class="table-responsive w-100">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Customer Detail
            </h2>
            <table class="table table-striped table-fixed order-table">

                <tr>
                    <th scope="col" rowspan="2">Customer Name</th>
                </tr>
                @php
                    $myname = DB::table('orders')
                        ->where('created_at', '=', $varr)
                        ->pluck('customer')
                        ->first();
                    
                    $customername = DB::table('users')
                        ->where('id', '=', $myname)
                        ->pluck('user_name')
                        ->first();
                @endphp
                <td>{{ $customername }}</td>
                <tr>
                    <th scope="col" rowspan="2">Contact Number</th>
                </tr>
                <td>{{ $phone }}</td>
                <tr>
                    <th scope="col" rowspan="2">Address</th>
                </tr>
                <td>{{ $addrr }}</td>
                <tr>
                    <th scope="col" rowspan="2">Delivary Location</th>
                </tr>

                <td>{{ $addrr }}</td>
            </table>
        </div>
    </div>

    <div class="container cont  d-flex justify-content-center align-content-center" 
        id="tabul">
        <div class="table-responsive w-100">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Order Detail Preview
            </h2>
            <table class="table table-striped table-fixed order-table">
                <thead>
                    <tr>
                        <th>Sn.</th>
                        <th> Customer ID </th>
                        <th>Product Name</th>
                        <th> Quantity </th>
                        <th>Product Price</th>
                        <th> Total</th>
                        <th> Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        
                    @endphp
                    @foreach ($orderProDet as $dta)
                        <tr>
                            <td>{{ $i }} </td>
                            <td>{{ $dta->customer }} </td>

                            <td>
                                @php
                                    $hello = DB::table('products')
                                        ->where('product_id', $dta->product)
                                        ->get();
                                    foreach ($hello as $hell) {
                                        echo $hell->product_name;
                                    }
                                    
                                @endphp
                            </td>
                            <td> {{ $dta->quantity }}</td>
                            @php
                                $sellprice = DB::table('add_product_batches')
                                    ->where('product', $dta->product)
                                    ->whereNotNull('availablequantity')
                                    ->where('availablequantity', '<>', 0)
                                    ->orderBy('batchid', 'asc')
                                    ->limit(1)
                                    ->pluck('sellingprice')
                                    ->first();
                                
                            @endphp
                            <td> Rs.{{ $sellprice }} </td>
                            <td> <strong> Rs.{{ $dta->price }} @php
                                $var += $dta->price;
                                
                            @endphp</strong></td>

                            <td>
                                <p class="status delivered text-uppercase">{{ $dta->paymentstatus }}</p>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
