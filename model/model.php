<?php
require_once 'connection.php';

class matakuliah {
    private $conn;

    public function __construct() {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function validateStudent($nim) {
        $sql = "SELECT nim FROM nim WHERE nim = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows == 1;
    }

    public function getMataKuliah() {
        // Query untuk mendapatkan daftar mata kuliah dari database
        $sql = "SELECT kode_kelas, mata_kuliah, dosen, waktu FROM kelas";
        $result = $this->conn->query($sql);

        $mata_kuliah = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mata_kuliah[] = $row;
            }
        }

        return $mata_kuliah;
    }
    

    
} 