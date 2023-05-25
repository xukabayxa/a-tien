@extends('front.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/product-category.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/product-category-main.css') }}">
@endsection
@section('title')
    <title>{{ "TGNIMEX - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection
@section('content')
    <section class="bread_crumb py-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">

                        <li class="home">
                            <a itemprop="url" href="/"><span itemprop="title">Home page</span></a>
                            <span> <i class="fa fa-angle-right"></i> </span>
                        </li>

                        <li>
                            <a itemprop="url" href=""><span itemprop="title">Tin tức</span></a>
                            <span> <i class="fa fa-angle-right"></i> </span>
                        </li>
                        <li><strong itemprop="title">{{$post->name}}</strong>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container article-wraper">
        <div class="row">
            <section class="right-content col-lg-9 col-lg-push-3">

                <article class="article-main" itemscope itemtype="http://schema.org/Article">
                    <meta itemprop="url"
                          content="{{route('front.get-post-detail', $post->slug)}}">
                    <meta itemprop="name" content="{{$post->name}}">
                    <meta itemprop="headline" content="{{$post->name}}">

                    <meta itemprop="image"
                          content="">

                    <meta itemprop="author" content="Trang">
                    <meta itemprop="datePublished" content="">
                    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                            <img class="hidden" src="http://theme.hstatic.net/200000342937/1001030312/14/logo.png?v=139"
                                 alt=""/>

                            <meta itemprop="url"
                                  content="http://theme.hstatic.net/200000342937/1001030312/14/logo.png?v=139">
                            <meta itemprop="width" content="400">
                            <meta itemprop="height" content="60">
                        </div>
                        <meta itemprop="name" content="">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="article-details">

                                <h1 class="article-title"><a
                                        href="{{route('front.get-post-detail', $post->slug)}}">{{$post->name}}</a></h1>
                                <div class="post-time">
                                    {{\Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')}}
                                </div>

                                <div class="article-content">
                                    <div class="rte">
                                       {!! $post->body !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row row-noGutter tag-share">

                                <div class="col-xs-12 col-sm-12 a-right">


                                    <div class="social-media"
                                         data-permalink="{{route('front.get-post-detail', $post->slug)}}">
                                        <label>Chia sẻ: </label>

                                        <a target="_blank"
                                           href="//www.facebook.com/sharer.php?u={{route('front.get-post-detail', $post->slug)}}"
                                           class="share-facebook" title="Share it up Facebook">
                                            <i class="fa fa-facebook-official"></i>
                                        </a>


                                        <a target="_blank"
                                           href=""
                                           class="share-twitter" title="Share it up Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>


                                        <a target="_blank"
                                           href="//pinterest.com/pin/create/button/?url={{route('front.get-post-detail', $post->slug)}}"
                                           class="share-pinterest" title="Share it up pinterest">
                                            <i class="fa fa-pinterest"></i>
                                        </a>


                                        <a target="_blank"
                                           href="{{route('front.get-post-detail', $post->slug)}}"
                                           class="share-google" title="+1">
                                            <i class="fa fa-google-plus"></i>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="block-recent">
                                <h2 class="gothamvnu-book">Bài viết khác</h2>
                                <ul>

                                    @foreach($postOther as $postOt)
                                        <li>
                                            <a href="{{route('front.get-post-detail', $post->slug)}}">
                                                <i class="fa  fa-caret-right"></i>{{$postOt->name}} </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                </article>
            </section>

            <aside class="left left-content col-lg-3 col-lg-pull-9">
                <div class="blog-aside aside-item">
                    <div>
                        <div class="aside-title mb-4">
                            <h2 class="title-head"><a href="">Tin liên quan</a></h2>
                        </div>
                        <div class="aside-content">
                            <div class="blog-list blog-image-list">

                                @foreach($postRe as $postR)
                                    <div class="loop-blog">
                                        <div class="thumb-left">
                                            <a href="{{route('front.get-post-detail', $post->slug)}}">

                                                <img
                                                    src="{{$post->image->path ?? ''}}"
                                                    style="width:100%;"
                                                    alt="{{$post->name}}"
                                                    class="img-responsive">

                                            </a>

                                        </div>
                                        <div class="name-right">

                                            <h3>
                                                <a href="{{route('front.get-post-detail', $post->slug)}}">{{$post->name}}</a></h3>
                                            <div class="post-time">
                                                {{\Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')}}
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

