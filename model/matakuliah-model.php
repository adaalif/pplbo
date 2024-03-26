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

    public function getClassData() {
        $sql_kelas = "SELECT kode_kelas, mata_kuliah, dosen, waktu FROM kelas";
        $result_kelas = $this->conn->query($sql_kelas);
        $kelas = [];

        if ($result_kelas->num_rows > 0) {
            while($row_kelas = $result_kelas->fetch_assoc()) {
                $kelas[] = $row_kelas;
            }
        }

        return $kelas;
    }
}
?>
