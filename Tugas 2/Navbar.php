<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian ini adalah header dokumen HTML -->
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding yang digunakan, yaitu UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar sesuai dengan perangkat yang digunakan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Menghubungkan file CSS Bootstrap untuk membuat tampilan yang lebih baik dan responsif -->
    <style>
        /* Menambahkan warna khusus untuk navbar */
        .custom-navbar {
            background: #800020; /* Warna burgundy */

            color: white; /* Warna teks putih */
        }
        .custom-navbar .nav-link {
            color: white; /* Warna teks link putih */
        }
        .custom-navbar .nav-link:hover {
            color: #d0d0d0; /* Warna teks link saat hover */
        }
    </style>
    <title></title> <!-- Bagian ini untuk menentukan judul halaman yang tampil di tab browser -->
</head>
<body>
    <!-- Bagian ini adalah body atau isi dari dokumen HTML -->
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <!-- Membuat navigasi dengan Bootstrap, yang akan menjadi menu di bagian atas halaman -->
        
        <a class="navbar-brand" href="#"></a>
        <!-- Link untuk logo atau nama brand di navbar -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Tombol untuk mengaktifkan atau menonaktifkan menu di layar yang lebih kecil seperti smartphone -->

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- Membuat menu navigasi -->
                <a class="nav-item nav-link" href="home.php">Home</a> <!-- Link untuk halaman Home -->
                <a class="nav-item nav-link" href="Reports.php">Reports</a> <!-- Link untuk halaman Reports -->
                <a class="nav-item nav-link" href="Withdrawals.php">Student Withdrawals</a> <!-- Link untuk halaman Student Withdrawals -->
                <a class="nav-item nav-link" href="AcademicAdvisor.php">Academic Advisor</a> <!-- Link untuk halaman Academic Advisor -->
                <a class="nav-item nav-link" href="HeadOfProgram.php">Head of Program</a> <!-- Link untuk halaman Head of Program -->
            </div>
        </div>
    </nav>
    <!-- Penutup bagian navbar -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Menghubungkan file JavaScript Bootstrap untuk mengaktifkan komponen interaktif seperti dropdown atau modals -->
</body>
</html>
