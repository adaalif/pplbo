<?php
require_once '../model/dosen_Model.php'; 

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
    public function getAllKelasbyNIP($nip){
        return $this->model->getAllKelasbyNIP($nip);
    }
    public function checkLoginSession(){
        return $this -> model->checkLoginSession();
    }
    public function getAllStudentsByKodeKelas($kode_kelas) {
        return $this->model->getAllStudentsByKodeKelas($kode_kelas);
    }
    public function insertNilai($nim, $kode_kelas, $nilai) {
        return $this->model->insertNilai($nim, $kode_kelas, $nilai);
    }
    public function insertNilaii($nim, $kode_kelas, $nilai) {
        require_once '../model/dosen-model.php';
        $controller = new dosen_model();
    }
    public function getAndUpdateStudentsAndGrades($kode_kelas, $updateData = null) {
        return $this->model->getAndUpdateStudentsAndGrades($kode_kelas, $updateData);
    }
    
}
?>
