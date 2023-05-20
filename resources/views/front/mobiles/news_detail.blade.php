@extends('front2.mobiles.layouts.master')

@section('content')
    <section class="slidemain2">
        <ul class="slide-cate">

            @foreach($bannersRight->take(2) as $banner)
                <li class="item-banner-cate">
                    <a href="{{$banner->link}}">
                        <img src="{{$banner->image->path ?? asset('site/image/no-image.png')}}"
                             alt="{{$banner->title}}">
                    </a>
                </li>
            @endforeach

        </ul>
    </section>
    <ol itemprop="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb">
        <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/" itemprop="url"><span itemprop="title">beptot.vn</span></a>
        </li>
        <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="{{route('Post')}}" itemprop="url"><span itemprop="title">Tin tức</span></a>
        </li>
    </ol>

    <section class="pageNew">
        <div class="container">
            <article class="thumbnail-news-view">
                <h1>{{$post->name}}</h1>
                <div class="block_timer_share">
                    <div class="block_timer pull-left"><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</div>
                    <div class="block_share pull-right">
                        <div class="fb-like" data-href="https://beptot.vn/chuyen-sua-bep-tu-uy-tin-tai-nha.html" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                    </div>
                </div>
                <div class="post_content">
                    {!! $post->body !!}
                </div>


                <div class="other-news-detail">
                    <h2><span>Tin liên quan</span></h2>
                    <ul>

                        <li><span><a href="https://beptot.vn/bep-tu-duoi-10-trieu.html" title="Điểm danh các mẫu bếp từ dưới 10 triệu được “săn đón” nhất hiện nay">Điểm danh các mẫu bếp từ dưới 10 triệu được “săn đón” nhất hiện nay</a></span></li>

                    </ul>
                </div>

            </article>
        </div>
    </section>
@endsection
