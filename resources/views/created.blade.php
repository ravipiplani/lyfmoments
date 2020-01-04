@extends('layouts.master')

@section('og_tags')
<title>Moment created by {{$moment->user->name}}</title>
<meta property="og:title" content="Moment created by {{$moment->user->name}}" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:description" content="A memory keeper to save those beautiful memories which you never want to forget.">
<meta property="og:image" content="{{$moment->images->first()->url}}">
<meta property="og:type" content="website" />
@endsection

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
			<h1 class="display-4 text-white"><span class="moment-verb text-warning">Congratulations.</span> <br />Your moment has been created.</h1>
			<p class="lead my-4 text-white">You can now share this moment with <b class="text-warning">{{$moment->share_with['name']}}</b><br /> by sending the below link.</p>
            <label class="text-warning">Moment Link</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control pl-2" placeholder="Moment link" aria-label="Moment link" id="momentLink" aria-describedby="basic-addon2" value="{{route('moments.show', ['link' => $moment->link])}}" readonly>
                <div class="input-group-append">
                    <a class="btn btn-light text-gray" target="_blank" href="{{route('moments.show', ['link' => $moment->link])}}">Preview</a>
                    <button class="btn btn-warning" type="button" onclick="shareLink('#momentLink')">Copy & Share</button>
                </div>
            </div>
            <a class="btn btn-primary btn-lg mt-0 mt-md-3 mt-lg-0 text-white" href="{{route('index')}}">
                Create another Moment
            </a>
		</div>
    </div>

</div>

@endsection

@section('script')
<script>
    function shareLink(element) {
        if (navigator.share) {
            navigator.share({
                title: "A LyfMoment of {{$moment->user->first_name}} and {{$moment->share_with['name']}}",
                text: "{{$moment->message}}",
                url: "{{route('moments.show', ['link' => $moment->link])}}",
            })
            .then(() => console.log('Successful share'))
            .catch((error) => console.log('Error sharing', error));
        }
        else {
            copyToClipboard(element);
        }
    }

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).val()).select();
        document.execCommand("copy");
        $temp.remove();
        alert("Link copied successfully.");
    }
</script>
@endsection