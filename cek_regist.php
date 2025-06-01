<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['repeat_password'];

    // Validasi panjang password
    if (strlen($password) < 6 || strlen($password) > 8) {
        echo "Password harus terdiri dari 6 hingga 8 karakter!";
        exit();
    }

    // Validasi konfirmasi password
    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak cocok!";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Siapkan dan eksekusi query insert
    $stmt = $koneksi->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }

    $stmt->bind_param("sss", $email, $username, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['berhasil'] = 'Akun anda telah terdaftar';
        header("Location: login.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
} else {
    echo "Invalid request method.";
}
