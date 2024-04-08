<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
		<div class="header header-dark">
			<div class="container">
				@include('layouts.nav')
			</div>
		</div>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->


		<!-- ============================ Hotel Details Start ================================== -->
		<section class="pt-3 gray-simple">
			<div class="container">
				<div class="row">
					<!-- Breadcrumb -->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-primary">Home</a></li>
								<li class="breadcrumb-item"><a href="#" class="text-primary">Flight</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									@if ($departFlight->originairport)
										{{$departFlight->originairport->name}} 
									@endif
									To 
									@if ($departFlight->destinationairport)
										{{$departFlight->destinationairport->name}}
									@endif
								</li>							</ol>
						</nav>
					</div>

					<!-- Flight Info -->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="row">
							<div class="col-xl-9 col-lg-8 col-md-12">
								<div class="card border-0 mb-4">
									<div class="card-body">
										<div class="crd-block d-md-flex align-items-start justify-content-start">
											<div class="crd-heaader-0 flex-shrink-0 mb-3 mb-md-0">
												<div class="square--70 rounded-2 bg-light-primary text-primary fs-3"><i class="fa-solid fa-plane"></i></div>
											</div>
											<div class="crd-heaader-first ps-md-3">
												<div class="d-inline-flex align-items-center mb-1">
													<span class="label fw-medium bg-light-success text-success">Business Class</span>
												</div>
												<div class="d-block">
													<h4 class="mb-0">{{$departFlight->originairport->name}} <span class="text-muted-2 mx-3"><i class="fa-solid fa-arrow-right-arrow-left"></i></span>{{$departFlight->destinationairport->name}}</h4>
													<div class="explotter-info">
														<p class="detail ellipsis-container fw-semibold">
															<span class="ellipsis-item">0 Stop</span>
															<span class="separate ellipsis-item__normal"></span>
															<span class="ellipsis-item">{{$departFlight->flight_duration}}</span>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Flight Info -->
								<div class="card border-0 mb-4">
									<div class="card-body">
										<div class="flights-accordion">
											<div class="flights-list-item">
												<div class="row gy-4 align-items-center justify-content-between">

													<div class="col">
														{{-- Depart flight --}}
														<div class="row">
															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="d-flex align-items-center mb-2">
																	<span class="label bg-light-primary text-primary me-2">Departure</span>
																	<span class="text-muted text-sm">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $departFlight->departure_at)->format('d M Y') }}</span>
																</div>
															</div>
															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="row gx-lg-5 gx-3 gy-4 align-items-center">

																	<div class="col-sm-auto">
																		<div class="d-flex align-items-center justify-content-start">
																			<div class="d-start fl-pic">
																				<img class="img-fluid rounded-circle" src="{{ $departFlight->airline->getFirstMediaUrl('AirlinesLogos') }}" width="45" alt="image">
																			</div>
																			<div class="d-end fl-title ps-2">
																				<div class="text-dark fw-medium">{{$departFlight->airline->name}}</div>
																				<div class="text-sm text-muted">{{$flightTypeName}}</div>
																			</div>
																		</div>
																	</div>

																	<div class="col">
																		<div class="row gx-3 align-items-center">
																			<div class="col-auto">
																				<div class="text-dark fw-bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $departFlight->departure_at)->format('H:i') }}</div>
																				<div class="text-muted text-sm fw-medium">DLH</div>
																			</div>

																			<div class="col text-center">
																				<div class="flightLine departure">
																					<div></div>
																					<div></div>
																				</div>
																				<div class="text-muted text-sm fw-medium mt-3">Direct</div>
																			</div>

																			<div class="col-auto">
																				<div class="text-dark fw-bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $departFlight->arrival_at)->format('H:i') }}</div>
																				<div class="text-muted text-sm fw-medium">LOS</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-auto">
																		<div class="text-dark fw-medium">{{$departFlight->flight_duration}}</div>
																		<div class="text-muted text-sm fw-medium">2 Stop</div>
																	</div>
																</div>
															</div>
														</div>
														{{-- Return flight --}}
														<div class="row mt-4">
															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="d-flex align-items-center mb-2">
																	<span class="label bg-light-success text-success me-2">Return</span>
																	<span class="text-muted text-sm">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $returnFlight->departure_at)->format('d M Y') }}</span>
																</div>
															</div>

															<div class="col-xl-12 col-lg-12 col-md-12">
																<div class="row gx-lg-5 gx-3 gy-4 align-items-center">
																	<div class="col-sm-auto">
																		<div class="d-flex align-items-center justify-content-start">
																			<div class="d-start fl-pic">
																				<img class="img-fluid rounded-circle" src="{{ $returnFlight->airline->getFirstMediaUrl('AirlinesLogos') }}" width="45" alt="image">
																			</div>
																			<div class="d-end fl-title ps-2">
																				<div class="text-dark fw-medium">{{ $returnFlight->airline->name }}</div>
																				<div class="text-sm text-muted">{{$flightTypeName}}</div>
																			</div>
																		</div>
																	</div>

																	<div class="col">
																		<div class="row gx-3 align-items-center">
																			<div class="col-auto">
																				<div class="text-dark fw-bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $returnFlight->departure_at)->format('H:i') }}</div>
																				<div class="text-muted text-sm fw-medium">LOS</div>
																			</div>

																			<div class="col text-center">
																				<div class="flightLine return">
																					<div></div>
																					<div></div>
																				</div>
																				<div class="text-muted text-sm fw-medium mt-3">Direct</div>
																			</div>

																			<div class="col-auto">
																				<div class="text-dark fw-bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $returnFlight->departure_at)->format('H:i') }}</div>
																				<div class="text-muted text-sm fw-medium">DLH</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-auto">
																		<div class="text-dark fw-medium">{{ $returnFlight->flight_duration }}</div>
																		<div class="text-muted text-sm fw-medium">0 Stop</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Login Alert -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="d-flex align-items-center justify-content-start py-3 px-3 rounded-2 bg-success mb-4">
										<p class="text-light fw-semibold m-0"><i class="fa-solid fa-gift text-warning me-2"></i><a href="#"
												class="text-white text-decoration-underline">Login</a> or <a href="#"
												class="text-white text-decoration-underline">Register</a> to earn upto 100 coins (approx 1.72 US$)
											after check-out.
										<p>
									</div>
								</div>
								
								<!-- Flight Details -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<!-- Overview -->
									<div class="card mb-4">
										<div class="card-header">
											<h6 class="fw-semibold mb-0">Overview</h6>
										</div>

										<div class="card-body">
											<p class="mb-0">However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>
										</div>
									</div>
								</div>
								
								<!-- Highlights -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="card mb-4">
										<div class="card-header">
											<h6 class="fw-semibold mb-0">Highlights</h6>
										</div>

										<div class="card-body">
											<ul class="row align-items-center p-0 g-3">
												<li class="col-md-6">
													<i class="fa-solid fa-check text-success me-2"></i>A fantastic experience at the Niagara
													Falls
												</li>
												<li class="col-md-6">
													<i class="fa-solid fa-check text-success me-2"></i>Wonderful experience at the Harborfront
												</li>
												<li class="col-md-6">
													<i class="fa-solid fa-check text-success me-2"></i>Breathtaking views at the Night at
													Niagara Falls
												</li>
												<li class="col-md-6">
													<i class="fa-solid fa-check text-success me-2"></i>Splendid experiences with the City
													tours.
												</li>
												<li class="col-md-6">
													<i class="fa-solid fa-check text-success me-2"></i>All led out world this music while
													asked.
												</li>
											</ul>
										</div>
									</div>
								</div>
								
								<!-- Traveler Details -->
								<div class="col-xl-12 col-lg-12 col-md-12">
									<!-- Overview -->
									<div class="card">
										<div class="card-header">
											<h6 class="fw-semibold mb-0">Traveler Details</h6>
										</div>

										<div class="card-body">
											
											<div class="bg-success bg-opacity-10 rounded-2 p-3 mb-3">
												<p class="h6 text-md mb-0"><span class="badge bg-success me-2">New</span>Please enter your name as per your passport ID</p>
											</div>
										
											<div id="passengersList"></div>
											
											<div class="full-width d-flex flex-column mb-4 position-relative">
												<form id="passengerForm" method="POST">
													<div class="row align-items-start">
														<div class="col-xl-12 col-lg-12 col-md-12 mb-2">
															<h5>Add More Passengers</h5>
														</div>
														<input type="hidden" name="booking_id" value=" {{$booking->id}}">

														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">First Name</label>
																<input type="text" class="form-control" name="first_name" placeholder="Your First Name">
															</div>
														</div>
												
														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">Last Name</label>
																<input type="text" class="form-control" name="last_name" placeholder="Your Last Name">
															</div>
														</div>
												
														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">Passport Number</label>
																<input type="text" class="form-control" name="passport_number" placeholder="Passport Number Here">
															</div>
														</div>
												
														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">Passport Expire</label>
																<input type="date" class="form-control" name="passport_expire" placeholder="Passport Expire Date">
															</div>
														</div>
												
														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">Date of birth</label>
																<input type="date" class="form-control fw-bold" name="date_of_birth" placeholder="Select Date.." id="basicDate">
															</div>
														</div>
												
														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">Nationality</label>
																<select name="nationality_id" class="select form-control">
																	<option value="">Select Nationality</option>
																	@foreach ($nationalities as $nationality)
																	<option value="{{$nationality->id}}">{{$nationality->name}}</option>
																	@endforeach
																</select>
															</div>
														</div>
												
														<div class="col-xl-6 col-lg-6 col-md-6">
															<div class="form-group">
																<label class="form-label">Gender</label>
																<div class="form-group">
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" type="radio" name="gender" id="male" value="male">
																		<label class="form-check-label" for="male">Male</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" type="radio" name="gender" id="female" value="female">
																		<label class="form-check-label" for="female">Female</label>
																	</div>
																</div>
															</div>
														</div>
												
														<div class="col-xl-12 col-lg-12 col-md-12">
															<button class="btn btn-md px-5 btn-light-primary fw-medium" type="button" id="addPassengerBtn">Add Passengers</button>
														</div>
													</div>
												</form>
											</div>
											
											<div class="full-width d-flex flex-column mb-2 position-relative">
						
												<div class="row align-items-stat">
													<div class="col-xl-12 col-lg-12 col-md-12 mb-2">
														<h5>Personal Information</h5>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="form-label">Email Address</label>
															<input type="text" class="form-control" placeholder="Email Here">
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="form-label">Mobile number</label>
															<input type="text" class="form-control" placeholder="Contact Number">
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<button class="btn btn-md full-width px-5 btn-primary fw-medium" type="button">Submit & Proceed for Payment</button>
													</div>
													
												</div>
											</div>
											
										</div>
									</div>
								</div>
								
							</div>
							
							<!-- Sidebar -->
							<div class="col-xl-3 col-lg-4 col-md-12">
								{{-- Total Price Summary --}}
								<div class="card mb-4 mt-lg-0 mt-4">
									<div class="card-header"><h4>Price Summary</h4></div>
									<div class="card-body py-2">
										<div class="price-summary">
											<ul class="list-group">
												<li class="list-group-item d-flex justify-content-between align-items-center border-0 py-2 px-0">
													Base Fare 
													<span class="fw-semibold text-dark" id="baseFare">${{$booking->total_price}}</span>
												</li>
												<li class="list-group-item d-flex justify-content-between align-items-center border-0 py-2 px-0">
													Discount
													<span class="fw-semibold text-success" id="discountAmount">-$0</span>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-footer bg-white border-top py-3">
										<div class="d-flex align-items-center justify-content-between">
											<p class="fw-semibold text-muted-2 mb-0">Total Price</p>
											<p class="fw-semibold text-primary mb-0" id="totalPrice">${{$booking->total_price}}</p>
										</div>
									</div>
								</div>
								
								<div class="card border rounded-3">
									<div class="card-header">
										<h4>Coupons & Offers</h4>
									</div>
									<div class="card-body">
										<form class="form-group position-relative" method="POST" id="couponForm">
											<input type="hidden" name="booking_price" value="{{ $booking->total_price }}">
											<input type="text" name="coupon_code" class="form-control" placeholder="Have a Coupon Code?" value="">
											<button type="submit" class="position-absolute bg-white border-0 top-50 end-0 fw-semibold translate-middle text-primary disable" id="applyButton">Apply</button>
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>

				</div>
			</div>
		</section>
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
	<script>
		(function () {

			// Add Adult & childElementCount
			const guestBtn = document.querySelector("#guests-input-btn"),
				guestOptions = document.querySelector("#guests-input-options"),
				adultsSubsBtn = document.querySelector("#adults-subs-btn"),
				adultsAddBtn = document.querySelector("#adults-add-btn"),
				childrenSubsBtn = document.querySelector("#children-subs-btn"),
				childrenAddBtn = document.querySelector("#children-add-btn"),
				roomSubsBtn = document.querySelector("#room-subs-btn"),
				roomAddBtn = document.querySelector("#room-add-btn"),
				adultsCountEl = document.querySelector("#guests-count-adults"),
				childrenCountEl = document.querySelector("#guests-count-children"),
				roomCountEl = document.querySelector("#guests-count-room");
			let maxNumGuests = 15,
				isGuestInputOpen = false,
				adultsCount = 1,
				childrenCount = 0,
				roomCount = 0;
			updateValues();
			guestBtn.addEventListener('click', function (e) {
				if (isGuestInputOpen) {
					guestBtn.classList.remove("open");
					guestOptions.classList.remove("open");
				} else {
					guestBtn.classList.add("open");
					guestOptions.classList.add("open");
				}
				isGuestInputOpen = isGuestInputOpen ? false : true;
				e.preventDefault();
			});
			adultsAddBtn.addEventListener('click', function () {
				adultsCount = addValues(adultsCount);
				updateValues();
			});
			adultsSubsBtn.addEventListener('click', function () {
				adultsCount = substractValues(adultsCount, 1);
				updateValues();
			});
			childrenAddBtn.addEventListener('click', function () {
				childrenCount = addValues(childrenCount);
				updateValues();
			});
			childrenSubsBtn.addEventListener('click', function () {
				childrenCount = substractValues(childrenCount, 0);
				updateValues();
			});
			roomAddBtn.addEventListener('click', function () {
				roomCount = addValues(roomCount);
				updateValues();
			});
			roomSubsBtn.addEventListener('click', function () {
				roomCount = substractValues(roomCount, 0);
				updateValues();
			});

			function calcTotalGuests() {
				return adultsCount + childrenCount + roomCount;
			}

			function addValues(count) {
				return (calcTotalGuests() < maxNumGuests) ? count + 1 : count;
			}

			function substractValues(count, min) {
				return (count > min) ? count - 1 : count;
			}

			function updateValues() {
				let btnText = `${adultsCount} Adults`;
				btnText += (childrenCount > 0) ? `, ${childrenCount} Childs` : '';
				btnText += (roomCount > 0) ? `, ${roomCount} Rooms` : '';
				guestBtn.innerHTML = btnText;
				adultsCountEl.innerHTML = adultsCount;
				childrenCountEl.innerHTML = childrenCount;
				roomCountEl.innerHTML = roomCount;
				if (adultsCount == 1) {
					adultsSubsBtn.classList.add("disabled");
				} else {
					adultsSubsBtn.classList.remove("disabled");
				} if (childrenCount == 0) {
					childrenSubsBtn.classList.add("disabled");
				} else {
					childrenSubsBtn.classList.remove("disabled");
				} if (roomCount == 0) {
					roomSubsBtn.classList.add("disabled");
				} else {
					roomSubsBtn.classList.remove("disabled");
				} if (calcTotalGuests() == maxNumGuests) {
					adultsAddBtn.classList.add("disabled");
					childrenAddBtn.classList.add("disabled");
					roomAddBtn.classList.add("disabled");
				} else {
					adultsAddBtn.classList.remove("disabled");
					childrenAddBtn.classList.remove("disabled");
					roomAddBtn.classList.remove("disabled");
				}
			}

		})();

	</script>
	<script>
		lightbox.option({
			'resizeDuration': 200,
			'wrapAround': true
		})
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const form = document.getElementById('couponForm'); // Make sure this is your form's ID
			form.addEventListener('submit', function(event) {
				event.preventDefault(); // Prevent the form from submitting the traditional way

				// Prepare the data from the form
				const formData = new FormData(form);
				const data = Object.fromEntries(formData.entries());

				// Get the CSRF token from the meta tag
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

				fetch('{{ route('booking.applyCoupon') }}', { // Make sure this matches the URL defined in your Laravel route
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the request
					},
					body: JSON.stringify(data),
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					return response.json();
				})
				.then(data => {
					// Here you update your page with the received data
					updatePriceSummary(data);
				})
				.catch(error => {
					console.error('Error:', error);
				});
			});

			function updatePriceSummary(data) {
				// Update your page elements based on the received data
				if (data.success) {
					document.getElementById('baseFare').textContent = `$${data.originalPrice}`;
					document.getElementById('discountAmount').textContent = `-$${data.discountAmount}`;
					document.getElementById('totalPrice').textContent = `$${data.discountedPrice}`;
				} else {
					// Handle the failure case or display an error message
					alert(data.message);
				}
			}
		});

		document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('addPassengerBtn').addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('passengerForm');
        const formData = new FormData(form);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch('/user/passengers/store', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                // Assuming `data` includes passenger details you want to display
                const passengerInfo = `
                    <div class="gray rounded-3 position-relative p-4 mb-4">
                        <div class="position-absolute top-50 end-0 translate-middle-y me-2">
                            <a href="#" class="text-primary fs-5"><i class="fa-solid fa-circle-xmark"></i></a>
                        </div>
                        <div class="row align-items-center row-cols-xl-5 row-cols-lg-3 row-cols-md-3 col-cols-2">
                            <div class="col">
                                <p class="text-dark fw-semibold lh-base">Name</p>
                                <p class="text-muted-2 fw-medium lh-1">${data.first_name} ${data.last_name}</p>
                            </div>
                            <div class="col">
                                <p class="text-dark fw-semibold lh-base">Passport</p>
                                <p class="text-muted-2 fw-medium lh-1">${data.passport_number}</p>
                            </div>
                            <div class="col">
                                <p class="text-dark fw-semibold lh-base">Gender</p>
                                <p class="text-muted-2 fw-medium lh-1">male</p>
                            </div>
                            <div class="col">
                                <p class="text-dark fw-semibold lh-base">Birthday</p>
                                <p class="text-muted-2 fw-medium lh-1">${data.date_of_birth}</p> <!-- You'll need to calculate this -->
                            </div>
                            <div class="col">
                                <p class="text-dark fw-semibold lh-base">Nationality</p>
                                <p class="text-muted-2 fw-medium lh-1">${data.nationality}</p> <!-- Adjust based on your data structure -->
                            </div>
                        </div>
                    </div>
                `;
                
                // Append the new passenger info to the container
                document.getElementById('passengersList').insertAdjacentHTML('beforeend', passengerInfo);
            } else {
                alert('Failed to add passenger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding the passenger');
        });
    });
});
		
	</script>
</body>

</html>