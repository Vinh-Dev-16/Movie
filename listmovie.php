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
$query = "SELECT * FROM movie  LIMIT $perRow,$rowsPerPage";
$run = mysqli_query($con, $query);
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/CSS/adminlist.css">
  <title>Movie</title>
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
      <?php if (isset($_GET['error'])) { ?>
        <p class="alert"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
      <!-- Form thêm phim -->
      <button id="open">Thêm thể loại phim</button>

      <!-- Form search -->

      <div class="search">
        <form action="searchmovie.php" method="Post">
          <input type="text" name="search_movie" placeholder="Nhập tên phim...">
          <button type="submit" name="submit">Tìm kiếm</button>
        </form>
      </div>

      <!-- Form điền bị hide -->
      <div class="add_modal movie_add" id="modal">

        <!-- Icon close -->

        <div id="movie_close">
          <ion-icon name="close-circle-outline"></ion-icon>
        </div>
        <div class="title_add">
          <h2>Thêm thể loại phim</h2>
        </div>

        <div class="form_add">
          <form action="valinew.php" method="post" enctype="multipart/form-data">
            <div class="form_movie">
              <div class="add">
                <label for="mv_name" class="form-label">Tên phim</label>
                <input type="text" name="mv_name" class="form-control" placeholder="Tên phim">
              </div>
              <div class="add">
                <label for="id" class="form-label">ID phim</label>
                <input type="text" name="id" class="form-control" placeholder="ID phim">
              </div>

              <!-- Category -->

              <div class="add">
                <label for="mv_cat" class="form-label">ID thể loại</label>
                    <select name="mv_cat[]" class="option_mul multiple_select" multiple >
                  <?php
                  $query6 = "SELECT * FROM category";
                  $run6 = mysqli_query($con, $query6);
                  while ($row6 = mysqli_fetch_assoc($run6)) {

                  ?>
                    <option value="<?php echo $row6['id']; ?>"><?php echo $row6['category_name']; ?></option>
                  <?php
                  }
                  ?>
                    </select>
              </div>

              <!-- Genre  -->

              <div class="add">
                <label for="mv_genre" class="form-label">ID kiểu phim</label>
                <input type="text" name="mv_genre" class="form-control" placeholder="ID kiểu phim" list="mv_genre">
                <datalist id=mv_genre>
                  <?php
                  $query7 = "SELECT * FROM genre";
                  $run7 = mysqli_query($con, $query7);
                  while ($row7 = mysqli_fetch_assoc($run7)) {

                  ?>
                    <option value="<?php echo $row7['id']; ?>"><?php echo $row7['genre_name']; ?></option>
                  <?php
                  }
                  ?>
                  <datalist>
              </div>

              <!-- Quốc gia -->

              <div class="add">

                <label for="mv_nation" class="form-label">ID quốc gia</label>
                <input type="text" name="mv_nation" class="form-control" placeholder="ID quốc gia" list="mv_nation">
                <datalist id=mv_nation>
                  <?php
                  $query8 = "SELECT * FROM nation";
                  $run8 = mysqli_query($con, $query8);
                  while ($row8 = mysqli_fetch_assoc($run8)) {

                  ?>
                    <option value="<?php echo $row8['id']; ?>"><?php echo $row8['nation_name']; ?></option>
                  <?php
                  }
                  ?>
                  <datalist>
              </div>
              <!-- Năm -->

              <div class="add">
                <label for="mv_year" class="form-label">Năm sản xuất</label>
                <input type="text" name="mv_year" class="form-control" placeholder="Năm sản xuất" list="mv_year">

                <datalist id=mv_year>
                  <?php
                  $query9 = "SELECT * FROM year";
                  $run9 = mysqli_query($con, $query9);
                  while ($row9 = mysqli_fetch_assoc($run9)) {

                  ?>
                    <option value="<?php echo $row9['id']; ?>"><?php echo $row9['year']; ?></option>
                  <?php
                  }
                  ?>
                  </datalist>
              </div>

              <div class="add">
                <label for="mv_date" class="form-label">Ngày cập nhật</label>
                <input type="date" name="mv_date" class="form-control" placeholder="Ngày cập nhật">
              </div>
              <div class="add">
                <label for="mv_actor" class="form-label">Diễn viên</label>
                <input type="text" name="mv_actor" class="form-control" placeholder="Diễn viên">
              </div>
              <div class="add">
                <label for="mv_des" class="form-label">Đạo diễn</label>
                <input type="text" name="mv_des" class="form-control" placeholder="Đạo diễn">
              </div>
              <div class="add">
                <label for="mv_quality" class="form-label">Chất lượng</label>
                <input type="text" name="mv_quality" class="form-control" placeholder="Chất lượng">
              </div>
              <div class="add">
                <label for="mv_duration" class="form-label">Thời lượng</label>
                <input type="text" name="mv_duration" class="form-control" placeholder="Thời lượng">
              </div>
              <div class="add">
                <label for="mv_tag" class="form-label">Movie Tag</label>
                <input type="text" name="mv_tag" class="form-control" placeholder="Movie Tag">
              </div>
              <div class="add">
                <label for="mv_status" class="form-label">Trạng thái</label>
                <input type="text" name="mv_status" class="form-control" placeholder="Trạng thái">
              </div>
              <div class="add">
                <label for="mv_trailer" class="form-label">Trailer</label>
                <input type="text" name="mv_trailer" class="form-control" placeholder="Trailer">
              </div>
              <div class="add">
                <label for="mv_request" class="form-label">Yêu cầu độ tuổi</label>
                <input type="text" name="mv_request" class="form-control" placeholder="Yêu cầu độ tuổi">
              </div>
              <div class="add">
                <label for="mv_IMDb" class="form-label">IMDb</label>
                <input type="text" name="mv_IMDb" class="form-control" placeholder="IMDb">
              </div>
              <div class="add">
                <label for="mv_role" class="form-label">Phân loại</label>
                <input type="text" name="mv_role" class="form-control" placeholder="Phân loại"  list="mv_role">
                <datalist id=mv_role>
                  <?php
                  $query9 = "SELECT * FROM movie limit 2";
                  $run9 = mysqli_query($con, $query9);
                  while ($row9 = mysqli_fetch_assoc($run9)) {

                  ?>
                    <option value="<?php echo $row9['mv_role']; ?>"></option>
                  <?php
                  }
                  ?>
                  <datalist>
              </div>
              <div class="add">
                <label for="mv_img" class="form-label">Link ảnh</label>
                <input type="text" name="mv_img" class="form-control" placeholder="Link ảnh">
              </div>
              <div class="add">
                <label for="mv_bg" class="form-label">Link background</label>
                <input type="text" name="mv_bg" class="form-control" placeholder="Link background-images">
              </div>
              <div class="add">
                <label for="mv_deces" class="form-label">Mô tả</label>
                <textarea type="text" name="mv_deces" class="form-control" placeholder="Mô tả" rows="5"></textarea>
              </div>
              <div class="add">
                <button class="btn" name="submit" href="#" role="button">Thêm phim</button>
              </div>
            </div>
        </div>
      </div>

      <!-- Bảng thông tin  -->

      <div class="table">
        <table>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ảnh phim</th>
            <th scope="col">Tên phim</th>
            <th scope="col">Tên thể loại</th>
            <th scope="col">Tên kiểu phim</th>
            <th scope="col"> Năm</th>
            <th scope="col"> Quốc gia</th>
            <th scope="col">Chức năng</th>

          </tr>
          <?php

          // Lấy dữ liệu từ database

          while ($row = mysqli_fetch_assoc($run)) {

          ?>

            <tr>
              <th scope="row"><?php echo $row['id']; ?></th>
              <td id="images"><img src="<?php echo $row['mv_img']; ?>" alt="ảnh phim"></td>
              <td><?php echo $row['mv_name']; ?></td>

              <!-- Database thể loại -->
              <td>
              <?php
              $id = $row['id'];
              $query1 = "SELECT * FROM movie,cat_mv,category WHERE cat_mv.mv_id=movie.id and cat_mv.category_id=category.id and movie.id=$id";
              $run1 = mysqli_query($con, $query1);
              if ($run1) {
                while ($row1 = mysqli_fetch_assoc($run1)) {

              ?>
                  <?php echo $row1['category_name'] ; ?> ,
              <?php
                }
              }

              ?>
             </td>
              <!-- Database kiểu phim -->

              <?php
              $id = $row['id'];
              $query2 = "SELECT * FROM movie,genre WHERE genre.id=movie.genre_id and movie.id=$id";
              $run2 = mysqli_query($con, $query2);
              if ($run2) {
                while ($row2 = mysqli_fetch_assoc($run2)) {

              ?>
                  <td><?php echo $row2['genre_name']; ?></td>
              <?php
                }
              }

              ?>

              <!-- Database năm -->

              <?php
              $id = $row['id'];
              $query4 = "SELECT * FROM movie,year WHERE year.id=movie.mv_year and movie.id=$id";
              $run4 = mysqli_query($con, $query4);
              if ($run4) {
                while ($row4 = mysqli_fetch_assoc($run4)) {

              ?>
                  <td><?php echo $row4['year']; ?></td>
              <?php
                }
              }

              ?>

              <!-- Database quốc gia -->

              <?php
              $id = $row['id'];
              $query5 = "SELECT * FROM movie,nation WHERE nation.id=movie.mv_nation and movie.id=$id";
              $run5 = mysqli_query($con, $query5);
              if ($run5) {
                while ($row5 = mysqli_fetch_assoc($run5)) {

              ?>
                  <td><?php echo $row5['nation_name']; ?></td>
              <?php
                }
              }

              ?>

              <td>
                <div class="curd_icon">
                  <a title="Xóa" div class="curd" onclick="return confirm('Bạn có muốn xóa thể loại phim này không?')" href="deletemovie.php?page=<?php echo $page ?>&deleteid=<?php echo $row['id']; ?>" style="color:#db183c;">
                    <ion-icon name="trash"></ion-icon>
                  </a>
                  <a title="Thêm" div class="curd" href="editmovie.php?id=<?php echo $row['id']; ?>" style="color:#3c3ce7;">
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
        $query3 = "SELECT * FROM movie ";
        $run3 = mysqli_query($con, $query3);
        $total = mysqli_num_rows($run3);
        $total_page = ceil($total / $rowsPerPage);

        if ($page > 1) {
          echo "<li ><a class='prev' href='listmovie.php?page=" . ($page - 1) . "'  >Prev</a></li>";
        } else {
          echo "<li ><a class='prev' href='listmovie.php?page=" . ($total_page) . "'  >Prev</a></li>";
        }
        for ($i = 1; $i <= $total_page; $i++) {
          if ($i  > $page - 3 && $i < $page + 3) {
            echo "<li ><a class='pageNumber' href='listmovie.php?page=" . ($i) . "'  >$i</a></li>";
          }
        }

        if ($total_page > $page) {
          echo "<li ><a class='next' href='listmovie.php?page=" . ($page + 1) . "'  >Next </a></li>";
        } else {
          echo "<li ><a class='next' href='listmovie.php?page=1'  >Next </a></li>";
        }

        ?>
      </ul>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- Js hiển thị form -->

  <script>
    const open = document.getElementById('open');
    const modal = document.getElementById('modal');
    const bg = document.getElementById('bg');
    const close = document.getElementById('movie_close');
    open.onclick = function() {
      modal.classList.toggle('active');
      bg.classList.toggle('active');
    };
    close.onclick = function() {
      modal.classList.remove('active');
      // bg.classList.remove('active');
    }


    // Select
    $(".multiple_select").select2({
      // maximumSelectionLength: 2
    });
  </script>
</body>