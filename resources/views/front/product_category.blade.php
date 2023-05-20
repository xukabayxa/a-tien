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
                            <a itemprop="url" href="/"><span itemprop="title">Trang chủ</span></a>
                            <span> <i class="fa fa-angle-right"></i> </span>
                        </li>


                        <li><strong><span itemprop="title"> Sản phẩm</span></strong></li>


                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container" ng-controller="ListProducts">
        <div class="row">
            <section class="main_container collection col-lg-12">
                <div class="box-heading  relative">
                    <h1 class="title-head title-fixxx margin-top-0">Sản phẩm của chúng tôi</h1>
                </div>
                <div class="category-products products">

                    <div class="sortPagiBar">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 text-xs-left text-sm-right">
                                <div class="bg-white clearfix">

                                    <div id="sort-by">
                                        <label class="left hidden-xs">Sắp xếp: </label>
                                        <ul>
                                            <li><span class="val">Mặc định</span>
                                                <ul class="ul_2">
                                                    <li><a href="{{route('front.category-product-get')}}">Mặc định</a></li>
                                                    <li><a href="{{route('front.category-product-get')}}?order=alpha-asc">A &rarr; Z</a>
                                                    </li>
                                                    <li><a href="{{route('front.category-product-get')}}?order=alpha-desc">Z &rarr; A</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="products-view products-view-grid">
                        <div class="row">

                            @foreach($products as $product)
                                <div class="col-xs-6 col-xss-6 col-sm-4 col-md-4 col-lg-4">
                                    <div class="product-box">
                                        <div class="product-thumbnail flexbox-grid">
                                            <a href="{{route('front.get-detail-product', $product->slug)}}" title="Dưa hấu">
                                                <img src="{{$product->image->path ?? '/site/image/no_image.jpg'}}"
                                                     data-lazyload="{{$product->image->path ?? '/site/image/no_image.jpg'}}"
                                                     alt="{{$product->name}}">
                                            </a>


                                            <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                                <form action="/cart/add" method="post"
                                                      class="variants form-nut-grid margin-bottom-0"
                                                      data-id="product-actions-1045857222" enctype="multipart/form-data">
                                                    <div>


                                                        <a href="javascript:void(0)" data-handle="dua-hau" data-toggle="tooltip"
                                                           ng-click="quickView({{$product->id}})"
                                                           title="Xem nhanh" class="btn-gray btn_view btn right-to">
                                                            <i class="fa fa-eye"></i></a>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-info a-center">
                                            <h3 class="product-name"><a href="{{route('front.get-detail-product', $product->slug)}}" title="{{$product->name}}">{{$product->name}}</a>
                                            </h3>


                                            <div class="price-box clearfix">

                                                Liên hệ

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach


                                {{ $products->links('front.pagination.paginate2') }}

                        </div>
                        <div class="text-center">

                        </div>

                    </section>

                </div>
            </section>
        </div>

        <div id="quickview" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="image margin-bottom-15">
                                    <a class="img-product clearfix" title="" href="javascript:;">
                                        <img id="product-featured-image-quickview"
                                             class="img-responsive product-featured-image-quickview"
                                             src="<% product.image ? product.image.path : '/site/image/no_image.jpg'%>"
                                             alt="<% product.name %>"/>
                                    </a>
                                </div>
                                <div id="thumbnail_quickview">
                                    <div class="thumblist"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="content">
                                    <h3 class="product-name"><a href=""><% product.name %></a></h3>
                                    <div class="status clearfix">
                                        Trạng thái: <span class="inventory">
								<i class="fa fa-check"></i> Còn hàng
								</span>
                                    </div>

                                    <div class="status clearfix">
                                        Xuất xứ: <span class="">
								<% product.origin %>
								</span>
                                    </div>
                                    <div class="product-description rte"></div>
                                    <a href="/san-pham/<% product.slug %>" class="view-more">Xem chi tiết</a>
                                    <div class="clearfix"></div>
                                    <div class="info-other">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-close btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
                    </button>

                </div>

            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        app.controller('ListProducts', function ($scope, $http) {
            $scope.quickView = function (product) {
                $.ajax({
                    type: 'GET',
                    url: "/get-data-product/" + product,
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.product = response.data;
                            $scope.$applyAsync();
                            console.log($scope.product);
                            $("#quickview").modal('show');
                        } else {
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    }
                });
            }
        })
    </script>
@endpush
