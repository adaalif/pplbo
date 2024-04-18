    <?php 
    class Mahasiswa_model{
        private $table = 'data_mahasiswa';
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getAllMahsiswa(){
            $this->db->query('SELECT * FROM '. $this->table );
            return $this->db->resultSet();
        }
        public function getMahsiswaByNim($nim){
            $this->db->query('SELECT * FROM '. $this->table .' WHERE nim=:nim');
            $this->db->bind('nim', $nim);
            return $this->db->single();
        }
        public function tambahDataMahasiswa($data){
            $query = "INSERT INTO mahasiswa VALUES
                    ('', :nama, :nim, '')";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nim', $data['nim']);
            $this->db->execute();

            return $this->db->rowCount();
        }
        public function hapusDataMahasiswa($nim){
            $query = "DELETE FROM mahasiswa WHERE nim=:nim";
            $this->db->query($query);
            $this->db->bind('nim', $nim);
            $this->db->execute();
            return $this->db->rowCount();
        }
        public function ubahDataMahsiswa($data){
            $query = "UPDATE mahasiswa SET
                nama=:nama,
                nim=:nim,
                WHERE nim=:nim";
            $this->db->query($query);
            $this->db->bind('nim', $data['nim']);
            $this->db->bind('nama', $data['nama']);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function cariDataMahasiswa(){
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM nim WHERE nama LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            $this->db->execute();
            return $this->db->resultSet();
        }
        public function getName($nim) {
            $this->db->query("SELECT nama FROM $this->table WHERE nim = :nim");
            $this->db->bind(':nim', $nim);
            $this->db->execute();
            return $this->db->single()->nama;
        }
    
        public function insertMataKuliah($nim, $nama, $kode_kelas) {
            $query = "INSERT INTO data_kelas_mahasiswa (nim, nama, kode_kelas) VALUES (:nim, :nama, :kode_kelas)";
            $this->db->query($query);
            $this->db->bind(':nim', $nim);
            $this->db->bind(':nama', $nama);
            $this->db->bind(':kode_kelas', $kode_kelas);
            $this->db->execute();
            return $this->db->rowCount() > 0;
        }
        public function getUserByNim($nim, $password){
            $this->db->query('SELECT nim, Password FROM user WHERE nim=:nim AND Password=:password');
            $this->db->bind(':nim', $nim);
            $this->db->bind(':password', $password);
            return $this->db->single();
        }
        
    }