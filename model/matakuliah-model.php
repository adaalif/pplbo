<?php
class Matakuliah_model extends Database {
    private $table = 'kelas';

    public function getAllKelas(){
        $this->query('SELECT * FROM '. $this->table );
        return $this->resultSet();
    }
    public function getAllKelasbyNIM($nim){
        $this->query('SELECT k.*, d.* FROM data_kelas_mahasiswa d
                          JOIN kelas k ON d.kode_kelas = k.kode_kelas
                          WHERE d.nim = :nim');
        $this->bind(':nim', $nim);
        return $this->resultSet();
    }
    public function getAllKelasbyNIP($nip){
        $this->query('SELECT k.*, d.* FROM kelas d
                          JOIN kelas k ON d.kode_kelas = k.kode_kelas
                          WHERE d.nip = :nip');
        $this->bind(':nip', $nip);
        return $this->resultSet();
    }
    
    

    public function getKelasByKodeKelas($kode_kelas){
        $this->query('SELECT * FROM '. $this->table .' WHERE kode_kelas=:kode_kelas');
        $this->bind(':kode_kelas', $kode_kelas);
        return $this->single();
    }
    public function pilihMataKuliah($kode_kelas, $nim){
        $this->query('INSERT INTO data_kelas_mahasiswa (kode_kelas, nim) VALUES (:kode_kelas, :nim)');
        $this->bind(':kode_kelas', $kode_kelas);
        $this->bind(':nim', $nim);

        // Execute
        if($this->execute()){
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
        $this->query('SELECT * FROM data_kelas_mahasiswa WHERE kode_kelas = :kode_kelas AND nim = :nim');
        $this->bind(':kode_kelas', $kode_kelas);
        $this->bind(':nim', $nim);
        $this->execute();
        
        if($this->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
    public function hapusMataKuliah($kode_kelas, $nim){
        $this->query('DELETE FROM data_kelas_mahasiswa WHERE kode_kelas=:kode_kelas and nim = :nim');
        $this->bind(':kode_kelas', $kode_kelas);
        $this->bind(':nim', $nim);
    
        // Execute
        if($this->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    

}
?>
