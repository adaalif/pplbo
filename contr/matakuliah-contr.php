<?php
require_once 'model/matakuliah-model.php';

class StudentController {
    private $model;

    public function __construct() {
        $this->model = new matakuliah();
    }

    public function checkLoginSession() {
        session_start();
        if (!isset($_SESSION["nim"])) {
            header("Location: index.html");
            exit();
        }
    }

    public function validateStudent() {
        $nim = $_SESSION["nim"];
        return $this->model->validateStudent($nim);
    }

    public function getClassData() {
        return $this->model->getClassData();
    }
}
?>
