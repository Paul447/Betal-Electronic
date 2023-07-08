<script>
    document.title = "Betal International | My Orders"
</script>
@include('welcome')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Table </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>


</head>
<style>
    @media (max-width: 992px) {
        .rowww {
            margin-top: 150px;
        }
    }

    @media (min-width: 992px) {
        .rowww {
            margin-top: 210px;
        }

    }

    @media (max-width: 400px) {
        .rowww {
            margin-top: 78px;
        }
    }


    main.table-responsive {
        /* width: 82vw; */
        /* height: 90vh; */
        background-color: #e3d2ef;
        /* border-top-left-radius:.8em !important; */
        border-radius: .8rem;
        /* overflow-x: unset; */
    }

    .table__header {
        width: 100%;
        height: 10%;
        background-color: #e3d2ef;
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

    table,
    th,
    td {
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
        background-color: #fff6;
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

    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 740px) {


        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        tbody tr:hover {
            background-color: #fff6;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
        }

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

        td:nth-of-type(1):before {
            content: "Product Id";
        }

        td:nth-of-type(2):before {
            content: "Customer";
        }

        td:nth-of-type(3):before {
            content: "Location";
        }

        td:nth-of-type(4):before {
            content: "Order ID";
        }

        td:nth-of-type(5):before {
            content: "Status";
        }

        td:nth-of-type(6):before {
            content: "Amount";
        }
    }
</style>

<body class="rowww">

    <main class="table-responsive container">
        <section class="table__header">
            <h1>Your Orders</h1>
            <div class="input-group">
                <input type="text" class="table-filter" data-table="order-table" placeholder="Item to filter.." />
            </div>
        </section>
        <section class=" table-responsive">
            <div style=overflow-x:auto;>
                <table class="order-table">

                    <thead>
                        <tr>
                            <th>Sn.</th>
                            <th> Customer </th>
                            <th> Location </th>
                            <th> Order ID </th>
                            <th> Amount </th>
                            <th> Delivery Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <form id="submit-form" action="mydataView">
                            <input type="hidden" name="my" id="myvalueee" value="" />
                        </form>
                        @php
                            $i = 1;
                        @endphp

                        @if (isset($result))
                            @foreach ($result as $data)
                                <tr data-href="{{ 'orderProductDetailView' }}" data-value="{{ $data->order_id }}">
                                    <td>{{ $i }}</td>
                                    <td> {{ $data->customer_name }}</td>
                                    <td> {{ $data->location }}</td>
                                    <td> {{ $data->order_id }}</td>
                                    <td> <strong> Rs.{{ $data->amount }} </strong></td>
                                    <td>
                                        @if ($data->status == 'Pending')
                                            <p class="status pending text-uppercase text-white">{{ $data->status }}</p>
                                        @endif

                                        @if ($data->status == 'delivered')
                                            <p class="status delivered text-uppercase">{{ $data->status }}</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No Record Found</td>
                            </tr>
                        @endif

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
            document.getElementById('myvalueee').value = myValue;
            submitForm.submit();
        });
    });


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

</html>
{{-- @include('footermain') --}}
