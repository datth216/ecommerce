@extends('frontend.master')
@section('content')
@section('title')
    {{$product->product_name_en}}
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Clothing</a></li>
                <li class="active">
                    @if(session()->get('language') == 'vn')
                        {{$product->product_name_vn}}
                    @else
                        {{$product->product_name_en}}
                    @endif
                </li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>
<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row single-product">
            <div class="col-md-3 sidebar">
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n">
                        <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                    </div>


                    <!-- ============================================== HOT DEALS ============================================== -->
                @include('frontend.common.hot_deals')
                <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs animated"
                         style="visibility: visible; animation-name: fadeInUp;">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img
                                        src="{{asset('frontend/assets/images/testimonials/member1.png')}}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span></div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img
                                        src="{{asset('frontend/assets/images/testimonials/member3.png')}}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span></div>
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img
                                        src="{{asset('frontend/assets/images/testimonials/member2.png')}}" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span></div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->


                </div>
            </div><!-- /.sidebar -->
            <div class="col-md-9">
                <div class="detail-block">
                    <div class="row  wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product" class="owl-carousel owl-theme"
                                     style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 5742px; left: 0px; display: block;">
                                            @foreach($multiImg as $img)
                                                <div class="owl-item" style="width: 319px;">
                                                    <div class="single-product-gallery-item" id="slide{{$img->id}}">
                                                        <a data-lightbox="image-1" data-title="Gallery"
                                                           href="{{asset($img->photo_name)}}">
                                                            <img class="img-responsive" alt=""
                                                                 src="{{asset($img->photo_name)}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div><!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <!-- /.single-product-gallery-item -->

                                    <div class="owl-controls clickable">
                                        <div class="owl-pagination">
                                            <div class="owl-page active"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                            <div class="owl-page"><span class=""></span></div>
                                        </div>
                                    </div>
                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">


                                        @foreach($multiImg as $img)
                                            <div class="item">
                                                <a class="horizontal-thumb active"
                                                   data-target="#owl-single-product" data-slide="1"
                                                   href="#slide{{$img->id}}">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="{{asset($img->photo_name)}}">
                                                </a>
                                            </div>
                                        @endforeach






                                        {{--                                        <div class="owl-controls clickable">--}}
                                        {{--                                            <div class="owl-pagination">--}}
                                        {{--                                                <div class="owl-page active"><span class=""></span></div>--}}
                                        {{--                                                <div class="owl-page"><span class=""></span></div>--}}
                                        {{--                                                <div class="owl-page"><span class=""></span></div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div><!-- /#owl-single-product-thumbnails -->


                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class="col-sm-6 col-md-7 product-info-block">
                            <div class="product-info">
                                <h1 class="name" id="product_name">
                                    @if(session()->get('language') == 'vn')
                                        {{$product->product_name_vn}}
                                    @else
                                        {{$product->product_name_en}}
                                    @endif
                                </h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->


                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    @if(session()->get('language') == 'vn')
                                        {{$product->short_desc_vn}}
                                    @else
                                        {{$product->short_desc_en}}
                                    @endif
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if($product->discount_price == NULL || $product->discount_price == $product->selling_price)
                                                    <span class="price">{{$product->selling_price}}</span>
                                                @else
                                                    <span
                                                        class="price">{{$product->discount_price}}</span>
                                                    <span class="price-strike">{{$product->selling_price}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                   data-placement="right" title="" href="#"
                                                   data-original-title="Wishlist">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                   data-placement="right" title="" href="#"
                                                   data-original-title="Add to Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                   data-placement="right" title="" href="#"
                                                   data-original-title="E-mail">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="info-title control-label">
                                                @if(session()->get('language') == 'vn')
                                                    Chọn màu
                                                @else
                                                    Choose Color
                                                @endif
                                                <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                    style="display: none;" id="color">
                                                <option>
                                                    @if(session()->get('language') == 'vn')
                                                        --Chọn--
                                                    @else
                                                        --Select options--
                                                    @endif
                                                </option>
                                                @if(session()->get('language') == 'vn')
                                                    @foreach($product_color_vn as $color)
                                                        <option value="{{$color}}">{{ ucwords($color)}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($product_color_en as $color)
                                                        <option value="{{$color}}">{{ucwords($color)}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            @if($product->product_size_en == null || $product->product_size_vn == null)

                                            @else
                                                <label class="info-title control-label">
                                                    @if(session()->get('language') == 'vn')
                                                        Chọn size
                                                    @else
                                                        Choose Size
                                                    @endif
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control unicase-form-control selectpicker"
                                                        style="display: none;" id="size">
                                                    <option>
                                                        @if(session()->get('language') == 'vn')
                                                            --Chọn--
                                                        @else
                                                            --Select options--
                                                        @endif
                                                    </option>
                                                    @if(session()->get('language') == 'vn')
                                                        @foreach($product_size_vn as $size)
                                                            <option value="{{$size}}">{{ucwords($size)}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($product_size_en as $size)
                                                            <option value="{{$size}}">{{ucwords($size)}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" id="qty" value="1" min="1">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="product_id" value="{{$product->id}}" min="1">
                                        <div class="col-sm-7">
                                            <button type="submit" onclick="addToCart()" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
                                            </button>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->


                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp animated"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text"> @if(session()->get('language') == 'vn')
                                                {!!  $product->long_desc_vn !!}
                                            @else
                                                {!! $product->long_desc_en !!}
                                            @endif</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>

                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="review-title"><span
                                                            class="summary">We love this product</span><span
                                                            class="date"><i
                                                                class="fa fa-calendar"></i><span>1 days ago</span></span>
                                                    </div>
                                                    <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.Aliquam suscipit."
                                                    </div>
                                                </div>

                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->


                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="review-table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th class="cell-label">&nbsp;</th>
                                                            <th>1 star</th>
                                                            <th>2 stars</th>
                                                            <th>3 stars</th>
                                                            <th>4 stars</th>
                                                            <th>5 stars</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="cell-label">Quality</td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell-label">Price</td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="5"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cell-label">Value</td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio"
                                                                       value="5"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table><!-- /.table .table-bordered -->
                                                </div><!-- /.table-responsive -->
                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                                <div class="form-container">
                                                    <form role="form" class="cnt-form">

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Your Name <span
                                                                            class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                           id="exampleInputName" placeholder="">
                                                                </div><!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Summary <span
                                                                            class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt"
                                                                           id="exampleInputSummary" placeholder="">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Review <span
                                                                            class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review"
                                                                              id="exampleInputReview" rows="4"
                                                                              placeholder=""></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->

                                                        <div class="action text-right">
                                                            <button class="btn btn-primary btn-upper">SUBMIT
                                                                REVIEW
                                                            </button>
                                                        </div><!-- /.action -->

                                                    </form><!-- /.cnt-form -->
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">

                                        <h4 class="title">Product Tags</h4>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">

                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag"
                                                           class="form-control txt">


                                                </div>

                                                <button class="btn btn-upper btn-primary" type="submit">ADD TAGS
                                                </button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->

                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp animated"
                         style="visibility: visible; animation-name: fadeInUp;">
                    <h3 class="section-title">related products</h3>
                    <div
                        class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs"
                        style="opacity: 1; display: block;">

                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper" style="width: 2484px; left: 0px; display: block;">
                                @foreach($related_product as $related)
                                    <div class="owl-item" style="width: 207px;">
                                        <div class="item item-carousel">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            @if(session()->get('language') == 'vn')
                                                                <a href="{{url('product/detail/'.$related->id. '/'. $related->product_slug_vn)}}"><img
                                                                        src="{{asset($related->product_thumbnail)}}"
                                                                        alt=""></a>
                                                            @else
                                                                <a href="{{url('product/detail/'.$related->id. '/'. $related->product_slug_en)}}"><img
                                                                        src="{{asset($related->product_thumbnail)}}"
                                                                        alt=""></a>
                                                            @endif
                                                        </div><!-- /.image -->
                                                        @php
                                                            $amount = $related->selling_price - $related->discount_price;
                                                            $discount = ($amount / $related->selling_price) * 100;
                                                        @endphp
                                                        @if($related->discount_price == NULL ||$related->discount_price == $related->selling_price)
                                                            <div class="tag new">
                                                                <span>new</span>
                                                            </div>
                                                        @else
                                                            <div class="tag sale">
                                                                <span>{{round($discount)}}%</span>
                                                            </div>
                                                        @endif

                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left">
                                                        <h3 class="name">
                                                            @if(session()->get('language') == 'vn')
                                                                <a href="{{url('product/detail/'.$related->id. '/'. $related->product_slug_vn)}}">{{$related->product_name_vn}}</a>
                                                            @else
                                                                <a href="{{url('product/detail/'.$related->id. '/'. $related->product_slug_en)}}">{{$related->product_name_en}}</a>
                                                            @endif

                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>

                                                        <div class="product-price">
                                                            @if($related->discount_price == NULL ||$related->discount_price == $related->selling_price)
                                                                <span class="price">{{$related->selling_price}}</span>
                                                            @else
                                                                <span class="price">{{$related->discount_price}}</span>
                                                                <span class="price-before-discount">{{$related->selling_price}}</span>
                                                            @endif
                                                        </div><!-- /.product-price -->

                                                    </div><!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon"
                                                                            data-toggle="dropdown" type="button">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart
                                                                    </button>

                                                                </li>

                                                                <li class="lnk wishlist">
                                                                    <a class="add-to-cart" href="detail.html"
                                                                       title="Wishlist">
                                                                        <i class="icon fa fa-heart"></i>
                                                                    </a>
                                                                </li>

                                                                <li class="lnk">
                                                                    <a class="add-to-cart" href="detail.html"
                                                                       title="Compare">
                                                                        <i class="fa fa-signal"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div><!-- /.action -->
                                                    </div><!-- /.cart -->
                                                </div><!-- /.product -->

                                            </div><!-- /.products -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- /.item -->

                        <!-- /.item -->

                        <!-- /.item -->

                        <!-- /.item -->

                        <!-- /.item -->

                        <!-- /.item -->
                        <div class="owl-controls clickable">
                            <div class="owl-buttons">
                                <div class="owl-prev"></div>
                                <div class="owl-next"></div>
                            </div>
                        </div>
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->


        <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp animated"
             style="visibility: visible; animation-name: fadeInUp;">

            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme"
                     style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer">
                        <div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;">
                            <div class="owl-item" style="width: 190px;">
                                <div class="item m-t-15">
                                    <a href="#" class="image">
                                        <img src="{{asset('frontend/assets/brands/products/brand1.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item m-t-10">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand5.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand6.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img src="assets/images/brands/brand1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 190px;">
                                <div class="item">
                                    <a href="#" class="image">
                                        <img data-echo="assets/images/brands/brand5.png"
                                             src="assets/images/blank.gif" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->

                    <!--/.item-->
                    <div class="owl-controls clickable">
                        <div class="owl-buttons">
                            <div class="owl-prev"></div>
                            <div class="owl-next"></div>
                        </div>
                    </div>
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->

        </div><!-- /.logo-slider -->
        <!-- == = BRANDS CAROUSEL : END = -->    </div><!-- /.container -->
</div>
@endsection
