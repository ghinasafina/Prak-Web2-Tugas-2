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
