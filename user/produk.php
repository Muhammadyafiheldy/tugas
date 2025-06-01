<?php
// session_start();
require '../koneksi.php'; // file konfigurasi database


if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM produk";
$result = $koneksi->query($query);

echo "<h1>Daftar Membership</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h2>{$row['nama']}</h2>";
    echo "<p>Harga: {$row['harga']}</p>";
    echo "<p>Jangka Waktu: {$row['masa berlaku']} hari</p>";
    echo "<a href='transaksi.php?id_produk={$row['id_produk']}'>Beli</a>";
    echo "</div>";
}
?>;
