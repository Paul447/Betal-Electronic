@extends('admin.index')
@section('view_banners')
  
    <style>
        svg {
            height: 20px;
            width: 20px;
        }

    </style>
    </head>

    <body>
 
        <div class="container cont  d-flex justify-content-center align-content-center" style="margin-top: 85px;" id="tabul">
            <div class="table-responsive w-100">
                <h2 class=" text-uppercase  text-center" style="font-family:Times New Roman, Times, serif">Banner Images
                </h2>
                <table class="table table-striped table-fixed order-table">
                    <thead>
                        <tr class="">
                            <th>S.N</th>
                            <th>Image</th>
                            <th>Image Alt Text</th>
                            <th>Meta Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $banner)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <td class="justify-content-center d-flex">
                                    <img id="imagePreview" src="{{asset('storage/banner/'.$banner->banner_img) }}" alt="{{ $banner->image_alt_text }}">
                                </td>
                                <td>{{ $banner->image_alt_text }}</td>
                                <td>{{ $banner->meta_description }}</td>
                                <td>
                                    <a class="btn btn-primary text-white" href='{{ "/admin/banner/$banner->id/edit" }}'
                                        style="text-decoration:none; width: 5rem; margin: 0.125rem;" role="button"> Edit
                                    </a>

                                    <form action="{{ url('/admin/banner/' . $banner->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn-danger btn delete_btn" value="Delete" type="submit"
                                            style="text-decoration:none;  width: 5rem; margin: 0.125rem;"
                                            onclick="return confirm('Are you sure want to delete?')">
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{$data->links()}}    </div>
            </div>
        </div>

    </body>

    </html>
@endsection
