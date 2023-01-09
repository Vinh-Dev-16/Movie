<?php
include 'db.php';
include 'ft.php';
session_start();
if (isset($_SESSION['user'])) {
} else {
  echo "<script> alert ('Bạn chưa đăng nhập'); window.location.href = '/login.php'; </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/CSS/index.css">
  <title>Home</title>
</head>

<body>
  <div class="conatainer_index">
    <!-- Thiết kế sidebar -->
    <div class="navigation">
      <ul>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="videocam"></ion-icon>
            </span>
            <span class="title_index">VSH Movie</span>
          </a>
        </li>

        <li>
          <a href="dashboard.php">
            <span class="icon">
              <ion-icon name="home"></ion-icon>
            </span>
            <span class="title_index">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="adminlist.php">
            <span class="icon">
              <ion-icon name="person"></ion-icon>
            </span>
            <span class="title_index">Danh sách Admin</span>
          </a>
        </li>
        <li>
          <a href="userlist.php">
            <span class="icon">
              <ion-icon name="contact"></ion-icon>
            </span>
            <span class="title_index">Danh sách User</span>
          </a>
        </li>
        <li>
          <a href="categorylist.php">
            <span class="icon">
              <ion-icon name="book"></ion-icon>
            </span>
            <span class="title_index">Thể loại</span>
          </a>
        </li>
        <li>
          <a href="genrelist.php">
            <span class="icon">
              <ion-icon name="copy"></ion-icon>
            </span>
            <span class="title_index">Kiểu phim</span>
          </a>
        </li>
        <li>
          <a href="nation.php">
            <span class="icon">
              <ion-icon name="planet"></ion-icon>
            </span>
            <span class="title_index">Quốc gia</span>
          </a>
        </li>
        <li>
          <a href="year.php">
            <span class="icon">
              <ion-icon name="calendar"></ion-icon>
            </span>
            <span class="title_index">Năm</span>
          </a>
        </li>
        <li>
          <a href="listmovie.php">
            <span class="icon">
              <ion-icon name="film"></ion-icon>
            </span>
            <span class="title_index">Danh sách phim</span>
          </a>
        </li>
        <li>
          <a href="eslist.php">
            <span class="icon">
              <ion-icon name="recording"></ion-icon>
            </span>
            <span class="title_index">Danh sách tập phim</span>
          </a>
        </li>
        <li>
          <a href="contactAdmin.php">
            <span class="icon">
              <ion-icon name="contacts"></ion-icon>
            </span>
            <span class="title_index">Contact</span>
          </a>
        </li>
        <li>
          <a href="completeAdmin.php">
            <span class="icon">
              <ion-icon name="contacts"></ion-icon>
            </span>
            <span class="title_index">Complete Contact</span>
          </a>
        </li>
        <li>
          <a href="/homeLogin.php">
            <span class="icon">
              <ion-icon name="desktop"></ion-icon>
            </span>
            <span class="title_index">Trang User</span>
          </a>
        </li>
        <li>
          <a href="/logout.php">
            <span class="icon">
              <ion-icon name="log-out"></ion-icon>
            </span>
            <span class="title_index">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="main_index">
      <div class="topbar">
        <div class="logo">
          <h3>Đề tài thực tập</h3>
        </div>
        <div class="page">
          Trang quản trị Admin
        </div>
        <div class="user_login">
          <input type="text" class="textBox" placeholder="Chào, <?php echo $_SESSION['user']; ?>" readonly>
          <div class="option">
            <div onclick="show('')">
              <a href="/userInfor.php">
                <ion-icon name="contact"></ion-icon> Thông tin cá nhân
              </a>
            </div>
            
              <div onclick="show('')">
                <a href="/homeLogin.php">
                  <ion-icon name="arrow-round-back"></ion-icon> Về trang User
                </a>
              </div>
           
              <div onclick="show('')">
                <a href='/logout.php'>
                  <ion-icon name="log-out"></ion-icon> Logout
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card -->

    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

  <script>
    // dropdown
    function show(anything) {
      document.querySelector('.textbox').value = anything;

    }

    let user_login = document.querySelector('.user_login');
    user_login.onclick = function() {
      user_login.classList.toggle('active');
    }
  </script>
</body>

</html>