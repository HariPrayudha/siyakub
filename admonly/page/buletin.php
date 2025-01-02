<div class="col-g-12"><h3>Data Buletin</h3></div>
<?php
require_once("../config/koneksi.php");

if(isset($_GET['action'])){
    if($_GET['action']=="hapus"){
        $id = $_GET['id'];
        $stmt = $koneksi->prepare("DELETE FROM buletin WHERE id = ?");
        $stmt->execute([$id]);
        if($stmt->rowCount()){
            echo '<div class="success">Data Buletin Pelanggan Berhasil Dihapus</div>';
        }else{
            echo '<div class="error">Data Buletin Pelanggan Gagal Dihapus</div>';
        }
    }
}
?>
<div class="col-g-12">
    <section class="panel">
    <table class="table">
        <tr>
            <th>No</th>
            <th>ID Buletin</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $stmt = $koneksi->query("SELECT * FROM buletin");
        $no=1;
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td>
                <a href="index.php?page=buletin&action=hapus&id=<?php echo $result['id']; ?>"
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
