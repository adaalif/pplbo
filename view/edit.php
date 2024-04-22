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
    <title>Edit Data Mahasiswa</title>
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
        .editing input {
            width: 100%; /* Lebar input disesuaikan dengan sel */
            box-sizing: border-box; /* Ukuran input termasuk border dan padding */
        }
    </style>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<table id="editableTable">
    <thead>
        <tr>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mahasiswa as $row): ?>
            <tr>
                <td class="editable"><?= $row['tempat_lahir'] ?></td>
                <td class="editable editable-date"><?= $row['tanggal_lahir'] ?></td>
                <td class="editable"><?= $row['alamat'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Tombol Simpan Perubahan -->
<button id="saveChangesBtn" style="display: none;">Simpan Perubahan</button>

<script>
    var table = document.getElementById('editableTable');
    var saveChangesBtn = document.getElementById('saveChangesBtn');
    var isChanged = false; // Penanda perubahan data

    // Fungsi untuk menambahkan event listener ke sel yang dapat diedit
    function addEditListener(cell) {
        cell.addEventListener('click', function () {
            // Jika sel belum dalam mode editing
            if (!this.classList.contains('editing')) {
                var oldValue = this.innerHTML;

                var input = document.createElement('input');
                input.type = 'text';
                input.value = oldValue;

                // Ubah tipe input menjadi 'date' jika kolom yang dipilih adalah tanggal lahir
                if (this.classList.contains('editable-date')) {
                    input.type = 'date';
                }

                this.innerHTML = '';
                this.appendChild(input);
                input.focus();

                this.classList.add('editing');

                input.addEventListener('change', function () {
                    var newValue = this.value;

                    if (newValue && newValue !== oldValue) {
                        // Ganti innerHTML dengan nilai input yang baru
                        cell.innerHTML = newValue;
                        isChanged = true;
                        saveChangesBtn.style.display = 'block';
                    } else {
                        // Tetapkan kembali nilai lama jika tidak ada perubahan
                        cell.innerHTML = oldValue;
                    }

                    cell.classList.remove('editing');
                });
            }
        });
    }

    var cells = table.querySelectorAll('.editable');
    cells.forEach(function(cell) {
        addEditListener(cell);
    });

    saveChangesBtn.addEventListener('click', function() {
        var editedData = [];
        var rows = table.rows;
        
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var editedRow = [];

            for (var j = 0; j < row.cells.length; j++) {
                var cell = row.cells[j];

                var value = cell.querySelector('input') ? cell.querySelector('input').value : cell.innerText;
                editedRow.push(value);
            }

            editedData.push(editedRow);
        }
        document.getElementById('editedTempatLahir').value = tempat_lahir;
        document.getElementById('editedTanggalLahir').value = tanggal_lahir;
        document.getElementById('editedAlamat').value = alamat;

        document.getElementById('editedData').value = JSON.stringify(editedData);

        // Submit formulir
        document.getElementById('editForm').submit();
    });

    // Fungsi untuk mengonfirmasi sebelum meninggalkan halaman jika ada perubahan yang belum disimpan
    window.addEventListener('beforeunload', function(event) {
        if (isChanged) {
            event.returnValue = 'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman?';
        }
    });
</script>

<!-- Formulir tersembunyi untuk mengirim data yang diedit -->
<form id="editForm" action="../Mahasiswa_controller/updateMahasiswa" method="POST">
<input type="hidden" name="tempat_lahir" id="editedTempatLahir">
<input type="hidden" name="tanggal_lahir" id="editedTanggalLahir">
<input type="hidden" name="alamat" id="editedAlamat">

</form>

</body>
</html>
