<?php
require_once '../contr/matakuliah-contr.php';

$controller = new Mahasiswa_Model();

// Periksa sesi login
$controller->checkLoginSession();

// Proses pemilihan mata kuliah jika ada kode kelas yang dipilih
if(isset($_GET['kode_kelas'])) {
    $selected_kelas = $_GET['kode_kelas'];
    $controller->pilihMataKuliah($selected_kelas,$nim);
}

// Ambil data mata kuliah
$kelas = $controller->getAllKelas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Mata Kuliah</title>
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

<h2>Pilih Mata Kuliah</h2>
<form action="../contr/pilih_contr.php" method="POST">
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
    </form>

</body>
</html>
