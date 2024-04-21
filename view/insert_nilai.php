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
    <title>Insert Nilai</title>
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

<h2>Insert Nilai</h2>

<table>
    <thead>
        <tr>
            <th>Kode Kelas</th>
            <th>Mata Kuliah</th>
            <th>Waktu</th>
            <th>Action</th> <!-- New column for action -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kelas as $row): ?>
            <tr>
                <td><?= $row['kode_kelas'] ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['waktu'] ?></td>
                <td>
                    <!-- Button to view students -->
                    <form action="menilai_mahasiswa.php" method="GET">
                        <input type="hidden" name="kode_kelas" value="<?= $row['kode_kelas'] ?>">
                        <button href = "" type="submit">View Students </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
