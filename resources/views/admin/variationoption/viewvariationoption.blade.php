@extends('admin.index')
@section('viewvariationoption')
    <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;" id="tabul">
        <div class="table-responsive w-100">
            <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Varition Option Table
            </h2>
            <table class="table table-striped table-fixed order-table">
                <thead>
                    <tr class="">
                        <th>S.N</th>
                        <th>Varition Name</th>
                        <th>Varition Value</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $value->variationoption_id }}</td>
                            <td>{{ $value->variation_name }}</td>
                            <td>{{ $value->value }}</td>
                            <td>
                                <a class="btn btn-primary text-white"
                                    href="{{ "/admin/variationoption/$value->variationoption_id/edit" }}"
                                    style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit </a>
                                <form action="{{ route('variationoption.destroy', $value->variationoption_id) }}"
                                    method="post">
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
            <div class="d-flex justify-content-center">{{ $data->links() }}</div>
        </div>
    </div>

    </body>

    </html>
@endsection
