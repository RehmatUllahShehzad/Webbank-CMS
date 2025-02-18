<!DOCTYPE html>
<html lang="en">

<head>
    <title> {{ getGeneralSetting('site_title', config('app.name'))}} | @yield('title') </title>

    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image','/images/logo.png')">
    <meta property="og:url" content="@yield('url',request()->url())">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image','/images/logo.png')">

    @include('frontend.layouts.css')

    @stack('page_css')
    @livewireStyles


</head>

<body>
    <!-- header  -->
    @include('frontend.layouts.header')
    <!-- header  -->

    <div class="clearfix"></div>

    <div class="inner-section">

        @yield('page')

    </div>

    <div class="clearfix"></div>

    @include('frontend.layouts.footer')


    @include('frontend.layouts.js')
    @livewireScripts
    @include('layouts.livewirejs')
    @include('frontend.layouts.toastr-events')

    @stack('page_js')

    <script type="text/javascript">
        $(document).ready(function(){
            $("body").on('click','a',function(event){
                var link = $(this).attr('href');
                var link_host = new URL(link);
                var current_host = window.location.host;
                if(current_host.includes(link_host.host)){
                    return;
                }
                
                if ( !confirm("{{getGeneralSetting('alert_title', 'Are you sure to open external link ?')}}") ){
                    event.preventDefault();
                }
            });
        });
    </script>

</body>

</html>
