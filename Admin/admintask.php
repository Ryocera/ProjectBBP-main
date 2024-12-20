<?php
require '..\config.php';

class Admin {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllEntries() {
        $query = "SELECT * FROM antrian";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteEntry($id) {
        $query = "DELETE FROM antrian WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE antrian SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $status, $id);
        $stmt->execute();
    }
}

$admin = new Admin($mysqli);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    if (isset($_POST['delete'])) {
        $admin->deleteEntry($id);
    } elseif (isset($_POST['approve'])) {
        $admin->updateStatus($id, 'approved');
    } elseif (isset($_POST['pending'])) {
        $admin->updateStatus($id, 'pending');
    }
}

$entries = $admin->getAllEntries();
?>

<!DOCTYPE html>
<html lang="en">
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
    <title>Admin</title>
</head>
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
            <a href="#" class="sidebar-link">
              <i class="bi bi-person"></i>
              <span>Profile</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="admintask.php" class="sidebar-link">
              <i class="bi bi-list-task"></i>
              <span>Task</span>
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
              ><i class="bi bi-shield-check"></i>
              <span>Auth</span>
            </a>
            <ul
              id="auth"
              class="sidebar-dropdown list-unstyled collapse"
              data-bs-parent="#sidebar"
            >
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Login</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Register</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a
              href="#"
              class="sidebar-link has-dropdown collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#multi"
              aria-expanded="false"
              aria-controls="multi"
              ><i class="bi bi-layout-sidebar"></i> <span>Multi Level</span></a
            >
            <ul
              id="multi"
              class="sidebar-dropdown list-unstyled collapse"
              data-bs-parent="#sidebar"
            >
              <li class="sidebar-item">
                <a
                  href="#"
                  class="sidebar-link collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#multi-two"
                  aria-expanded="false"
                  aria-controls="multi-two"
                  >Two Links</a
                >
                <ul
                  id="multi-two"
                  class="two.sidebar-dropdown list-unstyled collapse"
                >
                  <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Link 1</a>
                  </li>
                  <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Link 2</a>
                  </li>
                </ul>
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
    <table border="1">
        <tr>
            <th>Nomor</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Urgensi</th>
            <th>Deskripsi</th>
            <th>Solusi</th>
            <th>Status Penyelesaian</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        <?php $i = 1?>
        <?php foreach($entries as $entry):?>
          <tr>
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($entry['kategori']); ?></td>
                <td><?= htmlspecialchars($entry['lokasi']); ?></td>
                <td><?= htmlspecialchars($entry['tingkat']); ?></td>
                <td><?= htmlspecialchars($entry['deskripsi']); ?></td>
                <td><?= htmlspecialchars($entry['solusi']); ?></td>
                <td><?= htmlspecialchars($entry['penyelesaian']); ?></td>
                <td><?= htmlspecialchars($entry['status']); ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $entry['id'] ?>">
                        <?php if ($entry['status'] === 'pending'): ?>
                            <button type="submit" name="approve">Approve</button>
                        <?php elseif ($entry['status'] === 'approved'): ?>
                            <button type="submit" name="pending">Pending</button>
                        <?php endif; ?>
                    </form>

                    <form method="POST" action="update.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $entry['id'] ?>">
                        <button type="submit" name="update">Update</button>
                    </form>
                    
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $entry['id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
                </tr>
        <?php endforeach; ?>
    </table>
                 <br>
                    <form method="POST" action="tambah_a.php" style="display:inline;">
                        <button type="submit" name="tambah">Tambah resiko</button>
                    </form>
                <br>
            <br>

        <!-- Bagian bawah-->
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
       <!-- Bagian bawah-->
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="admin.js"></script>
  </body>
</html>