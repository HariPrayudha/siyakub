<?php
session_start();
require_once("../config/koneksi.php");

if (isset($_POST['submit_buletin'])) {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $koneksi->prepare("INSERT INTO buletin (email) VALUES (:email)");
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $_SESSION['message'] = '<div class="success">Berhasil mendaftar untuk buletin!</div>';
        } else {
            $_SESSION['message'] = '<div class="error">Gagal mendaftar. Silakan coba lagi.</div>';
        }
    } else {
        $_SESSION['message'] = '<div class="error">Email tidak valid. Silakan masukkan email yang benar.</div>';
    }

    header("Location: /siyakub/index.php");
    exit();
}
?>
