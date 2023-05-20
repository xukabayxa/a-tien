@extends('front2.layouts.master')
@section('content')
<div class="container">
    <div class="row">


        <ul class="breadcrumb" itemprop="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
            <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url"><span itemprop="title">beptot.vn</span></a>
            </li>   <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/tim-kiem" itemprop="url"><span itemprop="title">Tìm kiếm</span></a>
            </li>


        </ul>

        <section class="box-category">
            <div class="sub_header_hot">
                <h1 class="title"><a href="javascript:void(0)" rel="nofollow">Kết quả tìm kiếm với từ khóa : {{$keyword}}</a>
                </h1>
            </div>
            <ul class="list_product_featured ">

                @foreach($products as $product)
                <li>
                    <div class="cate_pro_top">
                        <figure>
                            <a class="img" href="{{route('Product', $product->slug)}}" title="{{$product->slug}}">
                                <img class="lazy owl-lazy" data-src="{{$product->image->path ?? asset('site/image/no-image.png')}}" alt="{{$product->name}}"
                                     title="{{$product->name}}">
                            </a>
                        </figure>
                        <h3><a href="{{route('Product', $product->slug)}}" title="{{$product->name}}">{{$product->name}} </a></h3>
                    </div>
                    <div class="cate_pro_title">

                    </div>

                    <div class="cate_pro_bot">

                        <p class="price-now">{{number_format($product->price)}}đ</p>
                        @if($product->base_price)
                            <p>
                                <span>{{number_format($product->base_price)}}đ</span>

                                <span class="cate_pro_bot-saleof">(-{{($product->base_price - $product->price)/$product->base_price *100}}%)</span>

                            </p>
                        @endif

                    </div>
                </li>
                @endforeach

            </ul>
        </section>

    </div>
</div>
@endsection
