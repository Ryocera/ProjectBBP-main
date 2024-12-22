<?php
require '..\config.php';
$data = new Data();

$enumKategori = $data -> enum('kategori');
$enumLokasi = $data -> enum('lokasi');
$enumUrgensi = $data -> enum('tingkat');
$enumPenyelesaian = $data -> enum('penyelesaian');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $tingkat = $_POST['tingkat'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO antrian (kategori, lokasi, tingkat, deskripsi) VALUES ('$kategori', '$lokasi', '$tingkat', '$deskripsi')";
    if ($mysqli->query($query) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan dalam menyimpan data.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Link CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="admin.css" />
    <title>Resiko Baru</title>
</head>
<body>
    <!-- Side NAv-->
    <div class="wrapper">
      <aside id="sidebar">
        <div class="d-flex">
          <button id="toggle-btn" type="button">
            <i class="bi bi-grid"></i>
          </button>
          <div class="sidebar-logo">
            <a href="#">Risk Management System</a>
          </div>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-item">
            <a href="admindashboard.php" class="sidebar-link">
              <i class="bi bi-collection"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              href="#"
              class="sidebar-link has-dropdown collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#auth"
              aria-expanded="false"
              aria-controls="auth"
              ><i class="bi bi-list-task"></i>
              <span>Task</span>
            </a>
            <ul
              id="auth"
              class="sidebar-dropdown list-unstyled collapse"
              data-bs-parent="#sidebar"
            >
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Lihat</a>
              </li>
              <li class="sidebar-item">
                <a href="tambah_a.php" class="sidebar-link">Register</a>
              </li>
              <li class="sidear-item">
                <a href="admintask.php"class ="sidebar-link">Manage</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="bi bi-bell"></i>
              <span>Notification</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="bi bi-gear"></i>
              <span>Setting</span>
            </a>
          </li>
        </ul>
        <div class="sidebar-footer" class="alert alert-warning">
          <a href="../index.php" class="sidebar-link">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
          </a>
        </div>
      </aside>
      <div class="main">
        <!-- Bagian atas-->
        <nav class="navbar navbar-expand px-4 py-3">
            <form action="#" class="d-none d-sm-inline-block">
              <div class="input-group input-group-navbar">
                <input
                  type="text"
                  class="form-control border-0 rounded-0"
                  placeholder="Search..."
                />
                <button class="btn norder-0 rounded-0" type="button">
                  Search
                </button>
              </div>
            </form>
            <div class="navbar-collapse collapse">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-icon pe-md-0" data-bs-toggle="dropdown">
                    <img
                      src="https://i.pinimg.com/736x/80/a1/f3/80a1f396866ee6466cedf3db459564be.jpg"
                      class="avatar img-fluid"
                      alt="profile"
                    />
                  </a>
                  <div class="dropdown-menu dropdown-menu-end rounded">
                    <a href="#" class="dropdown-item">
                      <i class="bi bi-stopwatch"></i>
                      <span>Analytics</span>
                    </a>
                    <a href="#" class="dropdown-item">
                      <i class="bi bi-gear"></i>
                      <span>Setting</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                      <i class="bi bi-question-circle"></i>
                      <span>Analytics</span>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        <!-- Bagian Atas-->
          <main class="content px-3 py-4">
            <div class="container-fluid">
              <h1>Tambah Resiko Baru</h1>
              <form action="" method="POST">
                <div class="input-container">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" required>
                        <?php foreach($enumKategori as $kategori): ?>
                            <option value="<?= $kategori ?>"><?= $kategori ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="lokasi">Lokasi</label>
                    <select name="lokasi" id="lokasi" required>
                        <?php foreach($enumLokasi as $lokasi): ?>
                            <option value="<?= $lokasi ?>"><?= $lokasi ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="tingkat">Urgensi</label>
                    <select name="tingkat" id="tingkat" required>
                        <?php foreach($enumUrgensi as $urgensi): ?>
                            <option value="<?= $urgensi ?>"><?= $urgensi ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>

                    <br>
                    <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" rows= "5" name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" name="submit">Kirim
                  <i class="bi bi-arrow-right"></i>
                </button>
                </form>
              </div>
            </main>
              <footer class="footer" id="bottom-part">
                    <div class="container-fluid">
                      <div class="row text-body-secondary">
                        <div class="col-6 text-start">
                          <a href="#" class="text-body-secondary">
                            <strong>Risk Management System</strong>
                          </a>
                        </div>
                        <div class="col-6 text-end text-body-secondary d-none d-md-block">
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                              <a href="#" class="text-body-secondary">Contact</a>
                            </li>
                          </ul>
                          <li class="list-inline-item">
                            <a href="#" class="text-body-secondary">About Us</a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="text-body-secondary">Term & Conditions</a>
                          </li>
                        </div>
                      </div>
                    </div>
              </footer>
              </div>
              <!-- Bagian bawah-->
            </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="admin.js"></script>
</body>
</html>