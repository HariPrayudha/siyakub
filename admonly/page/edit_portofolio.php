<?php
require_once("../config/koneksi.php");

if(isset($_POST['edit_portofolio'])){
    $id = $_POST['id'];
    
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

        $stmt = $koneksi->prepare("UPDATE portofolio SET gambar=:gambar WHERE id=:id");
        $stmt->bindParam(':gambar', $photo_file);
    } else {
        $stmt = $koneksi->prepare("UPDATE portofolio SET gambar=gambar WHERE id=:id");
    }

    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo '<div class="success">Portofolio Berhasil diupdate</div>';
    }else{
        echo '<div class="error">Portofolio Gagal diupdate</div>';
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $koneksi->prepare("SELECT * FROM portofolio WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        echo "Portofolio tidak ditemukan!";
        exit;
    }
} else {
    echo "ID Portofolio tidak diberikan!";
    exit;
}
?>

<div class="edit">
    <section class="panel">
        <a href="index.php?page=portofolio"> << Kembali Ke Manajemen Portofolio </a>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset style="border: 1px solid orange;">
            <legend>Edit Portofolio</legend>
            <input type="hidden" name="id" placeholder="Id" class="form-control" value="<?php echo $result['id'];?>"><br>
            <legend>Gambar</legend>
            <img src="<?php echo $result['gambar']; ?>" alt="Gambar Portofolio" height="100" width="100">
            <input type="file" name="gambar" placeholder="Gambar Ayam" class="form-control"><br>
            <input type="submit" name="edit_portofolio" value="Edit Portofolio" class="submit">
            </fieldset>
        </form>
    </section>
</div>
