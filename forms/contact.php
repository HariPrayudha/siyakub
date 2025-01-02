<?php
session_start();
require_once("../config/koneksi.php");

if (isset($_POST['submit_pesan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];

    $stmt = $koneksi->prepare("INSERT INTO pesan (nama, email, subjek, pesan) VALUES (:nama, :email, :subjek, :pesan)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subjek', $subjek);
    $stmt->bindParam(':pesan', $pesan);

    if ($stmt->execute()) {
        $_SESSION['message'] = '<div class="success">Pesan Anda Berhasil Dikirim, Terima Kasih!</div>';
    } else {
        $_SESSION['message'] = '<div class="error">Pesan Gagal Dikirim</div>';
    }

    header("Location: /siyakub/index.php");
    exit();
}
?>
