<?php 
require_once('koneksi.php'); 
include('navbar.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian ini adalah header dokumen HTML -->
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding yang digunakan, yaitu UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar sesuai dengan perangkat yang digunakan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Menghubungkan file CSS Bootstrap untuk membuat tampilan yang lebih baik dan responsif -->
    <style>
        /* Menambahkan style khusus untuk halaman ini */
        body {
            background: linear-gradient(to right, #F5F5DC; /* Warna krem */
        ); /* Gradasi latar belakang biru muda */
            color: #312; /* Warna teks default */
            margin: 0; /* Menghapus margin default */
            padding: 0; /* Menghapus padding default */
            height: 100vh; /* Mengatur tinggi body ke 100% dari viewport height */
            display: flex; /* Menggunakan Flexbox untuk menata elemen */
            flex-direction: column; /* Mengatur arah kolom */
        }
        .container {
            text-align: center; /* Menyusun teks di tengah */
            margin-top: auto; /* Menempatkan konten di bagian bawah halaman */
            margin-bottom: auto; /* Menempatkan konten di bagian atas halaman */
        }
    </style>
    <title>Home</title> <!-- Menentukan judul halaman yang tampil di tab browser -->
</head>
<body>
    <!-- Bagian ini adalah body atau isi dari dokumen HTML -->
    <!-- Navbar sudah disertakan melalui include 'navbar.php'; -->

    <div class="container">
        <!-- Menampilkan teks di tengah halaman -->
        <h1>TUGAS 2 <br> PHP OOP CASE STUDY</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Menghubungkan file JavaScript Bootstrap untuk mengaktifkan komponen interaktif seperti dropdown atau modals -->
</body>
</html>
