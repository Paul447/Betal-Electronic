@extends('admin.index')
@section('addproduct')
    <style>
        .card-header {
            background: #440474;
        }
    </style>

    </head>

    <body>
        <div class="row justify-content-center" id="primarypro">
            <div class="col col-md-10 card p-0 mt-4 d-inline-block  border border-1 shadow-sm overflow-auto boxxx">
                <div class="card-header text-center h2 text-uppercase text-white">{{ $title }}</div>

                <p class="text-danger fs-5 text-center mx-5">!!!First add Category,Brand,Batch and assign product to batches..Only after that you are alloweded to Add Product!!!</p>
                <form action="{{ $url }}" method="post" class="p-4" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 main-Wrapper" id="output">
                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="Productname" name="Productname" required
                                pattern="[A-Z].[A-Z a-z]+" required
                                title="Name must be in only character, First Letter Must be in captial"
                                autocomplete="off" />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="formFile" class="form-label">Product Thumbnail Image</label>
                            <input type="file" class="form-control" id="ProductFile" name="Productthumbfile"
                                accept="image/jpg,image/png" required />
                            <p class="text-danger">
                                <strong class="text-warning">Warning</strong> : Image size must be
                                less the 2MB
                            </p>
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="ProductFile" name="Productfile[]"
                                accept="image/jpg,image/png" multiple="multiple" required />
                            <p class="text-danger">
                                <strong class="text-warning">Warning</strong> : Image size must be
                                less the 2MB
                            </p>
                        </div>

                        <div class="col col-12  mb-3">
                            <label for="recipient-name" class="col-form-label">Product Content</label>
                            <textarea id="Productcontent" name="Productcontent" class="form-control" id="" cols="30" rows="5"
                                required autocomplete="off"></textarea>

                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Product Cost Price</label>
                            <input type="number" class="form-control" id="Productprice" name="productprice" required
                                pattern="[0-9]+" autocomplete="off" title="Only be in number" />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Product Selling Price</label>
                            <input type="number" class="form-control" id="Productsprice" name="productsprice" required
                                pattern="[0-9]+" autocomplete="off" title="Only be in number" />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Quantity</label>
                            <input type="number" class="form-control" id="Productsprice" name="qty" required
                                pattern="[0-9]+" autocomplete="off" title="Only be in number" />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Select Brand</label>
                            <select class="form-select" name="Brand" aria-label="Default select example">
                                <option selected>Choose The Menu</option>
                                @foreach ($brand as $brand)
                                    <option value="{{ $brand->brands_id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Meta-Data</label>
                            <input type="text" class="form-control" id="Productname" name="lowstockindication" required
                                autocomplete="off" />
                        </div>

                        <div class="col col-12 col-lg-6 col-sm-12 col-md-12 col-xl-4 mb-3">
                            <label for="recipient-name" class="col-form-label">Select Category</label>
                            <select class="form-select" name="Category[]" aria-label="Default select example"
                                onchange="fetcchCategory(this.value);">
                                <option selected>Choose The Menu</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->categorys_id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                   

                    <div class="modal-footer">
                        
                        <a href="" class="btn btn-secondary btn-md m-4" role="button">Cancel</a>
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
                        console.log(response);
                        if (response.cato.length === 0) {
                            // alert("No More Categories To Add ");
                            return;
                        } else {
                            $('#output').append(html)
                        }
                    })
            }


        </script>
    </body>
@endsection
