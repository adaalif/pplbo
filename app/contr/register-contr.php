<?php
require_once 'model/model.php';
class RegisterController {
    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function registerUser($nim, $password, $confirm_password) {
        if ($password != $confirm_password) {
            echo "<script>window.location.replace('register.html');</script>";
            return "password tidak sama";
           
        }

        return $this->model->registerUser($nim, $password);
    }
}
