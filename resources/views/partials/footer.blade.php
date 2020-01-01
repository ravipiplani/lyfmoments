<footer class="footer-1 bg-light text-dark">
	<div class="container">
		<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
			<div class="links">
				<ul class="footer-menu list-unstyled d-flex flex-row text-center text-md-left">
					<li><a href="https://blog.lyfmoments.com" target="_blank" rel="noopener noreferrer">Blog</a></li>
					<li><a href="{{route('tnc')}}">Terms & Conditions</a></li>
					<li><a href="{{route('pp')}}">Privacy Policy</a></li>
					<li><a href="{{route('refund_policy')}}">Refund Policy</a></li>
				</ul>
			</div>
			<!-- <div class="social mt-4 mt-md-0">
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
			</div> -->
		</div>
		<div class="copyright text-center">
			<hr />
			<p class="small text-primary">&copy; {{\Carbon\Carbon::now()->format('Y')}}, made with <span class="text-danger"><i class="fas fa-heart"></i></span> by LYFMOMENTS</p>
		</div>
	</div>
</footer>