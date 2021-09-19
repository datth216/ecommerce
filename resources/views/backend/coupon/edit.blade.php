@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edit Coupon</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('coupons.update', $coupons->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_name" class="form-control"
                                                   id="coupon_name" value="{{$coupons->coupon_name}}">
                                            @error('coupon_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Discount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="coupon_discount" class="form-control"
                                                   id="coupon_discount" value="{{$coupons->coupon_discount}}">
                                            @error('coupon_discount')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Validate<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validate" class="form-control"
                                                   min="{{Carbon\Carbon::now()->format('d-m-Y')}}"
                                                   id="coupon_validate" value="{{$coupons->coupon_validate}}">
                                            @error('coupon_validate')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-rounded btn-primary" value="Update">
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
