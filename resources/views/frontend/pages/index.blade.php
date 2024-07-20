@extends('frontend.layouts.master')

@section('title', $page->meta_title)
@section('description', $page->meta_description)

@push('page_css')
<style>
    {!! $page->getCss() !!}
</style>
@endpush

@section('page')
{!! $page->getHtml() !!}
@endsection

@if ($page->id == config('pages.homepage'))
    @push('page_css')
        <link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    @endpush
    @push('page_js')
        @include('frontend.layouts.homepagejs')
    @endpush
@endif

@if ($page->id == config('pages.deposit-products') || $page->id == config('pages.forms') || $page->id == config('pages.rates-fees') || $page->id == config('pages.security') || $page->id == config('pages.time-deposits') || $page->id == config('pages.savings')   )
    
    @push('page_js')
        @include('frontend.layouts.header-nav-js')
    @endpush
@endif