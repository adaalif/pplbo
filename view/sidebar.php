<div class="container">
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="/pic/logo.jpg" alt="">
                <h1>SISTEM INFORMASI AKADEMIK KEMAHASISWAAN</h1>
            </div>
            <ul>
                <li>
                    <a href="#">
                        <button id="mata_kuliah" class="nav-item" onclick="window.location.href='../Matakuliah_controller/index';">
                            <i class="fas fa-user"></i>
                            Learning Path
                        </button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <button id="mahasiswaBtn" onclick="window.location.href='../Mahasiswa_controller/data';">
                            <i class="fas fa-chart-bar"></i>
                            Informasi Data
                        </button>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <button id="nilaiBtn" class="nav-item" onclick="window.location.href='../Mahasiswa_controller/nilai';">
                            <i class="fas fa-tasks"></i>
                            Informasi Nilai
                        </button>
                    </a>
                </li>
                <li>
                    <a href="#" class="logout">
                        <button id="logoutBtn" class="nav-item" onclick="window.location.href='index.php';">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


        <script>
document.addEventListener('DOMContentLoaded', function() {
  const logoutBtn = document.getElementById('logoutBtn');
  const settingsDropdown = document.getElementById('settingsDropdown');
  const mata_kuliah = document.getElementById('mata_kuliah');
  const nilaiBtn = document.getElementById('nilaiBtn'); 
  const mahasiswaBtn = document.getElementById('mahasiswaBtn');

mahasiswaBtn.addEventListener('click', function() {
  window.location.href = '../Mahasiswa_controller/data';
});

  logoutBtn.addEventListener('click', function() {
    window.location.href = 'index.php';
  });

  mata_kuliah.addEventListener('click', function() {
    window.location.href = '../Matakuliah_controller/index';
  });

  nilaiBtn.addEventListener('click', function() {
    window.location.href = '../Mahasiswa_controller/nilai';
  });

  settingsDropdown.addEventListener('change', function() {
    const selectedOption = settingsDropdown.options[settingsDropdown.selectedIndex].value;
    if (selectedOption) {
      window.location.href = selectedOption;
    }
  });
});
</script>
<style>
    .nav-item {
        cursor: pointer;
    }
</style>
