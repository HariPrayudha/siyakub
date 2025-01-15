<?php
session_start();
require_once("config/koneksi.php");

if (isset($_POST['update_ayam'])) {
    $update_jumlah = $_POST['update_jumlah'];
    $update_id = $_POST['update_id'];

    $sql = "UPDATE `keranjang` SET jumlah = :jumlah WHERE id = :id";
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':jumlah', $update_jumlah, PDO::PARAM_INT);
    $stmt->bindParam(':id', $update_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo '<div class="success">Data Ayam Berhasil Diupdate</div>';
    } else {
        echo '<div class="error">Data Ayam Gagal Diupdate</div>';
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];

        $sql = "DELETE FROM `keranjang` WHERE id = :id";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo '<div class="success">Data Ayam Berhasil Dihapus</div>';
        } else {
            echo '<div class="error">Data Ayam Gagal Dihapus</div>';
        }
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus_semua") {

        $sql = "DELETE FROM `keranjang`";
        $stmt = $koneksi->prepare($sql);

        if ($stmt->execute()) {
            echo '<div class="success">Data Ayam Berhasil Dihapus</div>';
        } else {
            echo '<div class="error">Data Ayam Gagal Dihapus</div>';
        }
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
        <div class="container">
            <section class="shopping-cart">
                <h1 class="heading" align="center">KERANJANG ANDA</h1>
                <table>
                    <thead>
                        <th>GAMBAR</th>
                        <th>JENIS AYAM</th>
                        <th>HARGA</th>
                        <th>JUMLAH</th>
                        <th>TOTAL HARGA</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `keranjang`";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->execute();
                        $total_akhir = 0;

                        if ($stmt->rowCount() > 0) {
                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $sub_harga = $result['harga'] * $result['jumlah'];
                                $total_akhir += $sub_harga;
                        ?>
                                <tr>
                                    <td><img src="admonly/<?php echo htmlspecialchars($result['gambar']); ?>" height="100" alt=""></td>
                                    <td><?php echo htmlspecialchars($result['nama']); ?></td>
                                    <td>Rp.<?php echo number_format($result['harga']); ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($result['id']); ?>">
                                            <input type="number" name="update_jumlah" min="1" value="<?php echo htmlspecialchars($result['jumlah']); ?>">
                                            <input type="submit" value="UPDATE" name="update_ayam" class="btn btn-warning">
                                        </form>
                                    </td>
                                    <td>Rp.<?php echo number_format($sub_harga); ?></td>
                                    <td><a href="keranjang.php?action=hapus&id=<?php echo htmlspecialchars($result['id']); ?>" onclick="return confirm('Hapus produk ini dari keranjang?')" class="btn btn-danger"> <i class="fa fa-trash"></i> HAPUS</a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                        <tr class="table-bottom">
                            <td><a href="index.php#jenis_ayam" class="btn btn-warning" style="margin-top: 0;"> <i class="fa fa-shopping-cart"></i> KEMBALI BERBELANJA</a></td>
                            <td colspan="3">Total Harga</td>
                            <td>Rp.<?php echo number_format($total_akhir); ?></td>
                            <td><a href="keranjang.php?action=hapus_semua&id=" onclick="return confirm('Yakin ingin menghapus semua produk?');" class="btn btn-danger <?= ($total_akhir > 1) ? '' : 'disabled'; ?>"> <i class="fa fa-trash"></i> HAPUS SEMUA </a></td>
                        </tr>
                    </tbody>
                </table>

                <div class="checkout-btn">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<a href="checkout.php" class="btn btn-primary' . ($total_akhir > 1 ? '' : ' disabled') . '">PROSES KE CHECKOUT</a>';
                    } else {
                        echo '<p>SILAHKAN LOGIN UNTUK MELANJUTKAN KE CHECKOUT <br><br> <a href="loginus.php" class="btn btn-primary">LOGIN</a></p>';
                    }
                    ?>
                </div>
            </section>
        </div>
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