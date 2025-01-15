<?php
session_start();
require_once("config/koneksi.php");

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = '';
    header('location:loginus.php');
};
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
    <link href="assets/img/logo.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

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
                    <li><a class="nav-link scrollto active" href="index.php#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="index.php#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="index.php#portfolio">Portofolio</a></li>
                    <li><a class="nav-link scrollto" href="index.php#jenis_ayam">Jenis Ayam</a></li>
                    <li><a class="nav-link scrollto" href="index.php#distribusi">Distribusi</a></li>
                    <li><a class="nav-link scrollto" href="index.php#alur">Alur Pemesanan</a></li>
                    <li><a class="nav-link scrollto" href="index.php#contact">Kontak Kami</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link">Profile <i class="bi bi-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="keranjang.php">Keranjang</a></li>
                            <?php if (isset($_SESSION['email'])): ?>
                                <li><a href="index.php?action=logout">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <a href="index.php"><img src="assets/img/logo2.png" alt="" class="img-fluid" style="height: 50px; margin-left: 10px;"></a>
        </div>
    </header><!-- End Header -->

    <main>
        <section class="user-details">
            <div class="user">
                <?php
                try {
                    // Query menggunakan prepared statement
                    $query = "SELECT * FROM user WHERE email = :email";
                    $stmt = $koneksi->prepare($query); // Menggunakan instance $koneksi dari file koneksi.php
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

                    // Menjalankan query
                    $stmt->execute();

                    // Mengambil hasil query
                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <img src="gambar/<?php echo htmlspecialchars($result['gambar']); ?>" alt="User Image">
                        <p><i class="fa fa-user"></i><span>Nama : <?php echo htmlspecialchars($result['nama']); ?></span></p>
                        <p><i class="fa fa-phone"></i><span>Nomor HP : <?php echo htmlspecialchars($result['no_telp']); ?></span></p>
                        <p><i class="fa fa-envelope"></i><span>Email : <?php echo htmlspecialchars($result['email']); ?></span></p>
                        <p class="address"><i class="fa fa-map-marker"></i><span>Alamat : <?php echo htmlspecialchars($result['alamat']); ?></span></p>
                        <div class="button-group">
                            <a href="updateprofil.php" class="btn btn-primary">Edit Profil</a>
                            <a href="ordersaya.php" class="btn btn-warning">Status Pesanan</a>
                        </div>
                <?php
                    }
                } catch (PDOException $e) {
                    echo "Terjadi masalah saat memproses data: " . $e->getMessage();
                }
                ?>
            </div>
        </section>
    </main>

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