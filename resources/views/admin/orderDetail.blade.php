@extends('admin.index')
@section('viewOrderDetail')
{{-- <script src="/socket.io/socket.io.js"></script> --}}
@php 
$pending = DB::table('deliverys')->where('status', '=','pending')->count();
$delivered = DB::table('deliverys')->where('status', '=', 'delivered')->count();

@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.1/socket.io.js" integrity="sha512-xbQU0+iHqhVt7VIXi6vBJKPh3IQBF5B84sSHdjKiSccyX/1ZI7Vnkt2/8y8uruj63/DVmCxfUNohPNruthTEQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  <script>
//     const socket = io('ws://localhost:6001');
// socket.on('connect', () => {
//     socket.emit('subscribe', {
//         channel: 'orders',
//     });
// });

// socket.on('orders', (data) => {
//     // update the HTML element with the new data
//     document.getElementById('data-container').innerHTML = data;
// });
// import WebSocket from 'websocket';

// const socket = new WebSocket('ws://localhost:6001');

// socket.addEventListener('open', (event) => {
//     console.log('WebSocket connection established');
    
//     // Send a request to connect to the private channel for the current user
//     socket.send(JSON.stringify({
//         event: 'pusher:subscribe',
//         data: {
//             channel: `private-user.${userId}`,
//             auth: {
//                 headers: {
//                     'X-CSRF-Token': csrfToken,
//                 },
//             },
//         },
//     }))
// });
  </script>
  @endsection