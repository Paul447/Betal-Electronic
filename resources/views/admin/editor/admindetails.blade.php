@extends('admin.index')
@section('viewadmin')
  <body>

      <!-- Striped Rows -->
      <div class="container  " style="margin-top: 125px;" id="tabul">
        <!-- <div class="container mt-3"> -->
        <div class="table-responsive shadow-lg p-5  mb-5  rounded">
          <h2 class=" text-uppercase  text-center mb-3" style="font-family:Times New Roman, Times, serif">Editor Table</h2>
          <table class="table   table-striped table-hover   border border-dark border-3">
            <thead>
              <tr class="p-3 mb-5 rounded border  border-dark border-3">
                <th>S.N</th>
                <th>Editor Name</th>
                <th>Image </th>
                <th>Email </th>
                <th>Contact </th>
                <th>Address</th>
                <th>CreatedBy</th>
                <th>UpdatedBy</th>
                <th>status</th>
                <th>role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                 @foreach ($data as $data)
                 <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->user_name}}</td>
                    <td><img src="{{asset('/storage/editor/'.$data->image) }}" height="200px" width="200px"></td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->contact}}</td>
                    <td>
                        {{$data->name}} -{{$data->ward}} <br>
                        {{$data->district}}<br>

                        {{$data->province}}
                    </td>
                    @if(sizeof($data->ds))
                    @foreach ($data->ds as $value)


                    <td>
                        <a href="{{url('/admin/editor/'.$value->id.'/viewadmin')}}">
                        {{$value->user_name}}
                    </a>
                    </td>


                @endforeach
                @else
                <td>System</td>
                @endif

                    <td>{{$data->updateby}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->role}}</td>
                    <td>
                      {{-- <a class="btn btn-primary text-white" href="" style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a> --}}
                      <button class="btn-danger btn delete_btn" value="" class="text-white" style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Delete </button>&nbsp;
                    </td>
                  </tr>
                 @endforeach


            </tbody>
          </table>
        </div>
      </div>

  </body>
</html>
@endsection
