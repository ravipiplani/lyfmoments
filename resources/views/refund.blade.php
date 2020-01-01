@extends('layouts.master')

@section('og_tags')
<title>Refund Policy</title>
<meta property="og:title" content="Refund Policy" />
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
        <h1 class="display-5">Refund Policy</h1>
        <p class="text-dark">Last Updated: 1st January, 2020</p>
        <p>In case of a refund due to an erroneous transaction or cancellation, the payment will be refunded via the original payment method, that you have chosen to buy the product.</p>
    </div>
    @include('partials.footer')
</div>

@endsection