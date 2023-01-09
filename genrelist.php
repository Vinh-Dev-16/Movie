<?php
include 'db.php';
include 'ft.php';
?>
<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$rowsPerPage = 05;
$perRow = ($page - 1) * 05;
$query2 = "SELECT * FROM genre  LIMIT $perRow,$rowsPerPage";
$run2 = mysqli_query($con, $query2);
?>

<head>
  <link rel="stylesheet" href="/CSS/adminlist.css">
  <title>Genre</title>
</head>

<body>
<?php
  include_once "index.php";
  ?>
  <div class="container" id="bg">
    <div class="main">

      <!-- Tiêu đề -->

      <div class="title">
        <h1>Danh sách các kiểu phim</h1>
      </div>

      <!-- Thêm kiểu phim phim -->

      <button id="open">Thêm kiểu phim</button>

      <!-- Form điền bị hide -->
      <div class="add_modal genre" id="modal">
        <div id="close">
          <ion-icon name="close-circle-outline"></ion-icon>
        </div>
        <div class="title_add">
          <h2>Thêm kiểu phim</h2>
        </div>
        <div class="form_add">
          <form action="#" method="post">
            <div class="form_movie">
              <div class="add">
                <label for="genre_name" class="form-label">Tên thể loại</label>
                <input type="text" name="genre_name" class="form-control" placeholder="Tên kiểu phim">
              </div>
              <div class="add">
                <label for="genre_id" class="form-label">ID thể loại</label>
                <input type="text" name="genre_id" class="form-control" placeholder="ID kiểu phim">
              </div>
              <div class="add">
                <label for="cat_id" class="form-label">Khóa phụ</label>
                <input type="text" name="cat_id" class="form-control" placeholder="ID thể loại phim">
              </div>
              <div class="add">
                <button class="btn" name="submit" href="#" role="button">Thêm kiểu loại</button>
              </div>
            </div>
        </div>
      </div>
      <div class="table">
        <table>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên kiểu phim</th>
            <th scope="col">ID thể loại</th>
            <th scope="col">ID kiểu phim</th>
            <th scope="col">Số phim</th>
            <th scope="col">Xem ngay</th>
            <th scope="col">Chức năng</th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($run2)) {
          ?>
            <tr>
              <th scope="row"><?php echo $row['id']; ?></th>
              <td><?php echo $row['genre_name']; ?></td>
              <td><?php echo $row['category_id']; ?></td>
              <td><?php echo $row['genreid']; ?></td>
              <?php
              $id = $row['id'];
              $query1 = "SELECT count(*) as total FROM movie,genre where genre.id= movie.genre_id and genre.id=$id;";
              $run1 = mysqli_query($con, $query1);
              if ($run1) {
                while ($row1 = mysqli_fetch_assoc($run1)) {
              ?>
                  <td><?php echo $row1['total']; ?></td>
              <?php
                }
              }
              ?>
              <td><a title="Xem" div class="curd" href="/viewgenre.php echo $row['id']; ?>" style="color:#20d187;">
                  <ion-icon name="play"></ion-icon>
                </a></td>

              <td>
                <div class="curd_icon">
                  <a title="Xóa" div class="curd dele" id="dele" onclick="return confirm('Bạn có muốn xóa kiểu phim này không?')" href="deletegenre.php?page=<?php echo $page ?>&deleteid=<?php echo $row['id']; ?>" style="color:#db183c;">
                    <ion-icon name="trash"></ion-icon>
                  </a>
                  <a title="Sửa" div class="curd" href="editgenre.php?id=<?php echo $row['id']; ?> &genrename=<?php echo $row['genre_name']; ?>&catid=<?php echo $row['category_id']; ?>&genreid=<?php echo $row['genreid']; ?>" style="color:#3c3ce7;">
                    <ion-icon name="create"></ion-icon>
                  </a>
                  </a>
                </div>
              </td>
            </tr>
          <?php
          }

          ?>
        </table>
      </div>
      <ul class="pagination">

        <?php
        $query3 = "SELECT * FROM genre ";
        $run3 = mysqli_query($con, $query3);
        $total = mysqli_num_rows($run3);
        $total_page = ceil($total / $rowsPerPage);

        if ($page > 1) {
          echo "<li ><a class='prev' href='genrelist.php?page=" . ($page - 1) . "'  >Prev</a></li>";
        } else {
          echo "<li ><a class='prev' href='genrelist.php?page=" . ($total_page) . "'  >Prev</a></li>";
        }
        for ($i = 1; $i <= $total_page; $i++) {
          if ($i  > $page - 3 && $i < $page + 3) {
            echo "<li ><a class='pageNumber' href='genrelist.php?page=" . ($i) . "'  >$i</a></li>";
          }
        }

        if ($total_page > $page) {
          echo "<li ><a class='next' href='genrelist.php?page=" . ($page + 1) . "'  >Next </a></li>";
        } else {
          echo "<li ><a class='next' href='genrelist.php?page=1'  >Next </a></li>";
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
  $gename = $_POST['genre_name'];
  $catid = $_POST['cat_id'];
  $genreid = $_POST['genre_id'];
  $query = "INSERT INTO `genre`( `genre_name`, `category_id`, `genreid`) VALUES ('$gename',$catid,$genreid)";
  $run = mysqli_query($con, $query);
  if ($run) {
    echo "<script> alert ('Đã thêm kiểu phim '); window.location.href='genrelist.php';</script>";
  } else {
    echo "<script> alert ('Đã xảy ra lỗi'); window.location.href='genrelist.php';</script>";
  }
}
?>