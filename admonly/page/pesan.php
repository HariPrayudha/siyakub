<div class="col-g-12"><h3>Rekap Pesan dan Saran Pelanggan</h3></div>
<?php
require_once("../config/koneksi.php");

    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $stmt = $koneksi->prepare("DELETE FROM pesan WHERE id = ?");
            $stmt->execute([$id]);
            if($stmt->rowCount()){
                echo '<div class="success">Pesan Berhasil Dihapus</div>';
            }else{
                echo '<div class="error">Pesan Gagal Dihapus</div>';
            }
        }
    }
?>
<div class="col-g-12">
    <section class="panel">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Subjek</th>
            <th>Pesan</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
        <?php
        $stmt = $koneksi->query("SELECT * FROM pesan");
        $no = 1;
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo htmlspecialchars($result['nama']); ?></td>
                <td><?php echo htmlspecialchars($result['email']); ?></td>
                <td><?php echo htmlspecialchars($result['subjek']); ?></td>
                <td><?php echo htmlspecialchars($result['pesan']); ?></td>
                <td><?php echo htmlspecialchars($result['created_at']); ?></td>
                <td>
                <a href="index.php?page=pesan&action=hapus&id=<?php echo $result['id']; ?>"
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
