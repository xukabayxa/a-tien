<!DOCTYPE html>
<html lang="vi-vn" xml:lang="vi-vn">
<head>
    @yield('title')
    @include('front.partials.head')
    @yield('css')
</head>
<body ng-app="App">
    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')
<!-- Plugin JS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
{{--    <script src="/site/js/owl/owl.carousel.js"></script>--}}
    <script src="/libs/owl/docs/assets/owlcarousel/owl.carousel.js"></script>

    <script>


    $(".clearfix li").hover(
        function () {
            $(this).addClass('ngc-crumb-nav-cur');
        },
        function () {
            $(this).removeClass('ngc-crumb-nav-cur');
        }
    );
</script>


<!-- Angular Js -->
<script src="{{ asset('libs/angularjs/angular.js') }}"></script>
<script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
<script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
<script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
<script src="{{ asset('libs/angularjs/select.js') }}"></script>
<script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>

    var CSRF_TOKEN = "{{ csrf_token() }}";

    @stack('scripts')

</body>
</html>
