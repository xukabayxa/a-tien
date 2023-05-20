@extends('front.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/product-category.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/product-category-main.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/page.css') }}">

@endsection
@section('content')
    <div id="inner-focus" class="" style="background-image: url('{{$banner->image->path ?? ''}}')">
        <div class="ce_text main-container block">
            <h1>{{$banner->title ?? ''}}</h1>
        </div>
    </div>
    <div class="mod_navigation block">
        <div id="ngc-crumb-nav">
            <div class="main-container">
                <ul class="clearfix">

                        <li class=""><a href="{{route('About')}}">Giới thiệu</a><span class="ngc-crumb-nav-fix1"></span>
                            <span class="ngc-crumb-nav-fix2"></span></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="mod_article first last block" id="article-300">


        <div id="ngc-ceo-toast" class="ngc-about">
{{--            <div id="select-h">--}}
{{--                <h1 class="ce_headline">--}}
{{--                    Đôi nét về chúng tôi</h1>--}}
{{--            </div>--}}
            <div class="management-team">
                <div class="management-team-summary-cont">
                    <div class="main-container">
                        <div class="ce_text management-team-summary block">

                            {!! $config->introduction  !!}

                        </div>
                    </div></div></div>
        </div>

    </div>
@endsection
