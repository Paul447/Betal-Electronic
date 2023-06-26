@extends('admin.index')
@section('addbrand')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <style>
        .card-header {
            background: #440474;
        }
    </style>
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
                        @if (Route::currentRouteName() == 'brand.edit')
                            <input type="hidden" name="previousFile" value="{{ $data->brand_image }}">
                            <div class="mb-3">
                                <img width="100%" style="border:1px solid rgb(135, 135, 135); border-radius: 4px"
                                    id="imagePreview" src="{{ asset('/storage/brands/' . $data->brand_image) }}">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="BrandFile" name="Brandfile"
                            @if (Route::currentRouteName() != 'brand.edit') {{ 'required' }} @endif />
                        <p class="text-danger">
                            <strong class="text-warning">Warning</strong> : Image size must be
                            less the 2MB
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">
                            Brand Discription</label>
                        <textarea id="branddiscription" name="brand_discription" class="form-control" cols="30" rows="5" required
                            autocomplete="off">
@if (Route::currentRouteName() == 'brand.edit')
{{ $data->brand_discription }}
@endif
</textarea>
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
        <script>
            let imageInput = document.getElementById("BrandFile");
            const img = document.querySelector('#imagePreview');
            imageInput.addEventListener("change", function() {
                img.style.display = "block";
                const choosedFile = this.files[0];
                if (choosedFile) {
                    const reader = new FileReader(); //FileReader is a predefined function of JS
                    reader.addEventListener('load', function() {
                        img.setAttribute('src', reader
                            .result);
                    });
                    reader.readAsDataURL(choosedFile);
                }
            })
        </script>
    </body>

    </html>
@endsection
