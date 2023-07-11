@extends('admin.index')
@section('viewOrderDetailPreview')

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
    <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;"
        id="tabul">
        <div class="table-responsive w-100">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Customer Order's</h2>
            <table class="table table-striped table-fixed order-table">
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
                        $i = 1;
                    @endphp

                    @foreach ($data_val as $data)
                        <tr data-href="{{ 'orderProductDetailView' }}" data-value="{{ $data->order_id }}">
                            <td> {{ $i }}</td>
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
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
@endsection
