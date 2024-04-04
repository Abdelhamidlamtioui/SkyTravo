<nav id="navigation" class="navigation navigation-landscape">
  <div class="nav-header">
    <a class="nav-brand" href="#"><img src="{{ asset('img/logo.png') }}" class="logo" alt=""></a>
    <div class="nav-toggle"></div>
    <div class="mobile_nav">
      <ul>
        <li class="currencyDropdown me-2">
          <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
              class="fw-medium">INR</span></a>
        </li>
        <li class="languageDropdown me-2">
          <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
              src="{{ asset('img/flag/flag.png') }}" class="img-fluid" width="17" alt="Country"></a>
        </li>
        <li class="list-buttons light">
          @guest
            <a href="{{route("login")}}" class="bg-light-primary text-primary rounded"><i class="fa-regular fa-circle-user fs-6"></i></a>
          @endguest
          @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="btn bg-primary">Logout</button>
            </form>
          @endauth
        </li>
      </ul>
    </div>
  </div>
  <div class="nav-menus-wrapper" style="transition-property: none;">
    <ul class="nav-menu">
      <li>
          <a href="index.html">Home</a>
      </li>
      <li>
        <a href="">Listing</a>
      </li>
      <li>
        <a href="">Pages</a>
      </li>
      <li>
        <a href="">Menu</a>
      </li>
      <li>
        <a href="">Support</a>
      </li>
    </ul>

    <ul class="nav-menu nav-menu-social align-to-right">
      <li class="currencyDropdown me-2">
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
            class="fw-medium">INR</span></a>
      </li>
      <li class="languageDropdown me-2">
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
            src="{{ asset('img/flag/flag.png') }}" class="img-fluid" width="17" alt="Country"></a>
      </li>
      <li class="list-buttons">
        @guest
          <a href="{{route('login')}}" class="bg-primary"><i class="fa-regular fa-circle-user fs-6 me-2"></i>Sign In / Register</a>
        @endguest
        @auth
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="btn bg-primary">Logout</button>
          </form>
        @endauth
      </li>
    </ul>
  </div>
</nav>