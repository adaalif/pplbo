<?php 
require_once 'Mahasiswa_model.php';

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

    // Tambahkan fungsi lain sesuai kebutuhan
}
?>
