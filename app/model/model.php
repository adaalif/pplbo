<?php
require_once 'connection.php';

class MahasiswaModel {
    private $conn;

    public function __construct() {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }
}
?>
