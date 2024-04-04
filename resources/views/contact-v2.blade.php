<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GeoTrip - Tour & Travel Booking Agency HTML Template | ThemezHub</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- All Plugins -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animation.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/flickity.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/magnifypopup.css') }}" rel="stylesheet">
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/rangeSlider.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/prism.css') }}" rel="stylesheet">
  
  <!-- Fontawesome & Bootstrap Icons CSS -->
  <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div id="preloader">
		<div class="preloader"><span></span><span></span></div>
	</div>

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">

		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->
		<!-- Start Navigation -->
		<div class="header header-light">
			<div class="container">
				@include('layouts.nav')
			</div>
		</div>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->


		<!-- ============================ Booking Title ================================== -->
		<section class="bg-cover position-relative" style="background:url({{ asset('img/bg-title.jpg')}})no-repeat;" data-overlay="5">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-xl-7 col-lg-9 col-md-12">

						<div class="fpc-capstion text-center my-4">
							<div class="fpc-captions">
								<h1 class="xl-heading text-light">Get-in Touch</h1>
								<p class="text-light">Cicero famously orated against his political opponent Lucius Sergius Catilina.
									Occasionally the first Oration against Catiline is taken for type specimens</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- ============================ Booking Title ================================== -->


		<!-- ============================ Form Section ================================== -->
		<section>
			<div class="container">

				<div class="row justify-content-between g-4 mb-5">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="card p-4 rounded-4 border br-dashed text-center h-100">
							<div class="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2"><i class="fa-solid fa-briefcase"></i>
							</div>
							<div class="crds-desc">
								<h5>Drop a Mail</h5>
								<p class="fs-6 text-md lh-2 mb-0">Themezhub@gmail.com<br>Paythemezhub@gmail.com</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="card p-4 rounded-4 border br-dashed text-center h-100">
							<div class="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2"><i class="fa-solid fa-headset"></i>
							</div>
							<div class="crds-desc">
								<h5>Call Us</h5>
								<p class="fs-6 text-md lh-2 mb-0">(0522) 2563568<br>+91 256 6548 457</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="card p-4 rounded-4 border br-dashed text-center h-100">
							<div class="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2"><i class="fa-solid fa-globe"></i>
							</div>
							<div class="crds-desc">
								<h5>Connect with Social</h5>
								<p class="text-md lh-2">Let's Connect with Us via social media</p>
								<ul class="list-inline mb-0">
									<li class="list-inline-item"> <a class="square--40 circle gray-simple color--facebook" href="#"><i
												class="fa-brands fa-facebook-f"></i></a> </li>
									<li class="list-inline-item"> <a class="square--40 circle gray-simple color--instagram" href="#"><i
												class="fa-brands fa-instagram"></i></a> </li>
									<li class="list-inline-item"> <a class="square--40 circle gray-simple color--twitter" href="#"><i
												class="fa-brands fa-twitter"></i></a> </li>
									<li class="list-inline-item"> <a class="square--40 circle gray-simple color--dribbble" href="#"><i
												class="fa-brands fa-dribbble"></i></a> </li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row align-items-center justify-content-between g-4">

					<div class="col-xl-7 col-lg-7 col-md-12">
						<div class="contactForm gray-simple p-4 rounded-3">
							<form>
								<div class="row align-items-center">

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="touch-block d-flex flex-column mb-4">
											<h2>Drop Us a Line</h2>
											<p>Get in touch via form below and we will reply as soos as we can. </p>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Your Name</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">eMail ID</label>
											<input type="email" class="form-control">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Phone No.</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Subject</label>
											<input type="text" class="form-control">
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-label">Your Query</label>
											<textarea class="form-control ht-120"></textarea>
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group mb-0">
											<button type="button" class="btn fw-medium btn-primary">Send Message<i
													class="fa-solid fa-paper-plane ms-2"></i></button>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>

					<div class="col-xl-5 col-lg-5 col-md-12">
						<iframe class="full-width ht-100 grayscale rounded"
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin"
							height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>
					</div>

				</div>

			</div>
		</section>
		<!-- ============================ Form Section End ================================== -->


		<!-- ============================ Call To Action Start ================================== -->
		<div class="py-5 bg-primary">
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-xl-4 col-lg-4 col-md-6">
						<h4 class="text-light fw-bold lh-base m-0">Join our Newsletter To Keep Up To Date With Us!</h4>
					</div>

					<div class="col-xl-5 col-lg-5 col-md-6">
						<div class="newsletter-forms mt-md-0 mt-4">
							<form>
								<div class="row align-items-center justify-content-between bg-white rounded-3 p-2 gx-0">

									<div class="col-xl-9 col-lg-8 col-md-8">
										<div class="form-group m-0">
											<input type="text" class="form-control bold ps-1 border-0" placeholder="Enter Your Mail!">
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-4">
										<div class="form-group m-0">
											<button type="button" class="btn btn-dark fw-medium full-width">Submit<i
													class="fa-solid fa-arrow-trend-up ms-2"></i></button>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- ============================ Call To Action Start ================================== -->


		<!-- ============================ Footer Start ================================== -->
		@include('layouts.footer')
		<!-- ============================ Footer End ================================== -->



		<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>


	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->


	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/dropzone.min.js"></script>
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/flickity.pkgd.min.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/rangeslider.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/prism.js"></script>

	<script src="assets/js/custom.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->

</body>

</html>