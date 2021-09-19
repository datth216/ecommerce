<div class="col-md-2"><br><br>
    <img class="card-img-top" style="border-radius: 50%; height: 100%; width: 100%"
         src="{{(!empty($users->profile_photo_path) ? url('/upload/user_images/'.$users->profile_photo_path) :  url('/upload/no_image.jpg'))}}">
    <ul class="list-group list-group-flush"><br><br>
        <a href="{{url('/dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile</a>
        <a href="{{route('my.order')}}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{route('return.order_view')}}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        <a href="{{route('cancel.order_view')}}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        <a href="{{route('user.change_password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{route('user.logout')}}" class="btn btn-warning btn-sm btn-block">Log out</a>
    </ul>
</div>
