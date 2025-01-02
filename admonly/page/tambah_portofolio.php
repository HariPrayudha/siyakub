<?php
require_once("../config/koneksi.php");

if(isset($_POST['submit_portofolio'])){
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    $photo_file = $target_file;

    $stmt = $koneksi->prepare("INSERT INTO portofolio(gambar) 
    VALUES(:gambar)");
    $stmt->bindParam(':gambar', $photo_file);

    if($stmt->execute()){
        echo '<div class="success">Portofolio Berhasil disimpan</div>';
    }else{
        echo '<div class="error">Portofolio Gagal disimpan</div>';
    }
}
?>
<div class="tambah">
    <section>
        <h2 align="center">Halaman Tambah Portofolio</h2>
        <a href="index.php?page=portofolio"> << Kembali Ke Manajemen Portofolio </a>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="gambar" placeholder="Gambar" class="form-control"> <br>
            <input type="submit" name="submit_portofolio" value="Tambah Portofolio" class="submit">
        </form>
    </section>
</div>