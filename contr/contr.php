<?php
require_once 'model/model.php';

class Controller {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function checkLoginSession() {
        session_start();
        if (!isset($_SESSION["nim"])) {
            header("Location: index.html");
            exit();
        }
    }

    public function validateCredentials() {
        $nim = $_SESSION["nim"];
        return $this->model->validateCredentials($nim);
    }

    public function getClassData() {
        return $this->model->getClassData();
    }
    
}
class RegisterController {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function registerUser($nim, $password, $confirm_password) {
        if ($password != $confirm_password) {
            return "password tidak sama";
            echo "<script>window.location.replace('register.html');</script>";
        }

        return $this->model->registerUser($nim, $password);
    }
}
?>
