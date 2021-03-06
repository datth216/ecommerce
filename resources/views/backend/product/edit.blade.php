@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('product.update.data')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Category Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" required class="form-control"
                                                                aria-invalid="false">
                                                            <option value="0">Select Your Category</option>
                                                            {!! $htmlOption !!}
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Brand Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" required="" class="form-control"
                                                                aria-invalid="false">
                                                            <option value="0">Select Your Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option
                                                                    value="{{$brand->id}}" {{($brand->id == $product->brand_id)? 'selected': ''}}>{{$brand->brand_name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Name Eng<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control"
                                                               value="{{$product->product_name_en}}">
                                                        @error('product_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Name Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_vn" class="form-control"
                                                               value="{{$product->product_name_vn}}">
                                                        @error('product_name_vn')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control"
                                                               value="{{$product->product_code}}">
                                                        @error('product_code')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control"
                                                               required="" value="{{$product->product_qty}}">
                                                        @error('product_qty')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Eng<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tag_en" class="form-control"
                                                               data-role="tagsinput" required=""
                                                               value="{{$product->product_tag_en}}">
                                                        @error('product_tag_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tag_vn" class="form-control"
                                                               data-role="tagsinput"
                                                               value="{{$product->product_tag_vn}}"
                                                               required="">
                                                        @error('product_tag_vn')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Eng<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control"
                                                               data-role="tagsinput"
                                                               value="{{$product->product_size_en}}">
                                                        @error('product_size_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_vn" class="form-control"
                                                               data-role="tagsinput"
                                                               value="{{$product->product_size_vn}}">
                                                        @error('product_size_vn')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Color Eng<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control"
                                                               data-role="tagsinput"
                                                               value="{{$product->product_color_en}}"
                                                               required="">
                                                        @error('product_color_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Color Vn<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_vn" class="form-control"
                                                               data-role="tagsinput"
                                                               value="{{$product->product_color_vn}}"
                                                               required="">
                                                        @error('product_color_vn')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control"
                                                               value="{{$product->discount_price}}">
                                                        @error('discount_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control"
                                                               value="{{$product->selling_price}}">
                                                        @error('selling_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description Eng <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_en" id="short_desc_en"
                                                                  class="form-control"
                                                                  required="">{{$product->short_desc_en}}</textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc_vn" id="short_desc_vn"
                                                                  class="form-control"
                                                                  required="">{{$product->short_desc_vn}}</textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Eng <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                <textarea name="long_desc_en" id="editor1" class="form-control"
                                                          required=""
                                                          placeholder="Textarea text">{{$product->long_desc_vn}}</textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Vn <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                <textarea name="long_desc_vn" id="editor2" class="form-control"
                                                          required=""
                                                          placeholder="Textarea text">{{$product->long_desc_vn}}</textarea>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="checkbox" id="checkbox_1" name="hot_deals"
                                                       value="1" {{($product->hot_deals == 1) ? 'checked' : ''}}>
                                                <label for="checkbox_1">Hot Deals</label>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="controls">
                                                <input type="checkbox" id="checkbox_4" name="featured"
                                                       value="1" {{($product->featured == 1) ? 'checked' : ''}}>
                                                <label for="checkbox_4">Featured</label>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2"
                                                           name="special_offer"
                                                           value="1" {{($product->special_offer == 1) ? 'checked' : ''}}>
                                                    <label for="checkbox_2">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" value="1"
                                                           name="special_deal" {{($product->special_deal == 1) ? 'checked' : ''}}>
                                                    <label for="checkbox_3">Special Deals</label>
                                                </fieldset>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary" value="Update">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image</h4>
                        </div>
                        <form action="{{route('product.update.image')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($multi_image as $multiImg)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{asset($multiImg->photo_name)}}" class="card-img-top"
                                                 alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{route('product.delete.image', $multiImg->id)}}"
                                                       class="btn btn-danger" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </h5>
                                                <div class="form-group">
                                                    <h5>Change Image <span class="text-danger">*</span></h5>
                                                    <input type="file" name="multi_img[{{$multiImg->id}}]" id=""
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary"
                                       value="Update Image">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thumbnail Image</h4>
                        </div>
                        <form action="{{route('product.update.thumbnail')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="old_image" value="{{$product->product_thumbnail}}">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{asset($product->product_thumbnail)}}" class="card-img-top"
                                             alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="" class="btn btn-danger" id="delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </h5>
                                            <div class="form-group">
                                                <h5>Change Image <span class="text-danger">*</span></h5>
                                                <input type="file" name="product_thumbnail"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary"
                                       value="Update Image">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThumb').attr('src', e.target.result).width(100).height(100);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#multiImg').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                                        .height(100); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
