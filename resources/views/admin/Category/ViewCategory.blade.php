@extends('admin.index')
@section('viewcategory')
    <!-- Striped Rows -->
    <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;" id="tabul">
        <div class="table-responsive w-100">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Category Detail Table
            </h2>
            <table class="table table-striped table-fixed order-table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Parent Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $cat)
                        <tr>
                            <td>{{ $cat->categorys_id }}</td>
                            <td>{{ $cat->category_name }}</td>
                            <td><img src="{{ asset('/storage/categorythumbnail/' . $cat->categorythumbnail) }}" height="50px"
                              width="50px"></td>
                            @if (sizeof($cat->ds))
                                @foreach ($cat->ds as $value)
                                    <td>{{ $value->category_name }}</td>
                                @endforeach
                            @else
                                <td>No Parent</td>
                            @endif

                            <td>
                                <a class="btn btn-primary text-white" href="{{ "/admin/category/$cat->categorys_id/edit" }}"
                                    style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a>

                                @if ($cat->is_visible)
                                    <a class="btn-warning btn delete_btn"
                                        href="{{ '/admin/category/visible/' . $cat->categorys_id }}" class="text-white"
                                        style="text-decoration:none;  width: 5rem; margin: 0.125rem;">Hide</a>&nbsp;
                                @else
                                    <a class="btn-primary btn delete_btn"
                                        href="{{ '/admin/category/invisible/' . $cat->categorys_id }}" class="text-white"
                                        style="text-decoration:none;  width: 5rem; margin: 0.125rem;">Show</a>&nbsp;
                                @endif
                                <form action="{{ route('category.destroy', $cat->categorys_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger btn delete_btn" value="" class="text-white"
                                        style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Delete
                                    </button>&nbsp;
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$data->links() }}
            </div>
        </div>
    </div>

    </body>

    </html>
@endsection
