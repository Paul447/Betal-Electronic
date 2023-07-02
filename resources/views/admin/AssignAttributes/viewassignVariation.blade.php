<html lang="en">
@extends('admin.index')
@section('viewassignvar')

    <body>
        <!-- Striped Rows -->
        <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;"
            id="tabul">
            <!-- <div class="container mt-3"> -->
            <div class="table-responsive w-100">
                <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Attributes Detail
                    Table
                </h2>
                <table class="table table-striped table-fixed order-table">
                    <thead>
                        <tr>
                            <th scope="col" class="fixed-column">S.N</th>
                            <th scope="col" class="fixed-column">Product Name</th>
                            <th scope="col">Variation Name</th>
                            <th scope="col">Option Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $productId => $productData)
                            <tr>
                                @foreach ($productData as $data)
                                    <td>{{ $productId }}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>
                                        @php
                                            $variations = explode(',', $data->variation_names);
                                            echo implode(', ', $variations);
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $options = explode(',', $data->option_names);
                                            echo implode(', ', $options);
                                        @endphp
                                    </td>

                                    <td>
                                        {{-- <a class="btn btn-primary text-white" href=""
                                            style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button">
                                            Edit
                                        </a> --}}
                                        <form action="{{route('assign.destroy',$productId)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn delete_btn" value="" class="text-white"
                                                style="text-decoration:none;  width: 5rem; margin: 0.125rem;"> Delete
                                            </button>&nbsp;
                                        </form>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $productData->links() !!}
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
