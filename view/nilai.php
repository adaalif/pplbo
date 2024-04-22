<?php
// Panggil file controller
require_once '../contr/Matakuliah_controller.php';

// Buat objek dari kelas StudentController
$controller = new Matakuliah_model();

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
            <th>Mata Kuliah</th>
            <th>nilai</th>

        </tr>
    </thead>
    <tbody>
    <?php if (!empty($kelas)): ?> <!-- Cek apakah ada mata kuliah yang ditampilkan -->
        <?php foreach ($kelas as $row): ?>
            <tr>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['nilai'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada mata kuliah yang tersedia.</p>
    <?php endif; ?>
    </tbody>
    
</table>
<a href="../login/dashboard"> return</a>
</body>
</html>
