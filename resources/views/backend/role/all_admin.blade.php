@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total Admin User </h3>
                            <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right">Add Admin</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image </th>
                                            <th>Name </th>
                                            <th>Email </th>
                                            <th>Access </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $item)
                                            <tr>
                                                <td> <img src="{{ asset($item->profile_photo_path) }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->email }} </td>
                                                <td>
                                                    @if ($item->brands == 1)
                                                        <span class="badge badge-pill badge-primary">Brands</span>
                                                    @endif
                                                    @if ($item->category == 1)
                                                        <span class="badge badge-pill"
                                                            style="background: 	#FFA500; color: white">Category</span>
                                                    @endif
                                                    @if ($item->product == 1)
                                                        <span class="badge badge-pill badge-success">Product</span>
                                                    @endif
                                                    @if ($item->sliders == 1)
                                                        <span class="badge badge-pill badge-danger">Sliders</span>
                                                    @endif
                                                    @if ($item->coupons == 1)
                                                        <span class="badge badge-pill badge-warning">Coupons</span>
                                                    @endif
                                                    @if ($item->orders == 1)
                                                        <span class="badge badge-pill badge-info">Orders</span>
                                                    @endif
                                                    @if ($item->reports == 1)
                                                        <span class="badge badge-pill badge-light">Reports</span>
                                                    @endif
                                                    @if ($item->users == 1)
                                                        <span class="badge badge-pill badge-dark">Users</span>
                                                    @endif
                                                    @if ($item->setting == 1)
                                                        <span class="badge badge-pill badge-primary">Setting</span>
                                                    @endif
                                                    @if ($item->user_role == 1)
                                                        <span class="badge badge-pill badge-info">Role</span>
                                                    @endif
                                                </td>
                                                <td width="25%">
                                                    <a href="{{ route('edit.admin.role', $item->id) }}"
                                                        class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('delete.admin.role', $item->id) }}" class="btn btn-danger" title="Delete" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->






            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
