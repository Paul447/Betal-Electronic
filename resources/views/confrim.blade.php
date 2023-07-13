<script>
    document.title = "Betal International | Confirm "
</script>
@include('welcome')
<div class="container confirm-order px-5 py-4 rounded">

    <div>
        <h2>
            <strong>Confirm order</strong>
        </h2>
        <ul class="mt-4">
            <li><strong>Product Info: </strong>

                <table class="confirm-order-table">
                    <tr>
                        <th>SN</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                    </tr>

                    @foreach ($selectedProductName as $key => $pname)
                        @php
                            $cartquantity = $productQuantity[$key];
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pname }}</td>
                            <td>{{ $cartquantity }}</td>
                        </tr>
                    @endforeach
                </table>
            </li>
            <li><strong>Total Price: </strong>{{ $totalCartAmountRequest }} </li>
            <li><strong>Payment Method: </strong> Cash on Delivery</li>

            @php
                $mypoitivereq = 124421;
                $myxyz = 12;
            @endphp
            <button class="confirm-button mt-2 normal" onclick="payConfirm({{ $mypoitivereq }})">Confirm</button>
            <button class="confirm-button mt-2 normal" onclick="cancelOrder({{ $myxyz }})">Cancel Order</button>
            <form id="confirm-form-{{ $mypoitivereq }}" action="{{ url('/storeorderInfo', $mypoitivereq) }}" method="POST"
                style="display: none;">
                @csrf
            </form>
            <form id="cancel-order-{{ $myxyz }}" action="{{ url('/storeorderInfo', $myxyz) }}"
                method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>

@include('footermain')
