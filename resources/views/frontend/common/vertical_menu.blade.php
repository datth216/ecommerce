<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
        @if(session()->get('language') == 'vn')
            Danh mục
        @else
            Categories
        @endif
    </div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categoryParent as $category)
                <li class="dropdown menu-item"><a
                        href=""
                        class="dropdown-toggle"
                        data-toggle="dropdown"><i
                            class="{{$category->category_icon}}"
                            aria-hidden="true"></i>
                        @if(session()->get('language') == 'vn')
                            {{$category->category_name_vn}}
                        @else
                            {{$category->category_name_en}}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach($category->categoryChildren as $categoryChild)
                                    <div class="col-sm-12 col-md-3">

                                        @if(session()->get('language') == 'vn')
                                                <h2 class="title">
                                                    {{$categoryChild->category_name_vn}}
                                                    @else
                                                            <h2 class="title">
                                                                {{$categoryChild->category_name_en}}
                                                                @endif
                                                            </h2>
                                                        <ul class="links list-unstyled">
                                                            @foreach($categoryChild->categoryChildren as $child)
                                                                <li>
                                                                    @if(session()->get('language') == 'vn')
                                                                        <a href="{{url('categories/product/'. $child->id . '/' . $child->category_slug_vn)}}">
                                                                            {{$child->category_name_vn}}
                                                                        </a>
                                                                    @else
                                                                        <a href="{{url('categories/product/'. $child->id . '/' . $child->category_slug_en)}}">
                                                                            {{$child->category_name_en}}
                                                                        </a>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                    </div>
                            @endforeach
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
        @endforeach
        <!-- /.menu-item -->
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
