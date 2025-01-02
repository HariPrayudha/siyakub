<div class="col-g-12"><h3>Data Jenis Ayam</h3></div>
<?php
require_once("../config/koneksi.php");

    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $stmt = $koneksi->prepare("DELETE FROM ayam WHERE id = ?");
            $stmt->execute([$id]);
            if($stmt->rowCount()){
                echo '<div class="success">Data Ayam Berhasil Dihapus</div>';
            }else{
                echo '<div class="error">Data Ayam Gagal Dihapus</div>';
            }
        }
    }
?>
<div class="col-g-12">
    <section class="panel">
    <a href="index.php?page=tambah_ayam" class="btn btn-success">TAMBAH</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Action</th>
        </tr>
        <?php
        $stmt = $koneksi->query("SELECT * FROM ayam");
        $no = 1;
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><img src="<?php echo htmlspecialchars($result['gambar']); ?>" alt="Gambar Portofolio" height="200" width="200"></td>
                <td><?php echo htmlspecialchars($result['nama']); ?></td>
                <td><?php echo htmlspecialchars($result['deskripsi']); ?></td>
                <td>
                <a href="index.php?page=edit_ayam&id=<?php echo htmlspecialchars($result['id']); ?>" class="btn btn-warning">EDIT</a>
                <a href="index.php?page=ayam&action=hapus&id=<?php echo $result['id']; ?>"
                class="btn btn-danger">HAPUS</a>
                </td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </table>
    </section>
</div>
