<?php
include 'db.php';
include 'index.php';
include 'ft.php';
?>
<?php
$msg = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $catname = $_GET['catname'];
  $fk = $_GET['forkey'];
  $cnameasci = $_GET['categorynameascii'];
  $cnametag = $_GET['categorynametag'];
  if (isset($_POST['submit'])) {
    $cname = $_POST['categoryname'];
    $catnameasc = $_POST['catnameascii'];
    $catnametag = $_POST['cattag'];
    $frk = $_POST['foriegnkey'];
    $pri = $_POST['primary'];
    $query =  "UPDATE `category` SET `id`='$pri',`category_id`='$frk',`category_name`='$cname',`cat_name_ascii`='$catnameasc',`cat_name_tag`='$catnametag' WHERE id= $id";
    $run = mysqli_query($con, $query);
    if ($run) {
      echo "<script> alert ('Đã sửa thể loại phim thành công');window.location.href='categorylist.php';</script>";
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
    <div class="main_edit">
      <div class="title_edit">
        <h2>Sửa thể loại phim</h2>
      </div>
      <?php
      echo $msg;
      ?>
      <div class="form_edit">
        <form action="#" method="post">
          <div class="form_movie">
            <div class="edit">
              <label for="primary" class="form-label">ID chính</label>
              <input type="text" class="form-control" name="primary" value="<?php echo $id; ?>" placeholder="ID chính">
            </div>
            <div class="edit">
              <label for="foriegnkey" class="form-label">Khóa phụ</label>
              <input type="text" class="form-control" name="foriegnkey" value="<?php echo $fk; ?>" placeholder="Khóa phụ">
            </div>
            <div class="edit">
              <label for="categoryname" class="form-label">Tên thể loại</label>
              <input type="text" class="form-control" name="categoryname" value="<?php echo $catname; ?>" placeholder="Tên thể loại">
            </div>
            <div class="edit">
              <label for="catnameascii" class="form-label">Tên thể loại không dấu </label>
              <input type="text" class="form-control" name="catnameascii" value="<?php echo $cnameasci; ?>" placeholder="Tên không dấu">
            </div>
            <div class="edit">
              <label for="cattag" class="form-label">Tag thể loại</label>
              <input type="text" class="form-control" name="cattag" value="<?php echo $cnametag; ?>" placeholder="Tag thể loại">
            </div>
            <div class="edit">
              <span>
                <button class="btn_edit" name="submit" href="#" role="button">Sửa thể loại</button>
              </span>
              <span>
                <a href="categorylist.php" class="link">Tới trang hiển thị thể loại</a>
              </span>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
</body>