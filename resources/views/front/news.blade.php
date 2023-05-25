@extends('front.layouts.master')
@section('title')
    <title>{{ "Tin tức - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
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


                        <li><strong itemprop="title">Tin tức</strong></li>


                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="row">
            <section class="right-content col-md-9 col-md-push-3">
                <div class="box-heading relative">
                    <h1 class="title-head page_title">Tin tức</h1><span></span>
                </div>


                <section class="list-blogs blog-main">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-xs-12">
                            <article class="blog-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="blog-item-thumbnail">
                                            <a href="{{route('front.get-post-detail', $post->slug)}}">

                                                <img src="{{$post->image->path ?? ''}}" alt="{{$post->name}}">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7">
                                        <div class="blog-item-info">
                                            <h3 class="blog-item-name"><a href="{{route('front.get-post-detail', $post->slug)}}">{{$post->name}}</a></h3>
                                            <div class="post-time">
                                                <div class="inline-block">{{\Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')}}
                                                </div>
                                            </div>
                                            <p class="blog-item-summary">{{$post->intro}}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach

                    </div>

                </section>

                {{ $posts->links('front.pagination.paginate2') }}

            </section>

            <aside class="left left-content col-md-3 col-md-pull-9">
                <div class="blog-aside aside-item">
                    <div>
                        <div class="aside-title mb-4">
                            <h2 class="title-head"><a href="">Tin nổi bật</a></h2>
                        </div>
                        <div class="aside-content">
                            <div class="blog-list blog-image-list">
                                @foreach($postSpecial as $p_S)
                                <div class="loop-blog">
                                    <div class="thumb-left">
                                        <a href="{{route('front.get-post-detail', $p_S->slug)}}">
                                            <img src="{{$p_S->image->path ?? ''}}" style="width:100%;" alt="{{$p_S->name}}" class="img-responsive">
                                        </a>
                                    </div>

                                    <div class="name-right">
                                        <h3><a href="{{route('front.get-post-detail', $p_S->slug)}}">{{$p_S->name}}</a></h3>
                                        <div class="post-time">
                                            {{\Carbon\Carbon::parse($p_S->created_at)->format('d/m/Y')}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </aside>


        </div>
    </div>

@endsection
