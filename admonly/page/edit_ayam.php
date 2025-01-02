<?php
require_once("../config/koneksi.php");

if(isset($_POST['edit_ayam'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    
    // Penanganan Gambar
    if (!empty($_FILES["gambar"]["name"])) {
        $target_dir = "gambar/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $photo_file = $target_file;
        } else {
            echo '<div class="error">Gagal meng-upload gambar!</div>';
            exit;
        }

        $stmt = $koneksi->prepare("UPDATE ayam SET gambar=:gambar, nama=:nama, deskripsi=:deskripsi WHERE id=:id");
        $stmt->bindParam(':gambar', $photo_file);
    } else {
        $stmt = $koneksi->prepare("UPDATE ayam SET nama=:nama, deskripsi=:deskripsi WHERE id=:id");
    }

    // Mengikat parameter yang selalu ada di kedua kondisi
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo '<div class="success">Jenis Ayam Berhasil diupdate</div>';
    }else{
        echo '<div class="error">Jenis Ayam Gagal diupdate</div>';
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $koneksi->prepare("SELECT * FROM ayam WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        echo "Jenis Ayam tidak ditemukan!";
        exit;
    }
} else {
    echo "ID Jenis Ayam tidak diberikan!";
    exit;
}
?>

<div class="edit">
    <section class="panel">
        <a href="index.php?page=ayam"> << Kembali Ke Manajemen Jenis Ayam </a>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset style="border: 1px solid orange;">
            <legend>Edit Jenis Ayam</legend>
            <input type="hidden" name="id" placeholder="Id" class="form-control" value="<?php echo $result['id'];?>"><br>
            <legend>Gambar</legend>
            <img src="<?php echo $result['gambar']; ?>" alt="Gambar Portofolio" height="100" width="100">
            <input type="file" name="gambar" placeholder="Gambar Ayam" class="form-control"><br>
            <input type="text" name="nama" placeholder="Nama Ayam" class="form-control" value="<?php echo htmlspecialchars($result['nama']);?>"> <br>
            <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" value="<?php echo htmlspecialchars($result['deskripsi']);?>"> <br>
            <input type="submit" name="edit_ayam" value="Edit Ayam" class="submit">
            </fieldset>
        </form>
    </section>
</div>
