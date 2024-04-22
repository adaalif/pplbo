<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Welcome to Your Dashboard</h1>
    <button id="logoutBtn">Logout</button>
    <button id="mata_kuliah">Mata kuliah</button>
    <button id="nilaiBtn">Nilai</button> <!-- Tombol untuk pindah ke halaman nilai -->
    <button id="mahasiswaBtn">Data Mahasiswa</button> <!-- Tombol untuk pindah ke halaman data mahasiswa -->

  </header>
</body>
</html>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-right: 10px;
  border-radius: 20px;
}

select {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-right: 10px;

}

select option[disabled] {
  display: none;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const logoutBtn = document.getElementById('logoutBtn');
  const settingsDropdown = document.getElementById('settingsDropdown');
  const mata_kuliah = document.getElementById('mata_kuliah');
  const nilaiBtn = document.getElementById('nilaiBtn'); // Select the nilai button
  const mahasiswaBtn = document.getElementById('mahasiswaBtn'); // Select the data mahasiswa button

// Add event listener for mahasiswa button
mahasiswaBtn.addEventListener('click', function() {
  // Redirect user to data mahasiswa page
  window.location.href = '../Mahasiswa_controller/data';
});

  // Add event listener for logout button
  logoutBtn.addEventListener('click', function() {
    // Redirect user to login page
    window.location.href = 'index.php';
  });

  // Add event listener for mata kuliah button
  mata_kuliah.addEventListener('click', function() {
    // Redirect user to mata kuliah page
    window.location.href = '../Matakuliah_controller/index';
  });

  // Add event listener for nilai button
  nilaiBtn.addEventListener('click', function() {
    // Redirect user to nilai page
    window.location.href = '../Mahasiswa_controller/nilai';
  });

  // Add event listener for settings dropdown
  settingsDropdown.addEventListener('change', function() {
    // Redirect user to the selected settings page
    const selectedOption = settingsDropdown.options[settingsDropdown.selectedIndex].value;
    if (selectedOption) {
      window.location.href = selectedOption;
    }
  });
});
</script>