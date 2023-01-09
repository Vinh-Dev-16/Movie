<?php
include 'db.php';
include 'ft.php';

// Cài đặt phân trang
$msg = "";
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$rowsPerPage = 05;
$perRow = ($page - 1) * 05;
$query = "SELECT * FROM episode LIMIT $perRow,$rowsPerPage";
$run = mysqli_query($con, $query);
?>

<head>
  <link rel="stylesheet" href="/CSS/adminlist.css">
  <title>Episode</title>
</head>

<body>
<?php
     include 'index.php';
   ?>
  <div class="container" id="bg">
    <div class="main">

      <!-- Tiêu đề -->

      <div class="title">
        <h1>Danh sách các tập phim</h1>
      </div>

      <!-- Thêm thể loại phim -->

      <button id="open">Thêm tập phim</button>

      <!-- Form search -->

      <div class="search episode">
        <form action="searches.php" method="Post">
          <input type="text" name="search_es" placeholder="Nhập tên phim...">
          <button type="submit" name="submit">Tìm kiếm</button>
        </form>
      </div>

      <!-- Form điền bị hide -->
      <div class="add_modal" id="modal">

        <!-- Icon close -->

        <div id="close">
          <ion-icon name="close-circle-outline"></ion-icon>
        </div>
        <div class="title_add">
          <h2>Thêm tập phim</h2>
        </div>
        <?php echo $msg; ?>
        <div class="form_add">
          <form action="#" method="post">
            <div class="form_movie">
              <div class="add">
                <label for="es_name" class="form-label">Tên tập</label>
                <input type="text" name="es_name" class="form-control" placeholder="Tên tập">
              </div>
              <div class="add">
                <label for="mv_id" class="form-label">ID phim</label>
                <input type="text" name="mv_id" class="form-control" placeholder="ID phim">
              </div>
              <div class="add">
                <label for="es_url" class="form-label">Link tập</label>
                <input type="add" name="es_url" class="form-control" placeholder="Link tập">
              </div>
              <div class="add">
                <button class="btn" name="submit" href="#" role="button"><strong>Thêm tập</strong></button>
              </div>
            </div>
        </div>
      </div>

      <!-- Bảng thông tin  -->

      <div class="table">
        <table>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tập</th>
            <th scope="col">ID phim</th>
            <th scope="col">Tên phim</th>
            <th scope="col">Link tập</th>
            <th scope="col">Chức năng</th>

          </tr>
          <?php

          // Lấy dữ liệu từ database

          while ($row = mysqli_fetch_assoc($run)) {

          ?>
            <tr>
              <th scope="row"><?php echo $row['id']; ?></th>
              <td><?php echo $row['es_name']; ?></td>
              <td><?php echo $row['mv_id']; ?></td>
              <?php
              $id = $row['id'];
              $query1 = "SELECT * FROM movie,episode WHERE episode.mv_id=movie.id and episode.id=$id";
              $run1 = mysqli_query($con, $query1);
              if ($run1) {
                while ($row1 = mysqli_fetch_assoc($run1)) {

              ?>
                  <td><?php echo $row1['mv_name']; ?></td>
              <?php
                }
              }

              ?>
              <td><?php echo $row['es_url']; ?></td>
              <td>
                <div class="curd_icon">
                  <a div class="curd" onclick="return confirm('Bạn có muốn xóa tập phim này không?')" href="deletees.php?page=<?php echo $page ?>&deleteid=<?php echo $row['id']; ?>" style="color:#db183c;">
                    <ion-icon name="trash"></ion-icon>
                  </a>
                  <a div class="curd" href="edites.php?id=<?php echo $row['id']; ?>&episode_name=<?php echo $row['es_name']; ?>&movie_id=<?php echo $row['mv_id']; ?>&episode_url=<?php echo $row['es_url']; ?>" style="color:#3c3ce7;">
                    <ion-icon name="create"></ion-icon>
                  </a>
                </div>
              </td>
            </tr>

          <?php
          }

          ?>
        </table>
      </div>

      <!-- Phân trang  -->

      <ul class="pagination">

        <?php
        $query3 = "SELECT * FROM episode ";
        $run3 = mysqli_query($con, $query3);
        $total = mysqli_num_rows($run3);
        $total_page = ceil($total / $rowsPerPage);

        if ($page > 1) {
          echo "<li ><a class='prev' href='eslist.php?page=" . ($page - 1) . "'  >Prev</a></li>";
        } else {
          echo "<li ><a class='prev' href='eslist.php?page=" . ($total_page) . "'  >Prev</a></li>";
        }
        for ($i = 1; $i <= $total_page; $i++) {
          if ($i  > $page - 3 && $i < $page + 3) {
            echo "<li ><a class='pageNumber' href='eslist.php?page=" . ($i) . "'  >$i</a></li>";
          }
        }

        if ($total_page > $page) {
          echo "<li ><a class='next' href='eslist.php?page=" . ($page + 1) . "'  >Next </a></li>";
        } else {
          echo "<li ><a class='next' href='eslist.php?page=1'  >Next </a></li>";
        }

        ?>
      </ul>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

  <!-- Js hiển thị form -->

  <script>
    const open = document.getElementById('open');
    const modal = document.getElementById('modal');
    const bg = document.getElementById('bg');
    const close = document.getElementById('close');
    open.onclick = function() {
      modal.classList.toggle('active');
      bg.classList.toggle('active');
    };
    close.onclick = function() {
      modal.classList.remove('active');
      // bg.classList.remove('active');
    }
  </script>
</body>
<?php
if (isset($_POST['submit'])) {
  $es_name = $_POST['es_name'];
  $es_url = $_POST['es_url'];
  $mv_id = $_POST['mv_id'];
  $query2 = "INSERT INTO `episode`(`mv_id` ,`es_name`, `es_url`)
     VALUES ('$mv_id','$es_name','$es_url') ";
  $run2 = mysqli_query($con, $query2);
  if ($run2) {
    echo "<script> alert ('Đã thêm tập '); window.location.href='eslist.php';</script>";
  } else {
    echo "<script> alert ('Đã xảy ra lỗi '); window.location.href='eslist.php';</script>";
  }
}

?>