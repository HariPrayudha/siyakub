<?php
session_start();
require_once("config/koneksi.php");

if (isset($_POST['submit_pesanan'])) {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
    $metode = $_POST['metode'];
    $alamat = $_POST['alamat'];
    $jalan = $_POST['jalan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $negara = $_POST['negara'];
    $kode_pos = $_POST['kode_pos'];
    $tanggal_checkout = $_POST['tanggal_checkout'];

    try {
        $query_keranjang = $koneksi->query("SELECT * FROM keranjang");
        $items = $query_keranjang->fetchAll(PDO::FETCH_ASSOC);

        if ($items) {
            $total_harga = 0;
            $nama_produk = [];

            foreach ($items as $item) {
                $nama_produk[] = $item['nama'] . ' (' . $item['jumlah'] . ')';
                $sub_harga = $item['harga'] * $item['jumlah'];
                $total_harga += $sub_harga;
            }

            $total_produk = implode(', ', $nama_produk);

            $stmt = $koneksi->prepare("
                INSERT INTO pesanan 
                (nama, nomor, email, metode, alamat, jalan, kota, provinsi, negara, kode_pos, total_produk, total_harga, tanggal_checkout)
                VALUES (:nama, :nomor, :email, :metode, :alamat, :jalan, :kota, :provinsi, :negara, :kode_pos, :total_produk, :total_harga, :tanggal_checkout)
            ");
            $stmt->execute([
                ':nama' => $nama,
                ':nomor' => $nomor,
                ':email' => $email,
                ':metode' => $metode,
                ':alamat' => $alamat,
                ':jalan' => $jalan,
                ':kota' => $kota,
                ':provinsi' => $provinsi,
                ':negara' => $negara,
                ':kode_pos' => $kode_pos,
                ':total_produk' => $total_produk,
                ':total_harga' => $total_harga,
                ':tanggal_checkout' => $tanggal_checkout,
            ]);

            echo "
            <div class='order-message-container'>
                <div class='message-container'>
                    <h3>TERIMA KASIH SUDAH ORDER!!</h3>
                    <div class='order-detail'>
                        <span>{$total_produk}</span>
                        <span class='total'> Total Harga : Rp." . number_format($total_harga) . "</span>
                    </div>
                    <div class='customer-details'>
                        <p> Nama : <span>{$nama}</span> </p>
                        <p> Nomor : <span>{$nomor}</span> </p>
                        <p> Email : <span>{$email}</span> </p>
                        <p> Alamat : <span>{$alamat}, {$jalan}, {$kota}, {$provinsi}, {$negara} - {$kode_pos}</span> </p>
                        <p> Metode Pembayaran : <span>{$metode}</span> </p>
                    </div>
                    <div class='buttons'>
                        <a href='index.php#jenis_ayam' class='btn btn-warning'>Lanjut Berbelanja</a>
                        <a href='profile.php' class='btn btn-primary'>Ke Akun Saya</a>
                    </div>
                </div>
            </div>";

            $koneksi->query("DELETE FROM keranjang");
        } else {
            echo "<div class='order-message-container'>
                    <div class='message-container'>
                        <h3>KERANJANG ANDA MASIH KOSONG!!!</h3>
                        <a href='index.php#jenis_ayam' class='btn btn-warning'>Belanja Sekarang</a>
                    </div>
                  </div>";
        }
    } catch (PDOException $e) {
        die("Terjadi kesalahan: " . $e->getMessage());
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
            <section class="checkout-form">
                <h1 class="heading" align="center">CHECKOUT PRODUCT</h1>
                <form action="" method="post">
                    <div class="display-order">
                        <?php
                        $total = 0;
                        $total_akhir = 0;
                        $sub_harga = 0;

                        try {
                            $query = $koneksi->query("SELECT * FROM keranjang");
                            $items = $query->fetchAll(PDO::FETCH_ASSOC);

                            if ($items) {
                                foreach ($items as $item) {
                                    $sub_harga = $item['harga'] * $item['jumlah'];
                                    $total_akhir = $total += $sub_harga;
                                    echo "<span>{$item['nama']} ({$item['jumlah']})</span>";
                                }
                            } else {
                                echo "<div class='display-order'><span>KERANJANG ANDA MASIH KOSONG!!!</span></div>";
                            }
                        } catch (PDOException $e) {
                            echo "<div class='error'>Terjadi kesalahan: {$e->getMessage()}</div>";
                        }
                        ?>
                        <span class="grand-total"> Total Harga : Rp.<?php echo number_format($total_akhir); ?></span>
                    </div>

                    <div class="flex">
                        <input type="hidden" name="tanggal_checkout" value="<?php echo date('Y-m-d'); ?>">
                        <div class="inputBox">
                            <span>Nama Anda</span>
                            <input type="text" placeholder="Masukkan Nama Anda" name="nama" required>
                        </div>
                        <div class="inputBox">
                            <span>Nomor Anda</span>
                            <input type="text" placeholder="Masukkan Nomor Anda" name="nomor" required>
                        </div>
                        <div class="inputBox">
                            <span>Email Anda</span>
                            <input type="email" placeholder="Masukkan Email Anda" name="email" required>
                        </div>
                        <div class="inputBox">
                            <span>Metode Pembayaran</span>
                            <select name="metode">
                                <option value="COD" selected>COD</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>Alamat</span>
                            <input type="text" placeholder="Masukkan Nama Jalan" name="alamat" required>
                        </div>
                        <div class="inputBox">
                            <span>Detail Alamat</span>
                            <input type="text" placeholder="Masukkan Nomor Rumah" name="jalan" required>
                        </div>
                        <div class="inputBox">
                            <span>Kota</span>
                            <input type="text" placeholder="Masukkan Kota" name="kota" required>
                        </div>
                        <div class="inputBox">
                            <span>Provinsi</span>
                            <input type="text" placeholder="Masukkan Provinsi" name="provinsi" required>
                        </div>
                        <div class="inputBox">
                            <span>Negara</span>
                            <input type="text" placeholder="Masukkan Negara" name="negara" required>
                        </div>
                        <div class="inputBox">
                            <span>Kode Pos</span>
                            <input type="text" placeholder="Masukkan Kode Pos" name="kode_pos" required>
                        </div>
                    </div>
                    <div class="checkout-btn">
                        <input type="submit" value="PESAN SEKARANG" name="submit_pesanan" class="btn btn-success">
                    </div>
                </form>
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