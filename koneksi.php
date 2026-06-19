<?php
// koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username MySQL kamu
    private $password = "";     // Sesuaikan dengan password MySQL kamu
    private $db_name = "db_simulasi_pbo_trpl1a_fira"; // Ganti NamaLengkap & KELAS sesuai Tahap 1
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Mengatur error mode PDO ke Exception untuk memudahkan debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>