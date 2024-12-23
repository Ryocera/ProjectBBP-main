<?php
require '..\config.php';

$data = new Data();
$antrian = new User($mysqli);


$hasil = $antrian->getApprovedRisks(); ?>
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
    <link rel="stylesheet" href="user.css" />
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
                <a href="mitigasi.html" class="sidebar-link"
                  >analisis & mitigasi</a
                >
              </li>
            </ul>
          </li>
        </ul>
        <div class="sidebar-footer">
          <a href="#" class="sidebar-link">
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
              <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="card border-0">
                    <h2>Resiko Berdasarkan Kategori</h2>
                    <canvas id="polarAreaChart"></canvas>
                  </div>
                </div>
                <div class="col-lg-7 col-md-2">
                  <div class="card border-0">
                    <h2>Likehood dan Impact</h2>
                    <canvas id="riskBubbleChart"></canvas>
                  </div>
                </div>
              </div>
              <h3 class="fw-bold fs-4 my-3">Risk Aceppted</h3>
              <div class="row">
                <div class="accepted col-12">
                  <table class="table table-striped" border="1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Urgensi</th>
                        <th>Deskripsi</th>
                        <th>Solusi</th>
                        <th>Status Penyelesaian</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php while ($row = $hasil->fetch_assoc()): ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['lokasi'] ?></td>
                        <td><?= $row['tingkat'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td><?= $row['solusi'] ?></td>
                        <td><?= $row['penyelesaian'] ?></td>
                        <?php $i++; ?>
                      </tr>
                      <?php endwhile; ?>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Fasilitas</td>
                        <td>FST</td>
                        <td>Sedang</td>
                        <td>Ada kerusakan pada fasilitas</td>
                        <td>Segera diperbaiki</td>
                        <td>Proses</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Fasilitas</td>
                        <td>FST</td>
                        <td>Sedang</td>
                        <td>Ada kerusakan pada fasilitas</td>
                        <td>Segera diperbaiki</td>
                        <td>Proses</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Fasilitas</td>
                        <td>FST</td>
                        <td>Sedang</td>
                        <td>Ada kerusakan pada fasilitas</td>
                        <td>Segera diperbaiki</td>
                        <td>Proses</td>
                      </tr>
                    </tbody>
                  </table>
                  <br />
                  <form
                    method="POST"
                    action="tambah_u.php"
                    style="display: inline"
                  >
                    <button type="submit" name="tambah" class="nambah">
                      Tambah resiko
                    </button>
                  </form>
                  <br />
                </div>
              </div>
            </div>
          </div>
        </main>
        <footer class="footer">
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
      <!-- Main Content End -->
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="user.js"></script>
    <script src="chart.js"></script>
  </body>
</html>
