<?php
include 'db.php';
include 'ft.php';
?>
<?php
if (isset($_POST['submit'])) {
  $search = $_POST['search_movie'];
  $searchpreg = preg_replace("#[^0-9a-z]#i", "", $search);
  $query = "SELECT * FROM movie where mv_name Like '%$search%' ";
  $run = mysqli_query($con, $query);
  $count = mysqli_num_rows($run);
  if ($count == 0) {
    ?>
    <head>
    <link rel="stylesheet" href="/CSS/adminlist.css">
    <title>Search Movie</title>
  </head>

  <body>
    <?php
    include_once "index.php";
    ?>
    <div class="container" id="bg">
      <div class="main">

        <!-- Tiêu đề -->

        <div class="title">
          <h1>Danh sách các phim</h1>
        </div>
        <div class="infor_search">
          <p>Kết quả tìm kiếm cho <?php echo $search ?></p>
        </div>
              <p>Không có phim như tìm kiếm</p>
      </div>
    </div>
    <?php
  } else {
?>

    <head>
      <link rel="stylesheet" href="/CSS/adminlist.css">
      <title>Search Movie</title>
    </head>

    <body>
      <?php
      include_once "index.php";
      ?>
      <div class="container" id="bg">
        <div class="main">

          <!-- Tiêu đề -->

          <div class="title">
            <h1>Danh sách các phim</h1>
          </div>
          <div class="infor_search">
            <p>Kết quả tìm kiếm cho <?php echo $search ?></p>
          </div>
          <div class="table">
            <table>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ảnh phim</th>
                <th scope="col">Tên phim</th>
                <th scope="col">ID thể loại</th>
                <th scope="col">ID kiểu phim</th>
                <th scope="col">ID năm</th>
                <th scope="col">ID quốc gia</th>
                <th scope="col">Chức năng</th>
              </tr>
              <?php

              while ($row = mysqli_fetch_assoc($run)) {
              ?>
                <tr>
                  <th scope="row"><?php echo $row['id']; ?></th>
                  <td id="images"><img src="<?php echo $row['mv_img']; ?>" alt="ảnh phim"></td>
                  <td><?php echo $row['mv_name']; ?></td>
                  <td><?php echo $row['cat_id']; ?></td>
                  <td><?php echo $row['genre_id']; ?></td>
                  <td><?php echo $row['mv_year']; ?></td>
                  <td><?php echo $row['mv_nation']; ?></td>
                  <td>
                    <div class="curd_icon">
                      <a div class="curd" onclick="return confirm('Bạn có muốn xóa thể loại phim này không?')" href="deletemovie.php?page=<?php echo $page ?>&deleteid=<?php echo $row['id']; ?>" style="color:#db183c;">
                        <ion-icon name="trash"></ion-icon>
                      </a>
                      <a div class="curd" href="editmovie.php?id=<?php echo $row['id']; ?>" style="color:#3c3ce7;">
                        <ion-icon name="create"></ion-icon>
                      </a>
                    </div>
                  </td>
                </tr>
          <?php
              }
            }
          }
          ?>
            </table>
          </div>
          <div class="turn_back">
            <a href="listmovie.php">Quay lại danh sách phim</a>
          </div>