<?php
include 'db.php';
include 'index.php';
include 'ft.php';
?>
<?php
$msg = "";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM `movie` WHERE id=$id";
  $run = mysqli_query($con, $query);
  if ($run) {
    while ($row = mysqli_fetch_assoc($run)) {
?>

      <head>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/CSS/edit.css">
      </head>

      <body>
        <!-- Form sửa thể loại phim -->

        <div class="conatainer_edit">
          <div class="main_edit movie">
            <div class="title_edit">
              <h2>Chỉnh sửa phim</h2>
            </div>
            <div class="form_edit">
              <form action="#" method="post">
                <div class="form-movie">
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_name'] ?>" name="mv_name" class="form-control" placeholder="Tên phim">
                  </div>
                  <div class="edit">
               
                <input type="text" value="<?php echo $row['id'] ?>" name="id" class="form-control" placeholder="ID phim">
              </div>


                  <!-- Category -->

                  <div class="edit">
                    <select name="mv_cat[]" class="option_mul multiple_select" multiple>
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

                  <!-- Genre -->

                  <div class="edit">
                    <input type="text" value="<?php echo $row['genre_id'] ?>" name="mv_genre" class="form-control" placeholder="ID kiểu phim" list="mv_genre">
                    <datalist id=mv_genre>
                      <?php
                      $query3 = "SELECT * FROM genre";
                      $run3 = mysqli_query($con, $query3);
                      while ($row3 = mysqli_fetch_assoc($run3)) {

                      ?>
                        <option value="<?php echo $row3['id']; ?>"><?php echo $row3['genre_name']; ?></option>
                      <?php
                      }
                      ?>
                      <datalist>
                  </div>

                  <!-- Quốc gia -->

                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_nation'] ?>" name="mv_nation" class="form-control" placeholder="Quốc gia" list="mv_nation">
                    <datalist id=mv_nation>
                      <?php
                      $query4 = "SELECT * FROM nation";
                      $run4 = mysqli_query($con, $query4);
                      while ($row4 = mysqli_fetch_assoc($run4)) {

                      ?>
                        <option value="<?php echo $row4['id']; ?>"><?php echo $row4['nation_name']; ?></option>
                      <?php
                      }
                      ?>
                      <datalist>
                  </div>

                  <!-- Năm -->

                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_year'] ?>" name="mv_year" class="form-control" placeholder="Năm sản xuất" list="mv_year">
                    <datalist id=mv_year>
                      <?php
                      $query5 = "SELECT * FROM year";
                      $run5 = mysqli_query($con, $query5);
                      while ($row5 = mysqli_fetch_assoc($run5)) {

                      ?>
                        <option value="<?php echo $row5['id']; ?>"><?php echo $row5['year']; ?></option>
                      <?php
                      }
                      ?>
                      <datalist>
                  </div>
                  <div class="edit">
                    <input type="date" value="<?php echo $row['mv_date'] ?>" name="mv_date" class="form-control" placeholder="Ngày cập nhật">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_actor'] ?>" name="mv_actor" class="form-control" placeholder="Diễn viên">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_des'] ?>" name="mv_des" class="form-control" placeholder="Đạo diễn">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_quality'] ?>" name="mv_quality" class="form-control" placeholder="Chất lượng">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_duration'] ?>" name="mv_duration" class="form-control" placeholder="Thời lượng">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_tag'] ?>" name="mv_tag" class="form-control" placeholder="Movie Tag">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_status'] ?>" name="mv_status" class="form-control" placeholder="Trạng thái">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_trailer'] ?>" name="mv_trailer" class="form-control" placeholder="Trailer">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_request'] ?>" name="mv_request" class="form-control" placeholder="Yêu cầu độ tuổi">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['IMDb'] ?>" name="mv_IMDb" class="form-control" placeholder="IMDb">
                  </div>
                  <div class="edit">
                    <input type="text" name="mv_role" value="<?php echo $row['mv_role'] ?>"  class="form-control" placeholder="Phân loại" list="mv_role">
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
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_img'] ?>" name="mv_img" class="form-control" placeholder="Link ảnh">
                  </div>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_bg'] ?>" name="mv_bg" class="form-control" placeholder="Link background-images">
                  </div>
                  <br>
                  <div class="edit">
                    <input type="text" value="<?php echo $row['mv_deces'] ?>" name="mv_deces" class="form-control deces" placeholder="Mô tả" rows="5">
                  </div>
                  <div class="edit">
                    <span>
                      <button class="btn_edit" name="submit" href="#" role="button">Chỉnh sửa phim</button>
                    </span>
                    <span>
                      <a href="listmovie.php" class="link">Tới trang hiển thị phim</a>
                    </span>
                  </div>
              </form>
            </div>
          </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
          // Select
          $(".multiple_select").select2({
            // maximumSelectionLength: 2
          });
        </script>
      </body>
      <?php
      if (isset($_POST['submit'])) {
        $mv_name = $_POST['mv_name'];
        if (empty($mv_name)) {
          echo "<div class='noti'> 
          <h2> Thông báo lỗi </h2>
          <p> Không để trống trường tên phim </p>
       </div>";
       exit();
        }
        $id = $_POST['id'];
        $mv_cat = $_POST['mv_cat'];
        foreach ($mv_cat as $cat) {

          $query1 = "INSERT INTO `cat_mv`(`mv_id`, `category_id`) VALUES ('$id','$cat')";
          $run1 = mysqli_query($con, $query1);
      
        }
        $mv_genre = $_POST['mv_genre'];
        $mv_date = date('Y-m-d', strtotime($_POST['mv_date']));
        $mv_actor = $_POST['mv_actor'];
        $mv_des = $_POST['mv_des'];
        $mv_nation = $_POST['mv_nation'];
        $mv_quality = $_POST['mv_quality'];
        $mv_duration = $_POST['mv_duration'];
        $mv_year = ($_POST['mv_year']);
        $mv_tag = $_POST['mv_tag'];
        $mv_status = $_POST['mv_status'];
        $mv_trailer = $_POST['mv_trailer'];
        $mv_request = $_POST['mv_request'];
        $imdb = $_POST['mv_IMDb'];
        $mv_img = $_POST['mv_img'];
        $mv_bg = $_POST['mv_bg'];
        $mv_deces = $_POST['mv_deces'];
        // $page = $_GET['page'];
        $update = "UPDATE `movie` SET `id` = '$id',`genre_id`='$mv_genre',
    `mv_nation`='$mv_nation',`mv_year`='$mv_year',`mv_date`= '$mv_date',`mv_name`='$mv_name',
    `mv_actor`='$mv_actor',`mv_des`='$mv_des',`mv_img`='$mv_img',`mv_bg`='$mv_bg',
    `mv_quality`='$mv_quality',`mv_duration`='$mv_duration',`mv_tag`='$mv_tag',
    `mv_status`='$mv_status',`mv_trailer`='$mv_trailer',`IMDb`='$imdb',`mv_request`='$mv_request',
    `mv_deces`='$mv_deces' WHERE id=$id";
        $check = mysqli_query($con, $update);
        if ($check) {
          echo "<div class='noti success_noti'> 
          <h2> Thông báo thành công </h2>
          <p> Đã sửa thông tin thành công </p>
       </div>";
       echo "<script> window.location.href='userInfor.php?id=$id' </script>";
          echo "<script> window.location.href='listmovie.php?';</script>";
          exit();
        } else {
          echo "<div class='noti'> 
          <h2> Thông báo lỗi </h2>
          <p> Xảy ra lỗi về lưu database </p>
       </div>";
       exit();

        }
      }
      ?>
<?php
    }
  }
}
?>