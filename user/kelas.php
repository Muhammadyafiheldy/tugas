<?php
$activePage = 'kelas';
include 'headerr.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas | belajar online? di belajarbersama aja</title>
</head>

<body class="bg-blue-50">
    <div class="max-w-7xl mx-auto p-4 space-y-8">

        <!-- Search bar dan filter kelas -->
        <div class="flex flex-col md:flex-row items-center justify-between bg-white p-4 rounded-xl shadow">
            <input
                type="text"
                placeholder="Coba cari materi belajarmu di sini"
                class="w-full md:w-2/3 p-3 rounded-xl border border-gray-100 mb-3 md:mb-0 bg-white text-gray-600 placeholder-gray-400" />
            <select pla class="p-3 rounded-xl border border-gray-300 md:ml-4 w-full md:w-1/3 bg-white text-gray-600" ">
              <option value="" disabled selected hidden>Pilih Kelas</option>
                <option>SD</option>
                <option>SMP</option>
                <option>SMA</option>
            </select>
        </div>

        <!-- Flash Sale -->
        <div class=" bg-white rounded-xl p-4 shadow">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-lg text-orange-600">Promo Terbatas 🔥🔥</h2>
                    <!-- <span class="text-sm text-red-500">14:51:07</span> -->
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="bg-gradient-to-r from-blue-100 to-white rounded-lg p-4 shadow">
                        <p class="font-semibold text-sm mb-2">SD</p>
                        <p class="text-green-600 font-bold">Rp 400.000</p>
                    </div>
                    <div class="bg-gradient-to-r from-blue-100 to-white rounded-lg p-4 shadow">
                        <p class="font-semibold text-sm mb-2">SMP</p>
                        <p class="text-green-600 font-bold">Rp 500.000</p>
                    </div>
                    <div class="bg-gradient-to-r from-blue-100 to-white rounded-lg p-4 shadow">
                        <p class="font-semibold text-sm mb-2">SMA/SMK</p>
                        <p class="text-green-600 font-bold">Rp 600.000</p>
                    </div>
                    <div class="bg-gradient-to-r from-blue-100 to-white rounded-lg p-4 shadow">
                        <p class="font-semibold text-sm mb-2">Bimbel UTBK🔥🔥</p>
                        <p class="text-green-600 font-bold">Rp 500.000</p>
                    </div>
                </div>
        </div>

        <!-- Menu mata pelajaran -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="grid grid-cols-3 md:grid-cols-6 gap-4 text-center">
                <div>
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto"></div>
                    <p class="text-sm mt-2">Matematika</p>
                </div>
                <div>
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto"></div>
                    <p class="text-sm mt-2">Bahasa Inggris</p>
                </div>
                <div>
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto"></div>
                    <p class="text-sm mt-2">Ekonomi</p>
                </div>
                <div>
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto"></div>
                    <p class="text-sm mt-2">Bahasa Indonesia</p>
                </div>
                <div>
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto"></div>
                    <p class="text-sm mt-2">IPS</p>
                </div>
                <div>
                    <div class="bg-blue-100 p-4 rounded-full w-16 h-16 mx-auto"></div>
                    <p class="text-sm mt-2">IPA</p>
                </div>
            </div>
        </div>

        <!-- Tryout Section -->
        <div class="flex flex-col md:flex-row rounded-2xl bg-gradient-to-br from-blue-300 to-white p-4 md:p-8">
            <!-- Bagian kiri (teks) -->
            <div class="md:flex-1 flex flex-col justify-center mb-4 md:mb-0">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">
                    Asah kemampuan anda bersama kami <br />
                    <span class="text-blue-500">belajarbersama!</span>
                </h2>
            </div>

            <!-- Bagian kanan (card grid) -->
            <div class="md:flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Card 1 -->
                <div class="bg-white p-4 md:p-6 rounded-xl shadow">
                    <h3 class="font-bold text-base md:text-lg">Tryout UTBK 2025</h3>
                    <p class="text-sm md:text-base">Daftar Sekarang 1,2 ribu sudah mendaftar</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-4 md:p-6 rounded-xl shadow">
                    <h3 class="font-bold text-base md:text-lg">Kelas online SD</h3>
                    <p class="text-sm md:text-base">Daftar Sekarang</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-4 md:p-6 rounded-xl shadow">
                    <h3 class="font-bold text-base md:text-lg">Kelas Online SMA</h3>
                    <p class="text-sm md:text-base">Daftar Sekarang</p>
                </div>
                <!-- Card 4 -->
                <div class="bg-white p-4 md:p-6 rounded-xl shadow">
                    <h3 class="font-bold text-base md:text-lg">Kelas Online SMP</h3>
                    <p class="text-sm md:text-base">Daftar Sekarang</p>
                </div>
            </div>
        </div>

        <!-- ruangguru baca baru -->
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="font-bold text-lg mb-4">Temukan jurusan favorite anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <!-- Kolom kiri -->
                <div class="flex flex-col gap-4">
                    <div class="bg-blue-100 p-4 rounded-lg">Jurusan Administrasi</div>
                    <div class="bg-blue-100 p-4 rounded-lg">Jurusan Bisnis</div>
                    <div class="bg-blue-100 p-4 rounded-lg">Jurusan Teknik</div>
                </div>
                <!-- Kolom kanan -->
                <div class="flex flex-col gap-4">
                    <div class="bg-blue-100 p-4 rounded-lg">Jurusan Bahasa</div>
                    <div class="bg-blue-100 p-4 rounded-lg">Jurusan Hukum</div>
                    <div class="bg-blue-100 p-4 rounded-lg">Jurusan Pendidikan</div>
                </div>
            </div>
        </div>

        <!-- Promo dan Info Tambahan -->
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="font-bold text-lg mb-4">Kenapa harus belajarbersama?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-yellow-100 p-4 rounded-lg">Kurikulum Terupdate</div>
                <div class="bg-yellow-100 p-4 rounded-lg">Diskon s.d. 50%</div>
                <div class="bg-yellow-100 p-4 rounded-lg">Akses Materi selamanya</div>
            </div>
        </div>

    </div>
</body>
<?php
include 'footer.php'
?>

</html>