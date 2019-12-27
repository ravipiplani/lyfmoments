@extends('layouts.master')

@section('content')
<style>
    .bg {
        background-image: url("/assets/img/dog-9.jpg");
        filter: grayscale(1) blur(10px);
        height: 100%;
        width: 100%;
        position: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .message {
        font-size: 40px;
        line-height: 1.4em;
    }
    .moment-images {
        position: relative;
    }
    .moment-images .moment-image {
        width: 100%;
        position: absolute;
        top: 0;
        height: calc(100vh - 6rem);
        overflow: hidden;
    }
</style>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6 p-5">
            <h2 class="text-white">Hey Ravi</h2>
            <h6 class="text-warning m-0">Raina shared a moment with you</h6>
            <p class="text-white mt-2">December 31st, 2019 @19:00</p>
            <p class="handwriting mt-5 text-white message">
                this is awesome, this is awesome, this is awesome, this is awesome, this is awesome, 
            </p>
        </div>
        <div class="col-md-6 p-5">
            <div class="moment-images">
                <div class="moment-image">
                    <img src="/assets/img/dog-9.jpg" class="w-100" />
                </div>
                <div class="moment-image">
                    <img src="/assets/img/dog-8.jpg" class="w-100" />
                </div>
                <div class="moment-image">
                    <img src="/assets/img/dog-7.jpg" class="w-100" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection