@extends('layouts.master')

@section('og_tags')
<title>{{strtoupper(env('APP_NAME'))}} - Save beautiful memories</title>
<meta property="og:title" content="{{strtoupper(env('APP_NAME'))}} - Save beautiful memories" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:description" content="A memory keeper to save those beautiful memories which you never want to forget.">
<meta property="og:image" content="/assets/img/logo.svg">
<meta property="og:type" content="website" />
@endsection

@section('content')

<div class="bg"></div>
<img class="bg-img" src="./assets/img/bg.jpeg" alt="background">

<div class="container">
	@include('partials.header')

	<div class="header text-center bg-transparent">
		<div class="container">
			<h1 class="display-4 text-white"><span class="moment-verb text-warning">Create</span> a Moment. <br />Just {{config('constants.moment_price.IN.currency')}}{{config('constants.moment_price.IN.value')}} per moment.</h1>
			<p class="lead my-4 text-white">We will create a beautiful <b class="text-warning">Moment</b>,<br />which will be <b class="text-warning">forever</b> yours to share.</p>
			<div class="input-group mb-5">
				<div class="btn btn-primary btn-lg mt-0 mt-md-3 mt-lg-0 home-cta">
					<input type="file" class="custom-file-input" id="inputGroupMemoryImage" accept="image/*" onchange="readImages(this, true);" multiple>
					<label for="inputGroupMemoryImage"><small>Select Photos &</small><br />Create a Moment</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="cta text-center">
	<h1 class="text-white">Save your beautiful memories</h1>
	<p class="lead text-white">A memory keeper to save those beautiful memories which you never want to forget.</p>
</div>
		
@include('partials.footer')

@include('partials.moment')
@endsection

@section('script')
<script src="/assets/js/mouse-effects.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var files = [],
	momentId = "",
	inProgress = false,
	steps,
	nextStep,
	currentStep,
	momentActionButton = $('#btnMomentAction'),
	options = {
		"handler": function(response) {
			momentActionButton.html('Payment successful, redirecting...');
			$('<form action="{{route('payment.response')}}" method="POST">{{csrf_field()}}<input type="hidden" name="razorpay_order_id" value="' + response.razorpay_order_id + '"><input type="hidden"  name="razorpay_payment_id" value="' + response.razorpay_payment_id + '"><input type="hidden" name="razorpay_signature" value="' + response.razorpay_signature + '"></form>').appendTo('body').submit();
		},
		"prefill": {},
		"modal": {
			"ondismiss": function() {
			}
		}
	};
$('[data-toggle="tooltip"]').tooltip();
// $('#openCalendar').pignoseCalendar({
// 	minDate: moment().format('YYYY-MM-DD'),
// 	modal: true,
// 	buttons: true,
// 	apply: onApplyHandler
// });

function onApplyHandler(date, context) {
	$('#displaySelectedDate').text(date[0].format('MMMM Do, YYYY'));
	$('#momentDatetime').val(date[0].format('YYYY-MM-DD'));
}

var verbs = ["Create", "Gift", "Re-live", "Share"];
var i = 0;
setInterval(function() {
	$('.moment-verb').fadeOut(300, function() {
		$('.moment-verb').html(verbs[i]).fadeIn();
	});
	i++;
	if (i == verbs.length) {
		i = 0;
	}
}, 2000);

$('#btnAddMessage').click(function() {
	$(this).addClass('d-none');
	$('#formGroupMessage').removeClass('d-none');
	$('#formGroupMessage').find('textarea').focus();
});

$('.feeling').click(function() {
	$('.feelings .feeling').removeClass('feeling--selected');
	$(this).addClass('feeling--selected');
});

$('.step-mover').click(function() {
	steps = $($(this).data('steps'));
	currentStep =  parseInt(steps.find('.step.show').data('step'));
	var moveStep = false;
	if ($(this).hasClass('step-mover--forward') && currentStep != steps.data('steps-count')) {
		nextStep = currentStep + 1;
		moveStep = true;
	}
	else if ($(this).hasClass('step-mover--backward') && currentStep != 1) {
		nextStep = currentStep - 1;
		if (nextStep == 1) {
			$('.step-mover--backward').addClass('d-none');
		}
		moveStep = true;
	}
	var action = steps.find('.step[data-step="' + currentStep + '"]').data('action');
	if (moveStep) {
		if ($(this).hasClass('step-mover--backward')) {
			if (currentStep == 1) {
				$('.step-mover--backward').addClass('d-none');
			}
			momentActionButton.html(steps.find('.step[data-step="' + nextStep + '"]').data('btn-text'));
			steps.find('.step[data-step="' + currentStep + '"]').removeClass('show');
			steps.find('.step[data-step="' + nextStep + '"]').addClass('show');	
		}
		else {
			window[action]();
		}
	}
	else {
		window[action]();
	}
});

$('body').on('click', '.remove-image', function() {
	let index = $(this).data('index');
	let id = `#momentImage${index}`;
	$(id).remove();
	delete files[`image${index}`];
	updateAddImage();
});

function moveToNextStep() {
	if (currentStep == 1) {
		$('.step-mover--backward').removeClass('d-none');
	}
	momentActionButton.html(steps.find('.step[data-step="' + nextStep + '"]').data('btn-text'));
	steps.find('.step[data-step="' + currentStep + '"]').removeClass('show');
	steps.find('.step[data-step="' + nextStep + '"]').addClass('show');
}

function revertButtonText() {
	momentActionButton.html(steps.find('.step[data-step="' + currentStep + '"]').data('btn-text'));
}

function saveMoment() {
	if (inProgress) {
		return;
	}
	let l = Object.keys(files).length;
	if (l == 0) {
		return false;
	}
	let fd = new FormData(),
		route = "{{route('moments.store')}}",
		feelingId = $('#momentFeeling .feeling--selected').data('id');
	for (var key in files) {
		fd.append("images[]", files[key], files[key].name);
	}
	if (typeof feelingId == 'undefined') {
		feelingId = "";
	}
	fd.append('feel_id', feelingId);
	fd.append('message', $('#momemtMessage').val().trim());
	inProgress = true;
	momentActionButton.html('Uploading images...');
	axios.post(route, fd)
	.then(function (response) {
		inProgress = false;
		if (response.data.success) {
			momentId = response.data.moment_id;
			// $('#openCalendar').click();
			moveToNextStep();
		}
		else {
			revertButtonText();
			return false;
		}
	})
	.catch(function (error) {
		inProgress = false;
		revertButtonText();
		return false;
	});
}

function saveMomentReceiver() {
	if (inProgress) {
		return;
	}
	$('#formSchedule').submit();
	if ($('#formSchedule').find('.is-invalid').length == 0) {
		let fd = new FormData($('#formSchedule')[0]),
			route = "{{route('moments.update', ['moment' => '@moment@'])}}";
		route = route.replace("@moment@", momentId);
		inProgress = true;
		momentActionButton.html('Saving...');
		axios.post(route, fd)
		.then(function (response) {
			inProgress = false;
			if (response.data.success) {
				moveToNextStep();
			}
			else {
				revertButtonText();
				return false;
			}
		})
		.catch(function (error) {
			inProgress = false;
			revertButtonText();
			return false;
		});
	}
}

function saveMomentSenderAndPay() {
	if (inProgress) {
		return;
	}
	$('#formMomentFrom').submit();
	if ($('#formMomentFrom').find('.is-invalid').length == 0) {
		let fd = new FormData($('#formMomentFrom')[0]),
			route = "{{route('moments.update', ['moment' => '@moment@'])}}";
		route = route.replace("@moment@", momentId);
		inProgress = true;
		momentActionButton.html('Initiating payment...');
		axios.post(route, fd)
		.then(function (response) {
			if (response.data.success) {
				momentActionButton.html('Processing payment...');
				options.key = "{{env('RAZORPAY_API_KEY')}}";
				options.amount = response.data.amount;
				options.order_id = response.data.rp_order_id;
				options.prefill.name = response.data.user.name;
				options.prefill.email = response.data.user.email;
				options.prefill.contact = response.data.user.mobile;
				options.modal.ondismiss = function() {
					inProgress = false;
					revertButtonText();
				};
				var rzp = new Razorpay(options);
				rzp.open();
			}
			else {
				inProgress = false;
				revertButtonText();
				return false;
			}
		})
		.catch(function (error) {
			revertButtonText();
			return false;
		});
	}
}

function readImages(input, removeImages) {
	if (input.files && input.files[0] && input.files.length > 3) {
		alert("Please select 3 or less images.")
		return;
	}
	$('#memoryModal').modal('show');
	if (input.files && input.files[0]) {
		if (typeof removeImages != 'undefined' && removeImages) {
			$('#selectedImages [id^="momentImage"]').remove();
		}
		let l = Object.keys(files).length;
		for (i = 0; i < input.files.length; i++) {
			readFile(input.files[i], l + i)
			resize(input.files[i], l + i);
		}
	}
}

function updateAddImage() {
	let l = Object.keys(files).length;
	if (l >= 3) {
		$('#addMoreImages').addClass('d-none').removeClass('d-flex');
	}
	else {
		$('#addMoreImages').removeClass('d-none').addClass('d-flex');
	}
}

function readFile(file, i) {
	var reader = new FileReader();
	reader.readAsDataURL(file);

	reader.onload = function (e) {
		var ele = $(`<div class="col-md-2 memory-image p-0 mr-2" id="momentImage${i}">
			<img class="w-100 h-100" alt="memory"/>
			<em class="fas fa-times remove-image" data-index="${i}"></em>
		</div>`).prependTo("#selectedImages");
		ele.find('img').attr('src', e.target.result);
	};
}

function resize(file, i) {
	const width = 800;
	const fileName = file.name;
	const reader = new FileReader();
	reader.readAsDataURL(file);
	reader.onload = event => {
		const img = new Image();
		img.src = event.target.result;
		img.onload = () => {
				const elem = document.createElement('canvas');
				const scaleFactor = width / img.width;
				elem.width = img.width < width ? img.width : width;
				elem.height = img.width < width ? img.height : img.height * scaleFactor;
				const ctx = elem.getContext('2d');
				ctx.drawImage(img, 0, 0, elem.width, elem.height);
				ctx.canvas.toBlob((blob) => {
					const tempFile = new File([blob], fileName, {
						type: 'image/jpeg',
						lastModified: Date.now()
					});
					files[`image${i}`] = tempFile;
					updateAddImage();
				}, 'image/jpeg', 1);
			},
			reader.onerror = error => console.log(error);
	};
}
</script>
@endsection