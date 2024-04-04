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
		<section class="bg-cover position-relative" style="background:url({{ asset('img/bg.jpg')}})no-repeat;" data-overlay="5">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-xl-7 col-lg-9 col-md-12">

						<div class="fpc-capstion text-center my-4">
							<div class="fpc-captions">
								<h1 class="xl-heading text-light">About GeoTrip & Our Mission</h1>
								<p class="text-light">Cicero famously orated against his political opponent Lucius Sergius Catilina.
									Occasionally the first Oration against Catiline is taken for type specimens</p>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="fpc-banner"></div>
		</section>
		<!-- ============================ Booking Title ================================== -->


		<!-- ============================ About Us Section ================================== -->
		<section>
			<div class="container">

				<div class="row align-items-center justify-content-between g-4">

					<div class="col-xl-6 col-lg-6 col-md-6">
						<div class="">
							<h2 class="lh-base fs-1 fw-bold">Who We're & Mission?</h2>
							<p>In a professional context it often happens that private or corporate clients corder a publication to be
								made and presented with the actual content still not being ready. Think of a news blog that's filled
								with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible
								content, say, a random text copied from a newspaper or the internet. The are likely to focus on the
								text, disregarding the layout and its elements.</p>
							<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
								demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the
								pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty
								through weakness of will, which is the same as saying through shrinking from toil and pain. These cases
								are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled
								and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and
								every pain avoided. </p>
						</div>
					</div>

					<div class="col-xl-5 col-lg-6 col-md-6">
						<div class="position-relative">
							<img src="{{ asset('img/side-3.png') }}" class="img-fluid" alt="">
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- ============================ About Us Section End ================================== -->

		<!-- ============================ Video Helps End ================================== -->
		<section class="bg-cover" style="background:url({{ asset('img/bg-title.jpg')}}) no-repeat;" data-overlay="5">
			<div class="ht-150"></div>
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-xl-12 col-lg-12 col-md-12">

						<div class="video-play-wrap text-center">
							<div class="video-play-btn d-flex align-items-center justify-content-center">
								<a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-bs-toggle="modal" data-bs-target="#popup-video" class="square--90 circle bg-white fs-2 text-primary"><i class="fa-solid fa-play"></i></a>

							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="ht-150"></div>
		</section>
		<!-- ============================ Video Helps End ================================== -->


		<!-- ============================ Our facts End ================================== -->
		<section class="py-4 gray">
			<div class="container">
				<div class="row align-items-center justify-content-between g-4">

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="urfacts-wrap d-flex align-items-center justify-content-center">
							<div class="urfacts-first flex-shrink-0">
								<h3 class="fs-1 fw-medium text-primary mb-0">32K</h3>
							</div>
							<div class="urfacts-caps ps-3">
								<p class="text-muted-2 lh-base mb-0">Overall<br>Booking</p>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="urfacts-wrap d-flex align-items-center justify-content-center">
							<div class="urfacts-first flex-shrink-0">
								<h3 class="fs-1 fw-medium text-primary mb-0">25+</h3>
							</div>
							<div class="urfacts-caps ps-3">
								<p class="text-muted-2 lh-base mb-0">Years<br>Successfully</p>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="urfacts-wrap d-flex align-items-center justify-content-center">
							<div class="urfacts-first flex-shrink-0">
								<h3 class="fs-1 fw-medium text-primary mb-0">45K</h3>
							</div>
							<div class="urfacts-caps ps-3">
								<p class="text-muted-2 lh-base mb-0">Happly<br>Users</p>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
						<div class="urfacts-wrap d-flex align-items-center justify-content-center">
							<div class="urfacts-first flex-shrink-0">
								<h3 class="fs-1 fw-medium text-primary mb-0">22</h3>
							</div>
							<div class="urfacts-caps ps-3">
								<p class="text-muted-2 lh-base mb-0">Countries<br>We Work</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ============================ Our facts End ================================== -->


		<!-- ================================ Article Section Start ======================================= -->
		<section>
			<div class="container">

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
						<div class="secHeading-wrap text-center mb-5">
							<h2>Trending & Popular Articles</h2>
							<p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
						</div>
					</div>
				</div>


				<div class="row justify-content-center g-4">

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="blogGrid-wrap d-flex flex-column h-100">
							<div class="blogGrid-pics">
								<a href="#" class="d-block"><img src="{{ asset('img/blog-1.jpg') }}" class="img-fluid rounded" alt="Blog image"></a>
							</div>
							<div class="blogGrid-caps pt-3">
								<div class="d-flex align-items-center mb-1"><span
										class="label text-success bg-light-success">Destination</span></div>
								<h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
										Comfirtable And Best Price</a></h4>
								<p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
									to be unintendedly humorous or offensive day of going live.</p>
								<a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="blogGrid-wrap d-flex flex-column h-100">
							<div class="blogGrid-pics">
								<a href="#" class="d-block"><img src="{{ asset('img/blog-2.jpg') }}" class="img-fluid rounded" alt="Blog image"></a>
							</div>
							<div class="blogGrid-caps pt-3">
								<div class="d-flex align-items-center mb-1"><span
										class="label text-success bg-light-success">Journey</span></div>
								<h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
										Comfirtable And Best Price</a></h4>
								<p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
									to be unintendedly humorous or offensive day of going live.</p>
								<a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="blogGrid-wrap d-flex flex-column h-100">
							<div class="blogGrid-pics">
								<a href="#" class="d-block"><img src="{{ asset('img/blog-3.jpg') }}" class="img-fluid rounded" alt="Blog image"></a>
							</div>
							<div class="blogGrid-caps pt-3">
								<div class="d-flex align-items-center mb-1"><span
										class="label text-success bg-light-success">Business</span></div>
								<h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi To Paris in
										Comfirtable And Best Price</a></h4>
								<p class="mb-3">Think of a news blog that's filled with content hourly on the Besides, random text risks
									to be unintendedly humorous or offensive day of going live.</p>
								<a class="text-primary fw-medium" href="#">Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ================================ Article Section Start ======================================= -->


		<!-- ============================ Footer Start ================================== -->
		@include('layouts.footer')
		<!-- ============================ Footer End ================================== -->



		<!-- Video Modal -->
		<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content" id="popupvideo">
					<iframe class="embed-responsive-item full-width" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<!-- End Video Modal -->

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