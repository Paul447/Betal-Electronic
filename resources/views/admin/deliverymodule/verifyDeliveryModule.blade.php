@extends('admin.index')
@section('verifyDelivery')
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
        <div class="card-header text-center text-white text-uppercase h2">Delivery Verify</div>


        <form action="{{$url}}" method="post" class="p-4" enctype="multipart/form-data">
         @csrf
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label"
              >Order Id</label>
            <input
              type="text"
              class="form-control"
              id="mydata"
              name="orderid"
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
