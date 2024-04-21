<?php 
require_once '../model/matakuliah-model.php';

class Matakuliah_controller {
    private $model;

    public function __construct() {
        $this->model = new Mahasiswa_Model();
    }

    public function getAllKelas() {
        return $this->model->getAllKelas();
    }
    public function getAllKelasbyNIM($nim) {
        return $this->model->getAllKelasbyNIM($nim);
    }

    public function getKelasByKodeKelas($kode_kelas) {
        return $this->model->getKelasByKodeKelas($kode_kelas);
    }

}
?>
