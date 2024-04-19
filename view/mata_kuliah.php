<?php
// Panggil file controller
require_once '../contr/matakuliah-contr.php';

// Buat objek dari kelas StudentController
$controller = new Mahasiswa_Model();

// Periksa sesi login
$controller->checkLoginSession();

// Ambil data kelas
$kelas = $controller->getAllKelas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
    <!-- Tambahkan CSS sesuai kebutuhan -->
    <style>
        /* Style CSS dapat ditambahkan di sini */
        /* Contoh: */
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

<h2>Daftar Mata Kuliah</h2>

<table>
    <thead>
        <tr>
            <th>Kode Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen Pengampu</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data mata kuliah akan dimasukkan di sini menggunakan PHP -->
        <?php
        // Ambil data dari PHP dan tampilkan di sini
        foreach ($kelas as $row) {
            echo "<tr>";
            echo "<td>" . $row['kode_kelas'] . "</td>";
            echo "<td>" . $row['mata_kuliah'] . "</td>";
            echo "<td>" . $row['dosen'] . "</td>";
            echo "<td>" . $row['waktu'] . "</td>";
            echo "</tr>";
        }
        ?>
        <a href="dashboard.html"></a>
    </tbody>
</table>
<a href="dashboard.html"> return</a>
<a href="pilih_mk.php"> pilih mata kuliah</a>
</body>
</html>
