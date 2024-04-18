<?php 
$conn = mysqli_connect('localhost', 'root', '', 'mahasiswa');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
<?php
class Connection {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'mahasiswa');

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
