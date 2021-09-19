@php
    $tags_en = \App\Models\Product::groupBy('product_tag_en')->select('product_tag_en')->limit(10)->get();
    $tags_vn = \App\Models\Product::groupBy('product_tag_vn')->select('product_tag_vn')->limit(10)->get();
@endphp
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">
        @if(session()->get('language') == 'vn')
            Tag Sản phẩm
        @else
            Product tags
        @endif
    </h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'vn')
                @foreach($tags_vn as $indexTag => $tag)
                    <a class="item {{($indexTag == 0)? 'active': ''}}"
                       href="{{url('product/tag/'. $tag->product_tag_vn)}}">{{ str_replace(',', '|', $tag->product_tag_vn)}}</a>
                @endforeach
            @else
                @foreach($tags_en as $indexTag => $tag)
                    <a class="item {{($indexTag == 0)?'active': ''}}"
                       href="{{url('product/tag/'. $tag->product_tag_en)}}">{{ str_replace(',', '|', $tag->product_tag_en)}}</a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
