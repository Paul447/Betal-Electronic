<script>
    document.title = "Betal International | View User"
</script>
@include('welcome')


<div class="container emp-profile">
    @foreach ($data as $dtata)
    <div class="profile-card">
        <div class="profile-img">
            @if ($dtata->password != '' || $dtata->password != null)
            <img src="{{ asset('/admin/img/' . $dtata->image) }}" alt="Profile Image" />
            @else
            <img src="{{ $dtata->image }}" alt="Profile Image" />
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
                            <tbody>
                                <td class="justify-content-center d-flex">
                                    @if ($dtata->password != '' || $dtata->password != null)
                                    <a href="{{ '/changepass' }}" style="text-decoration: none;" class="view-details">Change Password</a>
                                    @endif
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