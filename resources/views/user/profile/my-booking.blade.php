@include('layouts.head')

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
		<div class="header header-light head-shadow">
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
		@include('layouts.userProfileMenu')
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
									<li><a href="my-profile.html"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
									<li class="active"><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a>
									</li>
									<li><a href="travelers.html"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li>
									<li><a href="payment-detail.html"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
									<li><a href="my-wishlists.html"><i class="fa-solid fa-shield-heart me-2"></i>My Wishlist</a></li>
									<li><a href="settings.html"><i class="fa-solid fa-sliders me-2"></i>Settings</a></li>
									<li><a href="delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete Profile</a></li>
									<li><a href="login.html"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row align-items-start justify-content-between gx-xl-4">

					@include("layouts.sideProfileSection")

					<div class="col-xl-8 col-lg-8 col-md-12">

						<div class="card">
							<div class="card-header">
								<h4><i class="fa-solid fa-ticket me-2"></i>My Bookings</h4>
							</div>
							<div class="card-body">
								<div class="row align-items-center justify-content-start">
									<div class="col-xl-12 col-lg-12 col-md-12">

										
										@foreach($bookings as $booking)
										<div class="card border br-dashed mb-4">
											<!-- Card header -->
											<div class="card-header nds-block border-bottom flex-column flex-md-row justify-content-between align-items-center">
												<!-- Icon and Title -->
												<div class="d-flex align-items-center">
													<div class="square--50 circle bg-light-purple text-purple flex-shrink-0"><i
															class="fa-solid fa-plane"></i></div>
													<!-- Title -->
													<div class="ms-2">
														<h6 class="card-title text-dark fs-5 mb-1">{{ $booking->flight->originairport->name }} To {{ $booking->flight->destinationairport->name }}</h6>
														<ul class="nav nav-divider small">
															<li class="nav-item text-muted">Booking ID: {{ $booking->id }}</li>
															<li class="nav-item ms-2"><span class="label bg-light-success text-success">{{ $booking->flight_type->name }}</span></li>
														</ul>
													</div>
												</div>
									
												<div class="mt-2 mt-md-0">
													<a href="{{ route('bookings.download-ticket', $booking) }}" class="btn btn-md btn-light-seegreen fw-medium mb-0">Download Your Ticket</a>
												</div>
											</div>
									
											<!-- Card body -->
											<div class="card-body">
												<div class="row g-3">
													<div class="col-sm-6 col-md-4">
														<span>Departure time</span>
														<h6 class="mb-0">{{ $booking->flight->departure_at }}</h6>
													</div>
									
													<div class="col-sm-6 col-md-4">
														<span>Arrival time</span>
														<h6 class="mb-0">{{ $booking->flight->arrival_at }}</h6>
													</div>
									
													<div class="col-md-4">
														<span>Booked by</span>
														<h6 class="mb-0">{{ $booking->user->name }}</h6>
													</div>
												</div>
											</div>
										</div>
									@endforeach

									</div>
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