<?php
require_once '../model/dosen_Model.php'; // Use the correct file path

class Dosen_controller {
    private $model;

    public function __construct() {
        $this->model = new Dosen_Model();
    }

    public function login($nip, $password) {
        return $this->model->login($nip, $password);
    }

    public function checkNip($nip) {
        return $this->model->checkNip($nip);
    }

    public function registerDosen($nip, $password) {
        return $this->model->registerDosen($nip, $password);
    }

    public function validateDosen($nip) {
        return $this->model->validateDosen($nip);
    }
}
?>
