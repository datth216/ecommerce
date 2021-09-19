@extends('frontend.master')
@section('content')
@section('title')
    Home Simple Shop
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
            @include('frontend.common.vertical_menu')
            <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
            @include('frontend.common.hot_deals')
            <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'vn')
                            khuyến mãi đặc biệt
                        @else
                            Special Offer
                        @endif
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach( $special_offer as $prod)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'vn')
                                                                    <a href="{{url('product/detail/'.$prod->id. '/'. $prod->product_slug_vn)}}">
                                                                        <img
                                                                            src="{{asset($prod->product_thumbnail)}}"
                                                                            alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{url('product/detail/'.$prod->id. '/'. $prod->product_slug_en)}}">
                                                                        <img
                                                                            src="{{asset($prod->product_thumbnail)}}"
                                                                            alt="">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <!-- /.image -->
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'vn')
                                                                    <a href="{{url('product/detail/'.$prod->id. '/'. $prod->product_slug_vn)}}">{{$prod->product_name_vn}}</a>
                                                                @else
                                                                    <a href="{{url('product/detail/'.$prod->id. '/'. $prod->product_slug_en)}}">{{$prod->product_name_en}}</a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> {{$prod->discount_price}}</span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
            @include('frontend.common.product_tags')
            <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'vn')
                            ưu đãi đặc biệt
                        @else
                            Special Deals
                        @endif
                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div
                            class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_deal as $deal)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'vn')
                                                                    <a href="{{url('product/detail/'.$deal->id. '/'. $deal->product_slug_vn)}}">
                                                                        <img src="{{asset($deal->product_thumbnail)}}"
                                                                             alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{url('product/detail/'.$deal->id. '/'. $deal->product_slug_en)}}">
                                                                        <img src="{{asset($deal->product_thumbnail)}}"
                                                                             alt="">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'vn')
                                                                    <a href="{{url('product/detail/'.$deal->id. '/'. $deal->product_slug_vn)}}">{{$deal->product_name_vn}}</a>
                                                                @else
                                                                    <a href="{{url('product/detail/'.$deal->id. '/'. $deal->product_slug_en)}}">{{$deal->product_name_en}}</a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
                                                                <span class="price">  {{$deal->discount_price0}} </span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
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
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
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

                <div class="home-banner"><img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}"
                                              alt="Image"></div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($slider as $sliders)
                            <div class="item"
                                 style="background-image: url('{{asset($sliders->slider_img)}}');">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text fadeInDown-1"> {{$sliders->title}}</div>
                                        <div class="excerpt fadeInDown-2 hidden-xs">
                                            <span>{{$sliders->description}}</span>
                                        </div>
                                        <div class="button-holder fadeInDown-3"><a
                                                href="index.php?page=single-product"
                                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                                                @if(session()->get('language') == 'vn')
                                                    Mua sắm ngay
                                                @else
                                                    Shop Now
                                                @endif
                                            </a></div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                    @endforeach
                    <!-- /.item -->

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">
                                                @if(session()->get('language') == 'vn')
                                                    Hoàn tiền
                                                @else
                                                    money back
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    <h6 class="text">
                                        @if(session()->get('language') == 'vn')
                                            Hoàn tiền trong 30 ngày
                                        @else
                                            30 Days Money Back Guarantee
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">
                                                @if(session()->get('language') == 'vn')
                                                    Miễn phí giao hàng
                                                @else
                                                    free shipping
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    <h6 class="text">
                                        @if(session()->get('language') == 'vn')
                                            Vận chuyển cho hoá đơn trên 1.000.000đ
                                        @else
                                            Shipping on orders over $50
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">
                                                @if(session()->get('language') == 'vn')
                                                    Giảm giá đặc biệt
                                                @else
                                                    special sale
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    <h6 class="text">
                                        @if(session()->get('language') == 'vn')
                                            Giảm thêm 250.000đ cho tất cả mặt hàng
                                        @else
                                            Extra $5 off on all items
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">
                            @if(session()->get('language') == 'vn')
                                Sản Phẩm Mới
                            @else
                                New Products
                            @endif
                        </h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all"
                                                  data-toggle="tab">
                                    @if(session()->get('language') == 'vn')
                                        Tất cả
                                    @else
                                        All
                                    @endif
                                </a></li>
                            @foreach($categoryParent as $category)
                                <li><a data-transition-type="backSlide" href="#category{{$category->id}}"
                                       data-toggle="tab">
                                        @if(session()->get('language') == 'vn')
                                            {{$category->category_name_vn}}
                                        @else
                                            {{$category->category_name_en}}
                                        @endif
                                    </a></li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($product as $item)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            @if(session()->get('language') == 'vn')
                                                                <a
                                                                    href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_vn)}}"><img
                                                                        src="{{asset($item->product_thumbnail)}}"
                                                                        alt="">
                                                                </a>
                                                            @else
                                                                <a
                                                                    href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_en)}}"><img
                                                                        src="{{asset($item->product_thumbnail)}}"
                                                                        alt="">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <!-- /.image -->
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = ($amount / $item->selling_price) * 100;
                                                        @endphp
                                                        @if($item->discount_price == null || $item->discount_price == $item->selling_price)
                                                            <div class="tag new"><span>new</span></div>
                                                        @else
                                                            <div class="tag sale">
                                                                <span>{{round($discount)}}%</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name">
                                                            @if(session()->get('language') == 'vn')
                                                                <a href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_vn)}}">{{$item->product_name_vn}}</a>
                                                            @else
                                                                <a href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_en)}}">{{$item->product_name_en}}</a>
                                                            @endif
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        <div class="product-price">
                                                            @if($item->discount_price == NULL || $item->discount_price == $item->selling_price)
                                                                <span class="price"> {{$item->selling_price}}</span>
                                                            @else
                                                                <span
                                                                    class="price"> {{$item->discount_price}}  </span>
                                                                <span class="price-before-discount">{{$item->selling_price}} </span>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-price -->
                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button data-toggle="modal"
                                                                            data-target="#exampleModal"
                                                                            id="{{$item->id}}"
                                                                            onclick="productView(this.id)"
                                                                            class="btn btn-primary icon"
                                                                            type="button"
                                                                            title="Add Cart"><i
                                                                            class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart
                                                                    </button>
                                                                </li>
                                                                <button id="{{$item->id}}"
                                                                        class="btn btn-primary icon"
                                                                        onclick="addWishlist(this.id)"
                                                                        type="button"
                                                                        title="Wishlist"><i
                                                                        class="icon fa fa-heart"></i>
                                                                </button>
                                                                <li class="lnk"><a data-toggle="tooltip"
                                                                                   class="add-to-cart"
                                                                                   href="detail.html"
                                                                                   title="Compare">
                                                                        <i class="fa fa-signal"
                                                                           aria-hidden="true"></i>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                @endforeach
                                <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>

                        @foreach($categoryParent as $categories)
                            <div class="tab-pane" id="category{{$categories->id}}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                         data-item="4">
                                        @foreach($categories->products as $item)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'vn')
                                                                    <a href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_vn)}}"><img
                                                                            src="{{asset($item->product_thumbnail)}}"
                                                                            alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_en)}}"><img
                                                                            src="{{asset($item->product_thumbnail)}}"
                                                                            alt="">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <!-- /.image -->
                                                            @php
                                                                $amount = $item->selling_price - $item->discount_price;
                                                                $discount = ($amount / $item->selling_price) * 100;
                                                            @endphp
                                                            @if($item->discount_price == NULL || $item->discount_price == $item->selling_price)
                                                                <div class="tag new"><span>new</span></div>
                                                            @else
                                                                <div class="tag sale">
                                                                    <span>{{round($discount)}}%</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'vn')
                                                                    <a href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_vn)}}">
                                                                        {{$item->product_name_vn}}
                                                                    </a>
                                                                @else
                                                                    <a href="{{url('product/detail/'. $item->id . '/'. $item->product_slug_en)}}">
                                                                        {{$item->product_name_en}}
                                                                    </a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                @if($item->discount_price == NULL || $item->discount_price == $item->selling_price)
                                                                    <span class="price"> {{$item->selling_price}}</span>
                                                                @else
                                                                    <span
                                                                        class="price"> {{$item->discount_price}}  </span>
                                                                    <span class="price-before-discount">{{$item->selling_price}} </span>
                                                                @endif
                                                            </div>

                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModal"
                                                                                id="{{$item->id}}"
                                                                                onclick="productView(this.id)"
                                                                                class="btn btn-primary icon"
                                                                                type="button"
                                                                                title="Add Cart"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                                type="button">Add to cart
                                                                        </button>
                                                                    </li>
                                                                    <button id="{{$item->id}}"
                                                                            class="btn btn-primary icon"
                                                                            onclick="addWishlist(this.id)"
                                                                            type="button"
                                                                            title="Wishlist"><i
                                                                            class="icon fa fa-heart"></i>
                                                                    </button>
                                                                    <li class="lnk"><a data-toggle="tooltip"
                                                                                       class="add-to-cart"
                                                                                       href="detail.html"
                                                                                       title="Compare">
                                                                            <i class="fa fa-signal"
                                                                               aria-hidden="true"></i>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                    @endforeach
                                    <!-- /.item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"><img class="img-responsive"
                                                        src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}"
                                                        alt=""></div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"><img class="img-responsive"
                                                        src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}"
                                                        alt=""></div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'vn')
                            sản phẩm nổi bật
                        @else
                            Featured products
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach($featured_product as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                @if(session()->get('language') == 'vn')
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_vn)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @else
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_en)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- /.image -->
                                            @php
                                                $amount = $product->selling_price -$product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
                                            @if($product->discount_price == NULL ||$product->discount_price == $product->selling_price)
                                                <div class="tag hot">
                                                    <span>hot</span>
                                                </div>
                                            @else
                                                <div class="tag sale">
                                                    <span>{{round($discount)}}%</span>
                                                </div>
                                            @endif

                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if(session()->get('language') == 'vn')
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_vn)}}">{{$product->product_name_vn}}</a>
                                                @else
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_en)}}">{{$product->product_name_en}}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if($product->discount_price == NULL || $product->discount_price == $product->selling_price)
                                                    <span class="price"> {{$product->selling_price}}</span>
                                                @else
                                                    <span
                                                        class="price"> {{$product->discount_price}} </span>
                                                    <span class="price-before-discount">{{$product->selling_price}} </span>
                                                @endif
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon"
                                                                type="button" title="Add Cart" data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                id="{{$product->id}}"
                                                                onclick="productView(this.id)"><i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                    </li>
                                                    <button id="{{$product->id}}"
                                                            class="btn btn-primary icon"
                                                            onclick="addWishlist(this.id)"
                                                            type="button"
                                                            title="Wishlist"><i
                                                            class="icon fa fa-heart"></i>
                                                    </button>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                    @endforeach
                    <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== skip product ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'vn')
                            {{$skip_category_6->category_name_vn}}
                        @else
                            {{$skip_category_6->category_name_en}}
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach($skip_product_6 as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                @if(session()->get('language') == 'vn')
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_vn)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @else
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_en)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- /.image -->
                                            @php
                                                $amount = $product->selling_price -$product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
                                            @if($product->discount_price == NULL ||$product->discount_price == $product->selling_price)
                                                <div class="tag hot">
                                                    <span>hot</span>
                                                </div>
                                            @else
                                                <div class="tag sale">
                                                    <span>{{round($discount)}}%</span>
                                                </div>
                                            @endif

                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if(session()->get('language') == 'vn')
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_vn)}}">{{$product->product_name_vn}}</a>
                                                @else
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_en)}}">{{$product->product_name_en}}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if($product->discount_price == NULL || $product->discount_price == $product->selling_price)
                                                    <span class="price"> {{$product->selling_price}}</span>
                                                @else
                                                    <span
                                                        class="price"> {{$product->discount_price}}  </span>
                                                    <span class="price-before-discount">{{$product->selling_price}} </span>
                                                @endif
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                    @endforeach
                    <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- ============================================== skip product ============================================== -->
                <!-- ============================================== skip brand ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">
                        {{-- @if(session()->get('language') == 'vn')
                            {{$skip_brand_8->brand_name_vn}}
                        @else
                            {{$skip_brand_8->brand_name_en}}
                        @endif --}}
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        {{-- @foreach($skip_product_8 as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                @if(session()->get('language') == 'vn')
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_vn)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @else
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_en)}}"><img
                                                            src="{{asset($product->product_thumbnail)}}"
                                                            alt="">
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- /.image -->
                                            @php
                                                $amount = $product->selling_price -$product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
                                            @if($product->discount_price == NULL ||$product->discount_price == $product->selling_price)
                                                <div class="tag hot">
                                                    <span>hot</span>
                                                </div>
                                            @else
                                                <div class="tag sale">
                                                    <span>{{round($discount)}}%</span>
                                                </div>
                                            @endif

                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if(session()->get('language') == 'vn')
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_vn)}}">{{$product->product_name_vn}}</a>
                                                @else
                                                    <a href="{{url('product/detail/'. $product->id . '/'. $product->product_slug_en)}}">{{$product->product_name_en}}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if($product->discount_price == NULL || $product->discount_price == $product->selling_price)
                                                    <span class="price"> {{$product->selling_price}}</span>
                                                @else
                                                    <span
                                                        class="price"> {{$product->discount_price}}  </span>
                                                    <span class="price-before-discount">{{$product->selling_price}} </span>
                                                @endif
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"><i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                    @endforeach --}}
                    <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- ============================================== skip brand ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"><img class="img-responsive"
                                                        src="{{asset('frontend/assets/images/banners/home-banner.jpg')}}"
                                                        alt=""></div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span></h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">Best seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p20.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p21.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p22.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p23.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p24.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p25.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p26.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"><a href="#"> <img
                                                                    src="{{asset('frontend/assets/images/products/p27.jpg')}}"
                                                                    alt=""> </a></div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span
                                                                class="price"> $450.99 </span></div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                                laudantium</a></h3>
                                        <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('frontend/assets/images/blog-post/post2.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"><a href="blog.html"><img
                                                    src="{{asset('frontend/assets/images/blog-post/post1.jpg')}}"
                                                    alt=""></a></div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                            voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a></div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">New Arrivals</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"><a href="detail.html"><img
                                                    src="{{asset('frontend/assets/images/products/p19.jpg')}}"
                                                    alt=""></a></div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"><span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span></div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart
                                                    </button>
                                                </li>
                                                <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                            class="icon fa fa-heart"></i> </a></li>
                                                <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                   title="Compare"> <i class="fa fa-signal"
                                                                                       aria-hidden="true"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"><a href="detail.html"><img
                                                    src="{{asset('frontend/assets/images/products/p28.jpg')}}"
                                                    alt=""></a></div>
                                        <!-- /.image -->

                                        <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"><span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span></div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart
                                                    </button>
                                                </li>
                                                <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                            class="icon fa fa-heart"></i> </a></li>
                                                <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                   title="Compare"> <i class="fa fa-signal"
                                                                                       aria-hidden="true"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"><a href="detail.html"><img
                                                    src="{{asset('frontend/assets/images/products/p30.jpg')}}"
                                                    alt=""></a></div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"><span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span></div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart
                                                    </button>
                                                </li>
                                                <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                            class="icon fa fa-heart"></i> </a></li>
                                                <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                   title="Compare"> <i class="fa fa-signal"
                                                                                       aria-hidden="true"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"><a href="detail.html"><img
                                                    src="{{asset('frontend/assets/images/products/p1.jpg')}}"
                                                    alt=""></a></div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"><span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span></div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart
                                                    </button>
                                                </li>
                                                <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                            class="icon fa fa-heart"></i> </a></li>
                                                <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                   title="Compare"> <i class="fa fa-signal"
                                                                                       aria-hidden="true"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"><a href="detail.html"><img
                                                    src="{{asset('frontend/assets/images/products/p2.jpg')}}"
                                                    alt=""></a></div>
                                        <!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"><span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span></div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart
                                                    </button>
                                                </li>
                                                <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                            class="icon fa fa-heart"></i> </a></li>
                                                <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                   title="Compare"> <i class="fa fa-signal"
                                                                                       aria-hidden="true"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"><a href="detail.html"><img
                                                    src="{{asset('frontend/assets/images/products/p3.jpg')}}"
                                                    alt=""></a></div>
                                        <!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>
                                        <div class="product-price"><span class="price"> $450.99 </span> <span
                                                class="price-before-discount">$ 800</span></div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                        cart
                                                    </button>
                                                </li>
                                                <li class="lnk wishlist"><a class="add-to-cart" href="detail.html"
                                                                            title="Wishlist"> <i
                                                            class="icon fa fa-heart"></i> </a></li>
                                                <li class="lnk"><a class="add-to-cart" href="detail.html"
                                                                   title="Compare"> <i class="fa fa-signal"
                                                                                       aria-hidden="true"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
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
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
@endsection
