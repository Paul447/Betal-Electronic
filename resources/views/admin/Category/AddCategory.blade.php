@extends('admin.index')
@section('addcategory')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
    <style>
        .card-header {
            background: #440474;
        }
    </style>

    <body>
        <div class="row justify-content-center" id="primarypro">
            <div class="col col-md-7 card p-0 mt-4 border border-1 shadow-sm overflow-auto boxxx">
                <div class="card-header text-center text-white text-uppercase h2">{{ $title }}</div>


                <form action="{{ $url }}" method="post" class="p-4" enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <!-- Category Name-->
                    <div class="mb-3">

                        <label for="recipient-name" class="col-form-label">Category Name</label>
                        <input type="text" class="form-control" id="Categoryname" name="category_name"
                            {{-- required
              pattern="[A-Z].[A-Z a-z]+"
              required
              title="Name must be in only character, First Letter Must be in captial" --}} autocomplete="off"
                            @if (isset($data)) value="{{ $data->category_name }}" @endif />
                        {{-- @php
               print_r(old('category_name'));
            @endphp --}}
                        <Span class="text-denger">
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </Span>

                    </div>


                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Parent Category</label>
                        <select class="form-select" name="parent" aria-label="Default select example">
                            @if (isset($data))
                                @foreach ($data->ds as $catogary)
                                    <option value="{{ $catogary->categorys_id }}">
                                        {{ $catogary->category_name }}
                                @endforeach
                            @else
                                Choose The Menu
                            @endif
                            </option>
                            <option value="0">No Parent Category</option>
                            @foreach ($cat as $category)
                                <option value="{{ $category->categorys_id }}">{{ $category->category_name }}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="col col-12  mb-3">
                        <label for="formFile" class="form-label">Product Thumbnail Image</label>
                        <input type="file" class="form-control" id="ProductFile" name="categorythumbnail"
                            accept="image/jpg,image/png" required />
                        <p class="text-danger">
                            <strong class="text-warning">Warning</strong> : Image size must be
                            less the 2MB
                        </p>
                    </div>


                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="" class="btn btn-secondary my-4 m-4" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary float-start" name="submit">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </body>

    </html>
@endsection
