<?php
// Panggil file controller
require_once '../contr/Mahasiswa_controller.php';

// Buat objek dari kelas Mahasiswa_controller
$controller = new Mahasiswa_controller();

// Cek session login
$controller->checkLoginSession();

// Jika tidak ada parameter nim yang diberikan, kembalikan ke halaman sebelumnya

// Ambil NIM dari parameter nim
$nim = $_SESSION['nim'];

// Ambil data mahasiswa berdasarkan NIM
$mahasiswa = $controller->getAllMahasiswa($nim);

// Handle form submission for updating student's information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated values from the form
    $newAlamat = $_POST['alamat'];
    $newTempatLahir = $_POST['tempat_lahir'];
    $newTanggalLahir = $_POST['tanggal_lahir'];

    // Update the student's information
    $controller->updateMahasiswa($nim, $newAlamat, $newTempatLahir, $newTanggalLahir);

    // Redirect back to the previous page after updating
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
</head>
<body>
<div class="container">
        <nav>
          <div class="navbar">
            <div class="logo">
              <img src="/pic/logo.jpg" alt="">
              <h1>SISTEM INFORMASI AKADEMIK KEMAHASISWAAN</h1>
            </div>
            <ul>
              <li><a href="#">
                <i class="fas fa-user"></i>
                <button id="mata_kuliah" class="nav-item">Learning Path</button>
              </a>
              </li>
              <li><a href="#">
                <i class="fas fa-chart-bar"></i>
                <button id="mahasiswaBtn">Informasi Data</button>
              </a>
              </li>
              <li><a href="#">
                <i class="fas fa-tasks"></i>
                <button id="nilaiBtn" class="nav-item">Informasi Nilai</button>
              </a>
              </li>
              <li><a href="#">
                <i class="fab fa-dochub"></i>
                <select id="settingsDropdown" class="nav-item">
                    <option selected disabled>Settings</option>
                    <option value="change_email.html">Change Email</option>
                    <option value="change_password.php">Change Password</option>
                </select>
              </a>
              </li>
              <li><a href="#" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <button id="logoutBtn" class="nav-item">Logout</button>
              </a>
              </li>
            </ul>
          </div>
        </nav>
    
        <section class="main">
          <div class="main-top">
            <p>SISTEM INFORMASI AKADEMIK KEMAHASISWAAN</p>
          </div>
          <div class="main-body">
          <table class="table">
          <h2>Edit Data Mahasiswa</h2>
          <?php foreach ($mahasiswa as $row): ?>
<form method="POST" action="../Mahasiswa_controller/updateMahasiswa">
    <input type="hidden" name="nim" value="<?= $row['nim'] ?>"> <!-- Add hidden input for nim -->
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="<?= $row['alamat'] ?>"><br>
    
    <label for="tempat_lahir">Tempat Lahir:</label><br>
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>"><br>
    
    <label for="tanggal_lahir">Tanggal Lahir:</label><br>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>"><br><br>
    
    <button type="submit">Update</button>
</form>
<?php endforeach; ?>




<a href="index">Kembali</a></button>

</body>
</html>






<style>
     @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: rgb(233, 233, 233);
}
.container{
  display: flex;
  width: 2100px;
  margin: auto;
 

}
table {
            width: 100%;
            border-collapse: c  ollapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
.h2 {
    justify-content: center;
    align-items: center;
}

nav{
  position: sticky;
  top: 0;
  left: 0;
  bottom: 0;
  width: 310px;
  height: 110vh;
  background: #fff;
}
.navbar{
  width: 80%;
  margin: 0 auto;
}

table {
    width: 1400px;
    padding: 2rem;
    justify-content: center;
    align-items: center;

}

ul{
  margin: 0 auto;
  padding-top: 2rem;
}
li{
  padding-bottom: 2rem;
}
li a{
  font-size: 16px;
  color: rgb(85, 83, 83);
}

nav i{
  width: 50px;
  font-size: 18px;
  text-align: center;
}

.logout{
  position: absolute;
  bottom: 20px;
}

/* Main Section */
.main{
  width: 100%;
}
.main-top{
  width: 100%;
  background: #fff;
  padding: 10px;
  text-align: center;
  font-size: 18px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: rgb(43, 43, 43);
}
.main-body{
  padding: 10px 10px 10px 20px;
  justify-content: center;
  align-items: center;
}
h1{
  margin: 20px 10px;
}
.search_bar{
  display: flex;
  padding: 10px;
  justify-content: space-between;
}
.search_bar input{
  width: 80%;
  padding: 10px;
  border: 1px solid rgb(190, 190, 190);
}
.search_bar input:focus{
  border: 1px solid blueviolet;
}
.search_bar select{
  border: 1px solid rgb(190, 190, 190);
  padding: 10px;
  margin-left: 2rem;
}
.search_bar .filter{
  width: 300px;
}

.tags_bar{
  width: 55%;
  display: flex;
  padding: 10px;
  justify-content: space-between;
}
.tag{
  background: #fff;
  padding: 10px 15px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  font-size: 13px;
  cursor: pointer;
}
.tag i{
  margin-right: 0.7rem;
}
.row{
  display: flex;
  padding: 10px;
  margin-top: 1.3rem;
  justify-content: space-between;
}
.row p{
  color: rgb(54, 54, 54);
  font-size: 15px;
}
.row p span{
  color: blueviolet;
}
.job_card{
  width: 100%;
  padding: 15px;
  cursor: pointer;
  display: flex;
  border-radius: 10px;
  background: #fff;
  margin-bottom: 15px;
  justify-content: space-between;
  border: 2px solid rgb(190, 190, 190);
  box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
}
.job_details{
  display: flex;
}
.job_details .img{
  display: flex;
  justify-content: center;
  align-items: center;
}
.job_details .img i{
  width: 70px;
  font-size: 3rem;
  margin-left: 1rem;
  padding: 10px;
  color: rgb(82, 22, 138);
  background: rgb(216, 205, 226);
}
.job_details .text{
  margin-left: 2.3rem;
}
.job_details .text span{
  color: rgb(116, 112, 112);
}
.job_salary{
  text-align: right;
  color: rgb(54, 54, 54);
}
.job_card:active{
  border: 2px solid blueviolet;
  transition: 0.4s;
}
</style>


