<?php 
require_once 'matakuliah_model.php';

class Matakuliah_controller {
    private $model;

    public function __construct() {
        $this->model = new Matakuliah_model();
    }

    public function getAllKelas() {
        return $this->model->getAllKelas();
    }

    public function getKelasByKodeKelas($kode_kelas) {
        return $this->model->getKelasByKodeKelas($kode_kelas);
    }

}
?>
