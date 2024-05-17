<?php
require_once '../contr/dosen_contr.php';

$controller = new Dosen_Controller();
$controller->checkLoginSession();

if (isset($_GET['kode_kelas'])) {
    $kode_kelas = $_GET['kode_kelas'];
} elseif (isset($_POST['kode_kelas'])) {
    $kode_kelas = $_POST['kode_kelas'];
} else {
    die("Kode kelas tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateData = $_POST['nilai'];
    $students = $controller->getAndUpdateStudentsAndGrades($kode_kelas, $updateData);
    echo "Nilai telah diperbarui.";
} else {
    $students = $controller->getAndUpdateStudentsAndGrades($kode_kelas);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
    </style>
</head>
<body>
    <h2>Nilai Mahasiswa</h2>
    <form action="" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nim']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td>
                            <input type="text" name="nilai[<?= htmlspecialchars($row['nim']) ?>]" value="<?= htmlspecialchars($row['nilai']) ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input type="hidden" name="kode_kelas" value="<?= htmlspecialchars($kode_kelas) ?>">
        <input type="submit" name="submit" value="Edit Nilai">
        <a href="dashboard_dosen.php"> kembali ke dashboard</a>
    </form>
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