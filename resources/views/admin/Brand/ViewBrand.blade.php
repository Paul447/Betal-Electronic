@extends('admin.index')
@section('viewbrand')
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script> -->

    </head>

    <body>
        <!-- Striped Rows -->
        <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;"
            id="tabul">
            <div class="table-responsive w-100">
                <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Brand Detail Table
                </h2>
                <table class="table table-striped table-fixed order-table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Brand Name</th>
                            <th>Brand URL</th>
                            <th>Brand Description</th>


                            @if (Auth::guard()->user()->role == 'Admin')
                                <th>Added By</th>
                                {{-- <th>Approved By</th>
                                <th>Updated By</th>
                                <th>Update Approved By</th> --}}
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $brand)
                            <tr>
                                <td> {{ $brand->brands_id }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->url }}</td>
                                <td>{{ $brand->brand_discription }}</td>

                                @if (Auth::guard()->user()->role == 'Admin')
                                    {{-- <td>{{$data->user_name}}</td> --}}
                                    {{-- @if (sizeof($data->ds))
                                    @foreach ($data->ds as $value)


                                    <td>
                                        <a href="{{url('/admin/editor/'.$value->id.'/viewadmin')}}">
                                        {{$value->user_name}}
                                    </a>
                                    </td>


                                @endforeach
                                @endif --}}

                                    <td>
                                        <a href="{{ url('/admin/editor/' . $brand->id . '/viewadmin') }}">
                                            {{ $brand->user_name }}
                                        </a>
                                    </td>
                                    {{-- <th>Approved By</th>
                                    <th>Updated By</th>
                                    <th>Update Approved By</th> --}}
                                @endif
                                <td>
                                    <a class="btn btn-primary text-white" href="{{ "/admin/brand/$brand->brands_id/edit" }}"
                                        style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit
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
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
