@extends('frontend.index')
@section('content')
    <div class="body-content" style="min-height: 460px;">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Change Password</span>
                        </h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.update.password')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password</label>
                                    <input type="password" class="form-control unicase-form-control text-input"
                                           name="old_password" id="old_password">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">New Password</label>
                                    <input type="password" class="form-control unicase-form-control text-input"
                                           name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" class="form-control unicase-form-control text-input"
                                           name="password_confirmation" id="password_confirmation">
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
