<?php
require_once 'connection.php';

class Model {
    private $conn;

    public function __construct() {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function validateCredentials($nim) {
        $stmt = $this->conn->prepare("SELECT nim FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows == 1;
    }

    public function getClassData() {
        $sql_kelas = "SELECT kode_kelas, mata_kuliah, dosen_pengampu, waktu FROM kelas_teknik_informatika";
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
