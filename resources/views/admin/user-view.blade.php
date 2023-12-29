@extends('admin.admin-home')


@section('content')
@yield('title', 'Update password')
<form action="{{route('updatepassword')}}" method="post" id="update-password">
        @csrf
        <div class="profile-card text-center shadow bg-light p-4 my-5 rounded-3">
            <div class="profile-photo shadow">
                <img src="{{asset('/storage/images/ban.jpg')}}" alt="profile Photo" class="img-fluid" height="22%" width="22%">
            </div>
            <h3 class="pt-3 text-dark">Name: {{$users}}</h3>
            <p class="text-secondary">Email : {{$email}}</p>
            <p class="text-secondary">Role : {{$role}}</p>

        </div>
    <div class="row gy-3 overflow-hidden">
        <div class="col-md-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="current_password" id="current_password" placeholder=" " data-parsley-required-message="Hãy Nhập Mật Khẩu hiện tại">
                <label for="oldpassword" class="form-label">Current Password</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder=" " data-parsley-required-message="Nhập Mật Khẩu mới">
                <label for="password" class="form-label">New Password</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirm" id="newpassword_confirm" placeholder=" " data-parsley-required-message="Xác Nhận Mật Khẩu mới" >
                <label for="password_confirm" class="form-label">Confirm New Password</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Update New Password</button>
            </div>
        </div>
    </div>
</form>
<script>
    $('#update-password').parsley();
</script>
@endsection
