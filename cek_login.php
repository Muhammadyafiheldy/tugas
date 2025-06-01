<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // validasi
    if ($username == "" || $password == "") {
        $_SESSION['error'] = 'Username atau password tidak boleh kosong';
        header("Location: login.php");
        exit();
    }

    // cek login
    $stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $username);

    // Eksekusi statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['login']['status'] = true;
            $_SESSION['login']['username'] = $user['username'];
            $_SESSION['login']['level'] = $user['level'];

            switch ($user['level']) {
                case 'admin':
                case 'admin artikel':
                    header("Location: ./admin/layout/layoutside.php?page=home");
                    break;
                case 'user':
                    header("Location: user/headerr.php?page=home");
                    break;
                default:
                    header("Location: login.php");
                    break;
            }
            exit();
        } else {
            $_SESSION['error'] = 'Username atau password salah';
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Username atau password salah';
        header("Location: login.php");
        exit();
    }

    // Close statement
    $stmt->close();
}

// Close connection
$koneksi->close();
?>