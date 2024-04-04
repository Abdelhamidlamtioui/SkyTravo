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


		<!-- ============================ Booking Title ================================== -->
		<section class="position-relative">
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="fpc-capstion">
							<div class="fpc-captions text-center mb-4">
								<h1 class="xl-heading">Join with <span class="position-relative z-4">GeoTrip<span
											class="position-absolute top-50 start-50 translate-middle d-none d-md-block mt-4">
											<svg width="185px" height="23px" viewBox="0 0 445.5 23">
												<path class="fill-primary opacity-7"
													d="M409.9,2.6c-9.7-0.6-19.5-1-29.2-1.5c-3.2-0.2-6.4-0.2-9.7-0.3c-7-0.2-14-0.4-20.9-0.5 c-3.9-0.1-7.8-0.2-11.7-0.3c-1.1,0-2.3,0-3.4,0c-2.5,0-5.1,0-7.6,0c-11.5,0-23,0-34.5,0c-2.7,0-5.5,0.1-8.2,0.1 c-6.8,0.1-13.6,0.2-20.3,0.3c-7.7,0.1-15.3,0.1-23,0.3c-12.4,0.3-24.8,0.6-37.1,0.9c-7.2,0.2-14.3,0.3-21.5,0.6 c-12.3,0.5-24.7,1-37,1.5c-6.7,0.3-13.5,0.5-20.2,0.9C112.7,5.3,99.9,6,87.1,6.7C80.3,7.1,73.5,7.4,66.7,8 C54,9.1,41.3,10.1,28.5,11.2c-2.7,0.2-5.5,0.5-8.2,0.7c-5.5,0.5-11,1.2-16.4,1.8c-0.3,0-0.7,0.1-1,0.1c-0.7,0.2-1.2,0.5-1.7,1 C0.4,15.6,0,16.6,0,17.6c0,1,0.4,2,1.1,2.7c0.7,0.7,1.8,1.2,2.7,1.1c6.6-0.7,13.2-1.5,19.8-2.1c6.1-0.5,12.3-1,18.4-1.6 c6.7-0.6,13.4-1.1,20.1-1.7c2.7-0.2,5.4-0.5,8.1-0.7c10.4-0.6,20.9-1.1,31.3-1.7c6.5-0.4,13-0.7,19.5-1.1c2.7-0.1,5.4-0.3,8.1-0.4 c10.3-0.4,20.7-0.8,31-1.2c6.3-0.2,12.5-0.5,18.8-0.7c2.1-0.1,4.2-0.2,6.3-0.2c11.2-0.3,22.3-0.5,33.5-0.8 c6.2-0.1,12.5-0.3,18.7-0.4c2.2-0.1,4.4-0.1,6.7-0.1c11.5-0.1,23-0.2,34.6-0.4c7.2-0.1,14.4-0.1,21.6-0.1c12.2,0,24.5,0.1,36.7,0.1 c2.4,0,4.8,0.1,7.2,0.2c6.8,0.2,13.5,0.4,20.3,0.6c5.1,0.2,10.1,0.3,15.2,0.4c3.6,0.1,7.2,0.4,10.8,0.6c10.6,0.6,21.1,1.2,31.7,1.8 c2.7,0.2,5.4,0.4,8,0.6c2.9,0.2,5.8,0.4,8.6,0.7c0.4,0.1,0.9,0.2,1.3,0.3c1.1,0.2,2.2,0.2,3.2-0.4c0.9-0.5,1.6-1.5,1.9-2.5 c0.6-2.2-0.7-4.5-2.9-5.2c-1.9-0.5-3.9-0.7-5.9-0.9c-1.4-0.1-2.7-0.3-4.1-0.4c-2.6-0.3-5.2-0.4-7.9-0.6 C419.7,3.1,414.8,2.9,409.9,2.6z">
												</path>
											</svg>
										</span></span> & List your Hotel</h1>
								<p>Cicero famously orated against Lucius Sergius Catilina. Occasionally the first Oration against
									Catiline is taken for type specimens</p>
								<div class="d-flex justify-content-center my-3 mt-5"><button type="button"
										class="btn btn-light-primary px-5 rounded-5 fw-medium">Add Your Hotel</button></div>
							</div>
							<div class="d-flex align-items-center justify-content-center flex-wrap">
								<div class="exlope fw-light fs-6 px-4 my-2"><i
										class="fa-solid fa-check-circle text-success me-2 mt-1"></i>More than 5.1 million holiday rentals
									already listed </div>
								<div class="exlope fw-light fs-6 px-4 my-2"><i
										class="fa-solid fa-check-circle text-success me-2 mt-1"></i>Bed one supposing breakfast day
									fulfilled off depending questions.</div>
								<div class="exlope fw-light fs-6 px-4 my-2"><i
										class="fa-solid fa-check-circle text-success me-2 mt-1"></i>The difference in the cost shall be
									borne by the client in case.</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="eportio-yhumb mt-4"><img src="{{ asset('img/bg-title.jpg') }}"
								class="img-fluid rounded-4 ht-400 object-fit full-width" alt=""></div>
					</div>
				</div>
			</div>
		</section>
		<!-- ============================ Booking Title ================================== -->


		<!-- ============================ Features Section ================================== -->
		<section class="pt-0">
			<div class="container">

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
						<div class="secHeading-wrap text-center mb-5">
							<h2>Why GeoTrip Fit For You?</h2>
							<p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center g-4">

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card h-100 rounded-4 border">
							<div class="card-body p-4">
								<div class="square--60 circle gray text-primary fs-3 mb-3"><i
										class="fa-solid fa-wand-magic-sparkles"></i></div>
								<h4 class="fs-5">Eco Friendly Team</h4>
								<p class="mb-0">Think of a news blog that's filled with content hourly on the day of going live.
									However, reviewersLorem ipsum is mostly a part of a Latin text by the classical.</p>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card h-100 rounded-4 border">
							<div class="card-body p-4">
								<div class="square--60 circle gray text-primary fs-3 mb-3"><i class="fa-solid fa-gifts"></i></div>
								<h4 class="fs-5">Multi Offers & Coupon</h4>
								<p class="mb-0">Think of a news blog that's filled with content hourly on the day of going live.
									However, reviewersLorem ipsum is mostly a part of a Latin text by the classical.</p>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card h-100 rounded-4 border">
							<div class="card-body p-4">
								<div class="square--60 circle gray text-primary fs-3 mb-3"><i class="fa-solid fa-jet-fighter"></i></div>
								<h4 class="fs-5">International Tour Package</h4>
								<p class="mb-0">Think of a news blog that's filled with content hourly on the day of going live.
									However, reviewersLorem ipsum is mostly a part of a Latin text by the classical.</p>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card h-100 rounded-4 border">
							<div class="card-body p-4">
								<div class="square--60 circle gray text-primary fs-3 mb-3"><i class="fa-solid fa-droplet"></i></div>
								<h4 class="fs-5">Room & Amenities Facility</h4>
								<p class="mb-0">Think of a news blog that's filled with content hourly on the day of going live.
									However, reviewersLorem ipsum is mostly a part of a Latin text by the classical.</p>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card h-100 rounded-4 border">
							<div class="card-body p-4">
								<div class="square--60 circle gray text-primary fs-3 mb-3"><i class="fa-solid fa-snowflake"></i></div>
								<h4 class="fs-5">Fully Friendly Support</h4>
								<p class="mb-0">Think of a news blog that's filled with content hourly on the day of going live.
									However, reviewersLorem ipsum is mostly a part of a Latin text by the classical.</p>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card h-100 rounded-4 border">
							<div class="card-body p-4">
								<div class="square--60 circle gray text-primary fs-3 mb-3"><i class="fa-solid fa-sack-dollar"></i></div>
								<h4 class="fs-5">Bonus & Flixible</h4>
								<p class="mb-0">Think of a news blog that's filled with content hourly on the day of going live.
									However, reviewersLorem ipsum is mostly a part of a Latin text by the classical.</p>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- ============================ features Section End ================================== -->


		<!-- ============================ Our Reviews Start ================================== -->
		<section class="gray">
			<div class="container">

				<div class="row align-items-center justify-content-center">
					<div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
						<div class="secHeading-wrap text-center mb-5">
							<h2>Loving Reviews By Our Customers</h2>
							<p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
						</div>
					</div>
				</div>

				<div class="row align-items-center justify-content-center g-xl-4 g-lg-4 g-md-4 g-3">

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card border-0 rounded-3">
							<div class="card-body">
								<div class="position-absolute top-0 end-0 mt-3 me-3"><span
										class="square--40 circle text-primary bg-light-primary"><i
											class="fa-solid fa-quote-right"></i></span></div>
								<div class="d-flex align-items-center flex-thumbes">
									<div class="revws-pic"><img src="{{ asset('img/team-1.jpg') }}" class="img-fluid rounded-2" width="80" alt="">
									</div>
									<div class="revws-caps ps-3">
										<h6 class="fw-bold fs-6 m-0">Aman Diwakar</h6>
										<p class="text-muted-2 text-md m-0">United States</p>
										<div class="d-flex align-items-center justify-content-start">
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
										</div>
									</div>
								</div>
								<div class="revws-desc mt-3">
									<p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
										sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card border-0 rounded-3">
							<div class="card-body">
								<div class="position-absolute top-0 end-0 mt-3 me-3"><span
										class="square--40 circle text-primary bg-light-primary"><i
											class="fa-solid fa-quote-right"></i></span></div>
								<div class="d-flex align-items-center flex-thumbes">
									<div class="revws-pic"><img src="{{ asset('img/team-2.jpg') }}" class="img-fluid rounded-2" width="80" alt="">
									</div>
									<div class="revws-caps ps-3">
										<h6 class="fw-bold fs-6 m-0">Kunal M. Thakur</h6>
										<p class="text-muted-2 text-md m-0">United States</p>
										<div class="d-flex align-items-center justify-content-start">
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
										</div>
									</div>
								</div>
								<div class="revws-desc mt-3">
									<p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
										sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card border-0 rounded-3">
							<div class="card-body">
								<div class="position-absolute top-0 end-0 mt-3 me-3"><span
										class="square--40 circle text-primary bg-light-primary"><i
											class="fa-solid fa-quote-right"></i></span></div>
								<div class="d-flex align-items-center flex-thumbes">
									<div class="revws-pic"><img src="{{ asset('img/team-3.jpg') }}" class="img-fluid rounded-2" width="80" alt="">
									</div>
									<div class="revws-caps ps-3">
										<h6 class="fw-bold fs-6 m-0">Divya Talwar</h6>
										<p class="text-muted-2 text-md m-0">United States</p>
										<div class="d-flex align-items-center justify-content-start">
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
										</div>
									</div>
								</div>
								<div class="revws-desc mt-3">
									<p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
										sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card border-0 rounded-3">
							<div class="card-body">
								<div class="position-absolute top-0 end-0 mt-3 me-3"><span
										class="square--40 circle text-primary bg-light-primary"><i
											class="fa-solid fa-quote-right"></i></span></div>
								<div class="d-flex align-items-center flex-thumbes">
									<div class="revws-pic"><img src="{{ asset('img/team-4.jpg') }}" class="img-fluid rounded-2" width="80" alt="">
									</div>
									<div class="revws-caps ps-3">
										<h6 class="fw-bold fs-6 m-0">Karan Maheshwari</h6>
										<p class="text-muted-2 text-md m-0">United States</p>
										<div class="d-flex align-items-center justify-content-start">
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
										</div>
									</div>
								</div>
								<div class="revws-desc mt-3">
									<p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
										sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
						<div class="card border-0 rounded-3">
							<div class="card-body">
								<div class="position-absolute top-0 end-0 mt-3 me-3"><span
										class="square--40 circle text-primary bg-light-primary"><i
											class="fa-solid fa-quote-right"></i></span></div>
								<div class="d-flex align-items-center flex-thumbes">
									<div class="revws-pic"><img src="{{ asset('img/team-5.jpg') }}" class="img-fluid rounded-2" width="80" alt="">
									</div>
									<div class="revws-caps ps-3">
										<h6 class="fw-bold fs-6 m-0">Ritika Mathur</h6>
										<p class="text-muted-2 text-md m-0">United States</p>
										<div class="d-flex align-items-center justify-content-start">
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
											<span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
										</div>
									</div>
								</div>
								<div class="revws-desc mt-3">
									<p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
										sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ============================ Our Reviews End ================================== -->

		<!-- ============================ Our facts End ================================== -->
		<section class="pt-4 pb-0">
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


		<!-- ============================ Our Experience End ================================== -->
		<section>
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-xl-5 col-lg-5 col-md-6">
						<div class="position-relative">
							<img src="{{ asset('img/img-2.png') }}" class="img-fluid rounded-3 position-relative z-1" alt="">
							<div class="position-absolute bottom-0 start-0 z-index-1 mb-4 ms-2">
								<div class="bg-body d-flex d-inline-block rounded-3 position-relative p-3 z-2 shadow-wrap">

									<!-- Avatar group -->
									<div class="me-4">
										<h6 class="fw-normal">Client</h6>
										<!-- Avatar group -->
										<ul class="avatar-group mb-0">
											<li class="avatar avatar-md">
												<img class="avatar-img circle" src="{{ asset('img/team-1.jpg') }}" alt="avatar">
											</li>
											<li class="avatar avatar-md">
												<img class="avatar-img circle" src="{{ asset('img/team-2.jpg') }}" alt="avatar">
											</li>
											<li class="avatar avatar-md">
												<img class="avatar-img circle" src="{{ asset('img/team-3.jpg') }}" alt="avatar">
											</li>
											<li class="avatar avatar-md">
												<img class="avatar-img circle" src="{{ asset('img/team-4.jpg') }}" alt="avatar">
											</li>
											<li class="avatar avatar-md">
												<div class="avatar-img circle bg-primary">
													<span class="text-white position-absolute top-50 start-50 translate-middle small">1K+</span>
												</div>
											</li>
										</ul>
									</div>

									<!-- Rating -->
									<div>
										<h6 class="fw-normal mb-3">Rating</h6>
										<h6 class="m-0">4.5<i class="fa-solid fa-star text-warning ms-1"></i></h6>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-5 col-lg-6 col-md-6">
						<div class="bestExperience-block">
							<p class="fw-medium text-primary text-md text-uppercase mb-0">Memories</p>
							<h2 class="fw-bold lh-base">Our Attractive Experience And Services For you!</h2>
							<p class="fw-light fs-6">Using dummy content or fake information in the Web design process can Fake data
								can ensure a nice looking layout but it doesn’t reflect what a living, breathing application must
								endure. Real data does. result in products with unrealistic assumptions and potentially serious design
								flaws. A seemingly elegant design can quickly begin to bloat with unexpected content or break under the
								weight of actual activity. </p>
							<div class="d-inline-flex mt-4">
								<div
									class="d-inline-flex flex-column justify-content-center align-items-center py-3 px-3 rounded gray-simple me-3">
									<h6 class="fw-bold fs-3 m-0">33</h6>
									<p class="m-0 text-sm text-muted-2">Year Esperience</p>
								</div>
								<div
									class="d-inline-flex flex-column justify-content-center align-items-center py-3 px-3 rounded gray-simple me-3">
									<h6 class="fw-bold fs-3 m-0">78</h6>
									<p class="m-0 text-sm text-muted-2">Destination Collaboration</p>
								</div>
								<div
									class="d-inline-flex flex-column justify-content-center align-items-center py-3 px-3 rounded gray-simple">
									<h6 class="fw-bold fs-3 m-0">25K</h6>
									<p class="m-0 text-sm text-muted-2">Happy Customers</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- ============================ Our Experience End ================================== -->

		<!-- ============================ Join Us End ================================== -->
		<section class="pt-0">
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-xl-12 col-lg-12 col-12">
						<!-- Action box START -->
						<div class="card card-body bg-light-primary rounded-4 px-4 py-5">
							<div class="row g-4 justify-content-between align-items-center">
								<!-- Image -->
								<div class="col-xl-2 col-lg-2 col-md-3">
									<img src="{{ asset('img/joinus.png') }}" class="img-fluid" alt="">
								</div>

								<!-- Title and content -->
								<div class="col-xl-8 col-lg-7 col-md-6">
									<h4 class="fs-2">Intresting To Join Us?</h4>
									<p class="mb-0">The are likely to focus on the text, disregarding the layout and its elements.</p>
								</div>

								<!-- Button -->
								<div class="col-xl-2 col-lg-3 col-md-3 d-grid">
									<a href="#" class="btn btn-lg fw-medium btn-primary mb-0">Become a Host</a>
								</div>
							</div>
						</div>
						<!-- Action box END -->
					</div>

				</div>
			</div>
		</section>
		<!-- ============================ Join Us End ================================== -->


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