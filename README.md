# Prak-Web2-Tugas-2
## PHP OOP CASE STUDY
#### Task:
1. Create an OOP-based View, by retrieving data from the MySQL database
2. Use the _construct as a link to the database
3. Apply encapsulation according to the logic of the case study
4. Create a derived class using the concept of inheritance
5. Apply polymorphism for at least 2 roles according to the case study

#### Case Study:
- NPM 1,2: reports & student_withdrawal

#### ERD

![WhatsApp Image 2024-08-30 at 09 27 15](https://github.com/user-attachments/assets/a862a3c4-bba4-4614-a419-052dc9a0e5bc)
## Daftar Isi

- [Koneksi.php](#koneksi-php)
   - [Class Database](#class-database)
      - [1. Deklarasi Properti](#deklrasi-properti)
      - [2. Konstruktor](#konstruktor)
      - [3. Destruktor](#destruktor)
   - [Class Withdrawals](#class-withdrawals)
      - [1. Pewarisan](#pewarisan)
      - [2. Konstruktor](#konstruktor-withdrawals)
      - [3. Method tampilData](#method-tampil-data)
      - [Source Code](#source-code-withdrawals)
- [Navbar.php](#navbar-php)
    - [1. Struktur Dasar HTML](#struktur-dasar-html)
    - [2. Bagian `<head>`](#bagian-head)
    - [3. Bagian `<body>`](#bagian-body)
    - [4. Menghubungkan JavaScript](#menghubungkan-javascript)
    - [Source Code](#source-code-navbar)
- [Home.php](#home-php)
    - [1. Bagian PHP](#bagian-php-home)
    - [2. Struktur HTML](#struktur-html)
    - [3. Bagian `<head>`](#bagian-head-home)
    - [4. Bagian `<body>`](#bagian-body-home)
    - [Source Code](#source-code-home)
- [Reports.php](#reports-php)
    - [1. Bagian PHP](#bagian-php-reports)
    - [2. Bagian HTML](#bagian-html-reports)
    - [Source Code](#source-code-reports)
- [Withdrawals.php](#withdrawals-php)
    - [1. Bagian PHP](#bagian-php-withdrawals)
    - [2. Bagian HTML](#bagian-html-withdrawals)
    - [Source Code](#source-code-withdrawals)
- [AcademicAdvisor.php](#academic-advisor-php)
    - [1. Bagian PHP](#bagian-php-academic-advisor)
    - [2. Bagian HTML](#bagian-html-academic-advisor)
    - [Source Code](#source-code-academic-advisor)
- [HeadOfProgram.php](#head-of-program-php)
    - [1. Bagian PHP](#bagian-php-head-of-program)
    - [2. Bagian HTML](#bagian-html-head-of-program)
    - [Source Code](#source-code-head-of-program)
- [Output Program](#output-program)
    - [1. Home](#output-home)
    - [2. Tampil Reports](#output-tampil-reports)
    - [3. Tampil Withdrawals](#output-tampil-withdrawals)
    - [4. Tampil Academic Advisor](#output-tampil-academic-advisor)
    - [5. Tampil Head Of Program](#output-tampil-head-of-program)

   
 ## Koneksi.php

#### Class Database
Tujuan: Class Database digunakan untuk mengatur koneksi ke database. Ini mencakup pengaturan koneksi serta menutup koneksi saat objek tidak lagi diperlukan.

  1. Deklarasi Properti:

```
<?php

private $host = "localhost"; // Alamat host database
private $user = "root"; // Nama pengguna database
private $pass = ""; // Kata sandi database
private $db = "db_tugas2"; // Nama database
protected $conn; // Variabel untuk menyimpan koneksi database
```
- $host: Alamat server database (dalam hal ini, localhost untuk server lokal).
- $user: Nama pengguna database (default adalah root).
- $pass: Kata sandi untuk pengguna database (kosong jika tidak ada).
- $db: Nama database yang akan dihubungkan.
- $conn: Variabel untuk menyimpan objek koneksi database (mysqli).

2. Konstruktor:

```
public function __construct() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    
    if ($this->conn->connect_error) {
        die("Koneksi Database Gagal : " . $this->conn->connect_error);
    }
}
```
- Konstruktor ini dijalankan secara otomatis ketika objek Database dibuat.
- new mysqli(...) membuat koneksi ke database menggunakan parameter yang telah ditentukan ($host, $user, $pass, $db).
- Jika koneksi gagal ($this->conn->connect_error), maka eksekusi dihentikan dengan menampilkan pesan error.

3. Destruktor:

```
    public function __destruct() {
        $this->conn->close(); // Menutup koneksi database
    }
```
- Destruktor dijalankan ketika objek Database dihapus atau tidak digunakan lagi.
- close() menutup koneksi database untuk membebaskan sumber daya.

#### Class Withdrawals
Tujuan: Class Withdrawals mewarisi class Database dan digunakan untuk mengambil data dari tabel student_withdrawals dalam database.
1. Pewarisan:

```
class Withdrawals extends Database {
```
- Withdrawals adalah subclass dari Database. Ini berarti Withdrawals mewarisi semua properti dan metode dari Database.

2. Konstruktor:

```
public function __construct() {
    parent::__construct(); // Memanggil konstruktor dari class Database
}
```
- Konstruktor ini memanggil konstruktor dari class Database menggunakan parent::__construct(). Ini memastikan bahwa koneksi database diinisialisasi saat objek Withdrawals dibuat.

3. Method tampilData:

```
public function tampilData() {
    $sql = "SELECT * FROM student_withdrawals";
    $result = $this->conn->query($sql);
    
    return $result->fetch_all(MYSQLI_ASSOC);
}
```
- Method ini digunakan untuk mengambil semua data dari tabel student_withdrawals.
- query($sql) menjalankan perintah SQL untuk memilih semua baris dari tabel student_withdrawals.
- fetch_all(MYSQLI_ASSOC) mengembalikan hasil query dalam bentuk array asosiatif, di mana setiap elemen adalah array yang mewakili satu baris data dari tabel.

## Source Code

```
<?php 
    // Pembuatan class Database untuk mengatur koneksi ke database
    class Database {
        private $host = "localhost"; // Alamat host database
        private $user = "root"; // Nama pengguna database
        private $pass = ""; // Kata sandi database
        private $db = "db_tugas2"; // Nama database
        protected $conn; // Variabel untuk menyimpan koneksi database
    
        // Konstruktor class yang akan dijalankan saat objek dibuat
        public function __construct() {
            // Membuat koneksi ke database menggunakan mysqli
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            
            // Mengecek apakah terjadi error saat koneksi
            if ($this->conn->connect_error) {
                die("Koneksi Database Gagal : " . $this->conn->connect_error); // Menghentikan eksekusi jika koneksi gagal
            }
        }
        
        // Destruktor class yang akan dijalankan saat objek dihancurkan
        public function __destruct() {
            $this->conn->close(); // Menutup koneksi database
        }
    }

    // Pembuatan class Withdrawals yang mewarisi class Database
    class Withdrawals extends Database {
        // Konstruktor class yang memanggil konstruktor dari class induk
        public function __construct() {
            parent::__construct(); // Memanggil konstruktor class Database
        }
        
        // Method untuk menampilkan data dari tabel student_withdrawals
        public function tampilData() {
            $sql = "SELECT * FROM student_withdrawals"; // Query SQL untuk memilih semua data dari tabel student_withdrawals
            $result = $this->conn->query($sql); // Menjalankan query dan mendapatkan hasilnya
            
            // Mengembalikan hasil query dalam bentuk array asosiatif
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>
```

## Navbar.php
1. Struktur Dasar HTML

```
<!DOCTYPE html>
<html lang="en">
```
- <!DOCTYPE html>: Menyatakan bahwa ini adalah dokumen HTML5.
- <html lang="en">: Elemen root dari dokumen HTML yang menyatakan bahwa bahasa yang digunakan adalah bahasa Inggris (en).

2.  Bagian <head>

```
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .custom-navbar {
            background: #800020;
            color: white;
        }
        .custom-navbar .nav-link {
            color: white;
        }
        .custom-navbar .nav-link:hover {
            color: #d0d0d0;
        }
    </style>
    <title></title>
</head>
```
- <meta charset="UTF-8">: Menetapkan encoding karakter untuk dokumen sebagai UTF-8, yang mendukung berbagai karakter internasional.
- <meta name="viewport" content="width=device-width, initial-scale=1.0">: Mengatur tampilan untuk responsif pada perangkat dengan berbagai ukuran layar, seperti ponsel dan tablet.
- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" ...>: Menyertakan file CSS Bootstrap dari CDN untuk desain dan styling responsif.
- <style>: Menyediakan CSS khusus untuk mengubah tampilan navbar:
    .custom-navbar: Mengatur latar belakang navbar menjadi burgundy (#800020) dan teks berwarna putih.
    .custom-navbar .nav-link: Mengatur warna teks link navbar menjadi putih.
    .custom-navbar .nav-link:hover: Mengubah warna teks link saat hover menjadi abu-abu muda (#d0d0d0).
- <title></title>: Tempat untuk menentukan judul halaman yang akan ditampilkan di tab browser. Saat ini kosong.

3. Bagian <body>

```
<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="home.php">Home</a>
                <a class="nav-item nav-link" href="Reports.php">Reports</a>
                <a class="nav-item nav-link" href="Withdrawals.php">Student Withdrawals</a>
                <a class="nav-item nav-link" href="AcademicAdvisor.php">Academic Advisor</a>
                <a class="nav-item nav-link" href="HeadOfProgram.php">Head of Program</a>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
```

- <nav class="navbar navbar-expand-lg navbar-light custom-navbar">: Membuat elemen navigasi dengan kelas Bootstrap dan kelas khusus .custom-navbar untuk styling tambahan.
    - navbar-expand-lg: Membuat navbar responsif dan expand (memperluas) pada layar besar.
    - navbar-light: Menetapkan warna teks dan latar belakang navbar untuk tema terang.
    - custom-navbar: Kelas khusus yang didefinisikan dalam bagian <style> untuk warna latar belakang dan teks.
- <a class="navbar-brand" href="#"></a>: Tempat untuk menambahkan logo atau nama brand. Saat ini tidak ada teks atau gambar di dalamnya.
- <button class="navbar-toggler" type="button" ...>: Tombol yang muncul pada layar kecil (mobile) untuk membuka atau menutup menu navbar.
    - data-bs-toggle="collapse" dan data-bs-target="#navbarNavAltMarkup": Mengatur tombol untuk mengontrol elemen dengan ID navbarNavAltMarkup.
    - aria-controls, aria-expanded, dan aria-label: Atribut untuk aksesibilitas.
- <div class="collapse navbar-collapse" id="navbarNavAltMarkup">: Elemen yang berisi item navigasi yang akan terlipat pada layar kecil dan diperluas pada layar besar.
    - collapse: Menetapkan bahwa elemen ini dapat tersembunyi dan ditampilkan.
    - navbar-collapse: Kelas Bootstrap untuk mengatur elemen yang dapat di-collapse.
- <div class="navbar-nav">: Membuat container untuk link navigasi.
- <a class="nav-item nav-link" href="...">: Link untuk navigasi, masing-masing mengarah ke halaman yang berbeda seperti "Home", "Reports", dll.

4. Menghubungkan JavaScript

```
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
```

- Menyertakan file JavaScript Bootstrap dari CDN untuk mengaktifkan fungsi interaktif seperti dropdowns, modals, dan collapses.

## Source Code

```
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
```

## Home.php

1. Bagian PHP

```
<?php 
require_once('koneksi.php'); 
include('navbar.php'); 
?>
```
- 'require_once('koneksi.php');': Memasukkan file koneksi.php hanya sekali untuk mengatur koneksi ke basis data. Jika file ini gagal dimuat, skrip akan berhenti.
- 'include('navbar.php');': Menyertakan file navbar.php yang kemungkinan berisi kode HTML untuk navbar. Ini memungkinkan Anda untuk memisahkan bagian tampilan yang dapat digunakan kembali (navbar) dari konten halaman utama.

2. Struktur HTML
```
<!DOCTYPE html>
<html lang="en">
```
- '<!DOCTYPE html>': Menyatakan bahwa dokumen ini adalah HTML5.
- '<html lang="en">': Elemen root dari dokumen HTML yang menyatakan bahwa bahasa yang digunakan adalah bahasa Inggris (en).

3. Bagian <head>

```
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #F5F5DC, #ADD8E6); /* Gradasi latar belakang dari krem ke biru muda */
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
    <title>Home</title>
</head>
```
- '<meta charset="UTF-8">': Menetapkan encoding karakter untuk dokumen sebagai UTF-8.
- '<meta name="viewport" content="width=device-width, initial-scale=1.0">': Mengatur tampilan untuk responsif pada perangkat dengan berbagai ukuran layar.
- '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" ...>': Menyertakan file CSS Bootstrap dari CDN untuk desain dan styling responsif.
- '<style>': CSS khusus untuk halaman ini:
    - 'body { background: linear-gradient(to right, #F5F5DC, #ADD8E6); ... }': Mengatur latar belakang halaman dengan gradasi dari krem (#F5F5DC) ke biru muda (#ADD8E6), serta mengatur warna teks, margin, padding, tinggi, dan tata letak Flexbox.
    - '.container { text-align: center; ... }': Mengatur teks di dalam elemen dengan kelas .container agar berada di tengah halaman. margin-top: auto dan margin-bottom: auto digunakan untuk menempatkan konten di tengah vertikal halaman.
- '<title>Home</title>': Menentukan judul halaman yang akan ditampilkan di tab browser.

4. Bagian <body>

```
<body>
    <div class="container">
        <h1>TUGAS 2 <br> PHP OOP CASE STUDY</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
```

- '<div class="container">': Elemen dengan kelas Bootstrap container yang memberikan padding horizontal dan menyusun konten di tengah halaman.
- '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>': Menyertakan file JavaScript Bootstrap dari CDN untuk mengaktifkan fungsi interaktif seperti dropdowns, modals, dan collapses.

## Source Code

```
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
```

## Reports.php

1. Bagian PHP
```
<?php 
// Menghubungkan ke file koneksi.php untuk mengakses database
require_once ('koneksi.php');
// Menyertakan file navbar.php untuk menampilkan navigasi
include('navbar.php');

// Membuat class data yang mewarisi class database
class data extends database {
    // Konstruktor class yang memanggil konstruktor dari class induk
    public function __construct() {
        parent::__construct(); // Memanggil konstruktor class Database
    }

    // Method untuk menampilkan data dari tabel reports
    public function tampilData() {
        $tampil = "SELECT * FROM reports"; // Query SQL untuk memilih semua data dari tabel reports
        $result = $this->conn->query($tampil); // Menjalankan query dan mendapatkan hasilnya
        if (!$result) {
            // Menampilkan pesan error jika query gagal
            die('Query Error: ' . $this->conn->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil query dalam bentuk array asosiatif
    }
}

// Membuat objek dari class data dan memanggil method tampilData
$data = new data();
$db = $data->tampilData(); // Mendapatkan data dari tabel reports
?>
```
- Class 'data':
- 'extends database': Menyatakan bahwa class data mewarisi dari class database. Ini berarti data akan memiliki semua metode dan properti dari database.
- 'public function __construct()': Konstruktor dari class data yang memanggil konstruktor dari class induk (database) untuk menginisialisasi koneksi basis data.
- 'public function tampilData()': Metode untuk mengambil data dari tabel reports:
    - '$tampil = "SELECT * FROM reports";': Menyusun query SQL untuk memilih semua kolom dari tabel reports.
    - '$result = $this->conn->query($tampil);': Menjalankan query menggunakan koneksi basis data yang diwarisi dari class database.
    - 'if (!$result) { die('Query Error: ' . $this->conn->error); }': Memeriksa apakah query berhasil, dan jika tidak, menampilkan pesan error.
    - 'return $result->fetch_all(MYSQLI_ASSOC);': Mengambil semua hasil query sebagai array asosiatif dan mengembalikannya.
- '$data = new data();': Membuat objek baru dari class data.
- '$db = $data->tampilData();': Memanggil metode tampilData pada objek $data untuk mendapatkan data dari tabel reports.

2. Bagian HTML

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar responsif di berbagai perangkat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Menghubungkan file CSS Bootstrap -->
    <title>tampil Reports</title> <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <!-- Membuat tabel untuk menampilkan data dengan gaya Bootstrap -->
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active table-success">
            <!-- Header tabel dengan judul kolom -->
            <th class="text-center">No.</th>
            <th class="text-center">Id Reports</th>
            <th class="text-center">Id Warnings</th>
            <th class="text-center">Id Gpas</th>
            <th class="text-center">Id Guidance</th>
            <th class="text-center">Id Achievements</th>
            <th class="text-center">Id Scholarship</th>
            <th class="text-center">Id Student Withdrawals</th>
            <th class="text-center">Id Tuition Arrears</th>
            <th class="text-center">Report Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Has Acc Academic Advisor</th>
            <th class="text-center">Has Acc Head Of Program</th>
        </tr>
        <?php
        $no = 1; // Inisialisasi nomor urut
        foreach ($db as $row) {
        ?>
        <tr>
            <!-- Menampilkan data dalam baris tabel -->
            <td class="text-center"><?php echo $no++; ?></td>
            <td class="text-center"><?php echo $row['id_reports']; ?></td>
            <td class="text-center"><?php echo $row['id_warnings']; ?></td>
            <td class="text-center"><?php echo $row['id_gpas']; ?></td>
            <td class="text-center"><?php echo $row['id_guidance']; ?></td>
            <td class="text-center"><?php echo $row['id_achievements']; ?></td>
            <td class="text-center"><?php echo $row['id_sholarship']; ?></td>
            <td class="text-center"><?php echo $row['id_student_withdrawals']; ?></td>
            <td class="text-center"><?php echo $row['id_tuition_arrears']; ?></td>
            <td class="text-center"><?php echo $row['report_date']; ?></td>
            <td class="text-center"><?php echo $row['status']; ?></td>
            <td class="text-center"><?php echo $row['has_acc_academic_advisor'] == 1 ? 'Yes' : 'No'; ?></td>
            <td class="text-center"><?php echo $row['has_acc_head_of_program'] == 1 ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan file JavaScript Bootstrap untuk komponen interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

#### Loop PHP untuk Menampilkan Data:
- '$no = 1;': Menginisialisasi nomor urut untuk menampilkan nomor baris.
- 'foreach ($db as $row) { ... }': Mengiterasi data yang diambil dari database dan menampilkan setiap baris dalam tabel.
- '<td class="text-center"><?php echo $no++; ?></td>': Menampilkan nomor urut.
- '<td class="text-center"><?php echo $row['id_reports']; ?></td>': Menampilkan nilai kolom dari tabel reports untuk setiap baris.
- '<?php echo $row['has_acc_academic_advisor'] == 1 ? 'Yes' : 'No'; ?>': Menampilkan 'Yes' jika nilai kolom `

## Source Code

```
<?php 
// Menghubungkan ke file koneksi.php untuk mengakses database
require_once ('koneksi.php');
// Menyertakan file navbar.php untuk menampilkan navigasi
include('navbar.php');

// Membuat class data yang mewarisi class database
class data extends database {
    // Konstruktor class yang memanggil konstruktor dari class induk
    public function __construct() {
        parent::__construct(); // Memanggil konstruktor class Database
    }

    // Method untuk menampilkan data dari tabel reports
    public function tampilData() {
        $tampil = "SELECT * FROM reports"; // Query SQL untuk memilih semua data dari tabel reports
        $result = $this->conn->query($tampil); // Menjalankan query dan mendapatkan hasilnya
        if (!$result) {
            // Menampilkan pesan error jika query gagal
            die('Query Error: ' . $this->conn->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil query dalam bentuk array asosiatif
    }
}

// Membuat objek dari class data dan memanggil method tampilData
$data = new data();
$db = $data->tampilData(); // Mendapatkan data dari tabel reports
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar responsif di berbagai perangkat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Menghubungkan file CSS Bootstrap -->
    <title>tampil Reports</title> <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <!-- Membuat tabel untuk menampilkan data dengan gaya Bootstrap -->
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active table-success">
            <!-- Header tabel dengan judul kolom -->
            <th class="text-center">No.</th>
            <th class="text-center">Id Reports</th>
            <th class="text-center">Id Warnings</th>
            <th class="text-center">Id Gpas</th>
            <th class="text-center">Id Guidance</th>
            <th class="text-center">Id Achievements</th>
            <th class="text-center">Id Scholarship</th>
            <th class="text-center">Id Student Withdrawals</th>
            <th class="text-center">Id Tuition Arrears</th>
            <th class="text-center">Report Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Has Acc Academic Advisor</th>
            <th class="text-center">Has Acc Head Of Program</th>
        </tr>
        <?php
        $no = 1; // Inisialisasi nomor urut
        foreach ($db as $row) {
        ?>
        <tr>
            <!-- Menampilkan data dalam baris tabel -->
            <td class="text-center"><?php echo $no++; ?></td>
            <td class="text-center"><?php echo $row['id_reports']; ?></td>
            <td class="text-center"><?php echo $row['id_warnings']; ?></td>
            <td class="text-center"><?php echo $row['id_gpas']; ?></td>
            <td class="text-center"><?php echo $row['id_guidance']; ?></td>
            <td class="text-center"><?php echo $row['id_achievements']; ?></td>
            <td class="text-center"><?php echo $row['id_sholarship']; ?></td>
            <td class="text-center"><?php echo $row['id_student_withdrawals']; ?></td>
            <td class="text-center"><?php echo $row['id_tuition_arrears']; ?></td>
            <td class="text-center"><?php echo $row['report_date']; ?></td>
            <td class="text-center"><?php echo $row['status']; ?></td>
            <td class="text-center"><?php echo $row['has_acc_academic_advisor'] == 1 ? 'Yes' : 'No'; ?></td>
            <td class="text-center"><?php echo $row['has_acc_head_of_program'] == 1 ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan file JavaScript Bootstrap untuk komponen interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

## Withdrawals.php
1. Bagian PHP

```
<?php 
// Menghubungkan ke file koneksi.php untuk mengakses database
require_once('koneksi.php');
// Menyertakan file navbar.php untuk menampilkan navigasi
include('navbar.php');

// Membuat objek dari class Withdrawals
$data = new Withdrawals();
// Mengambil data dari tabel student_withdrawals
$a = $data->tampilData();
?>
```

- 'require_once('koneksi.php');': Memasukkan file koneksi.php yang berisi pengaturan koneksi basis data, memastikan file hanya dimuat sekali.
- 'include('navbar.php');': Menyertakan file navbar.php untuk menampilkan navbar di halaman, memungkinkan penggunaan kode navbar yang terpisah.
- '$data = new Withdrawals();': Membuat objek baru dari class Withdrawals, yang diharapkan memiliki metode untuk mengakses data terkait penarikan mahasiswa.
- '$a = $data->tampilData();': Memanggil metode tampilData dari objek Withdrawals untuk mendapatkan data dari tabel student_withdrawals dan menyimpannya dalam variabel $a.

2. Bagian HTML

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar responsif di berbagai perangkat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Menghubungkan file CSS Bootstrap -->
    <title>tampil Withdrawals</title> <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <!-- Membuat tabel untuk menampilkan data dengan gaya Bootstrap -->
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active table-success">
            <!-- Header tabel dengan judul kolom -->
            <th class="text-center">No.</th>
            <th class="text-center">Id Student Withdrawals</th>
            <th class="text-center">Id Student</th>
            <th class="text-center">Withdrawal Type</th>
            <th class="text-center">Decree Number</th>
            <th class="text-center">Reason</th>
        </tr>
        <?php 
        $no = 1; // Inisialisasi nomor urut
        // Menampilkan setiap baris data dari hasil query
        foreach($a as $row){
            ?>
            <tr>
                <!-- Menampilkan data dalam baris tabel -->
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $row['id_student_withdrawals'];?></td>
                <td class="text-center"><?php echo $row['id_student'];?></td>
                <td class="text-center"><?php echo $row['withdrawals_type'];?></td>
                <td class="text-center"><?php echo $row['decree_number'];?></td>
                <td class="text-center"><?php echo $row['reason'];?></td>
            </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan file JavaScript Bootstrap untuk komponen interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```
<meta charset="UTF-8">: Menetapkan encoding karakter UTF-8 untuk halaman web.

- '<meta name="viewport" content="width=device-width, initial-scale=1.0">': Menyusun tampilan halaman agar responsif di perangkat dengan berbagai ukuran layar.
- '<link href="...">': Menghubungkan file CSS Bootstrap untuk styling halaman dan tabel.
- '<title>tampil Withdrawals</title>': Judul halaman yang muncul di tab browser.
- '<table class="table table-bordered border-primary">': Membuat tabel dengan styling Bootstrap, termasuk border dan font Verdana.
- '<tr class="table-active table-success">': Baris header tabel dengan styling Bootstrap.
- '<?php foreach($a as $row){ ?> ... <?php } ?>: Mengiterasi setiap baris data yang diambil dari basis data dan menampilkannya dalam baris tabel HTML.
- '<script src="...">': Menghubungkan file JavaScript Bootstrap untuk fitur interaktif seperti dropdown atau modals.

## Source Code

```
<?php 
// Menghubungkan ke file koneksi.php untuk mengakses database
require_once('koneksi.php');
// Menyertakan file navbar.php untuk menampilkan navigasi
include('navbar.php');

// Membuat objek dari class Withdrawals
$data = new Withdrawals();
// Mengambil data dari tabel student_withdrawals
$a = $data->tampilData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar responsif di berbagai perangkat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Menghubungkan file CSS Bootstrap -->
    <title>tampil Widrawals</title> <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <!-- Membuat tabel untuk menampilkan data dengan gaya Bootstrap -->
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active table-success">
            <!-- Header tabel dengan judul kolom -->
            <th class="text-center">No.</th>
            <th class="text-center">Id Student Withdrawals</th>
            <th class="text-center">Id Student</th>
            <th class="text-center">Withdrawal Type</th>
            <th class="text-center">Decree Number</th>
            <th class="text-center">Reason</th>
        </tr>
        <?php 
        $no = 1; // Inisialisasi nomor urut
        // Menampilkan setiap baris data dari hasil query
        foreach($a as $row){
            ?>
            <tr>
                <!-- Menampilkan data dalam baris tabel -->
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $row['id_student_withdrawals'];?></td>
                <td class="text-center"><?php echo $row['id_student'];?></td>
                <td class="text-center"><?php echo $row['withdrawals_type'];?></td>
                <td class="text-center"><?php echo $row['decree_number'];?></td>
                <td class="text-center"><?php echo $row['reason'];?></td>
            </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan file JavaScript Bootstrap untuk komponen interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

## AcademicAdvisor.php
1. Bagian PHP

```
<?php
// Menghubungkan dengan file koneksi.php dan navbar.php
require_once('koneksi.php'); // Menghubungkan file koneksi.php untuk akses database
require_once('navbar.php'); // Menghubungkan file navbar.php untuk menampilkan navigasi

// Membuat class DosenWali yang mewarisi class Withdrawals
class DosenWali extends Withdrawals {
    public function __construct() {
        parent::__construct(); // Memanggil konstruktor class Withdrawals
    }
    
    // Method ini digunakan untuk menampilkan data dari tabel student_withdrawals
    // dengan syarat decree_number harus 100
    public function tampilData() {
        $sql = "SELECT * FROM student_withdrawals WHERE decree_number='100'"; // Query SQL
        $result = $this->conn->query($sql); // Menjalankan query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil sebagai array asosiatif
    }
}

// Membuat objek dari class DosenWali
$data = new DosenWali();
$a = $data->tampilData(); // Mendapatkan data dari tabel
?>
```

- 'require_once('koneksi.php');': Mengimpor file koneksi basis data.
- 'require_once('navbar.php');': Mengimpor file yang berisi navbar.
- 'class DosenWali extends Withdrawals': Mendefinisikan class DosenWali yang mewarisi dari Withdrawals.
- 'public function tampilData()': Mendefinisikan method untuk mengambil data dari tabel student_withdrawals dengan decree_number yang harus '100'.
    - '$data = new DosenWali();': Membuat objek DosenWali.
    - '$a = $data->tampilData();': Mengambil data dari method tampilData.

2. Bagian HTML

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Encoding karakter UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsif untuk berbagai perangkat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Menghubungkan CSS Bootstrap -->
    <title>Academic Advisor</title> <!-- Judul halaman -->
</head>
<body>
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active table-success">
            <!-- Header tabel -->
            <th class="text-center">No.</th>
            <th class="text-center">Id Student Withdrawals</th>
            <th class="text-center">Id Student</th>
            <th class="text-center">Withdrawal Type</th>
            <th class="text-center">Decree Number</th>
            <th class="text-center">Reason</th>
        </tr>
        <?php 
        $no = 1; // Nomor urut
        foreach($a as $row) { // Iterasi setiap baris data
        ?>
        <tr>
            <!-- Menampilkan data dalam baris tabel -->
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $row['id_student_withdrawals']; ?></td>
            <td class="text-center"><?php echo $row['id_student']; ?></td>
            <td class="text-center"><?php echo $row['withdrawals_type']; ?></td>
            <td class="text-center"><?php echo $row['decree_number']; ?></td>
            <td class="text-center"><?php echo $row['reason']; ?></td>
        </tr>
        <?php 
        } 
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

- '<meta charset="UTF-8">': Menetapkan encoding karakter sebagai UTF-8.
- '<meta name="viewport" content="width=device-width, initial-scale=1.0">': Mengatur tampilan responsif untuk perangkat.
- '<link href="...">': Menghubungkan ke file CSS Bootstrap.
- '<table class="table table-bordered border-primary">': Membuat tabel dengan styling Bootstrap.
- '<?php foreach($a as $row) { ?>': Mengiterasi dan menampilkan data dari PHP dalam tabel HTML.

## Source Code

```
<?php
// Menghubungkan dengan file koneksi.php dan navbar.php
require_once('koneksi.php'); // Menghubungkan file koneksi.php untuk mengakses database
require_once('navbar.php'); // Menghubungkan file navbar.php untuk menampilkan navigasi

// Membuat class DosenWali yang mewarisi class Withdrawals
class DosenWali extends Withdrawals {
    public function __construct() {
        parent::__construct(); // Memanggil konstruktor dari class Withdrawals
    }
    
    // Method ini digunakan untuk menampilkan data dari tabel student_withdrawals
    // dengan syarat decree_number harus 100
    public function tampilData() {
        $sql = "SELECT * FROM student_withdrawals WHERE decree_number='100'"; // Query SQL untuk memilih data
        $result = $this->conn->query($sql); // Menjalankan query dan menyimpan hasilnya
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil sebagai array asosiatif
    }
}

// Membuat objek dari class DosenWali
$data = new DosenWali();
$a = $data->tampilData(); // Memanggil method tampilData() untuk mendapatkan data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding yang digunakan, yaitu UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar sesuai dengan perangkat yang digunakan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Academic Advisor</title> <!-- Menentukan judul halaman yang tampil di tab browser -->
</head>
<body>
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active table-success">
            <!-- Baris header tabel dengan warna latar belakang khusus -->
            <th class="text-center">No.</th> <!-- Nomor urut -->
            <th class="text-center">Id Student Withdrawals</th> <!-- ID untuk student withdrawals -->
            <th class="text-center">Id Student</th> <!-- ID untuk student -->
            <th class="text-center">Withdrawal Type</th> <!-- Jenis pengunduran diri -->
            <th class="text-center">Decree Number</th> <!-- Nomor keputusan -->
            <th class="text-center">Reason</th> <!-- Alasan pengunduran diri -->
        </tr>
        <?php 
        $no = 1; // Inisialisasi nomor urut
        foreach($a as $row) { // Mengulangi setiap baris data dari hasil query
        ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td> <!-- Menampilkan nomor urut -->
            <td class="text-center"><?php echo $row['id_student_withdrawals']; ?></td> <!-- Menampilkan ID student withdrawals -->
            <td class="text-center"><?php echo $row['id_student']; ?></td> <!-- Menampilkan ID student -->
            <td class="text-center"><?php echo $row['withdrawals_type']; ?></td> <!-- Menampilkan jenis pengunduran diri -->
            <td class="text-center"><?php echo $row['decree_number']; ?></td> <!-- Menampilkan nomor keputusan -->
            <td class="text-center"><?php echo $row['reason']; ?></td> <!-- Menampilkan alasan pengunduran diri -->
        </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan file JavaScript Bootstrap untuk mengaktifkan komponen interaktif seperti dropdown atau modals -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

## HeadOfAdvisor.php

1. Bagian PHP

```
<?php 
// Menghubungkan ke file koneksi.php untuk akses database dan navbar.php untuk menu navigasi
require_once('koneksi.php'); // Mengimpor file koneksi database
require_once('navbar.php'); // Mengimpor file navbar

// Mendefinisikan class KoorProdi yang mewarisi class Withdrawals
class KoorProdi extends Withdrawals {
    public function __construct() {
        parent::__construct(); // Memanggil konstruktor dari class Withdrawals
    }
    
    // Method untuk menampilkan data dari tabel student_withdrawals dengan decree_number = 300
    public function tampilData() {
        $sql = "SELECT * FROM student_withdrawals WHERE decree_number='300'"; // Query SQL
        $result = $this->conn->query($sql); // Menjalankan query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil sebagai array asosiatif
    }
}

// Membuat objek dari class KoorProdi
$data = new KoorProdi();
$a = $data->tampilData(); // Mengambil data menggunakan method tampilData
?>
```

- 'require_once('koneksi.php');': Mengimpor file koneksi untuk database.
- 'require_once('navbar.php');': Mengimpor file yang berisi navbar.
- 'class KoorProdi extends Withdrawals': Mendefinisikan class KoorProdi yang mewarisi Withdrawals.
- 'public function tampilData()': Method untuk mengambil data dari tabel 'student_withdrawals' di mana decree_number adalah '300'.
- '$data = new KoorProdi();': Membuat instance dari KoorProdi.
- '$a = $data->tampilData();': Mengambil data dari database.

2. Bagian HTML

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Encoding karakter UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsif di perangkat mobile -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Menghubungkan ke CSS Bootstrap -->
    <title>Head of Program</title> <!-- Judul halaman -->
</head>
<body>
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active">
            <!-- Header tabel -->
            <th class="text-center">No.</th>
            <th class="text-center">Id Student Withdrawals</th>
            <th class="text-center">Id Student</th>
            <th class="text-center">Withdrawal Type</th>
            <th class="text-center">Decree Number</th>
            <th class="text-center">Reason</th>
        </tr>
        <?php 
        $no = 1; // Nomor urut
        foreach($a as $row) { // Mengulangi setiap baris data
        ?>
        <tr>
            <!-- Menampilkan data dalam tabel -->
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $row['id_student_withdrawals']; ?></td>
            <td class="text-center"><?php echo $row['id_student']; ?></td>
            <td class="text-center"><?php echo $row['withdrawals_type']; ?></td>
            <td class="text-center"><?php echo $row['decree_number']; ?></td>
            <td class="text-center"><?php echo $row['reason']; ?></td>
        </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan ke JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

- '<meta charset="UTF-8">': Menetapkan encoding karakter.
- '<meta name="viewport" content="width=device-width, initial-scale=1.0">': Mengatur responsivitas tampilan.
- '<link href="...">': Menghubungkan ke file CSS Bootstrap untuk styling.
- '<table class="table table-bordered border-primary">': Membuat tabel dengan styling Bootstrap.
- '<?php foreach($a as $row) { ?>': Mengulangi dan menampilkan data dari PHP dalam tabel HTML.

## Source Code

```
<?php 
// Menghubungkan ke file koneksi.php untuk akses database dan navbar.php untuk menu navigasi
require_once('koneksi.php'); // Menghubungkan ke file yang mengatur koneksi database
require_once('navbar.php'); // Menghubungkan ke file yang berisi navbar

// Membuat class KoorProdi yang mewarisi dari class Withdrawals
class KoorProdi extends Withdrawals {
    public function __construct() {
        parent::__construct(); // Memanggil konstruktor dari class Withdrawals
    }
    
    // Method untuk menampilkan data dari tabel student_withdrawals dengan decree_number = 300
    public function tampilData() {
        $sql = "SELECT * FROM student_withdrawals WHERE decree_number='300'"; // Query SQL untuk memilih data
        $result = $this->conn->query($sql); // Menjalankan query dan mendapatkan hasil
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil query sebagai array asosiatif
    }
}

// Membuat objek dari class KoorProdi
$data = new KoorProdi();
$a = $data->tampilData(); // Mengambil data menggunakan method tampilData
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding halaman sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar responsif di perangkat mobile -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Menghubungkan ke file CSS Bootstrap untuk styling -->
    <title>Head of Program</title> <!-- Judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <table style="font-family: verdana" class="table table-bordered border-primary">
        <tr class="table-active">
            <!-- Baris header tabel dengan latar belakang aktif -->
            <th class="text-center">No.</th> <!-- Nomor urut -->
            <th class="text-center">Id Student Withdrawals</th> <!-- ID student withdrawals -->
            <th class="text-center">Id Student</th> <!-- ID student -->
            <th class="text-center">Withdrawal Type</th> <!-- Jenis pengunduran diri -->
            <th class="text-center">Decree Number</th> <!-- Nomor keputusan -->
            <th class="text-center">Reason</th> <!-- Alasan pengunduran diri -->
        </tr>
        <?php 
        $no = 1; // Inisialisasi nomor urut
        foreach($a as $row) { // Mengulangi setiap baris data dari hasil query
        ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td> <!-- Menampilkan nomor urut -->
            <td class="text-center"><?php echo $row['id_student_withdrawals']; ?></td> <!-- Menampilkan ID student withdrawals -->
            <td class="text-center"><?php echo $row['id_student']; ?></td> <!-- Menampilkan ID student -->
            <td class="text-center"><?php echo $row['withdrawals_type']; ?></td> <!-- Menampilkan jenis pengunduran diri -->
            <td class="text-center"><?php echo $row['decree_number']; ?></td> <!-- Menampilkan nomor keputusan -->
            <td class="text-center"><?php echo $row['reason']; ?></td> <!-- Menampilkan alasan pengunduran diri -->
        </tr>
        <?php 
        } 
        ?>
    </table>
    <!-- Menghubungkan ke file JavaScript Bootstrap untuk fungsionalitas interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
```

## Output Program

1. Home

   ![Screenshot (164)](https://github.com/user-attachments/assets/bbe82f6f-90b1-4412-9437-83d5ef31ce52)
 <pre></pre>
 
2. Tampil Report

   ![Screenshot (165)](https://github.com/user-attachments/assets/8024908e-26ea-4b41-b3df-f9608b8de2dd)
 <pre></pre>
 
3. Tampil Withdrawals

   ![Screenshot (166)](https://github.com/user-attachments/assets/92049824-399e-4e70-a5b2-4cad02ff5e9c)
 <pre></pre>
 
4. Tampil Academic Advisor

   ![Screenshot (167)](https://github.com/user-attachments/assets/34455db3-0ecf-4dc6-a37e-70425745d144)
 <pre></pre>
 
5. Tampil Head Of Program

   ![Screenshot (168)](https://github.com/user-attachments/assets/fa3a3626-b3d2-468f-b478-3d1b16f9e4ae)
   <pre></pre>
   <pre></pre>

****End****






