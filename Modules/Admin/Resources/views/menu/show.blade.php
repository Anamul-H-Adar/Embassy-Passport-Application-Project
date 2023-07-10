<div class="form-group row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover">

            <tbody>
            <tr>
                <td>Name:</td>
                <td>  {{$user->name}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>  {{$user->email}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>  {{$user->phone}}</td>
            </tr>
            <tr>
                <td>Profile Photo:</td>
                <td>
                    @if(isset($user->profile_photo_path) && file_exists($user->profile_photo_path))
                        <img id="image_load" src="{{asset($user->profile_photo_path)}}" style="width: 150px;height: 150px;cursor:pointer">
                    @else

                        <img id="image_load" src="{{asset('assets/images/user/09.jpg')}}" style="width: 150px; height: 150px;cursor:pointer;">
                    @endif
                </td>
            </tr>
            <tr>
                <td>Assigned Role (s):</td>
                <td>
                    @forelse($userRole as $role)
                        <span class="badge badge-primary"> {{$role}}</span>
                        @empty

                    @endforelse

                </td>
            </tr>
            </tbody>

        </table>
    </div>
</div>