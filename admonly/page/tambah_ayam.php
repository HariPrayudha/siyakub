<?php
require_once("../config/koneksi.php");

if(isset($_POST['submit_ayam'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    $photo_file = $target_file;

    $stmt = $koneksi->prepare("INSERT INTO ayam(gambar, nama, deskripsi) 
    VALUES(:gambar, :nama, :deskripsi)");
    $stmt->bindParam(':gambar', $photo_file);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':deskripsi', $deskripsi);

    if($stmt->execute()){
        echo '<div class="success">Jenis Ayam Berhasil disimpan</div>';
    }else{
        echo '<div class="error">Jenis Ayam Gagal disimpan</div>';
    }
}
?>
<div class="tambah">
    <section>
        <h2 align="center">Halaman Tambah Jenis Ayam</h2>
        <a href="index.php?page=ayam"> << Kembali Ke Manajemen Jenis Ayam </a>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="gambar" placeholder="Gambar" class="form-control"> <br>
            <input type="text" name="nama" placeholder="Nama Ayam" class="form-control"> <br>
            <input type="number" name="harga" placeholder="Harga Ayam" class="form-control"> <br>
            <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control"> <br>
            <input type="submit" name="submit_ayam" value="Tambah Ayam" class="submit">
        </form>
    </section>
</div>