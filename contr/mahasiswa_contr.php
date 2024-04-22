<?php 
require_once '../model/mahasiswa_model.php';

class Mahasiswa_controller {
    private $model;

    public function __construct() {
        $this->model = new Mahasiswa_model();
    }

    public function checkNim($nim) {
        return $this->model->checkNim($nim);
    }

    public function registerUser($nim, $password) {
        return $this->model->registerUser($nim, $password);
    }


    public function validateStudent($nim) {
        return $this->model->validateStudent($nim);
    }
    public function login($nim,$password){
        return $this->model->login($nim, $password);
    }
    // Tambahkan fungsi lain sesuai kebutuhan
}
?>
