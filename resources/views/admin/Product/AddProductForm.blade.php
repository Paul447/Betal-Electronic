@extends('admin.index')
@section('addproduct')
    <style>
        .card-header {
            background: #440474;
        }

        .cross-button {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
            /* Ensures the button appears above the image */
        }
    </style>

    </head>

    <body>
        <div class="row justify-content-center" id="primarypro">
            <div class="col col-md-10 card p-0 mt-4 d-inline-block  border border-1 shadow-sm overflow-auto boxxx">
                <div class="card-header text-center h2 text-uppercase text-white">{{ $title }}</div>

                @if (!isset($product))
                    <p class="text-danger fs-5 text-center mx-5">!!!First add Category,Brand,Batch and assign product to
                        batches..Only after that you are alloweded to Add Product!!!</p>
                @endif

                <form action="{{ $url }}" method="post" class="p-4" enctype="multipart/form-data">
                    @csrf
                    @if (isset($product))
                        @method('PUT')
                    @endif
                    @if (isset($product))
                        <input type="hidden" name="old_images" id="old_images" value="{{ $old_images }}">
                        @foreach ($images as $item)
                            <div class="m-2 position-relative" style="display: inline-block;">
                                <img src="{{ asset('/storage/product/' . $item) }}" alt=""
                                    style="border: 1px solid rgb(135, 135, 135); border-radius: 4px;" height="120px"
                                    width="150px">
                                <div class="position-absolute top-0 end-0">
                                    <span class="btn btn-danger cross-button"
                                        onclick="removeImageContainer(this)">&times;</span>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="row mb-3 main-Wrapper" id="output">

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="Productname" name="Productname" required
                                value="@if (isset($product)) {{ $product->product_name }} @endif"
                                {{-- pattern="[A-Z].[A-Z a-z]+" --}}
                                title="Name must be in only character, First Letter Must be in captial"
                                autocomplete="off" />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="formFile" class="form-label">Product Thumbnail Image</label>
                            <input type="file" class="form-control" id="ProductFile" name="Productthumbfile"
                                accept="image/jpg,image/png" @if (!isset($product)) {{ 'required' }} @endif />
                            <p class="text-danger">
                                <strong class="text-warning">Warning</strong> : Image size must be
                                less the 2MB
                            </p>
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="ProductFile" name="Productfile[]"
                                accept="image/jpg,image/png" multiple="multiple"
                                @if (!isset($product)) {{ 'required' }} @endif />
                            <p class="text-danger">
                                <strong class="text-warning">Warning</strong> : Image size must be
                                less the 2MB
                            </p>
                        </div>

                        <div class="col col-12  mb-3">
                            <label for="recipient-name" class="col-form-label">Product Content</label>
                            <textarea id="Productcontent" name="Productcontent" class="form-control" cols="30" rows="5" required
                                autocomplete="off">
@if (isset($product))
{{ $product->discription }}
@endif
</textarea>
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Product Cost Price</label>
                            <input type="number" class="form-control" id="Productprice" name="productprice" required
                                pattern="[0-9]+" autocomplete="off" title="Only be in number"
                                @if (isset($product)) {{ "value=$price->costprice" }} {{ 'disabled' }} @endif />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Product Selling Price</label>
                            <input type="number" class="form-control" id="Productsprice" name="productsprice" required
                                pattern="[0-9]+" autocomplete="off" title="Only be in number"
                                @if (isset($product)) {{ "value=$price->sellingprice" }} {{ 'disabled' }} @endif />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Quantity</label>
                            <input type="number" class="form-control" id="Productsprice" name="qty" required
                                pattern="[0-9]+" autocomplete="off" title="Only be in number"
                                @if (isset($product)) {{ "value=$price->availablequantity" }} {{ 'disabled' }} @endif />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Select Brand</label>
                            <select class="form-select" name="Brand" aria-label="Default select example">
                                <option selected>Choose The Menu</option>
                                @foreach ($brand as $brand)
                                    <option value="{{ $brand->brands_id }}"
                                        @if (isset($product) && $product->brand == $brand->brands_id) {{ 'selected' }} @endif>
                                        {{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Meta-Data</label>
                            <input type="text" class="form-control" id="Productname" name="lowstockindication"
                                required autocomplete="off"
                                value="@if (isset($product)) {{ $product->lowstockindication }} @endif" />
                        </div>

                        @if (!isset($product))
                            <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                                <label for="recipient-name" class="col-form-label">Select Category</label>
                                <select class="form-select" name="Category[]" aria-label="Default select example"
                                    onchange="fetcchCategory(this.value);" id="category_fetched">
                                    <option selected value="">Choose The Menu</option>
                                    @foreach ($category as $category)
                                        {{-- @if (isset($product) && $product)
                                        <option value="{{ $category->categorys_id }}" {{ 'selected' }}>
                                            {{ $category->category_name }}
                                        </option>
                                        @php
                                            continue;
                                        @endphp
                                    @endif --}}
                                        <option value="{{ $category->categorys_id }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="meta_desc" class="col-form-label">Meta Description</label>
                            <input type="text" class="form-control" id="meta_desc" name="meta_desc"
                                autocomplete="off"
                                @if (isset($product)) value="{{ $product->meta_desc }}" @endif />
                            <Span class="text-danger">
                                @error('meta_desc')
                                    {{ $message }}
                                @enderror
                            </Span>
                        </div>
                    </div>


                    <div class="modal-footer">

                        <a href="{{ url('/admin/product/') }}" class="btn btn-secondary btn-md m-4"
                            role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-md float-start" name="submit">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>


        <script>
            function fetcchCategory(catvalue) {
                var controller = "/getCatValue/";
                var host = location.origin + controller;
                var url = location.origin + controller + catvalue;
                fetch(url, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(response => {
                        let html = ` <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3" id="output" ><label for="recipient-name" class="col-form-label"
                                >Category</label>
                                 <select class="form-select" name="Category[]" aria-label="Default select example" onchange="fetcchCategory(this.value);">
                                  <option selected >Choose The Menu</option> `;
                        for (const x of response.cato) {
                            html += ` <option value="${x.categorys_id}">${x.category_name}</option>`
                        }
                        // console.log(response);
                        if (response.cato.length === 0) {
                            // alert("No More Categories To Add ");
                            return;
                        } else {
                            $('#output').append(html)
                        }
                    })
            }


            function removeImageContainer(button) {
                var container = button.closest('.position-relative');
                let splited_str = container.children[0].src.split('/')
                let image_name = splited_str[splited_str.length - 1];
                container.parentNode.removeChild(container);
                image_name_cat(image_name);
            }

            function image_name_cat(name) {
                let old_images = document.querySelector("#old_images");

                let new_images = old_images.value.replace(name, '');
                new_images = new_images.replace('||', '|');
                old_images.value = new_images;
            }
        </script>
    </body>
@endsection
