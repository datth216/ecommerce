@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Category List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Category Eng</th>
                                        <th>Category Vn</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $categories)
                                        <tr>
                                            <td>{{$categories->category_name_en}}</td>
                                            <td>{{$categories->category_name_vn}}</td>
                                            <td>
                                                <span><i class="{{$categories->category_icon}}"></i></span>
                                            </td>
                                            <td>
                                                <a href="{{route('category.edit', $categories->id)}}"
                                                   class="btn btn-warning"><i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="{{route('category.delete', $categories->id)}}"
                                                   class="btn btn-danger" id="delete"><i class="fa fa-trash" title="Delete"></i></a>
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
                            <h4 class="box-title">Add Category</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('category.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control"
                                                   id="category_name_en">
                                            @error('category_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name VN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_vn" class="form-control"
                                                   id="category_name_vn">
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
                                                <option value="0">Select Your Category</option>
                                                {!! $htmlOption !!}
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"
                                                   id="category_icon">
                                            @error('category_icon')
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
