@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Slider List</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $sliders)
                                        <tr>
                                            <td>{{$sliders->title}}</td>
                                            <td>{{$sliders->description}}</td>
                                            <td>
                                                <img src="{{asset($sliders->slider_img)}}"
                                                     style="width: 50px; height: 50px;">
                                            </td>
                                            <td>
                                                @if($sliders->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('sliders.edit', $sliders->id)}}"
                                                   class="btn btn-warning"><i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="{{route('sliders.delete', $sliders->id)}}"
                                                   class="btn btn-danger"
                                                   id="delete"><i class="fa fa-trash" title="Delete"></i></a>
                                                @if($sliders->status == 1)
                                                    <a href="{{route('sliders.inactive', $sliders->id)}}"
                                                       class="btn btn-danger"><i class="fa fa-arrow-down"
                                                                                 title="Inactive"></i></a>
                                                @else
                                                    <a href="{{route('sliders.active', $sliders->id)}}"
                                                       class="btn btn-success"><i class="fa fa-arrow-up"
                                                                                  title="Active"></i></a>
                                                @endif
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
                            <h4 class="box-title">Add Slider</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control"
                                                   id="title">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control"
                                                   id="description">
                                            @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control"
                                                   id="slider_img">
                                            @error('slider_img')
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
