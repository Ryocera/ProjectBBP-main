<?php
require '..\config.php';

$antrian = new Update($mysqli);
$id = isset($_POST['id']) ? (int)$_POST['id'] : (isset($_GET['id']) ? (int)$_GET['id'] : 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['urgensi']) && isset($_POST['id'])) {
        $urgensi = htmlspecialchars($_POST['urgensi']);
        $id = (int)$_POST['id'];
        $antrian->updateUrgensi($id, $urgensi);
    }

    if (isset($_POST['status']) && isset($_POST['id'])) {
        $status = htmlspecialchars($_POST['status']);
        $id = (int)$_POST['id'];
        $antrian->updateStatus($id, $status);
    }

    if (isset($_POST['solusi']) && isset($_POST['id'])) {
        $solusi = htmlspecialchars($_POST['solusi']);
        $id = (int)$_POST['id'];
        $antrian->updateSolusi($id, $solusi);

        header("Location: admintask.php");
        exit;
    }

    $dat = $antrian->getAntrianById($id);
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
    <link rel="stylesheet" href="tambah.css" />
    <title>Kotak Solusi</title>
</head>
<body>
    <!-- Side Nav-->
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
        <div class="sidebar-footer">
          <a href="../index.php" class="sidebar-link">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
          </a>
        </div>
      </aside>
    <!-- Side Nav-->
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
        <main class="content px-3 py-4">
        <div class="container-fluid">
        <div class="mb-3">
          <div class="box1">
            <h3 class="fw-bold fs-4 mb-3 text text-center"> Update Data</h3>
            <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $id; ?>" />
              <div class="form-regis mb-3">
                <label for="kategori">Kategori</label>
                <textarea readonly><?= htmlspecialchars($dat['kategori']); ?></textarea>
              </div>
              <div class="form-regis mb-3">
                <label for="lokasi">Lokasi</label>
                <textarea readonly><?= htmlspecialchars($dat['lokasi']); ?></textarea>
              </div>
              <div class="form-regis">
                <label for="deskripsi">Deskripsi</label>
                <textarea readonly><?= htmlspecialchars($dat['deskripsi']); ?></textarea>
              </div>
              <div class="form-regis mb-3">
                <label for="tingkat">Urgensi</label>
                <select name="urgensi" onchange="this.form.submit()">
                    <option value="Berat" <?= $dat['tingkat'] == 'Berat' ? 'selected' : ''; ?>>Berat</option>
                    <option value="Sedang" <?= $dat['tingkat'] == 'Sedang' ? 'selected' : ''; ?>>Sedang</option>
                    <option value="Ringan" <?= $dat['tingkat'] == 'Ringan' ? 'selected' : ''; ?>>Ringan</option>
                  </select>
              </div>
              <div class="form-regis mb-3">
                <label for="Penyelesaian">Status</label>
                  <select name="status" onchange="this.form.submit()">
                    <option value="Selesai" <?= $dat['penyelesaian'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                    <option value="Proses" <?= $dat['penyelesaian'] == 'Proses' ? 'selected' : ''; ?>>Proses</option>
                    <option value="Menunggu" <?= $dat['penyelesaian'] == 'Menunggu' ? 'selected' : ''; ?>>Menunggu</option>
                  </select>                   
              </div>
              <div class="form-regis mb-3">
                <label for="solusi">Solusi</label>
                <textarea
                name="solusi"
                id="solusi"
                required
                ></textarea>
              </div>
              <br>
              <button type="submit" name="submit" class="tombol btn-primary w-100">Kirim</button>
              <br>
              <button id="kembalibtn">
                <a href="admintask.php" style="color:white">Kembali</a>
              </button>
              </form>
            </div>
          </div>
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
