<!DOCTYPE html>
@php
    $settings=settings();
@endphp
<html lang="en" style="{{($settings['color_type']=='custom')?$settings['own_color']:''}} ">
<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}} - @yield('tab-title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <meta name="author" content="{{!empty($settings['app_name'])?$settings['app_name']:env('APP_NAME')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{!empty($settings['app_name'])?$settings['app_name']:env('APP_NAME')}} - @yield('page-title') </title>

    <meta name="title" content="{{$settings['meta_seo_title']}}">
    <meta name="keywords" content="{{$settings['meta_seo_keyword']}}">
    <meta name="description" content="{{$settings['meta_seo_description']}}">


    <meta property="og:type" content="website">
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:title" content="{{$settings['meta_seo_title']}}">
    <meta property="og:description" content="{{$settings['meta_seo_description']}}">
    <meta property="og:image" content="{{asset(Storage::url('upload/seo')).'/'.$settings['meta_seo_image']}}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:title" content="{{$settings['meta_seo_title']}}">
    <meta property="twitter:description" content="{{$settings['meta_seo_description']}}">
    <meta property="twitter:image" content="{{asset(Storage::url('upload/seo')).'/'.$settings['meta_seo_image']}}">

    <!-- shortcut icon-->
    <link rel="icon" href="{{asset(Storage::url('upload/logo')).'/'.$settings['company_favicon']}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset(Storage::url('upload/logo')).'/'.$settings['company_favicon']}}" type="image/x-icon">
    <!-- Fonts css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font awesome -->
    <link href="{{ asset('assets/css/vendor/font-awesome.css')}}" rel="stylesheet">
    <!-- themify icon-->
    <link href="{{ asset('assets/css/vendor/themify-icons.css')}}" rel="stylesheet">
    <!-- Scrollbar-->
    <link href="{{ asset('assets/css/vendor/simplebar.css')}}" rel="stylesheet">
    <!-- Bootstrap css-->
    <link href="{{ asset('assets/css/vendor/bootstrap.css')}} " rel="stylesheet">
    <!-- Custom css-->
    @php
        $style=$settings['theme_color']=='color1'?'style.css':$settings['theme_color'].'.css';
        if($settings['color_type']=='custom'){
            $style='style.css';
        }
    @endphp
    <link href="{{ asset('assets/css/'.$style) }}" id="customstyle" rel="stylesheet">
    <link href="{{ asset('css/custom.css')}} " rel="stylesheet">

</head>
<body class="{{$settings['layout_direction']}} {{$settings['layout_mode']}}">
<!-- Login Start-->
<div class="auth-main">
    @yield('content')
    <div class="authbox-img"><img class="img-fluid" src="{{ asset('assets/images/landing/back.jpeg') }}" alt=""></div>
</div>
<!-- Login End-->
<!-- main jquery-->
<script src="{{ asset('assets/js/jquery.js')}}"></script>
<!-- Theme Customizer-->
<script src="{{ asset('assets/js/layout-storage.js')}}"></script>
<script src="{{ asset('assets/js/customizer.js')}}"></script>
<!-- Feather icons js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/js/bootstrap.bundle.js')}}"></script>
<!-- Scrollbar-->
<script src="{{ asset('assets/js/vendors/simplebar.js')}}"></script>
<!-- Custom script-->
<script src="{{ asset('assets/js/custom-script.js')}}"></script>

@stack('script-page')
</body>
</html>
