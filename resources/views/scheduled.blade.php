@extends('layouts.master')

@section('content')
<style>
    .bg {
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
        <div class="container">
			<h1 class="display-4 text-white"><span class="moment-verb text-warning">Congratulations.</span> <br />Your moment has been scheduled.</h1>
			<p class="lead my-4 text-white">We will share the moment with the <b class="text-warning">{{$moment->share_with['name']}}</b><br /> On <b class="text-warning">{{$moment->share_at->format('F jS, Y @H:i')}}</b>.</p>
            <a class="btn btn-primary btn-lg mt-0 mt-md-3 mt-lg-0 text-white" href="{{route('index')}}">
                Create another Moment
            </a>
		</div>
    </div>

</div>

@endsection

@section('script')
<script>
    
</script>
@endsection