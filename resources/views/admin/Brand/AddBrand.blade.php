@extends('admin.index')
@section('addbrand')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    
    </head>

    <body>
        <div class="row justify-content-center" id="primarypro">
            <div class="col col-md-7 card p-0 mt-4   border border-1 shadow-sm overflow-auto boxxx">
                <div class="card-header text-center text-white text-uppercase h2">{{ $title }}</div>


                <form action="{{ $url }}" method="post" class="p-4" enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <!-- Brand Name-->
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">
                            Brand Name</label>
                        <input type="text" class="form-control" id="Brandname" name="brand_name" required
                            value="
              @if (Route::currentRouteName() == 'brand.edit') {{ $data->brand_name }}
                 @else
                 {{ ' ' }} @endif
              "
                            {{-- pattern="[A-Z].[A-Z a-z]+"
              required
              title="Name must be in only character, First Letter Must be in captial"
              autocomplete="off" --}} />
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">
                            Brand URL</label>
                        <input type="text" class="form-control" id="Brandname" name="url" required
                            value="
              @if (Route::currentRouteName() == 'brand.edit') {{ $data->url }}
                 @else
                 {{ ' ' }} @endif
              "
                            {{-- pattern="[A-Z].[A-Z a-z]+"
              required
              title="Name must be in only character, First Letter Must be in captial"
              autocomplete="off" --}} />
                    </div>

                    {{-- Brand image --}}

                    <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                        <label for="formFile" class="form-label">Brand Image</label>
                        <input type="file" class="form-control" id="BrandFile" name="Brandfile" required />
                        <p class="text-danger">
                            <strong class="text-warning">Warning</strong> : Image size must be
                            less the 2MB
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">
                            Brand Discription</label>
                        <textarea id="branddiscription" name="brand_discription" class="form-control"
                            value="
        @if (Route::currentRouteName() == 'brand.edit') {{ $data->brand_discription }}
           @else
           {{ ' ' }} @endif
        "
                            cols="30" rows="5" required autocomplete="off"></textarea>
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
