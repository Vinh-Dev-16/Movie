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
$query2 = "SELECT * FROM category  LIMIT $perRow,$rowsPerPage";
$run2 = mysqli_query($con, $query2);
?>

<head>
  <link rel="stylesheet" href="/CSS/adminlist.css">
  <title>Category</title>
</head>

<body>
<?php
     include 'index.php';
   ?>
  <div class="container" id="bg">
    <div class="main">

      <!-- Tiêu đề -->

      <div class="title">
        <h1>Danh sách các thể loại</h1>
      </div>

      <!-- Thêm thể loại phim -->

      <button id="open">Thêm thể loại phim</button>

      <!-- Form điền bị hide -->
      <div class="add_modal" id="modal">

        <!-- Icon close -->

        <div id="close">
          <ion-icon name="close-circle-outline"></ion-icon>
        </div>
        <div class="title_add">
          <h2>Thêm thể loại phim</h2>
        </div>
        <?php echo $msg; ?>
        <div class="form_add">
          <form action="#" method="post">
            <div class="form_movie">
              <div class="add">
                <label for="catname" class="form-label">Tên thể loại</label>
                <input type="text" name="catname" class="form-control" placeholder="Tên thể loại">
              </div>
              <div class="add">
                <label for="catid" class="form-label">ID thể loại</label>
                <input type="add" name="catid" class="form-control" placeholder="ID thể loại">
              </div>
              <div class="add">
                <label for="frk" class="form-label">Khóa phụ</label>
                <input type="add" name="frk" class="form-control" placeholder="Khóa phụ">
              </div>
              <div class="add">
                <label for="catnameascii" class="form-label">Tên thể loại không dấu</label>
                <input type="add" name="catnameascii" class="form-control" placeholder="Tên thể loại không dấu">
              </div>
              <div class="add">
                <label for="cattag" class="form-label">Tag thể loại</label>
                <input type="add" name="cattag" class="form-control" placeholder="Tag thể loại">
              </div>
              <div class="add">
                <button class="btn" name="submit" href="#" role="button"><strong>Thêm thể loại</strong></button>
              </div>
            </div>
        </div>
      </div>

      <!-- Table hiển thị danh sách các thể loại -->

      <div class="table">
        <table>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID thể loại</th>
            <th scope="col">Tên thể loại</th>
            <th scope="col">Tên thể loại không dấu</th>
            <th scope="col">Tag thể loại</th>
            <th scope="col">Số bài đăng</th>
            <th scope="col">Xem ngay</th>
            <th scope="col">Chức năng</th>
          </tr>
          <?php

          // Lấy dữ liệu từ database

          while ($row = mysqli_fetch_assoc($run2)) {

          ?>

            <tr>
              <th scope="row"><?php echo $row['id']; ?></th>
              <td><?php echo $row['category_id']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['cat_name_ascii']; ?></td>
              <td><?php echo $row['cat_name_tag']; ?></td>
              <?php
              $id = $row['id'];
              $query1 = "SELECT count(*)  AS total FROM movie,category where category_id= movie.cat_id and category.id=$id;";
              $run1 = mysqli_query($con, $query1);
              if ($run1) {
                while ($row1 = mysqli_fetch_assoc($run1)) {
              ?>
                  <td><?php echo $row1['total']; ?></td>
              <?php
                }
              }
              ?>
              <td><a title="Xem" div class="curd" href="viewpostcat.php?id=<?php echo $row['id']; ?>" style="color:#20d187;">
                  <ion-icon name="play"></ion-icon>
                </a></td>

              <td>
                <div class="curd_icon">
                  <a title="Xóa" div class="curd" onclick="return confirm('Bạn có muốn xóa thể loại phim này không?')" href="deletecategory.php?page=<?php echo $page ?>&deleteid=<?php echo $row['id']; ?>" style="color:#db183c;">
                    <ion-icon name="trash"></ion-icon>
                  </a>
                  <a title="Thêm" div class="curd" href="editcategory.php?id=<?php echo $row['id']; ?> &forkey=<?php echo $row['category_id']; ?>&catname=<?php echo $row['category_name']; ?>&categorynameascii=<?php echo $row['cat_name_ascii']; ?>&categorynametag=<?php echo $row['cat_name_tag']; ?>" style="color:#3c3ce7;">
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
        $query3 = "SELECT * FROM category ";
        $run3 = mysqli_query($con, $query3);
        $total = mysqli_num_rows($run3);
        $total_page = ceil($total / $rowsPerPage);

        if ($page > 1) {
          echo "<li ><a class='prev' href=' =" . ($page - 1) . "'  >Prev</a></li>";
        } else {
          echo "<li ><a class='prev' href='categorylist.php?page=" . ($total_page) . "'  >Prev</a></li>";
        }
        for ($i = 1; $i <= $total_page; $i++) {
          if ($i  > $page - 3 && $i < $page + 3) {
            echo "<li ><a class='pageNumber' href='categorylist.php?page=" . ($i) . "'  >$i</a></li>";
          }
        }

        if ($total_page > $page) {
          echo "<li ><a class='next' href='categorylist.php?page=" . ($page + 1) . "'  >Next </a></li>";
        } else {
          echo "<li ><a class='next' href='categorylist.php?page=1'  >Next </a></li>";
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

<!-- Lưu dữ liệu vào database -->

<?php

if (isset($_POST['submit'])) {
  $catname = $_POST['catname'];
  $catid = $_POST['catid'];
  $frk = $_POST['frk'];
  $catnameascii = $_POST['catnameascii'];
  $cattag = $_POST['cattag'];
  $query1 = "INSERT INTO `category`(`id`,`category_id`, `category_name`,  `cat_name_ascii`, `cat_name_tag`) VALUES ('$catid', '$frk','$catname','$catnameascii', '$cattag')";
  $run1 = mysqli_query($con, $query1);
  if ($run1) {
    echo "<script> alert ('Đã thêm thể loại phim '); window.location.href='categorylist.php';</script>";
  } else {
    echo "<script> alert ('Đã xảy ra lỗi '); window.location.href='categorylist.php';</script>";
  }
}
?>