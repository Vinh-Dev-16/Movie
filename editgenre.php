<?php
include 'db.php';
include 'index.php';
include 'ft.php';
?>
<?php
$msg = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $genrename = $_GET['genrename'];
  $catid = $_GET['catid'];
  $genreid = $_GET['genreid'];
  if (isset($_POST['submit'])) {
    $genrename1 = $_POST['genrename1'];
    $catid1 = $_POST['catid1'];
    $genreid1 = $_POST['genreid1'];
    $query =  "UPDATE `genre` SET `genre_name`='$genrename1',`category_id`='$catid1',`genreid`='$genreid1' WHERE id=$id";
    $run = mysqli_query($con, $query);
    if ($run) {
      echo "<script> alert ('Đã sửa kiểu phim thành công');window.location.href='genrelist.php';</script>";
    } else {
      $msg = "<div class='alert'>Đã xảy ra lỗi</div>";
    }
  }
} else {
  $msg = "<div class='alert'>Đã xảy ra lỗi về submit</div>";
}
?>

<head>
  <link rel="stylesheet" href="/CSS/edit.css">
</head>

<body>
  <!-- Form sửa thể loại phim -->

  <div class="conatainer_edit">
    <div class="main_edit edit_genre">
      <div class="title_edit">
        <h2>Sửa kiểu phim</h2>
      </div>
      <?php
      echo $msg;
      ?>
      <div class="form_edit">
        <form action="#" method="post">
          <div class="form_movie">
            <div class="edit">
              <label for="genreid1" class="form-label">ID kiểu phim</label>
              <input type="text" class="form-control" name="genreid1" value="<?php echo $genreid; ?>" placeholder="ID kiểu phim">
            </div>
            <div class="edit">
              <label for="catid1" class="form-label">ID thể loại</label>
              <input type="text" class="form-control" name="catid1" value="<?php echo $catid; ?>" placeholder="ID thể loại">
            </div>
            <div class="edit">
              <label for="genrename1" class="form-label">Tên kiểu phim</label>
              <input type="text" class="form-control" name="genrename1" value="<?php echo $genrename; ?>" placeholder="Tên kiểu phim">
            </div>
            <div class="edit">
              <span>
                <button class="btn_edit" name="submit" href="#" role="button">Sửa kiểu phim</button>
              </span>
              <span>
                <a href="genrelist.php" class="link">Tới trang hiển thị kiểu phim</a>
              </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>