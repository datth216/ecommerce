@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">SEO Setting</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update.seo_setting', $seo_setting->id) }}" method="post">
                                @csrf                            
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Meta Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" class="form-control"
                                                    value="{{ $seo_setting->meta_title }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Author <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_author" class="form-control"
                                                    value="{{ $seo_setting->meta_author }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Keyword<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="meta_keyword" class="form-control"
                                                    value="{{ $seo_setting->meta_keyword }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="meta_description" id="textarea"
                                                    class="form-control">{{ $seo_setting->meta_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Google Analytics<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="google_analytics" id="textarea" class="form-control">
                                                        {{ $seo_setting->google_analytics }}
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
    </div>
@endsection
