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
									<li><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a>
									</li>
									<li class="active"><a href="travelers.html"><i class="fa-solid fa-user-group me-2"></i>Travelers</a>
									</li>
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
								<h4><i class="fa-solid fa-user-group me-2"></i>Travelers Details</h4>
							</div>
							<div class="card-body gap-4">
								@foreach($passengers as $passenger)
								<div class="card">
									<div class="card-header px-0 border-0">
										<div class="d-flex align-items-center justify-content-between">
											<h6 class="mb-0">{{ $passenger->name }}</h6>
											<div class="card-remove">
												<form method="POST" action="{{ route('user.profile.passengers.destroy', $passenger) }}">
													@csrf
													@method('DELETE')
													<button type="submit" class="nav-link fw-medium text-primary text-sm">Remove</button>
												</form>
											</div>
										</div>
									</div>
									<div class="card-body px-0">
										<form method="POST" action="{{ route('user.profile.passengers.update', $passenger) }}">
											@csrf
											@method('PUT')
											<div class="row">
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">First Name</label>
														<input type="text" name="first_name" class="form-control" value="{{ explode(' ', $passenger->name)[0] }}" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Last Name</label>
														<input type="text" name="last_name" class="form-control" value="{{ explode(' ', $passenger->name)[1] ?? '' }}" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Passport Number</label>
														<input type="text" name="passport_number" class="form-control" value="{{ $passenger->passport_number ?? '' }}" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Passport Expiry Date</label>
														<input type="date" name="passport_expire" class="form-control" value="{{ $passenger->passport_expire ?? '' }}" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Date of Birth</label>
														<input type="date" name="date_of_birth" class="form-control" value="{{ $passenger->date_of_birth ?? '' }}" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Nationality</label>
														<select name="nationality_id" class="form-control" required>
															@foreach($nationalities as $nationality)
																<option value="{{ $nationality->id }}" {{ $passenger->nationality_id == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="text-end">
												<button type="submit" class="btn btn-md btn-primary fw-medium">Update Traveler</button>
											</div>
										</form>
									</div>
								</div>
								@endforeach
								<hr>
								<form method="POST" action="{{ route('user.profile.passengers.store') }}">
									@csrf
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="form-group">
												<label class="form-label">First Name</label>
												<input type="text" name="first_name" class="form-control" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="form-group">
												<label class="form-label">Last Name</label>
												<input type="text" name="last_name" class="form-control" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="form-group">
												<label class="form-label">Passport Number</label>
												<input type="text" name="passport_number" class="form-control" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="form-group">
												<label class="form-label">Passport Expiry Date</label>
												<input type="date" name="passport_expire" class="form-control" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="form-group">
												<label class="form-label">Date of Birth</label>
												<input type="date" name="date_of_birth" class="form-control" required>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="form-group">
												<label class="form-label">Nationality</label>
												<select name="nationality_id" class="form-control" required>
													@foreach($nationalities as $nationality)
														<option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="text-end">
										<button type="submit" class="btn btn-md btn-primary fw-medium">Add New Traveller</button>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>


		@include('layouts.footer')


		



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