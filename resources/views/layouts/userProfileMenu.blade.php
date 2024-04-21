<div class="dashboard-menus border-top d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="user-Dashboard-menu">
                    <li class="active"><a href="{{route('profile.index')}}"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
                    <li><a href="{{route('user.profile.booking')}}"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
                    <li><a href="{{route('user.profile.passenger')}}"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li>
                    <li><a href="{{route('user.profile.paymentDetails')}}"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
                    <li><a href="{{route('user.profile.wishlist')}}"><i class="fa-solid fa-shield-heart me-2"></i>My Wishlist</a></li>
                    <li><a href="{{route('profile.deleteAccount')}}"><i class="fa-solid fa-trash-can me-2"></i>Delete Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <i class="fa-solid fa-power-off me-2"></i>Sign Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>