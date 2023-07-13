@extends('admin.index')
@section('assignvarition')
  </head>
  <style>
     .card-header {
        background : #440474;
      }
  </style>
  <body>
    <div class="row justify-content-center" id="primarypro">
      <div
        class="col col-md-7 card p-0 mt-4 border border-1 shadow-sm overflow-scroll boxxx">

        <div class="card-header text-center text-white text-uppercase h2">{{$title}}</div>


        <form action="{{$url}}" method="post" class="p-4" enctype="multipart/form-data">
            @csrf
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"
              >Select Product</label>

            <select class="form-select" name="ChooseProduct" aria-label="Default select example">
              <option value="0">
                Choose The Menu
                </option>
              @foreach ($product as $pro )
                <option value="{{$pro->product_id}}">{{$pro->product_name}}</option>
              @endforeach
            </select>
          </div>

          @foreach($variationoption as $vr)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="Selectedvalue[]" value="{{$vr->variation}}:{{$vr->variationoption_id}}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              {{$vr->value}}
            </label>
          </div>
          @endforeach
         
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
