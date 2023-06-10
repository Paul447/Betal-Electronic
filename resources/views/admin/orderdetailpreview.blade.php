@extends('admin.index')
@section('viewOrderDetailPreview')
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

body {
    /* background-color: #e3d2ef; */
    /* min-height: 100vh; */
    display: flex;
    justify-content: center;
    align-items: center;
} 
main.table-responsive {
    /* width: 82vw; */
    /* height: 90vh; */
    background-color:#e3d2ef;
    /* border-top-left-radius:.8em !important; */
    border-radius: .8rem;
    /* overflow-x: unset; */
}
.table__header {
    width: 100%;
    height: 10%;
    background-color:#e3d2ef;
    padding: .8rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: .2s;
}
.table__header .input-group:hover {
    width: 45%;
    background-color: #fff5;
    
}
.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}
.table responsive {
    width: auto;
    max-height: calc(89% - 1.6rem);
    background-color: #e3d2ef;
    margin: .8rem auto;
    border-radius: .6rem;
    overflow: auto;
    overflow: overlay;
}
table {
    width: 100%;
}
table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}
thead th {
    background-color: #e3d2ef;
    text-transform: capitalize;
}
tbody tr:nth-child(even) {
    background-color: #e3d2ef;
}
tbody tr:hover {
    background-color: #fff6 ;
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
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 740px)  {

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	tbody tr:hover {
        background-color: #fff6 ;
    }
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		position: absolute;
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	td:nth-of-type(1):before { content: "Product Id"; }
	td:nth-of-type(2):before { content: "Customer"; }
	td:nth-of-type(3):before { content: "Location"; }
	td:nth-of-type(4):before { content: "Order ID"; }
	td:nth-of-type(5):before { content: "Status"; }
	td:nth-of-type(6):before { content: "Amount"; }
}
</style>
<body>
    
    <main class="table-responsive">
        <section class="table__header">
            <h1>Customer's Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="search" >
                
            </div>
        </section>
        <section class=" table-responsive">
            <div style=overflow-x:auto;>
            <table>
                <thead>
                    <tr>
                        <th>Sn.</th>
                        <th> Customer </th>
                        <th> Location </th>
                        <th> Order ID </th>
                        <th> Amount </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody>
                    <form id="submit-form" action="orderProductDetailView">
                        <input type="hidden" name="my" id="myvalueee" value="" />
                    </form>
                    @php 
                    $i=1;
                    @endphp
                     
                    @foreach ($data_val as $data)
                    <tr data-href="{{'orderProductDetailView'}}" data-value="{{$data->order_id}}">  
                        <td> {{$i}}</td>
                        <td> {{$data->customer_name}}</td>
                        <td> {{$data->location}}</td>
                        <td> {{$data->order_id}}</td>
                        <td> <strong> Rs.{{$data->amount}} </strong></td>
                        <td>
                            
                        @if($data->status == 'Pending')
                            <p class="status pending text-uppercase text-white">{{$data->status}}</p>
                        @endif

                       @if($data->status == 'delivered')
                        <p class="status delivered text-uppercase">{{$data->status}}</p>
                        @endif
                        </td>
                    </tr>
                    @php 
                    $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
        </section>
    </main>
    
</body>

<script>
var submitForm = document.getElementById('submit-form');
  var rows = document.querySelectorAll('tr[data-value]');
  rows.forEach(row => {
    row.addEventListener('click', () => {
       var myValue = row.getAttribute('data-value');
       console.log(myValue);
    //    var myValueInput = submitForm.querySelector('input[name="my_value"]');
       document.getElementById('myvalueee').value = myValue;
// console.log(hello);
    //    selectedValuesInput.value = myValue;
    //   window.location.href = row.dataset.href;


submitForm.submit();
    });
  });
</script>
</html>
@endsection