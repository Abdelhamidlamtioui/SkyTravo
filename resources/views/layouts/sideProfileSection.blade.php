<div class="col-xl-4 col-lg-4 col-md-12">
    <div class="card rounded-2 me-xl-5 mb-4">
        <div class="card-top bg-primary position-relative">
            <div class="position-absolute end-0 top-0 mt-4 me-3"></div>
            <div class="py-5 px-3">
                <div class="crd-thumbimg text-center">
                    <div class="p-2 d-flex align-items-center justify-content-center brd"><img src="{{ Auth::user()->getFirstMediaUrl('media/Profile') ?? asset('img/ReviewProfile.png')}}"
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