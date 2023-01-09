<?php
include 'db.php';
include 'index.php';
include 'ft.php';
?>
<?php
$msg = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $movie_id = $_GET['movie_id'];
  $episode_name = $_GET['episode_name'];
  $episode_url = $_GET['episode_url'];
  if (isset($_POST['submit'])) {
    $mv_id = $_POST['mv_id'];
    $es_name = $_POST['es_name'];
    $es_url  = $_POST['es_url'];
    $query = "UPDATE `episode` SET `mv_id`='$mv_id',`es_name`='$es_name',`es_url`='$es_url' WHERE id=$id";
    $run = mysqli_query($con, $query);
    if ($run) {
      echo "<script> alert ('Đã sửa tập phim thành công');window.location.href='eslist.php';</script>";
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
        <h2>Sửa tập phim</h2>
      </div>
      <?php
      echo $msg;
      ?>
      <div class="form_edit">
        <form action="#" method="post">
          <div class="form_movie">
            <div class="edit">
              <label for="mv_id" class="form-label">ID phim</label>
              <input type="text" class="form-control" name="mv_id" value="<?php echo $movie_id; ?>" placeholder="ID phim">
            </div>
            <div class="edit">
              <label for="es_name" class="form-label">Tên tập phim</label>
              <input type="text" class="form-control" name="es_name" value="<?php echo $episode_name; ?>" placeholder="Tên tập phim">
            </div>
            <div class="edit">
              <label for="es_url" class="form-label">Link tập phim</label>
              <input type="text" class="form-control" name="es_url" value="<?php echo $episode_url; ?>" placeholder="link tập phim">
            </div>
            <div class="edit">
              <span>
                <button class="btn_edit" name="submit" href="#" role="button">Sửa tập phim</button>
              </span>
              <span>
                <a href="eslist.php" class="link">Tới trang danh sách tập phim</a>
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