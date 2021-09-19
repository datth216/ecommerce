<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        @if(session()->get('language') == 'vn')
            ưu đãi lớn
        @else
            hot deals
        @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($hotdeal as $data)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"><img
                                src="{{asset($data->product_thumbnail)}}" alt="">
                        </div>
                        @php
                            $amount = $data->selling_price - $data->discount_price;
                            $discount = ($amount / $data->selling_price) * 100;
                        @endphp
                        @if($data->discount_price == NULL ||$data->discount_price == $data->selling_price)
                            <div class="tag hot">
                                <span>hot</span>
                            </div>
                        @else
                            <div class="sale-offer-tag"><span>{{round($discount)}}%<br>off</span></div>
                        @endif
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"><span class="key">120</span> <span
                                        class="value">DAYS</span>
                                </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"><span class="key">20</span> <span
                                        class="value">HRS</span>
                                </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"><span class="key">36</span> <span
                                        class="value">MINS</span></div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"><span class="key">60</span> <span
                                        class="value">SEC</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name">
                            @if(session()->get('language') == 'vn')
                                <a href="{{url('product/detail/'.$data->id. '/'. $data->product_slug_vn)}}">{{$data->product_name_vn}}</a>
                            @else
                                <a href="{{url('product/detail/'.$data->id. '/'. $data->product_slug_en)}}">{{$data->product_name_en}}</a>
                            @endif
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price">
                            @if($data->discount_price == NULL ||$data->discount_price == $data->selling_price)
                                <span
                                    class="price"> {{$data->selling_price}} </span>
                            @else
                                <span class="price"> {{$data->discount_price}} </span>
                                <span class="price-before-discount">{{$data->selling_price}}</span>
                            @endif
                        </div>
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                        type="button"><i class="fa fa-shopping-cart"></i></button>
                                <button class="btn btn-primary cart-btn" type="button" onclick="addToCart()">Add to cart
                                </button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>
