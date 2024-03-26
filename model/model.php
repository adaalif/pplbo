<?php
require_once 'connection.php';

class Model {
    private $conn;

    public function __construct() {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function checknim($nim) {
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
    public function registerUser($nim, $password) {
        $nim = mysqli_real_escape_string($this->conn, $nim);
        $password = mysqli_real_escape_string($this->conn, $password);

        $check_query = "SELECT * FROM nim WHERE nim='$nim'";
        $check_akunlain = "SELECT * FROM user WHERE nim='$nim'";
        $result = mysqli_query($this->conn, $check_query);
        $result_check_akun = mysqli_query($this->conn, $check_akunlain);

        if (!$result) {
            return "Error: " . mysqli_error($this->conn);
        }

        $num_rows = mysqli_num_rows($result);
        $num_rows_akun = mysqli_num_rows($result_check_akun);
        if ($num_rows == 0) {
            return "nim tidak dalam database";
        }
        if ($num_rows_akun > 0) {
            return "nim sudah terdaftar";
        }

        $insert_query = "INSERT INTO user (nim, password) VALUES ('$nim', '$password')";
        if (mysqli_query($this->conn, $insert_query)) {
            return "berhasil registrasi";
        } else {
            return "Error: " . $insert_query . "<br>" . mysqli_error($this->conn);
        }
    }
}
?>
