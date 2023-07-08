<script>
  document.title = "Betal International | Confirm Payment"
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      width: 600px;
      margin: 0 auto;
    }

    .card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 600px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    li {
      padding-left: 190px;
      margin-bottom: 10px;
    }

    strong {
      display: inline-block;
      width: 100px;
    }

    .confirm-button {
      display: block;
      margin: 20px auto 0;
      background-color: #4CAF50;
      border: none;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .confirm-button:hover {
      background-color: #3e8e41;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <h2>Confirm Payment</h2>
      <ul>
        <li><strong>Product Name:</strong>@foreach ($selectedProductName as $key => $pname)
            @php
            $cartquantity = $productQuantity[$key]; 
            @endphp
            {{$pname}}-{{$cartquantity}}<br>
            @endforeach</li>
        <li><strong>Total Price:</strong>{{$totalCartAmountRequest}} </li>
        <li><strong>Payment Method:</strong> Esewa</li>

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
          <button class="confirm-button" type="submit">Confirm</button>
        </form>
      </ul>
    </div>
  </div>
</body>

</html>