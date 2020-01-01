@extends('layouts.master')

@section('og_tags')
<title>Terms & Conditions</title>
<meta property="og:title" content="Terms & Conditions" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:description" content="A memory keeper to save those beautiful memories which you never want to forget.">
<meta property="og:image" content="/assets/img/logo.svg">
<meta property="og:type" content="website" />
@endsection

@section('content')

<style>
    .navbar {
        background: #611f6a !important;
    }
</style>

<div class="container">
    @include('partials.header')
    <div class="container">
        <h1 class="display-5">Terms and Conditions</h1>
        <p class="text-dark">Last Updated: 1st January, 2020</p>
        <p>LyfMoments owns the brand and the technology platform represented by LyfMoments and its websites on the domain - {{env('APP_URL')}}. LyfMoments enables a user to save and share the memories with the images and custome messages.</p>
    </div>
    @include('partials.footer')
</div>

@endsection