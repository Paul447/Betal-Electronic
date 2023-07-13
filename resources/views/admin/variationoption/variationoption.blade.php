@extends('admin.index')
@section('variationoption')
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
            @if (isset($data))
            @method('put')
            @endif
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"
              >Select Varition</label>

            <select class="form-select" name="variation" aria-label="Default select example">
              <option selected>
                {{-- @if (isset($data))
                {{$data->variation_name}}
                @else --}}
                Choose The Menu
              {{-- @endif --}}
                </option>
              @foreach ($variation as $variation )
                <option value="{{$variation->variation_id}}">{{$variation->variation_name}}</option>
              @endforeach

            </select>
          </div>
          <!-- Varition Name-->
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"
              >Varition Value</label>

            <input
              type="text"
              class="form-control"
              id="VaritionValue"
              name="value"
              required
              autocomplete="off"
              @if (isset($data))
                value = "{{$data->value}}"
              @endif
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
