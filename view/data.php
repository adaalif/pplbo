<?php
// Panggil file controller
require_once '../contr/Mahasiswa_controller.php';

// Buat objek dari kelas Mahasiswa_controller
$controller = new Mahasiswa_controller();

// Cek session login
$controller->checkLoginSession();

// Ambil NIM dari session
$nim = $_SESSION['nim'];

// Ambil data mahasiswa berdasarkan NIM
$mahasiswa = $controller->getAllMahasiswa($nim);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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
            <th>Edit</th> <!-- Tambahkan kolom untuk tombol edit -->
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
                <td></td> <!-- Tambahkan link edit dengan parameter nim -->
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">Tidak ada data mahasiswa yang tersedia.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<a href="edit">Edit</a>
<a href="../login/dashboard">Kembali ke Dashboard</a>
</body>
</html>
