@extends('admin.index')
@section('calculation')
{{-- <script src="/socket.io/socket.io.js"></script> --}}
@php 
$pending = DB::table('deliverys')->where('status', '=','pending')->count();
$delivered = DB::table('deliverys')->where('status', '=', 'delivered')->count();

@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.1/socket.io.js" integrity="sha512-xbQU0+iHqhVt7VIXi6vBJKPh3IQBF5B84sSHdjKiSccyX/1ZI7Vnkt2/8y8uruj63/DVmCxfUNohPNruthTEQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-fluid px-4">
    <div id="data-container"></div>
    <div class="container d-flex align-items-center justify-content-center"> 
       
        @foreach($batchname as $batch)
        <div class="col-md-3 mx-5 " style="padding-top: 250px;">

            <a href="viewAllProductProfit/{{$batch->batch_id}}" style="text-decoration:none;">

            <div class="p-3 hello shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">
                        Rs.{{$profit = $profitsByBatch[$batch->batch_id]}}
                    </h3>
                    <p class="fs-5">{{$batch->batch_name}}</p>
                </div>
                <i class="fas fa-eye fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </a>
        </div>
        @endforeach

    </div>
  </div>
  <script>

  </script>
  @endsection