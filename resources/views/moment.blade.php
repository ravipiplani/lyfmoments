@extends('layouts.master')

@section('content')
<style>
    .bg {
        background-image: url("{{$moment->images->first()->url}}");
        filter: grayscale(1) blur(10px);
        height: 100%;
        width: 100%;
        position: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .moment-image {
        padding: 10px;
        background: white;
    }
</style>
<div class="bg"></div>

<div class="container">
    @include('partials.header')

    <div class="d-flex justify-content-center" style="z-index: 1">
        <div class="row">
            <div class="col-md-3">
                <h2 class="text-white">Hey {{ucwords($moment->share_with['name'])}}</h2>
                <h6 class="text-warning m-0">{{ucwords($moment->user->name)}} shared a moment with you</h6>
                <p class="text-white mt-2">{{$moment->share_at->format('F jS, Y @H:i')}}</p>
                @if ($moment->feel)
                <h1 class="far {{$moment->feel->icon}}" data-toggle="tooltip" data-placement="bottom" title="Feeling {{$moment->feel->name}}" style="color: {{$moment->feel->color}}"></h1>
                @endif
                @if ($moment->message)
                <p class="handwriting mt-5 text-white moment-message">
                    {{$moment->message}}
                </p>
                @endif
                <a class="btn btn-primary btn-lg mt-5" href="{{route('index')}}">
                    <h5 class="text-white">Share a moment back</h5>
                </a>
            </div>
            @foreach ($moment->images as $image)
            <div class="col-md-3 mb-3">
                <div class="moment-image">
                    <img src="{{$image->url}}" class="w-100" alt="moment" />
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection

@section('script')
<script>
    
</script>
@endsection