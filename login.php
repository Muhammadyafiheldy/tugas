<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
            width: 100%;
            background-color: white;
        }

        .pw {
            position: relative;
        }

        .pw .btnView {
            position: absolute;
            right: 1rem;
            background: none;
            border: none;
            font-size: 16px;
            top: 38px;
        }
    </style>
</head>

<body class="bg-white">
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen">
            <h1 class="text-3xl font-bold text-center text-gray-800">Selamat Datang Di Website Kami</h1>
            <p class="text-lg text-center text-gray-600">Silahkan login terlebih dahulu</p><br><br><br>
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                        Login
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="cek_login.php" method="post" id="loginForm">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-700 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="username" required>
                        </div>
                        <div class="pw relative">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="pass" placeholder="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" maxlength="8" minlength="6" required>
                            <button
                                type="button"
                                class="absolute top-9 right-3 text-gray-500 hover:text-gray-700"
                                id="btnView"
                                title="lihat password"
                                onclick="fnView()">
                                <i class="fa-regular fa-eye-slash"></i>
                            </button>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
                        <p class="text-sm font-light text-gray-500 text-right">
                            Belum punya akun? <a href="regist.php" class="font-medium text-blue-600 hover:underline">Daftar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <?php if (@$_SESSION['error']) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Username atau password salah',
            })
        </script>
    <?php unset($_SESSION['error']);
    } ?>

    <?php if (@$_SESSION['berhasil']) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil membuat akun',
            })
        </script>
    <?php unset($_SESSION['berhasil']);
    } ?>

    <!-- lihat password -->
    <script>
        function fnView() {
            const passwordField = document.getElementById("pass");
            const eyeIcon = document.getElementById("btnView");

            if (passwordField.value.length > 0 && passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.innerHTML = '<i class="fa-regular fa-eye"></i>';
                eyeIcon.title = 'sembunyikan password';
            } else {
                passwordField.type = "password";
                eyeIcon.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
                eyeIcon.title = 'lihat password';
            }
        }
    </script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>