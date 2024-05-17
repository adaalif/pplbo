<?php
// Panggil file controller
require_once '../contr/dosen_contr.php';

// Buat objek dari kelas StudentController
$controller = new Dosen_controller();

$controller->checkLoginSession();
$nip = $_SESSION['nip'];

// Ambil data kelas
$kelas = $controller->getAllKelasbyNIP($nip);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
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

<h2>Daftar Mata Kuliah</h2>

<table>
    <thead>
        <tr>
            <th>Kode Kelas</th>
            <th>Mata Kuliah</th>
            <th>Waktu</th>
            <th>Ruangan</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($kelas)): ?> <!-- Cek apakah ada mata kuliah yang ditampilkan -->
        <?php foreach ($kelas as $row): ?>
            <tr>
                <td><?= $row['kode_kelas'] ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['waktu'] ?></td>
                <td><?= $row['ruangan'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada mata kuliah yang tersedia.</p>
    <?php endif; ?>
    </tbody>
</table>
<a href="dashboard_dosen.php"> return</a>
<a href="insert_nilai.php"> isi nilai mata kuliah</a>
</body>
</html>