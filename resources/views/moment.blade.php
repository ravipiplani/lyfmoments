@extends('layouts.master')

@section('og_tags')
<title>A LyfMoment of {{$moment->user->first_name}} and {{$moment->share_with['name']}}</title>
<meta property="og:title" content="A LyfMoment of {{$moment->user->first_name}} and {{$moment->share_with['name']}}" />
<meta property="og:url" content="{{route('moments.show', ['link' => $moment->link])}}" />
<meta property="og:description" content="@if($moment->message){{$moment->message}}@else{{'A memory keeper to save those beautiful memories which you never want to forget.'}}@endif">
<meta property="og:image" content="{{$moment->images->first()->url}}">
<meta property="og:type" content="website" />
@endsection

@section('content')
<style>
    .bg {
        background-image: url("{{$moment->images->first()->url}}");
        filter: grayscale(1) blur(15px);
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
    .moment-message {
        background: #00000060;
        border-radius: 5px;
    }
    .moment-message .feeling-message {
        font-size: 14px;
    }
    .moment-message .message {
        font-size: 32px;
        line-height: 1.4em;
    }
</style>
<div class="bg"></div>

<div class="container">
    @include('partials.header')

    <div class="d-flex justify-content-center" style="z-index: 1">
        <div class="row w-100">
            <div class="col-md-3">
                <h2 class="text-white">Hey {{ucwords($moment->share_with['name'])}}</h2>
                <h6 class="text-warning m-0">{{ucwords($moment->user->name)}} shared a moment with you</h6>
                <p class="text-white mt-2">{{$moment->created_at->format('F jS, Y @H:i')}}</p>
                <div class="moment-message p-2 mb-2">
                    @if ($moment->feel)
                    <h4 class="far {{$moment->feel->icon}}" data-toggle="tooltip" data-placement="bottom" title="Feeling {{$moment->feel->name}}" style="color: {{$moment->feel->color}}"></h4>
                    <p class="feeling-message m-0">
                        <span class="text-light">{{$moment->user->first_name}} is feeling</span> <span style="color: {{$moment->feel->color}}">{{$moment->feel->name}}
                    </p>
                    @endif
                    @if ($moment->message)
                    <p class="handwriting message text-white m-0">
                        {{$moment->message}}
                    </p>
                    @endif
                </div>
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
    <div class="text-center mb-5">
        <a class="btn btn-primary btn-lg mt-5" href="{{route('index')}}" style="z-index: 1">
            <span class="text-white">Share a moment back</span>
        </a>
    </div>
</div>

@endsection

@section('script')
<script>
    
</script>
@endsection