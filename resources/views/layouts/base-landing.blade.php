<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from bracketweb.com/eduact-html/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Mar 2025 13:11:13 GMT -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>

        <meta name="description" content="Eduact HTML Template For Educaton & LMS" />

        @livewireStyles
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com/"
            crossorigin
        >
        <link
            href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Water+Brush&amp;display=swap"
            rel="stylesheet"
        >

        @stack('head')

        <x-link rel="stylesheet" href="landing/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <x-link rel="stylesheet"
            href="landing/assets/vendors/bootstrap-select/bootstrap-select.min.css"
        />
        <x-link rel="stylesheet" href="landing/assets/vendors/jquery-ui/jquery-ui.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/animate/animate.min.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/fontawesome/css/all.min.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/eduact-icons/style.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/jarallax/jarallax.css" />
        <x-link rel="stylesheet"
            href="landing/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css"
        />
        <x-link rel="stylesheet" href="landing/assets/vendors/nouislider/nouislider.min.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/nouislider/nouislider.pips.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/odometer/odometer.min.css" />
        <x-link rel="stylesheet" href="landing/assets/vendors/tiny-slider/tiny-slider.min.css" />
        <x-link rel="stylesheet"
            href="landing/assets/vendors/owl-carousel/assets/owl.carousel.min.css"
        />
        <x-link rel="stylesheet"
            href="landing/assets/vendors/owl-carousel/assets/owl.theme.default.min.css"
        />

        <!-- template styles -->
        <x-link rel="stylesheet" href="landing/assets/css/eduact.css" />
    </head>

    <body class="custom-cursor">

        <div class="custom-cursor__cursor"></div>
        <div class="custom-cursor__cursor-two"></div>

        <div class="preloader">
            <div class="preloader__image"
                style="background-image: url(landing/assets/images/loader.png);"
            ></div>
        </div>

        {{-- CONTENT --}}
        <div class="page-wrapper">

            @include('__partials.landing.header')

            <div class="stricky-header stricked-menu main-menu main-header-two">
                <div class="sticky-header__content"></div>
            </div>

            @yield('content')

        </div>

        <div class="mobile-nav__wrapper">
            <div class="mobile-nav__overlay mobile-nav__toggler"></div>
            <!-- /.mobile-nav__overlay -->
            <div class="mobile-nav__content">
                <span class="mobile-nav__close mobile-nav__toggler"><i
                        class="fa fa-times"></i></span>
                <div class="logo-box">
                    <a href="index.html" aria-label="logo image"><img
                            src="landing/assets/images/logo-light.png"
                            width="183"
                            height="48"
                            alt="eduact"
                        /></a>
                </div>
                <!-- /.logo-box -->
                <div class="mobile-nav__container"></div>
                <!-- /.mobile-nav__container -->
                <ul class="mobile-nav__contact list-unstyled">
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                    </li>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:+9236809850">+92 (3680) - 9850</a>
                    </li>
                </ul><!-- /.mobile-nav__contact -->
                <div class="mobile-nav__social">
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__content -->
        </div>
        <!-- /.mobile-nav__wrapper -->

        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <!-- /.search-popup__overlay -->
            <div class="search-popup__content">
                <form
                    role="search"
                    method="get"
                    class="search-popup__form"
                    action="#"
                >
                    <input
                        type="text"
                        id="search"
                        placeholder="Search Here..."
                    />
                    <button type="submit" class="eduact-btn"><span
                            class="eduact-btn__curve"></span><i class="icon-Search"></i></button>
                </form>
            </div>
            <!-- /.search-popup__content -->
        </div>
        <!-- /.search-popup -->

        <!-- back-to-top-start -->
        <a href="#" class="scroll-top">
            <svg
                class="scroll-top__circle"
                width="100%"
                height="100%"
                viewBox="-1 -1 102 102"
            >
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </a>
        <!-- back-to-top-end -->

        @livewireScripts
        
        @stack('script')

        <x-script src="landing/assets/vendors/jquery/jquery-3.5.1.min.js"></x-script>
        <x-script src="landing/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></x-script>
        <x-script src="landing/assets/vendors/bootstrap-select/bootstrap-select.min.js"></x-script>
        <x-script src="landing/assets/vendors/jquery-ui/jquery-ui.js"></x-script>
        <x-script src="landing/assets/vendors/jarallax/jarallax.min.js"></x-script>
        <x-script src="landing/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></x-script>
        <x-script src="landing/assets/vendors/jquery-appear/jquery.appear.min.js"></x-script>
        <x-script
            src="landing/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></x-script>
        <x-script
            src="landing/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></x-script>
        <x-script src="landing/assets/vendors/jquery-validate/jquery.validate.min.js"></x-script>
        <x-script src="landing/assets/vendors/nouislider/nouislider.min.js"></x-script>
        <x-script src="landing/assets/vendors/odometer/odometer.min.js"></x-script>
        <x-script src="landing/assets/vendors/tiny-slider/tiny-slider.min.js"></x-script>
        <x-script src="landing/assets/vendors/owl-carousel/owl.carousel.min.js"></x-script>
        <x-script src="landing/assets/vendors/wnumb/wNumb.min.js"></x-script>
        <x-script src="landing/assets/vendors/jquery-circleType/jquery.circleType.js"></x-script>
        <x-script src="landing/assets/vendors/jquery-lettering/jquery.lettering.min.js"></x-script>
        <x-script src="landing/assets/vendors/tilt/tilt.jquery.js"></x-script>
        <x-script src="landing/assets/vendors/wow/wow.js"></x-script>
        <x-script src="landing/assets/vendors/isotope/isotope.js"></x-script>
        <x-script src="landing/assets/vendors/countdown/countdown.min.js"></x-script>
        <!-- template js -->
        <x-script src="landing/assets/js/eduact.js"></x-script>
    </body>

</html>
