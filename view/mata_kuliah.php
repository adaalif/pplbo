<?php
// Panggil file controller
require_once '../contr/Matakuliah_controller.php';

// Buat objek dari kelas StudentController
$controller = new Mahasiswa_Model();

// Periksa sesi login
$controller->checkLoginSession();
$nim = $_SESSION['nim'];

// Ambil data kelas
$kelas = $controller->getAllKelasbyNIM($nim);
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
    <form action="../Matakuliah_controller/hapus_mk" method="POST">
    <?php if (!empty($kelas)): ?> <!-- Cek apakah ada mata kuliah yang ditampilkan -->
        <?php foreach ($kelas as $row): ?>
            <tr>
                <td><input type="checkbox" name="kode_kelas[]" value="<?= $row['kode_kelas'] ?>"></td> 
                <td><?= $row['kode_kelas'] ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['dosen'] ?></td>
                <td><?= $row['waktu'] ?></td>
            </tr>
        <?php endforeach; ?>
        <input type="submit" name="submit" value="Hapus Terpilih">
    <?php else: ?>
        <p>Tidak ada mata kuliah yang tersedia.</p>
    <?php endif; ?>
</form>


    </tbody>
    
</table>
<a href="dashboard.php"> return</a>
<a href="pilih_mk"> pilih mata kuliah</a>
</body>
</html>
