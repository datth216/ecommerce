@extends('frontend.master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Reset password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Forgot password</h4>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email"
                                       id="email" value="">
                            </div>  <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password<span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="password"
                                       id="password">
                            </div>  <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation"
                                       id="password_confirmation">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password
                                Reset Link
                            </button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                    <!-- /.row -->
                </div><!-- /.sigin-in-->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
                <div id="brands-carousel" class="logo-slider wow fadeInUp">

                    <div class="logo-slider-inner">
                        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                            <div class="item m-t-15"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand1.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item m-t-10"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand2.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand3.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand4.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand6.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand2.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand4.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand1.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->

                            <div class="item"><a href="#" class="image"> <img
                                        data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}"
                                        src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a></div>
                            <!--/.item-->
                        </div>
                        <!-- /.owl-carousel #logo-slider -->
                    </div><!-- /.logo-slider-inner -->

                </div><!-- /.logo-slider -->
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
            </div><!-- /.container -->
        </div><!-- /.body-content -->
@endsection
