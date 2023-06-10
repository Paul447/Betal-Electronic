@extends('admin.index')
@section('addProductBatch')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  </head>
  <style>
     .card-header {
        background : #440474;
      }
  </style>
  <body>
    <div class="row justify-content-center" id="primarypro">
      <div class="col col-md-7 card p-0 mt-4 border border-1 shadow-sm overflow-auto boxxx">
        <div class="card-header text-center text-white text-uppercase h2">Add Product Batch</div>


        <form action="{{$url}}" method="post" class="p-4" enctype="multipart/form-data">
         @csrf
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label"
          >Batch </label>
          <select class="form-select" name="batch" aria-label="Default select example" onchange="fetchProductNotInBatch(this.value)">
            <option selected> 
            Choose Batch
         </option>
            @foreach($batchData as $bth)
                <option value="{{$bth->batch_id}}"> {{$bth->batch_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label"
            >Product</label>
            <select class="form-select" name="assobatch" aria-label="Default select example" id="pdaata">
              <option selected> 
              Choose The Menu
           </option>
             
             
            </select>
          </div>
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label"
              > Cost Price</label
            >
            <input
              type="number"
              class="form-control"
              id="mydata"
              name="costPrice"
              autocomplete="off"
              value=""
            />
          </div>
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label"
              > Selling Price</label
            >
            <input
              type="number"
              class="form-control"
              id="mydata"
              name="sellprice"
              autocomplete="off"
              value=""
            />
          </div>
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label"
              > Product Qty</label
            >
            <input
              type="number"
              class="form-control"
              id="mydata"
              name="pqty"
              autocomplete="off"
              value=""
            />
          </div>
          


          <!-- Modal footer -->
          <div class="modal-footer">
            <a href="" class="btn btn-secondary my-4 m-4" role="button"
              >Cancel</a
            >
            <button
              type="submit"
              class="btn btn-primary float-start"
              name="submit"
            >
              Submit
            </button>
          </div>
        </form>

      </div>
    </div>
  </body>
</html>
<script>
        function fetchProductNotInBatch(batchId) {

      var controller = "/getBatchAssociatedProduct/";
      var host = location.origin + controller;
      var url = location.origin + controller + batchId;

      fetch(url, {
              method: 'GET',
              headers: {
                  'Accept': 'application/json',
              },
          })
          .then(response => response.json())
          .then(response => {
              let html = `<option selected disabled value="">Select</option>`;
              for (const x of response.productData) {
                  html += `<option value="${x.product_id}">${x.product_name}</option>`;
              }
              document.getElementById('pdaata').innerHTML = html;
          })
      }
</script>
@endsection
