<html lang="en">
@extends('admin.index')
@section('viewvarition')
  <body>
      <!-- Striped Rows -->
      <div class="container  " style="margin-top: 125px;" id="tabul">
        <!-- <div class="container mt-3"> -->
        <div class="table-responsive shadow-lg p-5 mb-5  rounded">
          <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Varition Detail Table</h2>
          <table class="table   table-striped table-hover   border border-dark border-3">
            <thead>
              <tr class="p-3 mb-5 rounded border  border-dark border-3">
                <th>S.N</th>
                <th>Varition Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($data as $data)


                  <tr>
                    <td>{{$data->variation_id}}</td>
                    <td>{{$data->variation_name}}</td>
                    <td>
                      <a class="btn btn-primary text-white" href="{{"/admin/variation/$data->variation_id/edit"}}" style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a>
                      <form action="{{route('variation.destroy',$data->variation_id)}}" method="post">
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
