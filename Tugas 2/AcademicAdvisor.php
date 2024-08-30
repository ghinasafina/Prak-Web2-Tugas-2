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
