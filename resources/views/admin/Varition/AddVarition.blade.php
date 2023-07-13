@extends('admin.index')
@section('addvarition')

      <!-- <link rel="stylesheet" href="../css/FormCss.css"> -->
  </head>
  <style>
     .card-header {
        background : #440474;
      }
  </style>
  <body>
    <div class="row justify-content-center" id="primarypro">
      <div class="col col-md-7 card p-0 mt-4 border border-1 shadow-sm overflow-auto boxxx">
        <div class="card-header text-center text-white h2 text-uppercase ">{{$title}}</div>


        <form action="{{$url}}" method="post" class="p-4" enctype="multipart/form-data">
           @csrf
           @if (isset($data))
              @method('put')
           @endif
          <!-- Varition Name-->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"
              >Varition Name</label
            >
            <input
              type="text"
              class="form-control"
              id="Varitionname"
              @if (isset($data))
               value="{{"$data->variation_name"}}"
              @endif
              name="variation_name"
              required
              pattern="[A-Z].[A-Z a-z]+"
              required
              title="Name must be in only character, First Letter Must be in captial"
              autocomplete="off"
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
@endsection
