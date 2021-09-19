@extends('frontend.index')
@section('content')
    <div class="body-content" style="min-height: 494px">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi </span>
                            <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong>,
                            Update your profile
                        </h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control unicase-form-control text-input"
                                           name="name" id="name" value="{{$users->name}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control unicase-form-control text-input"
                                           name="email" id="email" disabled value="{{$users->email}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control unicase-form-control text-input"
                                           name="phone" id="phone" value="{{$users->phone}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Image</label>
                                    <input type="file" name="profile_photo_path" class="form-control"
                                           required="" id="image">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-rounded btn-warning">Update</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
