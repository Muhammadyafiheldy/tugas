<?php
session_start();
include '../koneksi.php'; // file konfigurasi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['login']['status']) || $_SESSION['login']['status'] !== true) {
        die("Anda harus login untuk memberikan komentar.");
    }

    $id_user =  $_SESSION['id_user'];
    $id_artikel = $_POST['id_artikel'];
    $konten = $_POST['konten'];

    $query = "INSERT INTO komentar (id_user, id_artikel, konten) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("iis", $id_user, $id_artikel, $konten);
    $stmt->execute();

    header("Location: ../user/headerArtikel.php?page=home");
}
?>
