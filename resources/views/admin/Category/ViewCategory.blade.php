@extends('admin.index')
@section('viewcategory')
      <!-- Striped Rows -->
      <div class="container  " style="margin-top: 85px;" id="tabul">
        <!-- <div class="container mt-3"> -->
        <div class="table-wrapper-scroll-y my-custom-scrollbar shadow-lg p-5  mb-5  rounded">
          <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Category Detail Table</h2>
          <table class="table   table-striped table-hover   border border-dark border-3">
            <thead>
              <tr class="p-3 mb-5 rounded border  border-dark border-3">
                <th>S.N</th>
                <th>Category Name</th>
                <th>Parent Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($data as $cat )

                  <tr>
                    <td>{{$cat->categorys_id}}</td>
                    <td>{{$cat->category_name}}</td>
                      @if(sizeof($cat->ds))

                      @foreach ($cat->ds as $value)
                          <td>{{$value->category_name}}</td>


                      @endforeach
                      @else
                      <td>No Parent</td>
                      @endif

                    <td>
                      <a class="btn btn-primary text-white" href="{{"/admin/category/$cat->categorys_id/edit"}}" style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a>
                      <form action="{{route('category.destroy',$cat->categorys_id)}}" method="post">
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
