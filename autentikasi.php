<?php
session_start();

function cekLogin() {
    if (!isset($_SESSION['email'])) {
        header('Location: ../login.php');
        exit();
    }
}
?>