@extends('front.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/product-category.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/product-category-main.css') }}">
@endsection
@section('content')
    <section class="bread_crumb py-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">

                        <li class="home">
                            <a itemprop="url" href="/" ><span itemprop="title">Trang chủ</span></a>
                            <span> <i class="fa fa-angle-right"></i> </span>
                        </li>


                        <li>
                            <a itemprop="url" href="/collections/vietnamese-agricultural-products"><span itemprop="title">Sản phẩm</span></a>
                            <span> <i class="fa fa-angle-right"></i> </span>
                        </li>

                        <li><strong><span itemprop="title">{{$product->name}}</span></strong><li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="product ">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 ">
                    <div class="details-product">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-5">
                                <div class="large-image">
                                    <a href="{{$product->image->path ?? '/site/image/no_image.jpg'}}" data-rel="prettyPhoto[product-gallery]">
                                        <img id="zoom_01" src="{{$product->image->path ?? '/site/image/no_image.jpg'}}" alt="{{$product->name}}" >
                                    </a>

                                    <div class="hidden" id="popup-image">

                                    </div>


                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 details-pro">
                                <h1 class="title-head">{{$product->name}}</h1>


                                <div class="status clearfix">
                                    Trạng thái: <span class="inventory">

								<i class="fa fa-check"></i> Còn hàng

								</span>
                                </div>


                                <div class="status clearfix">
                                    Xuất xứ: <span class="">

								 {{$product->origin}}

								</span>
                                </div>

                                <div class="price-box clearfix">

                                    <div class="special-price"><span class="price product-price">Liên hệ </span> </div> <!-- Hết hàng -->

                                </div>


                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-lg-12 margin-top-15 margin-bottom-10">
                                <!-- Nav tabs -->
                                <div class="product-tab e-tabs">

                                    <ul class="tabs tabs-title clearfix">
                                        <li class="tab-link" data-tab="tab-1">
                                            <h3><span>Mô tả</span></h3>
                                        </li>
                                    </ul>

                                    <div class="tab-1 tab-content">
                                        <div class="rte">
								            {!! $product->body !!}
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="product-fb-comments">
                                <div class="fb-comments" data-width="100%" data-href="https://antfarm.com.vn/products/dua-hau" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="dqdt-sidebar sidebar right left-content col-lg-3 ">

                    <aside class="aside-item sidebar-category collection-category">
                        <div class="aside-title">
                            <h2 class="title-head margin-top-0"><span>Danh mục sản phẩm</span></h2>
                        </div>
                        <div class="aside-content">
                            <nav class="nav-category navbar-toggleable-md">
                                <ul class="nav navbar-pills">


                                    <li class="nav-item">
                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                        <a href="/collections/nong-san-viet-ant-farm?view=vi" class="nav-link">Xuất khẩu</a>
                                        <i class="fa fa-angle-down" ></i>
                                        <ul class="dropdown-menu">


                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/trai-cay-viet-ant-farm?view=vi">Trái cây</a>
                                            </li>



                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/rau-cu-viet?view=vi">Rau củ</a>
                                            </li>



                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/san-pham-dong-lanh-xuat-khau?view=vi">Sản phẩm đông lạnh</a>
                                            </li>



                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/san-pham-kho-xuat-khau?view=vi">Sản phẩm khô</a>
                                            </li>


                                        </ul>
                                    </li>



                                    <li class="nav-item">
                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                        <a href="/collections/rau-sach-nhap-khau-ant-farm?view=vi" class="nav-link">Nhập khẩu</a>
                                        <i class="fa fa-angle-down" ></i>
                                        <ul class="dropdown-menu">


                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/trai-cay-nhap-khau-ant-farm?view=vi">Trái cây</a>
                                            </li>



                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/rau-sach-nhap-khau-ant-farm?view=vi">Rau củ</a>
                                            </li>



                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/san-pham-dong-lanh-ant-farm?view=vi">Sản phẩm đông lạnh</a>
                                            </li>



                                            <li class="nav-item">

                                                <a class="nav-link" href="/collections/san-pham-kho-nhap-khau?view=vi">Sản phẩm khô</a>
                                            </li>


                                        </ul>
                                    </li>


                                </ul>
                            </nav>
                        </div>
                    </aside>



                </aside>
                <div id="open-filters" class="open-filters hidden-lg">
                    <i class="fa fa-align-right"></i>
                    <span>Lọc</span>
                </div>


            </div>
        </div>




        <section class="section featured-product wow fadeInUp mb-4">
            <div class="container">
                <div class="section-title a-center">
                    <h2><a href="/vietnamese-agricultural-products">Sản phẩm liên quan</a></h2>
                    <p>Có phải bạn đang tìm những sản phẩm dưới đây</p>
                </div>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs" data-lgg-items="4" data-lg-items='4' data-md-items='4' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-nav="true">
                    <div class="item item-carousel">
                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/bap-cai-xanh-viet-nam" title="Bắp cải xanh">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/bap_cai_xanh_984206944e6b46a6ac16bf15e209f5fc_medium.jpg" alt="Bắp cải xanh">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045698625" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/bap-cai-xanh-viet-nam" data-handle="bap-cai-xanh-viet-nam" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/bap-cai-xanh-viet-nam" title="Bắp cải xanh">Bắp cải xanh</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">




















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/bap-nep-dong-lanh" title="Bắp nếp đông lạnh">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/thung_bap_52ab5174f5604f66a2faaace92ef7dc9_medium.jpg" alt="Bắp nếp đông lạnh">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045676513" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/bap-nep-dong-lanh" data-handle="bap-nep-dong-lanh" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/bap-nep-dong-lanh" title="Bắp nếp đông lạnh">Bắp nếp đông lạnh</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">




















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/bi-do" title="Bí đỏ">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/ant-farm-pumpkin-thumnail_475ec1d71800413eb3dcbada2295aa40_1024x1024_f1dd6da3292146c1a83cbfaa57905d9a_medium.png" alt="Bí đỏ">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045742256" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/bi-do" data-handle="bi-do" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/bi-do" title="Bí đỏ">Bí đỏ</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">






















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/bo" title="Bơ">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/bo_a1d9838234f04f5ba2b95dab6af0a1be_medium.jpg" alt="Bơ">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045696374" enctype="multipart/form-data">
                                        <div>

                                            <input class="hidden" type="hidden" name="variantId" value="1101048237" />
                                            <button class="btn-cart btn btn-primary  left-to" data-toggle="tooltip" title="Chọn sản phẩm"  type="button" onclick="window.location.href='/products/bo'" >
                                                <i class="fa fa-gear"></i>
                                            </button>


                                            <a href="/products/bo" data-handle="bo" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/bo" title="Bơ">Bơ</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">




















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/bong-cai-trang-viet-nam" title="Bông cải trắng">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/bong_cai_trang_df892edee3454a44a19333bb6312c01e_medium.jpg" alt="Bông cải trắng">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045698601" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/bong-cai-trang-viet-nam" data-handle="bong-cai-trang-viet-nam" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/bong-cai-trang-viet-nam" title="Bông cải trắng">Bông cải trắng</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">






















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/buoi" title="Bưởi">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/buoi_2296de20260b4d43aa8572abdd684a6a_medium.jpg" alt="Bưởi">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045701589" enctype="multipart/form-data">
                                        <div>

                                            <input class="hidden" type="hidden" name="variantId" value="1101061220" />
                                            <button class="btn-cart btn btn-primary  left-to" data-toggle="tooltip" title="Chọn sản phẩm"  type="button" onclick="window.location.href='/products/buoi'" >
                                                <i class="fa fa-gear"></i>
                                            </button>


                                            <a href="/products/buoi" data-handle="buoi" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/buoi" title="Bưởi">Bưởi</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">




















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/ca-chua" title="Cà chua">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/ca_chua_aaa6c369c35842d59fabb6bd9dac4539_medium.jpg" alt="Cà chua">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045698497" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/ca-chua" data-handle="ca-chua" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/ca-chua" title="Cà chua">Cà chua</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">




















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/ca-rot" title="Cà rốt">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/carrot-2_0415ae8d0b1f41639469af3657f72b2c_master_fd9238344ea44882b6208a1c452e2782_medium.png" alt="Cà rốt">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045593079" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/ca-rot" data-handle="ca-rot" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/ca-rot" title="Cà rốt">Cà rốt</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="item item-carousel">




















                        <div class="product-box">
                            <div class="product-thumbnail flexbox-grid">
                                <a href="/products/ca-tim" title="Cà tím">
                                    <img src="//theme.hstatic.net/200000342937/1001030312/14/rolling.svg?v=139"  data-lazyload="//product.hstatic.net/200000342937/product/ca_tim_1954486e2a934132a10e1bfda0a6d765_medium.jpg" alt="Cà tím">
                                </a>



                                <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-1045698574" enctype="multipart/form-data">
                                        <div>



                                            <a href="/products/ca-tim" data-handle="ca-tim" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                                <i class="fa fa-eye"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info a-center">
                                <h3 class="product-name"><a href="/products/ca-tim" title="Cà tím">Cà tím</a></h3>



                                <div class="price-box clearfix">

                                    Liên hệ

                                </div>

                            </div>

                        </div>
                    </div>


                </div>
                <!-- /.home-owl-carousel -->
            </div>
        </section>
        <!-- /.section -->



    </section>

@endsection
@push('scripts')
    <script>
        $(document).ready(function ($) {
            var settings = {
                searchArticle: "0",
                articleLimit: 5,
                productLimit: 5,
                showDescription: "0"
            };
            var suggestionWrap = document.getElementById('search_suggestion');
            var searchTop = document.getElementById('search_top');
            var productResults = document.getElementById('product_results');
            var articleResults = document.getElementById('article_results');
            var searchBottom = document.getElementById('search_bottom');
            var isArray = function(a) {
                return Object.prototype.toString.call(a) === "[object Array]";
            }
            var createEle = function(desc) {
                if (!isArray(desc)) {
                    return createEle.call(this, Array.prototype.slice.call(arguments));
                }
                var tag = desc[0];
                var attributes = desc[1];
                var el = document.createElement(tag);
                var start = 1;
                if (typeof attributes === "object" && attributes !== null && !isArray(attributes)) {
                    for (var attr in attributes) {
                        el[attr] = attributes[attr];
                    }
                    start = 2;
                }
                for (var i = start; i < desc.length; i++) {
                    if (isArray(desc[i])) {
                        el.appendChild(createEle(desc[i]));
                    }
                    else {
                        el.appendChild(document.createTextNode(desc[i]));
                    }
                }
                return el;
            }
            var loadResult = function(data, type) {
                if(type==='product')
                {
                    productResults.innerHTML = '';
                }
                if(type==='article')
                {
                    articleResults.innerHTML = '';
                }
                var articleLimit = parseInt(settings.articleLimit);
                var productLimit = parseInt(settings.productLimit);
                var showDescription = settings.showDescription;
                if(data.indexOf('<iframe') > -1) {
                    data = data.substr(0, (data.indexOf('<iframe') - 1))
                }
                var dataJson = JSON.parse(data);
                if(dataJson.results !== undefined)
                {
                    var resultList = [];
                    searchTop.style.display = 'block';
                    if(type === 'product') {
                        productResults.innerHTML = ''
                        productLimit = Math.min(dataJson.results.length, productLimit);
                        for(var i = 0; i < productLimit; i++) {
                            resultList[i] = dataJson.results[i];
                        }
                    }
                    else {
                        articleResults.innerHTML = '';
                        articleLimit = Math.min(dataJson.results.length, articleLimit);
                        for(var i = 0; i < articleLimit; i++) {
                            resultList[i] = dataJson.results[i];
                        }
                    }
                    var searchTitle = 'Sản phẩm gợi ý'
                    if(type === 'article') {
                        searchTitle = 'Bài viết';
                    }
                    var searchHeading = createEle(['h3', searchTitle]);
                    var searchList = document.createElement('ul');
                    for(var index = 0; index < resultList.length; index++) {
                        var item = resultList[index];
                        var priceDiv = '';
                        var descriptionDiv = '';
                        if(type == 'product') {
                            if(item.price_contact) {
                                priceDiv = ['div', {className: 'item_price'},
                                    ['ins', item.price_contact]
                                ];
                            }
                            else {
                                if(item.price_from) {
                                    priceDiv = ['div', {className: 'item_price'},
                                        ['span', 'Từ '],
                                        ['ins', item.price_from]
                                    ];
                                }
                                else {
                                    priceDiv = ['div', {className: 'item_price'},
                                        ['ins', parseFloat(item.price)  ? item.price : 'Liên hệ']
                                    ];
                                }
                            }
                            if(item.compare_at_price !== undefined) {
                                priceDiv.push(['del', item.compare_at_price]);
                            }
                        }
                        if(showDescription == '1') {
                            descriptionDiv = ['div', {className: 'item_description'}, item.description]
                        }
                        var searchItem = createEle(
                            ['li',
                                ['a', {href: item.url, title: item.title},
                                    ['div', {className: 'item_image'},
                                        ['img', {src: item.thumbnail, alt: item.title}]
                                    ],
                                    ['div', {className: 'item_detail'},
                                        ['div', {className: 'item_title'},
                                            ['h4', item.title]
                                        ],
                                        priceDiv, descriptionDiv
                                    ]
                                ]
                            ]
                        )
                        searchList.appendChild(searchItem);
                    }
                    if(type === 'product') {
                        productResults.innerHTML = '';
                        productResults.appendChild(searchHeading);
                        productResults.appendChild(searchList);
                    }
                    else {
                        articleResults.innerHTML = '';
                        articleResults.appendChild(searchHeading);
                        articleResults.appendChild(searchList);
                    }
                }
                else
                {
                    if(type !== 'product' && false)
                    {
                        searchTop.style.display = 'none'
                    }
                }
            }
            var loadAjax = function(q) {
                if(settings.searchArticle === '1') {
                    loadArticle(q);
                }
                loadProduct(q);
            }
            var loadProduct = function(q) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        loadResult(this.responseText, 'product')
                    }
                }
                xhttp.open('GET', '/search?type=product&q=' + q + '&view=json', true);
                xhttp.send();
            }
            var loadArticle = function(q) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        loadResult(this.responseText, 'article')
                    }
                }
                xhttp.open('GET', '/search?type=article&q=' + q + '&view=json', true);
                xhttp.send();
            }
            var searchForm = document.querySelectorAll('.header_search form[action="/search"]');
            var getPos = function(el) {
                for (var lx=0, ly=0; el != null; lx += el.offsetLeft, ly += el.offsetTop, el = el.offsetParent);
                return {x: lx,y: ly};
            }
            var initSuggestion = function(el) {

                var parentTop = el.offsetParent.offsetTop;
                var position = getPos(el);
                var searchInputHeight = el.offsetHeight;
                var searchInputWidth = el.offsetWidth;
                var searchInputX = position.x;
                var searchInputY = position.y;
                var suggestionPositionX = searchInputX;
                var suggestionPositionY = searchInputY + searchInputHeight;
                suggestionWrap.style.right = '0px';
                suggestionWrap.style.top = 'calc(100% + 52px)';
                suggestionWrap.style.width = searchInputWidth + 'px';
            }
            window.__q__ = '';
            var loadAjax2 = function (q) {
                if(settings.searchArticle === '1') {
                }
                window.__q__ = q;
                return $.ajax({
                    url: '/search?type=product&q=' + q + '&view=json',
                    type:'GET'
                }).promise();
            };
            if(searchForm.length > 0) {
                for(var i = 0; i < searchForm.length; i++) {
                    var form = searchForm[i];

                    var searchInput = form.querySelector('input');

                    var keyup = Rx.Observable.fromEvent(searchInput, 'keyup')
                        .map(function (e) {
                            var __q = e.target.value;
                            initSuggestion(e.target);
                            if(__q === '' || __q === null) {
                                suggestionWrap.style.display = 'none';
                            }
                            else{
                                suggestionWrap.style.display = 'block';
                                var showMore = searchBottom.getElementsByClassName('show_more')[0];
                                showMore.setAttribute('href', '/search?q=' + __q);
                                showMore.querySelector('span').innerHTML = __q;
                            }
                            return e.target.value;
                        })
                        .filter(function (text) {
                            return text.length > 0;
                        })
                        .debounce(300  )
                        .distinctUntilChanged();
                    var searcher = keyup.flatMapLatest(loadAjax2);
                    searcher.subscribe(
                        function (data) {
                            loadResult(data, 'product');
                            if(settings.searchArticle === '1') {
                                loadArticle(window.__q__);
                            }
                        },
                        function (error) {

                        });
                }
            }
            window.addEventListener('click', function() {
                suggestionWrap.style.display = 'none';
            });
        });

    </script>
    <script src='/site/js/detail.js?v=139' type='text/javascript'></script>

@endpush
