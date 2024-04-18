<?php
require_once 'model/connection.php';

class LoginModel {

     private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByNIM($nim) {
        $stmt = $this->conn->prepare("SELECT nim, Password FROM user WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}
?>
