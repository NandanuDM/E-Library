<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - {{ $application->name }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('homepage/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('homepage/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('homepage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('homepage/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.blade.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ Storage::disk('public')->exists($application->logo ? $application->logo : 'logo.jpg') ? asset('storage/'. $application->logo) : asset('homepage/assets/img/logo.png') }}" alt="">
        <h1 class="sitename">{{ $application->name }}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Buku Terlaris</a></li>
          <li><a href="#clients">Buku Terbaru</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @guest
      <a href="{{ route('login') }}" class="btn-getstarted">Login</a>
      @else
      <a href="{{ route('dashboard') }}" class="btn-getstarted">Masuk ke Dashboard</a>
      @endguest
      <!-- <a class="btn-getstarted" href="index.blade.php#about">Login</a> -->

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="section hero light-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h2 class="fw-bold">Transformasi Perpustakaan Anda Dengan E-Library: Lebih Mudah, Lebih Pintar.</h2 class="fw-bold">
            <p>Gerbang Pengetahuan Tak Terbatas: Temukan, Belajar, Baca.</p>
            <div class="d-flex">
              @guest
              <a href="{{ route('login') }}" class="btn-get-started">Login</a>
              @else
              <a href="{{ route('dashboard') }}" class="btn-get-started">Masuk ke Dashboard</a>
              @endguest
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('homepage/assets/img/hero-img.svg') }}" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="section about">

      <div class="container">

        <div class="row gy-3 align-items-center">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('homepage/assets/img/about-img.svg') }}" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
              <h3>Apa itu {{ $application->name }}?</h3>
              <p class="fst-italic">
                {{ $application->description }}
              </p>
              <ul>
                <li>
                  <i class="bi bi-graph-up-arrow"></i>
                  <div>
                    <h4>Laporan Dashboard</h4>
                    <p>Dashboard yang menyajikan laporan bulanan dalam bentuk chart untuk pemantauan performa</p>
                  </div>
                </li>
                <li>
                  <i class="bi bi-journal-check"></i>
                  <div>
                    <h4>Penyewaan Buku</h4>
                    <p>halaman penyewaan buku yang praktis dan intuitif</p>
                  </div>
                </li>
                <li>
                  <i class="bi bi-people"></i>
                  <div>
                    <h4>Pengelolaan Anggota dan Buku</h4>
                    <p>pengelolaan buku dan anggota perpustakaan yang terintegrasi secara efisien</p>
                  </div>
                </li>
              </ul>
              <p>
                Semua fitur dirancang untuk meningkatkan efisiensi dan pengalaman pengguna dalam mengelola sumber daya perpustakaan.
              </p>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Buku Terlaris</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          @foreach ($mostborrowed as $key => $values)
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><img src="{{ Storage::disk('public')->exists($values->cover_image ? $values->cover_image : 'cover.jpg') ? asset('storage/' . $values->cover_image) : asset('https://placehold.co/400x600') }}" style="width: 600px; height:320px;" alt="{{ $values->title }}" class="img-fluid img-thumbnail"></div>
              <h4><a class="stretched-link">{{ $values->title }}</a></h4>
            </div>
          </div><!-- End Service Item -->
          @endforeach

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Buku Terbaru</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            @foreach($recentbooks as $key => $values)
            <div class="swiper-slide"><img src="{{ Storage::disk('public')->exists($values->cover_image ? $cover_image : 'cover.jpg') ? asset('storage/' . $values->cover_image) : asset('https://placehold.co/400x600') }}" class="img-fluid" alt="">{{ $values->title }}</div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Clients Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-9 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">{{ $application->name }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p class="mt-3"><strong>Telepon:</strong> <span>{{ $application->phone }}</span></p>
            <p><strong>Email:</strong> <span>{{ $application->email }}</span></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-12">
          @if ($application->facebook or $application->twitter or $application->instagram or $application->linkedin)
          <h4>Follow Us</h4>
          @endif
          <div class="social-links d-flex">
            @if ($application->twitter)
            <a href="{{ $application->twitter }}"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if ($application->facebook)
            <a href="{{ $application->facebook }}"><i class="bi bi-facebook"></i></a>
            @endif
            @if ($application->instagram)
            <a href="{{ $application->instagram }}"><i class="bi bi-instagram"></i></a>
            @endif
            @if ($application->linkedin)
            <a href="{{ $application->linkedin }}"><i class="bi bi-linkedin"></i></a>
            @endif
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">E-Library</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('homepage/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('homepage/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('homepage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('homepage/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('homepage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('homepage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('homepage/assets/js/main.js') }}"></script>

</body>

</html>