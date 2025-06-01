<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>

<body data-theme="corporate" class="bg-white min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8 space-y-4 shadow border bg-white rounded-xl shadow-md">
        <div class="flex items-center justify-center mb-6">
            <!-- <img class="w-10 h-10 mr-2 rounded-full" src="img/logo.jpeg" alt="logo"> -->
            <span class="text-2xl font-semibold text-gray-800">Register </span><br><br><br>
        </div>

        <form action="cek_regist.php" method="post" class="space-y-4">
            <div>
                <label for="username" class="block mb-1 text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" required />
            </div>
            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" required />
            </div>
            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" minlength="6" maxlength="8" required />
            </div>
            <div>
                <label for="repeat_password" class="block mb-1 text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="repeat_password" id="repeat_password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" minlength="6" maxlength="8" required />
            </div>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            <p class="text-sm font-light text-gray-500 text-right">
                Sudah punya akun? <a href="login.php" class="font-medium text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>


</html>