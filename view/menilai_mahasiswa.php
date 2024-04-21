<?php
require_once '../contr/dosen_contr.php';

// Create an instance of the controller
$controller = new Dosen_Controller();

// Check login session
$controller->checkLoginSession();

// Get kode_kelas from the URL parameter or form submission
if(isset($_GET['kode_kelas'])) {
    $kode_kelas = $_GET['kode_kelas'];
} elseif(isset($_POST['kode_kelas'])) {
    $kode_kelas = $_POST['kode_kelas'];
} else {
    // Handle error or redirect
}

// Fetch all students based on kode_kelas
$students = $controller->getAllStudentsByKodeKelas($kode_kelas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>

<h2>Nilai Mahasiswa</h2>

<form action="nilai_mahasiswa.php" method="POST">
    <input type="hidden" name="kode_kelas" value="<?= $kode_kelas ?>">
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Ratings</th> <!-- Column for ratings -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['nim'] ?></td>
                    <td><?= $student['nama'] ?></td>
                    <td>
                        <!-- Input field for ratings -->
                        <input type="text" name="ratings[<?= $student['nim'] ?>]" value="<?= isset($_POST['ratings'][$student['nim']]) ? $_POST['ratings'][$student['nim']] : '' ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <input type="submit" name="submit" value="Submit Ratings">
</form>

<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Iterate through submitted ratings and insert into database
    foreach ($_POST['ratings'] as $nim => $rating) {
        // Insert rating for each student
        $success = $controller->insertNilai($nim, $kode_kelas, $rating);
        if (!$success) {
            // Handle error
            echo "Failed to insert rating for NIM: $nim <br>";
        }
    }
    // Display success message
    echo "Ratings have been submitted successfully!";
}
?>

</body>
</html>
