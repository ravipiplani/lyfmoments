<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{strtoupper(env('APP_NAME'))}} - Save beautiful memories</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="A memory keeper to save those beautiful memories which you never want to forget.">
	<meta name="author" content="BootstrapBay">
	
	<link href="assets/img/favicon.ico" rel="icon" type="image/png">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/lazy.css">
	<link rel="stylesheet" href="./assets/css/demo.css">
	<link rel="stylesheet" href="./assets/vendor/pg-calendar-master/dist/css/pignose.calendar.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
			border-radius: 50%;
		}
		.memory-image img {
			
		}
		.handwriting {
			font-family: 'Sacramento', cursive;
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
</head>
<body class="landing">
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
					<input type="file" class="custom-file-input" id="inputGroupMemoryImage" accept="image/*" onchange="readImages(this);" multiple>
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
					
					
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!--   lazy javascript -->
	<script src="./assets/js/lazy.js"></script>
	
	<!-- optional plugins -->
	<script src="./assets/vendor/nouislider/js/nouislider.min.js"></script>
	<script src="./assets/js/mouse-effects.js"></script>
	
	<script src="https://unpkg.com/babel-polyfill@6.2.0/dist/polyfill.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
	<script src="./assets/vendor/pg-calendar-master/dist/js/pignose.calendar.min.js"></script>
	<script>
		$('[data-toggle="tooltip"]').tooltip();
		$('#openCalendar').pignoseCalendar({
			modal: true,
			buttons: true
		});

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

		$('#inputGroupMemoryImage').on('change',function(){
			$('#memoryModal').modal('show')
		});

		$('.feeling').click(function() {
			$('.feelings .feeling').removeClass('feeling--selected');
			$(this).addClass('feeling--selected');
		});

		$('.step-mover').click(function() {
			var steps = $($(this).data('steps'));
			var currentStep =  parseInt(steps.find('.step.show').data('step'));
			var moveStep = false;
			if ($(this).hasClass('step-mover--forward') && currentStep != steps.data('steps-count')) {
				if (currentStep == 1) {
					$('.step-mover--backward').removeClass('d-none');
				}
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
				$('#btnMomentAction').html(steps.find('.step[data-step="' + nextStep + '"]').data('btn-text'));
				steps.find('.step[data-step="' + currentStep + '"]').removeClass('show');
				steps.find('.step[data-step="' + nextStep + '"]').addClass('show');
			}
			if ($(this).hasClass('step-mover--forward')) {
				window[action]();
			}
		});

		function saveMoment() {
			$('#openCalendar').click();
			console.log('saveMoment');
		}

		function saveMomentReceiver() {
			console.log('saveMomentReceiver');
		}

		function saveMomentSenderAndPay() {
			console.log('saveMomentSenderAndPay');
		}

		function readImages(input) {
			if (input.files && input.files[0]) {
				for (i = 0; i < input.files.length; i++) {
					var reader = new FileReader();
					reader.onload = function (e) {
						var ele = $('<div class="col-md-2 memory-image p-0"><img class="rounded-circle w-100 h-100" alt="memory"/></div>').appendTo("#selectedImages");
						ele.find('img').attr('src', e.target.result);
					};
					reader.readAsDataURL(input.files[i]);
				}
			}
		}
	</script>
</body>
</html>