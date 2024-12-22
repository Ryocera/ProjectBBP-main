<?php
    if(isset($_POST["login"])) {
        if($_POST["username"] == "admin" && $_POST["password"] == "123") {
            header("Location: Admin\admindashboard.php");
            exit;
        } elseif ($_POST["username"] == "user" && $_POST["password"] == "456") {
            header("Location: User\user.php");
        } 
        else {
            echo "Username tidak ditemukan!";
        }
    }
?>
<!-- konek ke mysql -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="style.css"/>
    <!-- style -->
    <title>Aplikasi Risiko Mitigasi</title>
</head>
<body>
    <header class="header">
      <a href="#" class="logo"
        ><i class="bi bi-graph-down"></i> Risk Management System</a>
    </header>
        <section class="home">
         <div class="wrapper-login">
            <h2>LOGIN</h2>
          <form id= "loginform" action="" method="post">
            <div class="input-box">
             <span class="icon"><i class= "bi-bi envelope"></i></span>
             <input type="text" name="username" id="username" required>
             <label for="username">Username</label>
            </div>
            <div class="input-box">
             <input type="password" name="password" id="password" required>
             <label for="password">Password</label>
            </div>
            <button type="submit" name="login" class ="btn" id="login-btn">login</button>
          </form>
         </div>
        </section>
    <!-- bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
