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
