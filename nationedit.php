<?php
include 'db.php';
include 'index.php';
include 'ft.php';
?>
<?php
$msg = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $nation_id = $_GET['nation_id'];
  $nation_name = $_GET['nation_name'];
  if (isset($_POST['submit'])) {
    $nati_id = $_POST['nati_id'];
    $nati_name = $_POST['nati_name'];
    $query = "UPDATE `nation` SET `nation_id`='$nati_id',`nation_name`='$nati_name' WHERE id=$id";
    $run = mysqli_query($con, $query);
    if ($run) {
      echo "<script> alert ('Đã sửa quốc gia thành công');window.location.href='nation.php';</script>";
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
        <h2>Sửa quốc gia</h2>
      </div>
      <?php
      echo $msg;
      ?>
      <div class="form_edit">
        <form action="#" method="post">
          <div class="form_movie">
            <div class="edit">
              <label for="nati_id" class="form-label">ID quốc gia</label>
              <input type="text" class="form-control" name="nati_id" value="<?php echo $nation_id; ?>" placeholder="ID">
            </div>
            <div class="edit">
              <label for="nati_name" class="form-label">Tên quốc gia</label>
              <input type="text" class="form-control" name="nati_name" value="<?php echo $nation_name; ?>" placeholder="Tên quốc gia">
            </div>
            <div class="edit">
              <span>
                <button class="btn_edit" name="submit" href="#" role="button">Sửa quốc gia</button>
              </span>
              <span>
                <a href="nation.php" class="link">Tới trang hiển thị quốc gia</a>
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