@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edit Category</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control"
                                                   id="category_name_en" value="{{$category->category_name_en}}">
                                            @error('category_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name VN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_vn" class="form-control"
                                                   id="category_name_vn" value="{{$category->category_name_vn}}">
                                            @error('category_name_vn')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Select Parent Category<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="parent_id" required="" class="form-control"
                                                    aria-invalid="false">
                                                <option value="0" selected="">Select Your Category</option>
                                                {!! $htmlOption !!}
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"
                                                   id="category_icon" value="{{$category->category_icon}}">
                                            @error('category_icon')
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
