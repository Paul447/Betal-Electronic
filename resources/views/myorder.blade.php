<script>
    document.title = "Betal International | My Orders"
</script>
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
    tr.orderdetailpreview { cursor: pointer; }
</style>
@include('welcome')
<div class="container cont d-flex justify-content-center align-content-center ">
    <div class="table-responsive w-100">
        <h2 class="feture mx-auto  mt-5 mb-5 ">Your Orders</h2>
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th scope="col" class="fixed-column">Sn.</th>
                    <th scope="col" class="fixed-column"> Customer </th>
                    <th scope="col"> Location </th>
                    <th scope="col"> Order ID </th>
                    <th scope="col"> Amount </th>
                    <th scope="col"> Delivery Status </th>
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
                        <tr data-href="{{ 'orderProductDetailView' }}" data-value="{{ $data->order_id }}" class="orderdetailpreview">
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
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No Record Found</td>
                    </tr>
                @endif
            </tbody>
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
            document.getElementById('myvalueee').value = myValue;
            submitForm.submit();
        });
    });
</script>


@include('footermain')
