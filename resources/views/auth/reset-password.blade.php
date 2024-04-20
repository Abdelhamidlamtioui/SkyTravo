<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - SkyTravo</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
  
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper">
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center align-items-center m-auto">
                    <div class="col-12">
                        <div class="bg-mode shadow rounded-3 overflow-hidden">
                            <div class="row g-0">
                                <!-- Vector Image -->
                                <div class="col-lg-6 d-flex align-items-center order-2 order-lg-1">
                                    <div class="p-3 p-lg-5">
                                        <img src="{{ asset('img/auth.svg')}}" class="img-fluid" alt="">
                                    </div>
                                    <!-- Divider -->
                                    <div class="vr opacity-1 d-none d-lg-block"></div>
                                </div>

                                <!-- Information -->
                                <div class="col-lg-6 order-1">
                                    <div class="p-4 p-sm-7">
                                        <!-- Logo -->
                                        <a href="index.html">
                                            <img class="img-fluid mb-4" src="{{ asset('img/logo-icon.png')}}" width="70" alt="logo">
                                        </a>
                                        <!-- Title -->
                                        <h1 class="mb-2 fs-2">Reset Password</h1>
                                        <p class="mb-0">Enter your new password below.</p>
                                        
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <!-- Form START -->
                                        <form class="mt-4 text-start" action="{{ route('password.update') }}" method="POST">
                                            @csrf 
                                            <div class="form py-4">
                                                <input type="hidden" name="token" value="{{ $token }}">

                                                <div class="form-group">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter your new password">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Confirm New Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your new password">
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary full-width font--bold btn-lg">Reset Password</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Form END -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/dropzone.min.js') }}"></script>
	<script src="{{ asset('js/flatpickr.js') }}"></script>
	<script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
	<script src="{{ asset('js/lightbox.min.js') }}"></script>
	<script src="{{ asset('js/rangeslider.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script src="{{ asset('js/counterup.min.js') }}"></script>
	<script src="{{ asset('js/prism.js') }}"></script>
  
	<script src="{{ asset('js/addadult.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
</body>

</html>
