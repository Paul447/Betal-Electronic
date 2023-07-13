<script>
    document.title = "Betal International | Confirm Buy"
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
                        <th>Unit Price</th>
                    </tr>


                    <tr>
                        <td>1</td>
                        <td>{{ $data['product_name'] }}</td>
                        <td>{{ $data['quantity'] }}</td>
                        <td>{{ $data['price'] }}</td>
                    </tr>

                </table>
            </li>
            <li><strong>Total Price: </strong>{{ $data['total'] }}</li>
            <li><strong>Payment Method: </strong> Cash on Delivery</li>

            @php
                $mypoitivereq = 124421;
                $myxyz = 12;
            @endphp
            <button class="confirm-button mt-2 normal" onclick="payConfirmSingle({{ $mypoitivereq }})">Confirm</button>
            <button class="confirm-button mt-2 normal" onclick="cancelOrderSingle({{ $myxyz }})">Cancel
                Order</button>
            <form id="confirm-form-single-{{ $mypoitivereq }}" action="{{ url('/buy/confirm', $mypoitivereq) }}" method="POST"
                style="display: none;">
                @csrf
            </form>
            <form id="cancel-order-single-{{ $myxyz }}" action="{{ url('/buy/confirm', $myxyz) }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>
<script>
     function payConfirmSingle(id) {
        Swal.fire({
            title: 'Place Order',
            text: "Order Will Be Placed To The Mention Address in Shipping Detail!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#a3dd82',
            cancelButtonColor: '#d33',
            cancelButtonText: "No, cancel!",
            confirmButtonText: 'Confirm Order'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('confirm-form-single-' + id).submit();
            }
        })
    }

    function cancelOrderSingle(id) {
        Swal.fire({
            title: 'Cancel Order',
            text: "Are You Sure Want to Cancel Order!!",
            icon: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Cancel Order'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('cancel-order-single-' + id).submit();
            }
        })
    }
</script>
@include('footermain')
