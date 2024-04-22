<?php
// Panggil file controller
require_once '../contr/Mahasiswa_controller.php';

// Buat objek dari kelas Mahasiswa_controller
$controller = new Mahasiswa_controller();


$controller->checkLoginSession();
$nim = $_SESSION['nim'];
$mahasiswa = $controller->getAllMahasiswa($nim);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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

<h2>Data Mahasiswa</h2>

<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($mahasiswa)): ?> <!-- Cek apakah ada data mahasiswa yang ditampilkan -->
        <?php foreach ($mahasiswa as $row): ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tempat_lahir'] ?></td>
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['alamat'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada data mahasiswa yang tersedia.</p>
    <?php endif; ?>
    
    </tbody>
</table>
<td><a href="edit">Edit</a></td>

<a href="../login/dashboard">Kembali ke Dashboard</a>
</body>
</html>
