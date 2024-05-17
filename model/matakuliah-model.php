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
    if($this->cekMahasiswaSudahAdaNilai($nim,$kode_kelas)) {
        echo "<script>alert('Mahasiswa sudah memiliki nilai di tabel nilai dan tidak bisa dihapus.');</script>";
        return false; 
    }
    else {
        $this->query('DELETE FROM data_kelas_mahasiswa WHERE kode_kelas=:kode_kelas and nim = :nim');
        $this->bind(':kode_kelas', $kode_kelas);
        $this->bind(':nim', $nim);
        $this->execute(); 

        $this->query('DELETE FROM nilai WHERE nim = :nim AND kode_kelas = :kode_kelas');
        $this->bind(':kode_kelas', $kode_kelas);
        $this->bind(':nim', $nim);
        $this->execute(); 

        return true; 
    }
}

    

    public function getUniqueTipes() {
        $this->query("SELECT DISTINCT tipe FROM kelas");
        return $this->resultSet();
}
public function getKelasByTipe($tipe) {
    $this->query("SELECT * FROM kelas WHERE tipe = :tipe");
    $this->bind(':tipe', $tipe);
    return $this->resultSet();
}

public function getMataKuliahDanNilaiByNIM($nim) {
    $sql = "SELECT kelas.mata_kuliah, nilai.nilai 
            FROM kelas 
            JOIN nilai ON kelas.kode_kelas = nilai.kode_kelas 
            WHERE nilai.nim = :nim";
    $this->query($sql);
    $this->bind(':nim', $nim);
    return $this->resultSet();
}

public function getJadwalKelasByNIM($nim) {
    $sql = "SELECT k.kode_kelas, k.mata_kuliah, k.waktu, k.ruangan, k.tipe, d.nama
            FROM kelas k
            JOIN data_kelas_mahasiswa dkm ON k.kode_kelas = dkm.kode_kelas
            JOIN dosen d ON k.nip = d.nip
            WHERE dkm.nim = :nim";
    $this->query($sql);
    $this->bind(':nim', $nim);
    return $this->resultSet();
}
public function getJadwalKelas() {
    $sql = "SELECT k.kode_kelas, k.mata_kuliah, k.waktu, d.nama
            FROM kelas k
            JOIN dosen d ON k.nip = d.nip";
    $this->query($sql);
    return $this->resultSet();
}
public function insertMahasiswa($nama, $nim, $kode_kelas) {
    $this->query('INSERT INTO nilai (nama, nim, kode_kelas) VALUES (:nama, :nim, :kode_kelas)');
    $this->bind(':nama', $nama);
    $this->bind(':nim', $nim);
    $this->bind(':kode_kelas', $kode_kelas);
    if ($this->execute()) {
        return true; 
    } else {
        return false; 
    }
}
public function cekMahasiswaSudahAdaNilai($nim, $kode_kelas) {
    $this->query('SELECT nilai FROM nilai WHERE nim = :nim and kode_kelas = :kode_kelas');
    $this->bind(':nim', $nim);
    $this->bind(':kode_kelas', $kode_kelas);

    $this->execute();
    
    $result = $this->single(); 
    if($result && $result['nilai'] !== null){
        return true; 
    } else {
        return false; 
    }
}

}
?>