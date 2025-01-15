<?php
session_start();
require_once("config/koneksi.php");

if (!isset($_SESSION['email'])) {
    header('location:loginus.php');
    exit;
}

$email = $_SESSION['email'];

// Menangani pengiriman bukti transfer
if (isset($_POST['submit'])) {
    $bukti_tf = $_FILES['bukti_tf'];

    if ($bukti_tf['name'] != "") {
        $ekstensi_diperbolehkan = ['png', 'jpg'];
        $x = explode('.', $bukti_tf['name']);
        $ekstensi = strtolower(end($x));
        $file_tmp = $bukti_tf['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $bukti_tf['name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
            move_uploaded_file($file_tmp, 'admonly/buktitf/' . $nama_gambar_baru);

            // Query untuk mengambil id pesanan berdasarkan email
            try {
                $query_id = "SELECT id FROM pesanan WHERE email = :email LIMIT 1";
                $stmt_id = $koneksi->prepare($query_id);
                $stmt_id->bindParam(':email', $email);
                $stmt_id->execute();
                $pesanan = $stmt_id->fetch(PDO::FETCH_ASSOC);

                // Cek apakah id pesanan ditemukan
                if ($pesanan) {
                    $id = $pesanan['id'];

                    // Query PDO untuk memperbarui bukti transfer berdasarkan id pesanan
                    $query = "UPDATE pesanan SET bukti_tf = :bukti_tf WHERE id = :id";
                    $stmt = $koneksi->prepare($query);
                    $stmt->bindParam(':bukti_tf', $nama_gambar_baru);
                    $stmt->bindParam(':id', $id);

                    if ($stmt->execute()) {
                        // Pesan sukses
                        echo '<div class="success">Bukti Transfer Berhasil Terkirim</div>';
                    } else {
                        // Pesan gagal
                        echo '<div class="error">Bukti Transfer Gagal Terkirim</div>';
                    }
                } else {
                    // Jika id pesanan tidak ditemukan
                    echo '<div class="error">Pesanan dengan email tersebut tidak ditemukan.</div>';
                }
            } catch (PDOException $e) {
                // Pesan error jika terjadi exception
                echo '<div class="error">Terjadi kesalahan: ' . $e->getMessage() . '</div>';
            }
        } else {
            // Pesan jika ekstensi file tidak valid
            echo '<div class="error">Gambar hanya bisa jpg atau png</div>';
        }
    } else {
        // Pesan jika file tidak dipilih
        echo '<div class="error">Silakan pilih gambar untuk diunggah</div>';
    }
}
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
        <section class="payment">
            <h1 class="title">Payment</h1>
            <div class="box-container">
                <div class="box">
                    <a href="ordersaya.php">
                        << Kembali Ke Data Pesanan</a><br>
                            <img src="images/qris.png" width="450" height="450" alt="logo">
                            <form action="" method="post" enctype="multipart/form-data">
                                <h4>Masukkan Bukti Pembayaran</h4>
                                <input type="file" name="bukti_tf" placeholder="Masukkan Bukti Transfer"><br><br>
                                <input type="submit" value="Submit" name="submit" class="btn btn-success">
                            </form>
                </div>
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