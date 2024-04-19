<?php
    require '../core/database.php';

class Mahasiswa_Model {
    private $table = 'kelas';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllKelas(){
        $this->db->query('SELECT * FROM '. $this->table );
        return $this->db->resultSet();
    }

    public function getKelasByKodeKelas($kode_kelas){
        $this->db->query('SELECT * FROM '. $this->table .' WHERE kode_kelas=:kode_kelas');
        $this->db->bind(':kode_kelas', $kode_kelas);
        return $this->db->single();
    }
    public function pilihMataKuliah($kode_kelas, $nim){
        $this->db->query('INSERT INTO data_kelas_mahasiswa (kode_kelas, nim) VALUES (:kode_kelas, :nim)');
        $this->db->bind(':kode_kelas', $kode_kelas);
        $this->db->bind(':nim', $nim);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function checkLoginSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['nim'])) {
            header("Location: login.php");
            exit();
        }
    }
    public function cekPilihanMataKuliah($kode_kelas, $nim){
        $this->db->query('SELECT * FROM data_kelas_mahasiswa WHERE kode_kelas = :kode_kelas AND nim = :nim');
        $this->db->bind(':kode_kelas', $kode_kelas);
        $this->db->bind(':nim', $nim);
        $this->db->execute();
        
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    

}
?>
