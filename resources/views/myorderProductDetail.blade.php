<script>
    document.title = "Betal International | Order Detail"
</script>

@include('welcome')
<div class="container cont d-flex justify-content-center align-content-center ">
    <div class="table-responsive w-100">
        @php
            
            $var = 0;
        @endphp
        <h2 class="feture mx-auto  mt-5 mb-5 "> Cart Item</h2>
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th scope="col" class="fixed-column">Sn.</th>
                    <th scope="col" class="fixed-column"> Customer ID </th>
                    <th scope="col">Product Name</th>
                    <th scope="col"> Quantity </th>
                    <th scope="col">Product Price</th>
                    <th scope="col"> Total</th>
                    <th scope="col"> Payment Status</th>
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
@include('footermain')