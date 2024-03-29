<?php
// Panggil file controller
require_once 'contr/matakuliah-contr.php';

// Buat objek dari kelas StudentController
$controller = new MataKuliahController();

// Periksa sesi login
$controller->checkLoginSession();

// Proses pemilihan mata kuliah jika ada kode kelas yang dipilih
if(isset($_GET['kode_kelas'])) {
    $selected_kelas = $_GET['kode_kelas'];
    $controller->processPilihMataKuliah($selected_kelas);
}

// Ambil data mata kuliah
$kelas = $controller->getClassData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Mata Kuliah</title>
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

<h2>Pilih Mata Kuliah</h2>

<table>
    <thead>
        <tr>
            <th>Kode Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen Pengampu</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data mata kuliah akan dimasukkan di sini menggunakan PHP -->
        <?php foreach ($kelas as $row): ?>
                <tr>
                    <td><?= $row['kode_kelas'] ?></td>
                    <td><?= $row['mata_kuliah'] ?></td>
                    <td><?= $row['dosen'] ?></td>
                    <td><?= $row['waktu'] ?></td>
                    <td><input type="checkbox" name="pilihan_kelas[]" value="<?= $row['kode_kelas'] ?>"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <input type="submit" name="submit" value="Pilih Mata Kuliah">
</body>
</html>
