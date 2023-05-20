<div class="main-nav" wfd-id="182">
    <div class="container" wfd-id="183">
        <nav>
            <ul id="nav" class="nav hidden-sm hidden-xs" wfd-id="185">
                <li class="hidden-sm hidden-xs nav-item " wfd-id="203"><a class="nav-link" href="{{route('homePage')}}" title="Trang chủ">Trang chủ</a></li>
                <li class="hidden-sm hidden-xs nav-item " wfd-id="202"><a class="nav-link" href="{{route('About')}}" title="Giới thiệu">Giới thiệu</a></li>
                <li class="hidden-sm hidden-xs nav-item  has-dropdown" wfd-id="200">
                    <a href="#" title="Lĩnh vực hoạt động" class="nav-link">Lĩnh vực hoạt động <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
                    <ul class="dropdown-menu" wfd-id="201">
                        @foreach($activityCategories as $a_cate)
                            @if(count($a_cate->childs))
                                <li class="dropdown-submenu nav-item-lv2">
                                    <a class="nav-link" title="{{$a_cate->name}}">{{$a_cate->name}} <i class="fa fa-angle-right"></i></a>

                                    <ul class="dropdown-menu">
                                        @foreach($a_cate->childs as $child)
                                        <li class="nav-item-lv3">
                                            <a class="nav-link" title="{{$child->name}}" href="{{count($child->posts) ? route('activityPost', $child->slug) : ''}}">{{$child->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item-lv2">
                                    <a class="nav-link" title="{{$a_cate->name}}" href="{{count($a_cate->posts) ? route('activityPost', $a_cate->slug) : ''}}">{{$a_cate->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="hidden-sm hidden-xs nav-item  has-mega has-dropdown" wfd-id="198">
                    <a href="#" title="Sản phẩm" class="nav-link">Sản phẩm <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
                    <div class="mega-content" wfd-id="199">
                        <div class="level0-wrapper2">
                            <div class="nav-block nav-block-center">
                                <ul class="level0">

                                    @foreach($productCategories as $p_cate)
                                        @if($p_cate->childs()->count() > 0)
                                            <li class="level1 parent item ">
                                                <h2 class="h4"><a href="{{route('Category', $p_cate->slug)}}" title="{{$p_cate->name}}">{{$p_cate->name}}</a></h2>
                                                <ul class="level1">
                                                    @foreach($p_cate->childs as $p_child)
                                                    <li class="level2"> <a href="{{route('Category', $p_child->slug)}}" title="{{$p_child->name}}">{{$p_child->name}}</a> </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                        @else
                                            <li class="level1 item">
                                                <h2 class="h4"><a href="{{route('Category', $p_cate->slug)}}" title="{{$p_cate->name}}">{{$p_cate->name}}</a> </h2>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="hidden-sm hidden-xs nav-item " wfd-id="197"><a class="nav-link" href="{{route('Post')}}" title="Tin tức">Tin tức</a></li>
                <li class="hidden-sm hidden-xs nav-item " wfd-id="196"><a class="nav-link" href="#" title="Thư viện">Thư viện</a></li>
                <li class="hidden-sm hidden-xs nav-item " wfd-id="195"><a class="nav-link" href="#" title="Tuyển dụng">Tuyển dụng</a></li>
                <li class="hidden-sm hidden-xs nav-item " wfd-id="194"><a class="nav-link" href="{{route('contact')}}" title="Liên hệ">Liên hệ</a></li>
                <!-- menu mobile -->
                <li class="hidden-lg hidden-md nav-item active" wfd-id="193"><a class="nav-link" href="#" title="Trang chủ">Trang chủ</a></li>
                <li class="hidden-lg hidden-md nav-item " wfd-id="192"><a class="nav-link" href="#" title="Giới thiệu">Giới thiệu</a></li>
                <li class="hidden-lg hidden-md nav-item  has-dropdown" wfd-id="191">
                    <a href="#" title="Lĩnh vực hoạt động" class="nav-link">Lĩnh vực hoạt động <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
                    <ul class="dropdown-menu">
                        @foreach($activityCategories as $a_cate)
                            @if(count($a_cate->childs))

                                <li class="dropdown-submenu nav-item-lv2">
                                    <a class="nav-link" title="{{$a_cate->name}}">{{$a_cate->name}} <i class="fa fa-angle-right"></i></a>

                                    <ul class="dropdown-menu">
                                        @foreach($a_cate->childs as $child)
                                            <li class="nav-item-lv3">
                                                <a class="nav-link" title="{{$child->name}}" href="{{count($child->posts) ? route('activityPost', $child->slug) : ''}}">{{$child->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item-lv2">
                                    <a class="nav-link" title="{{$a_cate->name}}" href="{{count($a_cate->posts) ? route('activityPost', $a_cate->slug) : ''}}">{{$a_cate->name}}</a>
                                </li>
                            @endif
                        @endforeach



                    </ul>
                </li>

                <li class="hidden-lg hidden-md nav-item  has-dropdown" wfd-id="190">
                    <a href="#" title="Sản phẩm" class="nav-link">Sản phẩm <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>

                    <ul class="dropdown-menu">
                        @foreach($productCategories as $p_cate)
                            @if($p_cate->childs()->count() > 0)
                                <li class="dropdown-submenu nav-item-lv2">
                                <a class="nav-link" title="{{$p_cate->name}}" href="#">{{$p_cate->name}} <i class="fa fa-angle-down"></i></a>

                                <ul class="dropdown-menu">
                                    @foreach($p_cate->childs as $p_child)
                                    <li class="nav-item-lv3">
                                        <a class="nav-link" title="{{$p_child->name}}" href="#">{{$p_child->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @else
                                <li class="nav-item-lv2">
                                    <a class="nav-link" title="{{$p_cate->name}}" href="#">{{$p_cate->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>



                <li class="hidden-lg hidden-md nav-item " wfd-id="189"><a class="nav-link" href="#" title="Tin tức">Tin tức</a></li>



                <li class="hidden-lg hidden-md nav-item " wfd-id="188"><a class="nav-link" href="#" title="Thư viện">Thư viện</a></li>



                <li class="hidden-lg hidden-md nav-item " wfd-id="187"><a class="nav-link" href="#" title="Tuyển dụng">Tuyển dụng</a></li>



                <li class="hidden-lg hidden-md nav-item " wfd-id="186"><a class="nav-link" href="#" title="Liên hệ">Liên hệ</a></li>


            </ul>

            <ul class="nav hidden-lg nav-mobile" wfd-id="184">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('homePage')}}" title="Trang chủ">
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('About')}}" title="Giới thiệu">
                        Giới thiệu
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" title="Lĩnh vực hoạt động">
                        Lĩnh vực hoạt động
                    </a>
                    <span class="open-close2">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</span>
                    <ul class="sub-menu-1" style="display: none">
                        @foreach($activityCategories as $a_cate)
                            @if(count($a_cate->childs))
                                <li class="dropdown-submenu nav-item-lv2">
                                    <a class="nav-link" href="#" title="{{$a_cate->name}}">
                                        <span>{{$a_cate->name}}</span>
                                    </a>
                                    <span class="open-close2">
									<i class="fa fa-angle-down" aria-hidden="true"></i>
								</span>
                                    <ul class="sub-menu-2" style="display: none">
                                        @foreach($a_cate->childs as $child)
                                            <li class="nav-item-lv3">
                                                <a class="nav-link" title="{{$child->name}}" href="{{count($child->posts) ? route('activityPost', $child->slug) : ''}}">{{$child->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item-lv2">
                                    <a class="nav-link" title="{{$a_cate->name}}" href="{{count($a_cate->posts) ? route('activityPost', $a_cate->slug) : ''}}">{{$a_cate->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link" title="Sản phẩm">
                        Sản phẩm
                    </a>
                    <span class="open-close2">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</span>
                    <ul class="sub-menu-1" style="display: none">
                        @foreach($productCategories as $p_cate)
                            @if($p_cate->childs()->count() > 0)
                                    <li class="dropdown-submenu nav-item-lv2">
                                        <a class="nav-link" href="#" title="{{$p_cate->name}}">
                                            <span>{{$p_cate->name}}</span>
                                        </a>
                                        <span class="open-close2">
									        <i class="fa fa-angle-down" aria-hidden="true"></i>
								        </span>
                                        <ul class="sub-menu-2" style="display: none">
                                            @foreach($p_cate->childs as $p_child)
                                                <li class="nav-item-lv3">
                                                    <a class="nav-link" title="{{$p_child->name}}" href="{{route('Category', $p_child->slug)}}">{{$p_child->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                            @else
                                <li class="nav-item-lv2">
                                    <a class="nav-link" title="{{$p_cate->name}}" href="{{route('Category', $p_cate->slug)}}">{{$p_cate->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="{{route('Post')}}" title="Tin tức">
                        Tin tức
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="#" title="Thư viện">
                        Thư viện
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="#" title="Tuyển dụng">
                        Tuyển dụng
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}" title="Liên hệ">
                        Liên hệ
                    </a>
                </li>


            </ul>
        </nav>
    </div>
</div>
