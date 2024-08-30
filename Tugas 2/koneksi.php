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
