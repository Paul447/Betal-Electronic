@extends('admin.index')
@section('viewvariationoption')
</head>
<body>
    <!-- Striped Rows -->
    <div class="container  " style="margin-top: 125px;" id="tabul">
      <!-- <div class="container mt-3"> -->
      <div class="table-responsive shadow-lg p-5 mb-5  rounded">
        <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Varition Option Table</h2>
        <table class="table   table-striped table-hover   border border-dark border-3">
          <thead>
            <tr class="p-3 mb-5 rounded border  border-dark border-3">
              <th>S.N</th>
              <th>Varition Name</th>
              <th>Varition Value</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($data as $value)


                <tr>
                  <td>{{$value->variationoption_id}}</td>
                  <td>{{$value->variation_name}}</td>
                  <td>{{$value->value}}</td>
                  <td>
                    <a class="btn btn-primary text-white" href="{{"/admin/variationoption/$value->variationoption_id/edit"}}" style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a>
                    <form action="{{route('variationoption.destroy',$value->variationoption_id)}}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn-danger btn delete_btn" value="" class="text-white" style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Delete </button>&nbsp;
                </form>
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
