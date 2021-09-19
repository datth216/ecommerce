@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Brand List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Brand Eng</th>
                                        <th>Brand Vn</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{$brand->brand_name_en}}</td>
                                            <td>{{$brand->brand_name_vn}}</td>
                                            <td>
                                                <img src="{{asset($brand->brand_image)}}"
                                                     style="width: 50px; height: 50px;">
                                            </td>
                                            <td>
                                                <a href="{{route('brands.edit', $brand->id)}}"
                                                   class="btn btn-warning"><i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="{{route('brands.delete', $brand->id)}}" class="btn btn-danger"
                                                   id="delete"><i class="fa fa-trash" title="Delete"></i></a>
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
                            <h4 class="box-title">Add Brand</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Brand Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control"
                                                   id="brand_name_en">
                                            @error('brand_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Brand Name VN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_vn" class="form-control"
                                                   id="brand_name_vn">
                                            @error('brand_name_vn')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control"
                                                   id="brand_image">
                                            @error('brand_image')
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
