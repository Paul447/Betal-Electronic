@include('welcome')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>view profile</title>
  </head>
  <style>
     @media (max-width: 992px) {
       .rowww{
        margin-top: 150px;
      }
    }
    @media (min-width: 992px) {
      .rowww{
        margin-top: 210px;
      }

    }
    @media (max-width: 400px) {
      .rowww{
        margin-top: 78px;
      }
    }
    body{
    background: -webkit-linear-gradient(left, #0c00ad, #360093);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    font-weight: 600;
    color: #360093;
    cursor: pointer;
    text-decoration: none;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

  </style>
  <body class="rowww">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container emp-profile rowww">
                <form method="post">
                    @foreach($data as $dtata)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="{{ asset('/storage/editor/'.Session::get('customer')['image'])}}" alt=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                        <h5>
                                          
                                        </h5>
                                        <h6>
                                            <div class="customer h1 justify-content-center d-flex">
                                                {{$dtata->user_name}}
                                            </div>
                                        </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$dtata->email}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Phone</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$dtata->contact}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Province</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        @php
                                                        $province = DB::table('provinces')->where('province_id','=',$dtata->province)->pluck('province')->first();
                                                        @endphp
                                                        {{$province}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>District</label>
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                    $district = DB::table('districts')->where('district_id','=',$dtata->district)->pluck('district')->first();
                                                    @endphp
                                                    <p>{{$district}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Ward</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$dtata->ward}}</p>
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </form>           
            </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
  </body>
</html>
@include('footermain')