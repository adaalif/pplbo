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
    <h1>Welcome Dosen</h1>
    <button id="logoutBtn">Logout</button>
    <button id="mata_kuliah">Mata kuliah</button>
    <select id="settingsDropdown">
      <option selected disabled>Settings</option>
      <option value="change_email.html">Change Email</option>
      <option value="change_password.php">Change Password</option>
    </select>
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


  // Add event listener for logout button
  logoutBtn.addEventListener('click', function() {
    // Redirect user to login page
    window.location.href = 'index.html';
  });
  mata_kuliah.addEventListener('click', function() {
    // Redirect user to login page
    window.location.href = 'mata_kuliah.php';
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
