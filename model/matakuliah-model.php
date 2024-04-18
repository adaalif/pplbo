<?php 
class Matakuliah_model {
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

}
?>
