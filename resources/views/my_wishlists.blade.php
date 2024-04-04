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
							<li><a href="{{route('user.profile')}}"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
							<li><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
							<li><a href="travelers.html"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li>
							<li><a href="payment-detail.html"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
							<li class="active"><a href="{{route('user.wish.list')}}"><i class="fa-solid fa-shield-heart me-2"></i>My
									Wishlist</a></li>
							<li><a href="settings.html"><i class="fa-solid fa-sliders me-2"></i>Settings</a></li>
							<li><a href="delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete Profile</a></li>
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
									<li><a href="my-profile.html"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
									<li><a href="my-booking.html"><i class="fa-solid fa-ticket me-2"></i>My Booking</a>
									</li>
									<li><a href="travelers.html"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li>
									<li><a href="payment-detail.html"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
									<li class="active"><a href="my-wishlists.html"><i class="fa-solid fa-shield-heart me-2"></i>My
											Wishlist</a></li>
									<li><a href="settings.html"><i class="fa-solid fa-sliders me-2"></i>Settings</a></li>
									<li><a href="delete-account.html"><i class="fa-solid fa-trash-can me-2"></i>Delete Profile</a></li>
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
								<div class="position-absolute end-0 top-0 mt-4 me-3"></div>
								<div class="py-5 px-3">
									<div class="crd-thumbimg text-center">
										<div class="p-2 d-flex align-items-center justify-content-center brd"><img src="{{asset('image/profile')}}/{{Auth::user()->image}}"
												class="img-fluid circle" width="120" alt=""></div>
									</div>
									<div class="crd-capser text-center">
										<h5 class="mb-0 text-light fw-semibold">{{Auth::user()->name}}</h5>
										<span class="text-light opacity-75 fw-medium text-md"><i
												class="fa-solid fa-location-dot me-2"></i>{{Auth::user()->location}}</span>
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
						<div class="card">
							<div class="card-header">
								<h4><i class="fa-solid fa-shield-heart me-2"></i>My Wishlist</h4>
							</div>
							<div class="card-body">

							@foreach($wishlist as $wish)
								<div class="card list-layout-block border rounded-3 p-3 mb-4">
									<div class="row">

										<div class="col-xl-4 col-lg-3 col-md">
											<div class="cardImage__caps rounded-2 overflow-hidden h-100">
												<img class="img-fluid h-100 object-fit" src="{{ asset('image')}}/{{$wish->rel_to_flight->rel_to_airport_destination_airport_id->image}}" alt="image">
											</div>
										</div>

										<div class="col-xl col-lg col-md">
											<div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
												<div class="d-flex align-items-center justify-content-start">
													<div class="d-inline-block">
														<i class="fa fa-star text-warning text-xs"></i>
														<i class="fa fa-star text-warning text-xs"></i>
														<i class="fa fa-star text-warning text-xs"></i>
														<i class="fa fa-star text-warning text-xs"></i>
														<i class="fa fa-star text-warning text-xs"></i>
													</div>
												</div>
												<h4 class="city fs-6 m-0 fw-bold">
													<span>{{$wish->rel_to_flight->rel_to_airport_origin_airport_id->name}}</span>
													<span class="svg-icon svg-icon-muted svg-icon-2hx px-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path
															d="M17.4 7H4C3.4 7 3 7.4 3 8C3 8.6 3.4 9 4 9H17.4V7ZM6.60001 15H20C20.6 15 21 15.4 21 16C21 16.6 20.6 17 20 17H6.60001V15Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M17.4 3V13L21.7 8.70001C22.1 8.30001 22.1 7.69999 21.7 7.29999L17.4 3ZM6.6 11V21L2.3 16.7C1.9 16.3 1.9 15.7 2.3 15.3L6.6 11Z"
															fill="currentColor" />
														</svg>
													</span>
													<span>{{$wish->rel_to_flight->rel_to_airport_destination_airport_id->name}}</span>
													</h4>
												<div class="position-relative mt-3">
													<div class="fw-medium text-dark">Standard Twin Double Room</div>
													<div class="text-md text-muted">Last booed 25min ago</div>
												</div>
												<div class="position-relative mt-4">
													<div class="d-block position-relative"><span class="label bg-light-success text-success">Free
															Cancellation, till 1 hour of Pick up</span></div>
													<div class="text-md">
														<p class="m-0">Room type: Standard King Room <a class="text-primary">Change Room</a></p>
													</div>
												</div>
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