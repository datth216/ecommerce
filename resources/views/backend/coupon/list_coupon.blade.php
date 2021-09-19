@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Coupon List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Discount</th>
                                        <th>Validate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupon as $coupons)
                                        <tr>
                                            <td>{{$coupons->coupon_name}}</td>
                                            <td>{{$coupons->coupon_discount}}%</td>
                                            <td> {{\Carbon\Carbon::parse($coupons->coupon_validate)->format('d-m-Y')}}</td>
                                            <td>
                                                @if($coupons->coupon_validate >= \Carbon\Carbon::parse($coupons->coupon_validate)->format('d-m-Y'))
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('coupons.edit', $coupons->id)}}"
                                                   class="btn btn-warning"><i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="{{route('coupons.delete', $coupons->id)}}"
                                                   class="btn btn-danger" id="delete"><i class="fa fa-trash"
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
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Coupon</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('coupons.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control"
                                                   id="coupon_name">
                                            @error('coupon_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Coupon Discount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_discount" class="form-control"
                                                   id="coupon_discount">
                                            @error('coupon_discount')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Validate<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validate" class="form-control"
                                                   id="coupon_validate" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                                            @error('coupon_validate')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-rounded btn-primary" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
