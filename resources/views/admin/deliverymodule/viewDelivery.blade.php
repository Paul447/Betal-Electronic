@extends('admin.index')
@section('viewdelivery')
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
        <div class="card-header text-center text-white text-uppercase h2">Confirm Delivery</div>
        <form action="{{$url}}" method="get" class="p-4" enctype="multipart/form-data">
            <input type="hidden" name="hello" value="{{$ordeid}}">
                <table class="table">
                    <thead>
                      <tr>
                       
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Product_id
                        </th>
                        <th scope="col">
                            Product_Quantity
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($data as $dta)
                        <tr class="table-info">
                            <td scope="row">
                                {{$dta->name}}
                            </td>
                            <td>
                                {{$dta->product}}
                            </td>
                            <td>
                                {{$dta->quantity}}
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                  </table>
         
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-primary float-start"
              name="submit"
            >
             Verify Delivery
            </button>
          </div>
        </form>

      </div>
    </div>
  </body>
</html>
@endsection
