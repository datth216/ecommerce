@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">All User <span class="badge badge-pill badge-danger">{{count($user)}}</span></h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $users)
                                            <tr>
                                                <td>
                                                    <img src="{{ !empty($users->profile_photo_path) ? url('/upload/user_images/' . $users->profile_photo_path) : url('/upload/no_image.jpg') }}"
                                                        style="width: 70px; height: 70px;">
                                                </td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>{{ $users->phone }}</td>
                                                <td>
                                                    @if ($users->userOnline())
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($users->last_seen)->diffForHumans() }}</span>
                                                    @endif
                                                </td>
                                                <td width="17%">
                                                    <a href="" class="btn btn-primary"><i class="fa fa-eye"
                                                            title="Detail"></i></a>
                                                    <a href="" class="btn btn-warning"><i class="fa fa-edit"
                                                            title="Edit"></i></a>
                                                    <a href="" class="btn btn-danger" id="delete"><i class="fa fa-trash"
                                                            title="Delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
