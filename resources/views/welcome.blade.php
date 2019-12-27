@extends('layouts.master')

@section('content')
<style>
	* {
		position: relative;
	}
	a {
		border-bottom: 0 !important;
	}
	.bg {
		position: fixed;
		z-index: 1;
		left: 50%;
		transform: translateX(-50%);
		width: 100%;
		height: 100%;
		background: url("./assets/img/bg-blur.png") 0 0 / cover;
	}
	.small-thumbnail {
		width: 100px;
		height: 100px;
		float:left;
	}
	.small-thumbnail img {
		vertical-align: top;	
	}
	.mask{
		position: fixed;
		width: 100%;
		height: 100%;
		background: #000000cc;
		z-index: 1;
	}
	.navbar, .header, .testimonials, .cta, .footer-1 {
		z-index: 10;
	}
	.landing .form-subscribe {
		max-width: initial;
	}
	.bg-dark {
		background-color: #1d1c1dc4 !important;
	}
	.cta {
		background-color: #4a154bc4;
	}
	img.bg-img {
		display: none;
	}
	canvas {
		position: absolute;
		z-index: 1;
		top: 0;
		left: 0;
	}
	.form-control, .custom-select, .custom-file {
		height: calc(2.25rem + 4px);
	}
	.input-group .custom-file-label {
		margin: 0;
	}
	.custom-file-label::after {
		height: calc(2.25rem + 2px);
	}
	.home-cta {
		margin: 0 auto;
	}
	.home-cta .custom-file-input {
		width: 0;
	}
	.home-cta label {
		margin: 0;
	}
	.modal-dialog {
		margin: 5.75rem auto;
	}
	.modal .avatar {
		position: absolute;
		left: 30px;
		top: -30px;
		padding: 15px;
		background: whitesmoke;
		border-radius: 50%;
		text-align: center;
		border: 1px solid silver;
	}
	.memory-image {
		height: 80px;
		width: 80px;
		overflow: hidden;
		cursor: pointer;
	}
	.memory-image img {
		border-radius: 5px;
		border: 2px solid #c5c2c2;
	}
	.memory-image em {
		position: absolute;
		bottom: -50px;
		right: -50px;
		width: 100px;
		height: 100px;
		background: #ffffffb0;
		border-radius: 50%;
		z-index: 0;
		padding: 22px;
		font-size: 16px;
		color: red;
		transform: scale(0);
		transition: 0.2s ease-in;
		cursor: pointer;
	}
	.memory-image:hover em {
		transform: scale(1);
	}
	.memory-message, .memory-message:focus, .memory-message:hover {
		border: 0px;
		outline: none;
		font-size: 28px;
		resize: none;
		height: 160px !important;
	}
	.steps .step {
		height: 0;
		overflow: hidden;
		transition: 0.5s ease-in-out;
		transform: translateX(100%);
		opacity: 0;
	}
	.steps .step.show {
		height: auto;
		transform: translateX(0%);
		opacity: 1;
	}
	.modal-body {
		overflow: hidden;
	}
	.custom-select, .custom-select:hover {
		border: 0 !important;
		padding: 0 !important;
		background: none;
	}
	.custom-select-sm {
		height: auto !important;
		font-size: 110% !important;
	}
	.feelings {
	}
	.feelings .feeling {
		cursor: pointer;
	}
	.feelings .feeling:hover {
		color: #ffc10778 !important;
	}
	.feelings .feeling.feeling--selected {
		color: #ffc107 !important;
	}
	.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-active a {
		background-color: #611F6A;
	}
	.pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group .pignose-calendar-button-apply, .pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group .pignose-calendar-button-apply:hover {
		background-color: #611F6A;
		color: white;
	}
	.form-control, .custom-select, .custom-file, .form-control:hover, .custom-select:hover, .custom-file:hover, .form-control:focus, .custom-select:focus, .custom-file:focus {
		border: 0;
		outline: 0;
		padding: 0;
	}
</style>

<div class="bg"></div>
<img class="bg-img" src="./assets/img/bg.png" alt="background">
<nav class="navbar navbar-expand-md navbar-light bg-transparent mb-4">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center text-white" href="./"><img src="assets/img/logo.svg" alt="Example Navbar 1" class="mr-2" height="30">LYF<span class="text-warning">MOMENTS</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-3" aria-controls="navbarNavDropdown-3"
		aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse mr-auto text-center" id="navbarNavDropdown-3">
			<ul class="navbar-nav ml-auto ">
				<li class="nav-item m-2 m-md-0">
					<a class="btn btn-primary" href="#a">
						Wall of Memories
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="header text-center bg-transparent">
	<div class="container">
		<h1 class="display-4 text-white"><span class="moment-verb text-warning">Create</span> a Moment. <br />Just &#8377;10 per moment.</h1>
		<p class="lead my-4 text-white">We will send an email with the photo you upload<br /> On a FUTURE date chosen by you.</p>
		<div class="input-group">
			<div class="btn btn-primary btn-lg mt-0 mt-md-3 mt-lg-0 home-cta">
				<input type="file" class="custom-file-input" id="inputGroupMemoryImage" accept="image/*" onchange="readImages(this, true);" multiple>
				<label for="inputGroupMemoryImage">Create a Moment</label>
			</div>
		</div>
	</div>
</div>
<div class="testimonials bg-dark">
	<div class="info text-center">
		<h2 class="text-white">Testimonials</h2>
		<p class="lead text-white">Here is what some of our customers are saying.</p>
	</div>
	<div class="container text-center">
		<div class="row">
			<div class="col-12 col-md-3">
				<div class="testimonial d-flex flex-column align-items-center">
					<div class="big-bubble bg-info bubble-top-left"></div>
					<p class="lead font-italic text-white">"Lazy kit impressed me on multiple levels. It's the perfect solution for our business. Thank you so much for your help. Best. Product. Ever!"</p>
					<p class="text-white"><b>Cathee V.</b>,<br/>
						Web Developer</p>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="testimonial d-flex flex-column align-items-center mt-md-4">
					<div class="big-bubble"></div>
					<p class="lead font-italic text-white">"I will recommend you to my colleagues. Thank you for making it painless, pleasant and most of all hassle free! It really saves me time and effort."</p>
					<p class="text-white"><b>Tom B.</b>,<br/>
						Fullstack Developer</p>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="testimonial d-flex flex-column align-items-center">
					<div class="big-bubble bg-warning bubble-top-right"></div>
					<p class="lead font-italic text-white">"Needless to say we are extremely satisfied with the results. Lazy kit did exactly what you said it does. Lazy kit has really helped our business."</p>
					<p class="text-white"><b>Billie A.</b>,<br/>
						Web Designer</p>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="testimonial d-flex flex-column align-items-center mt-md-4">
					<div class="big-bubble bg-success bubble-bottom-right"></div>
					<p class="lead font-italic text-white">"We've used Lazy kit for the last five projects. I wish I would have thought of it first. I am completely blown away. Definitely worth giving it a try."</p>
					<p class="text-white"><b>Jack F.</b>,<br/>
						Front-End Developer</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="cta text-center">
	<h1 class="text-white">Save your beautiful memories</h1>
	<p class="lead text-white">A memory keeper to save those beautiful memories which you never want to forget.</p>
</div>
		
		
<footer class="footer-1 bg-light text-dark">
	<div class="container">
		<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
			<div class="links">
				<ul class="footer-menu list-unstyled d-flex flex-row text-center text-md-left">
					<li><a href="https://bootstrapbay.com/" target="_blank">Store</a></li>
					<li><a href="https://bootstrapbay.com/about" target="_blank">About Us</a></li>
					<li><a href="https://bootstrapbay.com/blog/" target="_blank">Blog</a></li>
					<li><a href="https://bootstrapbay.com/terms" target="_blank">Terms & Conditions</a></li>
				</ul>
			</div>
			<div class="social mt-4 mt-md-0">
				<a class="twitter btn btn-outline-primary btn-icon" href="https://twitter.com/bootstrapbay" target="_blank">
					<i class="fab fa-twitter"></i>
					<span class="sr-only">View our Twitter Profile</span>
				</a>
				<a class="facebook btn btn-outline-primary btn-icon" href="https://www.facebook.com/bootstrapbayofficial/" target="_blank">
					<i class="fab fa-facebook"></i>
					<span class="sr-only">View our Facebook Profile</span>
				</a>
				<a class="github btn btn-outline-primary btn-icon" href="https://github.com/bootstrapbay" target="_blank">
					<i class="fab fa-github"></i>
					<span class="sr-only">View our GitHub Profile</span>
				</a>
			</div>
		</div>
		<div class="copyright text-center">
			<hr />
			<p class="small text-primary">&copy; 2019, made with <span class="text-danger"><i class="fas fa-heart"></i></span> by LYFMOMENTS</p>
		</div>
	</div>
</footer>

@include('partials.moment')
@endsection

@section('script')
<script src="./assets/js/mouse-effects.js"></script>
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
$('#openCalendar').pignoseCalendar({
	minDate: moment().format('YYYY-MM-DD'),
	modal: true,
	buttons: true,
	apply: onApplyHandler
});

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
			$('#openCalendar').click();
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
		momentActionButton.html('Scheduling...');
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