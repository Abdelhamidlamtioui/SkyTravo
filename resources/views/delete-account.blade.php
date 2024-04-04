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



		<!-- ============================ User Dashboard Menu ============================ -->
		<div class="dashboard-menus border-top d-none d-lg-block">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<ul class="user-Dashboard-menu">
							<li><a href="my-profile.html"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
							<li><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
							<li><a href="travelers.html"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li>
							<li><a href="payment-detail.html"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
							<li><a href="my-wishlists.html"><i class="fa-solid fa-shield-heart me-2"></i>My Wishlist</a></li>
							<li><a href="settings.html"><i class="fa-solid fa-sliders me-2"></i>Settings</a></li>
							<li class="active"><a href="delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete
									Profile</a></li>
							<li><a href="login.html"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================ End user Dashboard Menu ============================ -->


		<!-- ============================ Booking Page ================================== -->
		<section class="pt-5 gray-simple position-relative">
			<div class="container">

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-12 col-lg-12 col-md-12 mb-4">
						<button class="btn btn-dark fw-medium full-width d-block d-lg-none" data-bs-toggle="offcanvas"
							data-bs-target="#offcanvasDashboard" aria-controls="offcanvasDashboard"><i
								class="fa-solid fa-gauge me-2"></i>Dashboard
							Navigation</button>
						<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
							id="offcanvasDashboard" aria-labelledby="offcanvasScrollingLabel">
							<div class="offcanvas-header gray-simple">
								<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>
							<div class="offcanvas-body p-0">
								<ul class="user-Dashboard-longmenu">
									<li><a href="my-profile.html"><i class="fa-regular fa-id-card me-2"></i>My Profile</a>
									</li>
									<li><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a>
									</li>
									<li><a href="travelers.html"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li>
									<li><a href="payment-detail.html"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
									<li><a href="my-wishlists.html"><i class="fa-solid fa-shield-heart me-2"></i>My Wishlist</a></li>
									<li><a href="settings.html"><i class="fa-solid fa-sliders me-2"></i>Settings</a></li>
									<li class="active"><a href="delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete
											Profile</a></li>
									<li><a href="login.html"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row align-items-start justify-content-between gx-xl-4">

					<div class="col-xl-4 col-lg-4 col-md-12">
						<div class="card rounded-2 me-xl-5 mb-4">
							<div class="card-top bg-primary position-relative">
								<div class="position-absolute end-0 top-0 mt-4 me-3"><a href="login.html"
										class="square--40 circle bg-light-dark text-light"><i
											class="fa-solid fa-right-from-bracket"></i></a></div>
								<div class="py-5 px-3">
									<div class="crd-thumbimg text-center">
										<div class="p-2 d-flex align-items-center justify-content-center brd"><img src="{{ asset('img/team-1.jpg') }}"
												class="img-fluid circle" width="120" alt=""></div>
									</div>
									<div class="crd-capser text-center">
										<h5 class="mb-0 text-light fw-semibold">Adam K. Divliars</h5>
										<span class="text-light opacity-75 fw-medium text-md"><i
												class="fa-solid fa-location-dot me-2"></i>California, USA</span>
									</div>
								</div>
							</div>

							<div class="card-middle px-4 py-5">
								<div class="crdapproval-groups">

									<div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
										<div class="crdapproval-item">
											<div class="square--50 circle bg-light-success text-success"><i
													class="fa-solid fa-envelope-circle-check fs-5"></i></div>
										</div>
										<div class="crdapproval-caps ps-2">
											<p class="fw-semibold text-dark lh-2 mb-0">Verified Email</p>
											<p class="text-md text-muted lh-1 mb-0">10 Aug 2022</p>
										</div>
									</div>

									<div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
										<div class="crdapproval-item">
											<div class="square--50 circle bg-light-success text-success"><i
													class="fa-solid fa-phone-volume fs-5"></i></div>
										</div>
										<div class="crdapproval-caps ps-2">
											<p class="fw-semibold text-dark lh-2 mb-0">Verified Mobile Number</p>
											<p class="text-md text-muted lh-1 mb-0">12 Aug 2022</p>
										</div>
									</div>

									<div class="crdapproval-single d-flex align-items-center justify-content-start">
										<div class="crdapproval-item">
											<div class="square--50 circle bg-light-warning text-warning"><i
													class="fa-solid fa-file-invoice fs-5"></i></div>
										</div>
										<div class="crdapproval-caps ps-2">
											<p class="fw-semibold text-dark lh-2 mb-0">Complete Basic Info</p>
											<p class="text-md text-muted lh-1 mb-0">Not Verified</p>
										</div>
									</div>

								</div>
							</div>

							<div class="card-middle mt-5 mb-4 px-4">
								<div class="revs-wraps mb-3">
									<div class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
										<span class="text-dark fw-semibold text-md">Complete Your Profile</span>
										<span class="text-dark fw-semibold text-md">75%</span>
									</div>
									<div class="progress " role="progressbar" aria-label="Example" aria-valuenow="87" aria-valuemin="0"
										aria-valuemax="100" style="height: 7px">
										<div class="progress-bar bg-success" style="width: 87%"></div>
									</div>
								</div>
								<div class="crd-upgrades">
									<button class="btn btn-light-primary fw-medium full-width rounded-2" type="button"><i
											class="fa-solid fa-sun me-2"></i>Upgrade Pro</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-8 col-lg-8 col-md-12">

						<!-- Personal Information -->
						<div class="card mb-4">
							<div class="card-header">
								<h4><i class="fa-solid fa-trash-can me-2"></i>Delete Your Account</h4>
							</div>
							<div class="card-body">
								<div class="eportledd mb-4">
									<h6>Save Your Data<span class="text-danger">*</span></h6>
									<div class="form-check ps-0">
										Take a backup of your data <a href="#" class="text-primary">Here</a>
									</div>
								</div>
								<form class="mb-3">
									<h6>Enter Your Password</h6>
									<input type="password" class="form-control mb-2" placeholder="*********">
									<button class="btn btn-md btn-success fw-medium">Confirm</button>
								</form>
								<div class="d-sm-flex justify-content-start">
									<button type="button" class="btn btn-md btn-primary fw-medium me-2 mb-0">Keep My Account</button>
									<a href="#" class="btn btn-md btn-light-primary fw-medium mb-0">Delete Account</a>
								</div>

							</div>
						</div>

					</div>

				</div>
			</div>
		</section>
		<!-- ============================ Booking Page End ================================== -->


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