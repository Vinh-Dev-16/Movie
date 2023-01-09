<?php
include 'db.php';
include 'ft.php';
$msg = "";
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$rowsPerPage = 05;
$perRow = ($page - 1) * 05;
$query = "SELECT * FROM year LIMIT $perRow,$rowsPerPage";
$run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/CSS/adminlist.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Year</title>
</head>

<body>
  <?php
  include_once "index.php";
  ?>
  <div class="container">
    <div class="main">
      <div class="title">
        <h1>Danh sách năm</h1>
      </div>
      <!-- Thêm năm -->
      <button id="open">Thêm năm</button>

      <!-- Form điền bị hide -->
      <div class="add_modal nation" id="modal">
        <div id="close">
          <ion-icon name="close-circle-outline"></ion-icon>
        </div>
        <div class="title_add">
          <h2>Thêm năm</h2>
        </div>
        <div class="form_add">
          <form action="#" method="post">
            <div class="form_movie">
              <div class="add">
                <label for="year_name" class="form-label">Năm</label>
                <input type="text" name="year_name" class="form-control" placeholder="Năm">
              </div>
              <div class="add">
                <label for="year_id" class="form-label">ID năm</label>
                <input type="text" name="year_id" class="form-control" placeholder="ID năm">
              </div>
              <div class="add">
                <button class="btn" name="submit" href="#" role="button">Thêm năm</button>
              </div>
            </div>
        </div>
      </div>


      <!-- Hiện bảng table -->

      <div class="table">
        <table>
          <tr>
            <th>#</th>
            <th>ID năm</th>
            <th>Năm</th>
            <th>Xem ngay</th>
            <th>Chức năng</th>
          </tr>
          <?php

          while ($row = mysqli_fetch_assoc($run)) {

          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['year_id']; ?></td>
              <td><?php echo $row['year']; ?></td>
              <td>abc</td>
              <td>
                <div class="curd_icon">
                  <a title="Xóa" div class="curd" onclick="return confirm('Bạn có muốn xóa năm này không?')" href="deleteyear.php?id=<?php echo $row['id']; ?>" style="color:#db183c;">
                    <ion-icon name="trash"></ion-icon>
                  </a>
                  <a title="Sửa" div class="curd" href="edityear.php?id=<?php echo $row['id'] ?>&yr_id=<?php echo $row['year_id'] ?>&yr_name=<?php echo $row['year'] ?>" style="color:#3c3ce7;">
                    <ion-icon name="create"></ion-icon>
                  </a>
              </td>
      </div>
      </tr>
    <?php
          }


    ?>
    </table>
    </div>
    <ul class="pagination">

      <?php
      $query1 = "SELECT * FROM year ";
      $run1 = mysqli_query($con, $query1);
      $total = mysqli_num_rows($run1);
      $total_page = ceil($total / $rowsPerPage);

      if ($page > 1) {
        echo "<li ><a class='prev' href='year.php?page=" . ($page - 1) . "'  >Prev</a></li>";
      } else {
        echo "<li ><a class='prev' href='year.php?page=" . ($total_page) . "'  >Prev</a></li>";
      }
      for ($i = 1; $i <= $total_page; $i++) {
        if ($i  > $page - 3 && $i < $page + 3) {
          echo "<li ><a class='pageNumber' href='year.php?page=" . ($i) . "'  >$i</a></li>";
        }
      }

      if ($total_page > $page) {
        echo "<li ><a class='next' href='year.php?page=" . ($page + 1) . "'  >Next </a></li>";
      } else {
        echo "<li ><a class='next' href='year.php?page=1'  >Next </a></li>";
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
  $year_name = $_POST['year_name'];
  $year_id = $_POST['year_id'];
  $query2 = "INSERT INTO `year`( `year`, `year_id`)
     VALUES ('$year_name','$year_id') ";
  $run2 = mysqli_query($con, $query2);
  if ($run2) {
    echo "<script> alert ('Đã thêm năm thành công '); window.location.href='year.php';</script>";
  } else {
    echo "<script> alert ('Đã xảy ra lỗi '); window.location.href='year.php';</script>";
  }
}

?>