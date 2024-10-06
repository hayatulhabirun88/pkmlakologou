<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Affan - PWA Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Title -->
    <title>Dashboard - PKM Lakologou</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/') }}logopuskesmas.png">
    <link rel="apple-touch-icon" href="{{ asset('/') }}afan/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/') }}afan/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('/') }}afan/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/') }}afan/img/icons/icon-180x180.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}afan/style.css">

    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('/') }}afan/manifest.json">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Internet Connection Status -->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content -->
            <div
                class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
                <!-- Logo Wrapper -->
                <div class="logo-wrapper">
                    <a href="/apps/dashboard">
                        <img src="{{ asset('/') }}logopuskesmas.png" alt="">
                        PKM Lakologou
                    </a>
                </div>
            </div>
        </div>

        <!-- # Sidenav Left -->
        <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1"
            aria-labelledby="affanOffcanvsLabel">

            <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>

            <div class="offcanvas-body p-0">
                <div class="sidenav-wrapper">
                    <!-- Sidenav Profile -->
                    <div class="sidenav-profile bg-gradient">
                        <div class="sidenav-style1"></div>

                        <!-- User Thumbnail -->
                        <div class="user-profile">
                            <img src="{{ asset('/') }}afan/img/bg-img/2.jpg" alt="">
                        </div>

                        <!-- User Info -->
                        <div class="user-info">
                            <h6 class="user-name mb-0">Affan Islam</h6>
                            <span>CEO, Designing World</span>
                        </div>
                    </div>

                    <!-- Sidenav Nav -->
                    <ul class="sidenav-nav ps-0">
                        <li>
                            <a href="home.html"><i class="bi bi-house-door"></i> Home</a>
                        </li>
                        <li>
                            <a href="elements.html"><i class="bi bi-folder2-open"></i> Elements
                                <span class="badge bg-danger rounded-pill ms-2">220+</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages.html"><i class="bi bi-collection"></i> Pages
                                <span class="badge bg-success rounded-pill ms-2">100+</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="bi bi-cart-check"></i> Shop</a>
                            <ul>
                                <li>
                                    <a href="shop-grid.html"> Shop Grid</a>
                                </li>
                                <li>
                                    <a href="shop-list.html"> Shop List</a>
                                </li>
                                <li>
                                    <a href="shop-details.html"> Shop Details</a>
                                </li>
                                <li>
                                    <a href="cart.html"> Cart</a>
                                </li>
                                <li>
                                    <a href="checkout.html"> Checkout</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="bi bi-gear"></i> Settings</a>
                        </li>
                        <li>
                            <div class="night-mode-nav">
                                <i class="bi bi-moon"></i> Night Mode
                                <div class="form-check form-switch">
                                    <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="login.html"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        </li>
                    </ul>

                    <!-- Social Info -->
                    <div class="social-info-wrap">
                        <a href="#">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>

                    <!-- Copyright Info -->
                    <div class="copyright-info">
                        <p>
                            <span id="copyrightYear"></span>
                            &copy; Made by <a href="#">Designing World</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content-wrapper">


            <!-- Tiny Slider One Wrapper -->
            <div class="tiny-slider-one-wrapper">
                <div class="tiny-slider-one">
                    <!-- Single Hero Slide -->
                    <div>
                        <div class="single-hero-slide bg-overlay" style="background-image: url('/obat-slide.jpg')">
                            <div class="h-100 d-flex align-items-center text-center">
                                <div class="container">
                                    <h3 class="text-white mb-1">Selamat datang</h3>
                                    <p class="text-white mb-4">di <br>Sistem Informasi Gudang Obat Puskesmas Lakologou
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="pt-3"></div>

            <div class="container direction-rtl">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">

                                <div class="feature-card mx-auto text-center">
                                    <div class="card mx-auto bg-gray">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                        </svg>
                                    </div>
                                    <a href="/apps/obat-masuk">
                                        <p class="mb-0">Obat Masuk</p>
                                    </a>
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="feature-card mx-auto text-center">
                                    <div class="card mx-auto bg-gray">
                                        <img src="{{ asset('/') }}stokobat.jpg" alt="">
                                    </div>
                                    <a href="/apps/cek-stok-obat">
                                        <p class="mb-0">Cek Stok Obat</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Nav -->
        @include('mobile.footer')

        <!-- All JavaScript Files -->
        <script src="{{ asset('/') }}afan/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/') }}afan/js/slideToggle.min.js"></script>
        <script src="{{ asset('/') }}afan/js/internet-status.js"></script>
        <script src="{{ asset('/') }}afan/js/tiny-slider.js"></script>
        <script src="{{ asset('/') }}afan/js/venobox.min.js"></script>
        <script src="{{ asset('/') }}afan/js/countdown.js"></script>
        <script src="{{ asset('/') }}afan/js/rangeslider.min.js"></script>
        <script src="{{ asset('/') }}afan/js/vanilla-dataTables.min.js"></script>
        <script src="{{ asset('/') }}afan/js/index.js"></script>
        <script src="{{ asset('/') }}afan/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('/') }}afan/js/isotope.pkgd.min.js"></script>
        <script src="{{ asset('/') }}afan/js/dark-rtl.js"></script>
        <script src="{{ asset('/') }}afan/js/active.js"></script>
        <script src="{{ asset('/') }}afan/js/pwa.js"></script>
</body>

</html>
