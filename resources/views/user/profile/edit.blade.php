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
									<li class="active"><a href="my-profile.html"><i class="fa-regular fa-id-card me-2"></i>My Profile</a>
									</li>
									<li><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a>
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

						<!-- Personal Information -->
						<div class="card mb-4">
							<div class="card-header">
								<h4><i class="fa-solid fa-file-invoice me-2"></i>Personal Information</h4>
								@if (session('success')) 
								<p class="alert alert-success">{{session('success')}}</p>
								@endif
							</div>
							<div class="card-body">
								<form action="{{route('profile.update' , Auth::user()->id)}}" method="post" enctype="multipart/form-data">
								@csrf
								@method('PATCH')
								<div class="row align-items-center justify-content-start">
									<div class="col-xl-12 col-lg-12 col-md-12 mb-4">
										<div class="d-flex align-items-center">
											<label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
												<!-- Avatar place holder -->
												<span class="avatar avatar-xl">
													<img id="uploadfile-1-preview"
														class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ Auth::user()->getFirstMediaUrl('media/Profile') ?? asset('img/ReviewProfile.png')}}"
														alt="">
												</span>
											</label>
											<!-- Upload button -->
											<label class="btn btn-sm btn-light-primary px-4 fw-medium mb-0" for="uploadfile-1">Change</label>
											<input id="uploadfile-1" name="image" class="form-control d-none" type="file">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Name</label>
											<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Location</label>
											<input type="text" name="location" class="form-control" value="{{Auth::user()->location}}">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Email ID</label>
											<input type="text"  class="form-control" value="{{Auth::user()->email}}" readonly>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Mobile</label>
											<input type="text" name="mobile" class="form-control" value="{{Auth::user()->mobile}}">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Date of Birth</label>
											<input type="date" name="date_of_birth" class="form-control" value="{{Auth::user()->date_of_birth}}">
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label class="form-label">Gender</label>
											<input type="text" name="gender" class="form-control"  value="{{Auth::user()->gender}}">
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-label">About Info</label>
											<textarea name="about" class="form-control ht-120">{{Auth::user()->about}}</textarea>
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="text-end">
											<button type="submit" class="btn btn-md btn-primary mb-0">Update Profile</button>
										</div>
									</div>

								</div>
							</form>
							</div>
						</div>

						<div class="card mb-4">
							<div class="card-header">
								<h4><i class="fa-solid fa-envelope-circle-check me-2"></i>Update Your Email</h4>
								@if (session('email')) 
								<p class="alert alert-success">{{session('email')}}</p>
								@endif
							</div>
							<div class="card-body">
								<div class="row align-items-center justify-content-start">
								<form action="{{route('user.email.update' , Auth::user()->id)}}" method="post">
									@csrf
									@method('PUT')
									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-label">Email Address</label>
											<input type="email" name="email" class="form-control" placeholder="update your new email" value="{{Auth::user()->email}}">
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="text-end">
											<button type="submit" class="btn btn-md btn-primary mb-0">Update Email</button>
										</div>
									</div>
								</form>

								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h4><i class="fa-solid fa-lock me-2"></i>Update Password</h4>
								@if (session('password')) 
								<p class="alert alert-success">{{session('password')}}</p>
								@endif
								@if (session('error')) 
								<p class="alert alert-danger">{{session('error')}}</p>
								@endif
							</div>
							<div class="card-body">
								<div class="row align-items-center justify-content-start">
								<form action="{{route('user.password.update' , Auth::user()->id)}}" method="post">
									@csrf
									@method('PUT')
									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-label">Old Password</label>
											<input type="text" name="old_password" class="form-control" placeholder="*********">
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-label">New Password</label>
											<input type="text" name="password" class="form-control" placeholder="*********">
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-label">Confirm Password</label>
											<input type="text" class="form-control" placeholder="*********">
										</div>
									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">
										<div class="text-end">
											<button type="submit" class="btn btn-md btn-primary mb-0">Change Password</button>
										</div>
									</div>
								</form>
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


		<!-- Print Invoice -->
		<div class="modal modal-lg fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="invoicemodal"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered invoice-pop-form" role="document">
				<div class="modal-content" id="invoicemodal">
					<div class="modal-header">
						<h4 class="modal-title fs-6">Download your invoice</h4>
						<a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
								class="fa-solid fa-square-xmark"></i></a>
					</div>
					<div class="modal-body">
						<div class="invoiceblock-wrap p-3">
							<!-- Header -->
							<div class="invoice-header d-flex align-items-center justify-content-between mb-4">
								<div class="inv-fliop01 d-flex align-items-center justify-content-start">
									<div class="inv-fliop01">
										<div class="square--60 circle bg-light-primary text-primary"><i
												class="fa-solid fa-file-invoice fs-2"></i></div>
									</div>
									<div class="inv-fliop01 ps-3">
										<span class="text-uppercase d-block fw-semibold text-md text-dark lh-2 mb-0">Invoice #3256425</span>
										<span class="text-sm text-muted lh-2"><i class="fa-regular fa-calendar me-1"></i>Issued Date 12 Jul
											2023</span>
									</div>
								</div>
								<div class="inv-fliop02"><span class="label text-success bg-light-success">Paid</span></div>
							</div>

							<!-- Invoice Body -->
							<div class="invoice-body">

								<!-- Invoice Top Body -->
								<div class="invoice-bodytop">
									<div class="row align-items-start justify-content-between">
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="invoice-desc mb-2">
												<h6>From</h6>
												<p class="text-md lh-2 mb-0">#782 Baghambari, Poudery Colony<br>Shivpuras Town,
													Canada<br>QBH230542 USA</p>
											</div>
										</div>
										<div class="col-xl-5 col-lg-5 col-md-6">
											<div class="invoice-desc mb-2">
												<h6>To</h6>
												<p class="text-md lh-2 mb-0">Dhananjay Verma/ Brijendra Mani<br>220 K.V Jail Road Hydel
													Colony<br>271001 Gonda, UP</p>
											</div>
										</div>
									</div>
								</div>

								<!-- Invoice Mid Body -->
								<div class="invoice-bodymid py-2">
									<ul class="gray rounded-3 p-3 m-0">
										<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-1">
											<span class="fw-medium text-sm text-muted-2 mb-0">Account No.:</span>
											<span class="fw-semibold text-muted-2 text-md">************4562</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-1">
											<span class="fw-medium text-sm text-muted-2 mb-0">Reference ID:</span>
											<span class="fw-semibold text-muted-2 text-md">#2326524</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-1">
											<span class="fw-medium text-sm text-muted-2 mb-0">Pay by:</span>
											<span class="fw-semibold text-muted-2 text-md">25 Aug 2023</span>
										</li>
									</ul>
								</div>

								<!-- Invoice bott Body -->
								<div class="invoice-bodybott py-2 mb-2">
									<div class="table-responsive border rounded-2">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Item</th>
													<th scope="col">Price</th>
													<th scope="col">Qut.</th>
													<th scope="col">Total Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">king Bed in Royal Resort</th>
													<td>$514</td>
													<td>03</td>
													<td>$514</td>
												</tr>
												<tr>
													<th scope="row">Breakfast for 3</th>
													<td>$214</td>
													<td>03</td>
													<td>$214</td>
												</tr>
												<tr>
													<th scope="row">Tax & VAT</th>
													<td>$78</td>
													<td>-</td>
													<td>$772.40</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>

								<div class="invoice-bodyaction">
									<div class="d-flex text-end justify-content-end align-items-center">
										<a href="#" class="btn btn-sm btn-light-success fw-medium me-2">Download Invoice</a>
										<a href="#" class="btn btn-sm btn-light-primary fw-medium me-2">Print Invoice</a>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal -->


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