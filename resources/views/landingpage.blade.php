<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template/backend/dist/img/icons/icon-48x48.png') }}" rel="icon">
    <link href="{{ asset('template/backend/dist/img/icons/icon-48x48.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/frontend/assets/vendor/aos/aos.css ') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/assets/vendor/bootstrap/css/bootstrap.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css ') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/assets/vendor/boxicons/css/boxicons.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/assets/vendor/glightbox/css/glightbox.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/assets/vendor/remixicon/remixicon.css ') }}" rel="stylesheet">
    <link href="{{ asset('template/frontend/assets/vendor/swiper/swiper-bundle.min.css ') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/frontend/assets/css/style.css ') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">SIREMA</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    @if (Auth::user())
                        <li><a class="getstarted scrollto" href="/logout">Logout</a></li>
                    @else
                        <li><a class="getstarted scrollto" href="/login">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Selamat Datang Di Sistem Informasi Model Referensi Pesawat</h1>
                    <h2>Sistem informasi untuk melihat dan membuat data referensi model pesawat.</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        @if (!Auth::user())
                            <a href="/login" class="btn-get-started scrollto">Login</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('template/frontend/pesawat.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Sistem Informasi Model Referensi Pesawat adalah platform yang didedikasikan untuk
                            menyediakan informasi
                            detil tentang model-model pesawat terbaru dan spesifikasi teknisnya.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Menyediakan informasi lengkap mengenai model
                                pesawat terbaru</li>
                            <li><i class="ri-check-double-line"></i> Memudahkan pencarian dan akses ke spesifikasi
                                pesawat</li>
                            <li><i class="ri-check-double-line"></i> Update data secara berkala untuk memastikan
                                informasi yang akurat</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Menjadi sumber informasi terpercaya mengenai model referensi pesawat di
                            Indonesia.
                        </p>
                        <p>
                            Menyediakan platform yang user-friendly, akurat, dan up-to-date untuk
                            memenuhi kebutuhan
                            informasi Anda mengenai model pesawat.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>SIREMA</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/frontend/assets/vendor/aos/aos.js ') }}"></script>
    <script src="{{ asset('template/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <script src="{{ asset('template/frontend/assets/vendor/glightbox/js/glightbox.min.js ') }}"></script>
    <script src="{{ asset('template/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js ') }}"></script>
    <script src="{{ asset('template/frontend/assets/vendor/swiper/swiper-bundle.min.js ') }}"></script>
    <script src="{{ asset('template/frontend/assets/vendor/waypoints/noframework.waypoints.js ') }}"></script>
    <script src="{{ asset('template/frontend/assets/vendor/php-email-form/validate.js ') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template/frontend/assets/js/main.js ') }}"></script>

</body>

</html>
