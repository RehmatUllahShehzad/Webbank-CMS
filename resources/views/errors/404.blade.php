@extends('frontend.layouts.master')

@section('title','404 Page not Found')
@section('description','Sorry The page you are looking cannot be found on this server')

@section('page')

<div class="error-main-wrapper text-center" style="">
    <div class="error-sp-wrap">
        <div class="error-top-wrap">
            <h1>404</h1>
        </div>
        <h4 class="text-uppercase mb-3">Page Not Found</h4>
        <p>
            The page you are looking for might have been removed, 
            or it's currently in-active.
        </p>
        <div class="sign-in-side-butn ">
            <a href="/" class="sign-in-butn general-btn">Go Back</a>
        </div>
        <br>
    </div>
    <div class="error-sp-wrap-2"></div>
    <div class="error-sp-wrap-3"></div>
</div>

@endsection