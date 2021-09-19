@php
$product = \App\Models\Product::where('status', 1)
    ->limit(5)
    ->get();
$hotdeal = \App\Models\Product::where('hot_deals', 1)
    ->latest()
    ->limit(4)
    ->get();
$special_offer = \App\Models\Product::where('special_offer', 1)
    ->limit(5)
    ->get();
$special_deal = \App\Models\Product::where('special_deal', 1)
    ->latest()
    ->limit(3)
    ->get();
$featured_product = \App\Models\Product::where('featured', 1)->get();
$slider = \App\Models\Slider::where('status', 1)
    ->limit(3)
    ->get();
$categoryParent = \App\Models\Category::where('parent_id', 0)->get();
$skip_category_6 = \App\Models\Category::skip(4)->first();
$skip_product_6 = \App\Models\Product::where('status', 1)
    ->where('category_id', $skip_category_6->id)
    ->get();
// $skip_brand_8 = \App\Models\Brands::skip(8)->first();
// $skip_product_8 = \App\Models\Product::where('status', 1)->where('brand_id', $skip_brand_8->id)->get();
@endphp
@extends('frontend.index')
@section('content')

    <div class="body-content outer-top-bd" style="min-height: 451px;">
        <div class="container">
            <div class="x-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 x-text text-center">
                        <h1>404</h1>
                        <p>We are sorry, the page you've requested is not available. </p>

                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Go To Homepage</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


@endsection
