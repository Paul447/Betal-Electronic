@extends('admin.index')
@section('calculation')
    @php
        $pending = DB::table('deliverys')
            ->where('status', '=', 'pending')
            ->count();
        $delivered = DB::table('deliverys')
            ->where('status', '=', 'delivered')
            ->count();
        
    @endphp

    <div class="container-fluid px-4">
        <div id="data-container"></div>
        <div class="container d-flex align-items-center justify-content-center">

            @foreach ($batchname as $batch)
                <div class="col-md-3 mx-5 " style="padding-top: 250px;">

                    <a href="viewAllProductProfit/{{ $batch->batch_id }}" style="text-decoration:none;">

                        <div class="p-3 hello shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    Rs.{{ $profit = $profitsByBatch[$batch->batch_id] }}
                                </h3>
                                <p class="fs-5">{{ $batch->batch_name }}</p>
                            </div>
                            <i class="fas fa-eye fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    <script></script>
@endsection
