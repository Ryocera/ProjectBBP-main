<?php
require '..\config.php';
$data = new Data();

$enumKategori = $data ->enum('kategori'); $enumLokasi = $data -> enum('lokasi');
$enumUrgensi = $data ->enum('tingkat'); $enumPenyelesaian = $data ->
enum('penyelesaian'); if($_SERVER['REQUEST_METHOD'] === 'POST' &&
isset($_POST['submit'])) { $kategori = $_POST['kategori']; $lokasi =
$_POST['lokasi']; $tingkat = $_POST['tingkat']; $deskripsi =
$_POST['deskripsi']; $query = "INSERT INTO antrian (kategori,lokasi, tingkat,
deskripsi) VALUES ('$kategori', '$lokasi', '$tingkat','$deskripsi')"; if
($mysqli->query($query) === TRUE) { echo "Data berhasil disimpan."; } else {
echo "Terjadi kesalahan dalam menyimpan data."; } } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>user</title>
  </head>
  <!-- Sidebar Section Start -->
  <body>
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
            <a href="user.php" class="sidebar-link">
              <i class="bi bi-grid-1x2-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              href="#"
              class="sidebar-link has-dropdown collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#task"
              aria-expanded="false"
              aria-controls="task"
              ><i class="bi bi-list-task"></i>
              <span>Task</span>
            </a>
            <ul
              id="task"
              class="sidebar-dropdown list-unstyled collapse"
              data-bs-parent="#sidebar"
            >
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Lihat</a>
              </li>
              <li class="sidebar-item">
                <a href="tambah_u.php" class="sidebar-link">Risk Register</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">analisis & mitigasi</a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="sidebar-footer">
          <a href="../index.php" class="sidebar-link">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
          </a>
        </div>
      </aside>
      <!-- Sidebar Section End -->

      <!-- Main Content Start -->
      <div class="main">
        <nav class="navbar navbar-expand px-4 py-3">
            <form action="#" class="d-none d-sm-inline-block">
                <div class="input-group input-group-navbar">
                  <input
                    type="text"
                    class="form-control border-0 rounded-0"
                    placeholder="Search..."
                  />
                  <button class="btn norder-0 rounded-0" type="button">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
            </form>
          <div class="navbar-collapse collapse">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a href="#" class="nav-icon pe-md-0" data-bs-toggle="dropdown">
                  <img src="foto.jpg" class="avatar img-fluid" alt="profile" />
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
          <div class="main mt-5">
            <div class="mb-3">
              <div class="row"></div>
              <!-- batas nyoba -->
              <div class="box1">
                <h3 class="fw-bold fs-4 mb-3 text-center">Risk Register</h3>
                <form action="" method="POST" class="p-4 bg-light rounded shadow-sm">
                  <div class="form-regis mb-3">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" required>
                      <?php foreach($enumKategori as $kategori): ?>
                      <option value="<?= $kategori ?>"><?= $kategori ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-regis mb-3">
                    <label for="lokasi">Lokasi</label>
                    <select name="lokasi" id="lokasi" required>
                      <?php foreach($enumLokasi as $lokasi): ?>
                      <option value="<?= $lokasi ?>"><?= $lokasi ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-regis mb-3">
                    <label for="tingkat">Urgensi</label>
                    <select name="tingkat" id="tingkat" required>
                      <?php foreach($enumUrgensi as $urgensi): ?>
                      <option value="<?= $urgensi ?>"><?= $urgensi ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-regis mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea
                      name="deskripsi"
                      id="deskripsi"
                      required
                    ></textarea>
                  </div>
                  <br />
                  <button type="submit" name="submit" class="tombol btn-primary w-100">Kirim</button>
                </form>
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- Main Content End -->
    </div>


    <script>
        const hamburger = document.querySelector("#toggle-btn");

        hamburger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    </script>
  </body>
</html>
