@if (!empty($brand))
    @extends('admin.index')
    @section('viewbrand')
        <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script> -->
        <style>
            svg {
                height: 20px;
                width: 20px;
            }
        </style>
        </head>

        <body>
            <!-- Striped Rows -->
            <div class="container  " style="margin-top: 125px;" id="tabul">
                @if (sizeof($brand)>0)


                <!-- <div class="container mt-3"> -->
                <input type="button" value="brand" id="showbrand">

                <div class="table-responsive shadow-lg p-5 mb-5  rounded" id="showbranddata">
                    <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Brand Detail
                        Table
                    </h2>
                    <table class="table   table-striped table-hover   border border-dark border-3">
                        <thead>
                            <tr class="p-3 mb-5 rounded border  border-dark border-3">
                                <th>S.N</th>
                                <th>Brand Name</th>
                                <th>Brand URL</th>
                                <th>Brand Description</th>



                                <th>Added By</th>
                                @foreach ($brand as $status)
                                    @if ($status->updatestatus == 'pending')
                                        <th>Approved By</th>
                                        <th>Updatedby</th>
                                    @endif
                                @endforeach




                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $brand)
                                <tr>
                                    <td> {{ $brand->brands_id }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->url }}</td>
                                    <td>{{ $brand->brand_discription }}</td>

                                    <td>{{ $brand->user_name }}</td>
                                    @if ($brand->updatestatus == 'pending')
                                        <th>Approved By</th>
                                        <th>Updatedby</th>
                                    @endif



                                    <td>
                                        <a class="btn btn-primary text-white"
                                            href="{{ "/admin/brand/$brand->brands_id/edit" }}"
                                            style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button">
                                            Approve
                                        </a>
                                        <form action="{{ route('brand.destroy', $brand->brands_id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn delete_btn" value="" class="text-white"
                                                style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Delete
                                            </button>&nbsp;
                                        </form>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <div>

                            </div>
                        </tbody>
                    </table>
                </div>

                <script>


                    $(document).ready(function() {
                        $(showbrand).click(function() {
                            $('#showbranddata').hide('slow');
                        });
                        $(showbrand).dblclick(function() {
                            $('#showbranddata').show('slow');
                        });
                    });
                </script>
                @endif
            {{-- category --}}
                    @if (sizeof($category))



                <input type="button" value="category" id="showcategory">
                <div class="table-responsive shadow-lg p-5  mb-5  rounded" id="showcategorydata">
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

                         @foreach ($category as $cat )

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
                  <script>
                  $(document).ready(function() {
                    $(showcategory).click(function() {
                        $('#showcategorydata').hide('slow');
                    });
                    $(showcategory).dblclick(function() {
                        $('#showcategorydata').show('slow');
                    });
                });
            </script>
 @endif
            </div>



        </body>

        </html>
    @endsection

@endif
