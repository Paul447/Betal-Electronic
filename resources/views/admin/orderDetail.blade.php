@extends('admin.index')
@section('viewOrderDetail')

@php 
$pending = DB::table('deliverys')->where('status', '=','pending')->count();
$delivered = DB::table('deliverys')->where('status', '=', 'delivered')->count();

@endphp

<div class="container-fluid px-4">
    <div id="data-container"></div>
    <div class="container d-flex align-items-center justify-content-center"> 
        <div class="col-md-3 " style="padding-top: 250px;">
            <a href="{{'pendingOrder'}}"  style="text-decoration:none;">
            <div class="p-3 hello shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$pending}}</h3>
                    <p class="fs-5">Delivery Pending</p>
                </div>
                <i class="fas fa-truck fa-spin fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </a>
        </div> 
        
        <div class="col-md-3 mx-5 " style="padding-top: 250px;">
            <a href="{{'completeOrder'}}" style="text-decoration:none;">
            <div class="p-3 hello shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$delivered}}</h3>
                    <p class="fs-5">Delivery Complete</p>
                </div>
                <i class="fas fa-check  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </a>
        </div> 

    </div>
  </div>

  @endsection