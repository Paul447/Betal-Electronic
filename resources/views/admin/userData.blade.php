@extends('admin.index')
@section('viewUsers')
<style>
    svg {
        height: 20px;
        width: 20px;
    }
</style>
</head>
<body>
    <!-- Striped Rows -->
    <div class="container  " style="margin-top: 85px;" id="tabul">
        <!-- <div class="container mt-3"> -->
        <div class="table-wrapper-scroll-y my-custom-scrollbar  shadow-lg p-5 mb-5  rounded">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">UserTable
            </h2>
            <table class="table   table-striped table-hover   border border-dark border-3">
                <thead>
                    <tr class="p-3 mb-5 rounded border  border-dark border-3">
                        <th>S.N</th>
                        <th>Editor Name</th>
                        <th>Image </th>
                        <th>Email </th>
                        <th>Contact </th>
                        <th>Address</th>
                        <th>User Id</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $z=1;
                    @endphp
                    @foreach ($data as $data)
                   
                    
                        <tr>
                            <td>{{$z}}</td>
                            <td>{{$data->user_name}}</td>
                            <td><img src="{{asset('/storage/editor/'.$data->image) }}" height="50px" width="50px"></td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->contact}}</td>
                            <td> {{$data->municipalities}} -{{$data->ward}} <br>
                                {{$data->district}}<br>
    
                                {{$data->province}}</td>
                                <td>{{$data->id}}</td>
                            <td>{{$data->role}}</td>
                   
                        </tr>
                            @php 
                             $z=$z+1;
                            @endphp
                        @endforeach
                
                    <div>

                    </div>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
@endsection