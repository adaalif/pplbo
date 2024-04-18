<?php
require_once 'connection.php';

class Mahasiswa_Model {
    private $conn;

    public function __construct() {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function checkNim($nim) {
        $stmt = $this->conn->prepare("SELECT nim FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows == 1;
    }

    public function registerUser($nim, $password) {
        $nim = mysqli_real_escape_string($this->conn, $nim);
        $password = mysqli_real_escape_string($this->conn, $password);

        $checkQuery = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $checkAkunLain = "SELECT * FROM user WHERE nim='$nim'";
        $result = mysqli_query($this->conn, $checkQuery);
        $resultCheckAkun = mysqli_query($this->conn, $checkAkunLain);

        if (!$result) {
            return "Error: " . mysqli_error($this->conn);
        }

        $numRows = mysqli_num_rows($result);
        $numRowsAkun = mysqli_num_rows($resultCheckAkun);
        if ($numRows == 0) {
            return "NIM tidak ditemukan dalam database";
        }
        if ($numRowsAkun > 0) {
            return "NIM sudah terdaftar";
        }

        $insertQuery = "INSERT INTO user (nim, password) VALUES ('$nim', '$password')";
        if (mysqli_query($this->conn, $insertQuery)) {
            return "Berhasil registrasi";
        } else {
            return "Error: " . $insertQuery . "<br>" . mysqli_error($this->conn);
        }
    } 
        public function validateStudent($nim) {
        $sql = "SELECT nim FROM nim WHERE nim = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows == 1;
    }
    
}
?>
