<?php
include 'db.php';
include 'index.php';
include 'ft.php';
?>
<?php
$msg = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $yr_id = $_GET['yr_id'];
  $yr_name = $_GET['yr_name'];
  if (isset($_POST['submit'])) {
    $year_id = $_POST['year_id'];
    $year_name = $_POST['year_name'];
    $query = "UPDATE `year` SET `year_id`='$year_id',`year`='$year_name' WHERE id=$id";
    $run = mysqli_query($con, $query);
    if ($run) {
      echo "<script> alert ('Đã sửa năm thành công');window.location.href='year.php';</script>";
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
  <!-- Form edit quốc gia -->

  <div class="conatainer_edit">
    <div class="main_edit">
      <div class="title_edit">
        <h2>Sửa năm</h2>
      </div>
      <?php
      echo $msg;
      ?>
      <div class="form_edit">
        <form action="#" method="post">
          <div class="form_movie">
            <div class="edit">
              <label for="year_id" class="form-label">ID năm</label>
              <input type="text" class="form-control" name="year_id" value="<?php echo $yr_id; ?>" placeholder="ID">
            </div>
            <div class="edit">
              <label for="year_name" class="form-label">Năm</label>
              <input type="text" class="form-control" name="year_name" value="<?php echo $yr_name; ?>" placeholder="Tên quốc gia">
            </div>
            <div class="edit">
              <span>
                <button class="btn_edit" name="submit" href="#" role="button">Sửa năm</button>
              </span>
              <span>
                <a href="year.php" class="link">Tới trang hiển thị năm</a>
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