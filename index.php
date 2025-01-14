<?php
session_start();
require_once("config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIYAKUB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
  ?>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:ppid.bpsipsumut@gmail.com">ppid.bpsipsumut@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i>+6282361668259
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://x.com/bsipsumut/" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/BPTPBalitbangtanSumut" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/bsipsumut/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/company/bsip-kementan/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"> SIYAKUB</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portofolio</a></li>
          <li><a class="nav-link scrollto" href="#jenis_ayam">Jenis Ayam</a></li>
          <li><a class="nav-link scrollto" href="#distribusi">Distribusi</a></li>
          <li><a class="nav-link scrollto" href="#alur">Alur Pemesanan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
          <li><a class="nav-link scrollto" href="profile.php">Profile</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="index.php"><img src="assets/img/logo2.png" alt="" class="img-fluid" style="height: 50px; margin-left: 10px;"></a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-1.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>SIYAKUB</span></h2>
                <p class="animate__animated animate__fadeInUp">Sistem Informasi Pelayanan Ayam KUB</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Lebih</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-2.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Temukan Beragam Informasi Tentang Ayam KUB di Sini</h2>
                <p class="animate__animated animate__fadeInUp">Dapatkan panduan lengkap dan layanan terbaik untuk budidaya Ayam KUB</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Lebih</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('assets/img/slide/slide-3.png');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animate__animated animate__fadeInDown">Solusi Tepat untuk Kebutuhan Anda</h2>
                <p class="animate__animated animate__fadeInUp">Pelayanan dan Dukungan Terbaik untuk Peternak Ayam KUB</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Lebih</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>Tentang Kami</h2>
              <p>Selamat datang di Sistem Informasi Pelayanan Ayam KUB (SIYAKUB). Kami adalah platform yang didedikasikan untuk memberikan informasi, panduan, dan layanan terbaik bagi para peternak Ayam Kampung Unggul Balitbangtan (KUB).</p>
              <p>Terima kasih telah mempercayakan kebutuhan informasi dan pelayanan Anda kepada SIYAKUB. Bersama-sama, kita dapat mencapai kemajuan dan kesuksesan dalam industri peternakan ayam KUB.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-book"></i></div>
              <h4 class="title"><a href="">Sejarah dan Latar Belakang</a></h4>
              <p class="description">SIYAKUB didirikan dengan tujuan untuk menjawab kebutuhan akan informasi dan pelayanan yang memadai bagi para peternak Ayam Kampung Unggul Balitbangtan (KUB). Melihat potensi besar dari ayam KUB dalam industri peternakan, kami merasa penting untuk menyediakan platform yang dapat membantu peternak meningkatkan kualitas dan produktivitas peternakan mereka. Dengan dedikasi dan komitmen untuk inovasi, SIYAKUB terus berkembang dan beradaptasi dengan kebutuhan zaman.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Portofolio Kami</h2>
          <p>Selamat datang di bagian Portofolio Kami. Di sini, Anda dapat melihat berbagai proyek dan inisiatif yang telah kami lakukan untuk mendukung dan mengembangkan peternakan Ayam Kampung Unggul Balitbangtan (KUB).</p>
        </div>

        <div class="row portfolio-container">
          <?php
          $stmt = $koneksi->query("SELECT * FROM portofolio");
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-wrap">
                <img src="admonly/<?php echo htmlspecialchars($result['gambar']); ?>" alt="Gambar Portofolio" class="img-fluid">
              </div>
            </div>
          <?php
          }
          ?>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->


    <!-- ======= Jenis Ayam Section ======= -->
    <section id="jenis_ayam" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jenis Ayam KUB</h2>
          <p>Berikut adalah beberapa jenis ayam Kampung Unggul Balitbangtan (KUB) yang tersedia:</p>
        </div>

        <div class="row jenis_ayam-container">
          <?php
          $stmt = $koneksi->query("SELECT * FROM ayam");
          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch jenis_ayam-item">
              <div class="icon-box">
                <div class="icon"><img src="admonly/<?php echo htmlspecialchars($result['gambar']); ?>" alt="Ayam KUB" class="img-fluid"></div>
                <h4 class="title"><?php echo htmlspecialchars($result['nama']); ?></h4>
                <p class="description"><?php echo htmlspecialchars($result['deskripsi']); ?></p>
              </div>
            </div>
          <?php
          }
          ?>
        </div>

      </div>
    </section><!-- End Jenis Ayam Section -->


    <!-- ======= Distribusi Section ======= -->
    <section id="distribusi" class="distribusi">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Distribusi</h2>
          <p>Distribusi Ayam KUB kami mencakup berbagai wilayah di Sumatera Utara, memastikan bahwa ayam berkualitas tinggi dapat diperoleh oleh para peternak dengan mudah dan cepat.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/distribusi.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Jaringan Distribusi</h3>
            <p class="fst-italic">
              Kami memiliki jaringan distribusi yang luas dan terpercaya, memastikan bahwa Ayam KUB dapat diakses oleh peternak di berbagai wilayah.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Pengiriman cepat dan aman.</li>
              <li><i class="bi bi-check-circle"></i> Kualitas ayam terjaga selama proses pengiriman.</li>
              <li><i class="bi bi-check-circle"></i> Jangkauan distribusi mencakup berbagai kabupaten.</li>
            </ul>
            <p>
              Dengan dukungan jaringan distribusi yang kuat, kami memastikan bahwa Ayam KUB kami dapat membantu meningkatkan produktivitas dan kesejahteraan peternak di seluruh wilayah Sumatera Utara.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Distribusi Section -->

    <section id="alur" class="alur">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Alur Pemesanan</h2>
          <p>Berikut adalah alur pemesanan di SIYAKUB BSIP Sumut</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/siyakub.jpg" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End Distribusi Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak Kami</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Alamat Kami</h3>
              <p>Jl. Jenderal Besar A.H. Nasution No.1 B, Pangkalan Masyhur, Kec. Medan Johor,<br> Kota Medan, Sumatera Utara 20143</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Kami</h3>
              <p>ppid.bpsipsumut@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Hubungi Kami</h3>
              <p>+6282361668259</p>
            </div>
          </div>

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Kamu" required>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Kamu" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subjek" id="subject" placeholder="Subjek" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan" required></textarea>
              </div>
              <div class="text-center"><button type="submit" name="submit_pesan">Kirim Pesan</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>SIYAKUB</h3>
            <p>
              Jl. Jenderal Besar A.H. Nasution No.1 B, Pangkalan Masyhur, Kec. Medan Johor, Kota Medan, Sumatera Utara 20143<br>
              <strong>No Handphone:</strong> +6282361668259<br>
              <strong>Email:</strong> ppid.bpsipsumut@gmail.com<br>
            </p>
            <div class="social-links mt-3">
              <a href="https://x.com/bsipsumut/" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/BPTPBalitbangtanSumut" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/bsipsumut/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.linkedin.com/company/bsip-kementan/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Link Bantuan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portofolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#jenis_ayam">Jenis Ayam</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#distribusi">Distribusi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#alur">Alur Pemesanan</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Buletin Kami</h4>
            <p>Daftarkan diri Anda untuk mendapatkan informasi terbaru mengenai Ayam KUB dan layanan kami.</p>
            <form action="forms/newsletter.php" method="post">
              <input type="email" name="email" placeholder="Masukkan email Anda"><input type="submit" name="submit_buletin" value="Daftar">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy;2024 Copyright <strong><span>SIYAKUB</span></strong>.
      </div>
      <div class="credits">
        Designed by <a href="https://sumut.bsip.pertanian.go.id/">BSIP Sumut</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>