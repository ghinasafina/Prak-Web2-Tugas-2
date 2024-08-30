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
