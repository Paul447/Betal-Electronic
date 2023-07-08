@include('welcome')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>view profile</title>
</head>
<style>
    a{
        text-decoration: none;
    }

   
    /* Container styles */
    .container.emp-profile {
        margin-top: 95px;
        display: flex;
        justify-content: center;
    }

    /* Profile card styles */
    .profile-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Profile image styles */
    .profile-img {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-img img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Profile details styles */
    .customer-name {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
        color: #a50318;
    }

    .profile-info {
        margin-top: 20px;
        width: 100%;
    }

    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .info-item label {
        font-weight: bold;
        width: 120px;
        margin-right: 10px;
        color: #333;
    }

    .info-item p {
        margin: 0;
        word-wrap: break-word;
    }

    /* Additional styling for info items */
    .info-item .label-value {
        display: flex;
        align-items: center;
    }

    .info-item .label-value:before {
        content: ":";
        margin-right: 5px;
        color: #a50318;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .profile-card {
            max-width: 400px;
            margin: 20px;
        }

        .profile-img img {
            width: 150px;
            height: 150px;
        }

        .customer-name {
            font-size: 20px;
        }

        .info-item label {
            width: 100px;
        }
    }

    @media (max-width: 576px) {
        .profile-img img {
            width: 120px;
            height: 120px;
        }

        .customer-name {
            font-size: 18px;
        }

        .info-item label {
            width: 90px;
        }
    }

    @media (max-width: 375px) {
        .profile-img img {
            width: 100px;
            height: 100px;
        }

        .customer-name {
            font-size: 16px;
        }

        .info-item label {
            width: 80px;
        }
    }
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container emp-profile">
    @foreach ($data as $dtata)
        <div class="profile-card">
            <div class="profile-img">
                @if (isset($dtata->password))
                    <img src="{{ $dtata->image }}" alt="Profile Image" />
                @else
                    <img src="{{ asset('/admin/img/' . $dtata->image) }}" alt="Profile Image" />
                @endif
            </div>
            <div class="profile-details">
                <h5 class="customer-name" style="color: #a50318;">{{ $dtata->user_name }}</h5>
                <div class="profile-info">
                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <thead>
                                    <th class="pb-4">Email :&nbsp;{{ $dtata->email }} </th>
                                </thead>
                                <tbody >
                                    <td class="justify-content-center d-flex" >
                                        <a href="{{'/changepass'}}"  style="text-decoration: none;" class="view-details">Change Password</a>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('footermain')
