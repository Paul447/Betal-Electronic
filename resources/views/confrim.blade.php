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
            <td>{{$key+1}}</td>
            <td>{{$pname}}</td>
            <td>{{$cartquantity}}</td>
          </tr>
          @endforeach
        </table>
      </li>
      <li><strong>Total Price: </strong>{{$totalCartAmountRequest}} </li>
      <li><strong>Payment Method: </strong> Cash on Delivery</li>

      <form action="https://uat.esewa.com.np/epay/main" method="POST">
        <input value="{{$totalCartAmountRequest}}" name="tAmt" type="hidden">
        <input value="{{$totalCartAmountRequest}}" name="amt" type="hidden">
        <input value="0" name="txAmt" type="hidden">
        <input value="0" name="psc" type="hidden">
        <input value="0" name="pdc" type="hidden">
        <input value="EPAYTEST" name="scd" type="hidden">
        <input value="@php echo time(); @endphp" name="pid" type="hidden">
        <input value="{{ url('/storeorderInfo?q='. urlencode('su'))}}" type="hidden" name="su">
        <input value="{{ url('/storeorderInfo?q='. urlencode('fu'))}}" type="hidden" name="fu">
        <button class="confirm-button mt-2 normal" type="submit">Confirm</button>
      </form>
    </ul>
  </div>
</div>
@include('footermain')