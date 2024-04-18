<nav id="navigation" class="navbar navbar-expand-lg navigation navigation-landscape">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/logo.png') }}" class="logo" alt="" style="height: 3rem;"> <!-- Adjust height as needed -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Listing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Support</a>
        </li>
      </ul>
      <div class="d-flex">
        @guest
          <a href="{{ route('login') }}" class="btn btn-primary me-2">Sign In / Register</a>
        @endguest
        @auth
          <div class="dropdown">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('profile.index')}}">My Profile</a></li>
              <li><a class="dropdown-item" href="#">My Booking</a></li>
              <li><a class="dropdown-item" href="#">Travelers</a></li>
              <li><a class="dropdown-item" href="#">Payment Details</a></li>
              <li><a class="dropdown-item" href="#">My Wishlist</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        @endauth
      </div>
    </div>
  </div>
</nav>