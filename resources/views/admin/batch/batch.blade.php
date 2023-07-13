@extends('admin.index')
@section('addBatch')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <style>
       .card-header {
        background : #440474;
      }
    </style>
  </head>
  <body>
    <div class="row justify-content-center" id="primarypro">
      <div class="col col-md-7 card p-0 mt-4   border border-1 shadow-sm overflow-auto boxxx">
        <div class="card-header text-center text-white text-uppercase h2">Add Batch</div>
        <form action="{{$url}}" method="get" class="p-4" enctype="multipart/form-data">
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-primary float-start"
              name="submit"
            >
              Add New Batch
            </button>
          </div>
        </form>

      </div>
    </div>
  </body>
</html>
@endsection
