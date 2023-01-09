<?php
include 'db.php';
include 'ft.php';
?>
<?php
if (isset($_POST['submit'])) {
  $search = $_POST['search_es'];
  $searchpreg = preg_replace("#[^0-9a-z]#i", "", $search);
  $query = "SELECT * FROM episode where es_name Like '%$search%'  ";
  $run = mysqli_query($con, $query);
  $count = mysqli_num_rows($run);
  if ($count > 0) {

?>

    <head>
      <link rel="stylesheet" href="/CSS/adminlist.css">
      <title>Search Episode</title>
    </head>

    <body>
      <?php
      include_once "index.php";
      ?>
      <div class="container" id="bg">
        <div class="main">

          <!-- Tiêu đề -->

          <div class="title">
            <h1>Danh sách các tập phim</h1>
          </div>
          <div class="infor_search">
            <p>Kết quả tìm kiếm cho <?php echo $search ?></p>
          </div>
          <div class="table">
            <table>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tập</th>
                <th scope="col">ID phim</th>
                <th scope="col">Tên phim</th>
                <th scope="col">Link tập</th>
                <th scope="col">Chức năng</th>

              </tr>
              <?php

              // Lấy dữ liệu từ database

              while ($row = mysqli_fetch_assoc($run)) {

              ?>
                <tr>
                  <th scope="row"><?php echo $row['id']; ?></th>
                  <td><?php echo $row['es_name']; ?></td>
                  <td><?php echo $row['mv_id']; ?></td>
                  <?php
                  $id = $row['id'];
                  $query1 = "SELECT * FROM movie,episode WHERE episode.mv_id=movie.id and episode.id=$id";
                  $run1 = mysqli_query($con, $query1);
                  if ($run1) {
                    while ($row1 = mysqli_fetch_assoc($run1)) {

                  ?>
                      <td><?php echo $row1['mv_name']; ?></td>
                  <?php
                    }
                  }

                  ?>
                  <td><?php echo $row['es_url']; ?></td>
                  <td>
                    <div class="curd_icon">
                      <a div class="curd" onclick="return confirm('Bạn có muốn xóa tập phim này không?')" href="deletees.php?page=<?php echo $page ?>&deleteid=<?php echo $row['id']; ?>" style="color:#db183c;">
                        <ion-icon name="trash"></ion-icon>
                      </a>
                      <a div class="curd" href="edites.php?id=<?php echo $row['id']; ?>&episode_name=<?php echo $row['es_name']; ?>&movie_id=<?php echo $row['mv_id']; ?>&episode_url=<?php echo $row['es_url']; ?>" style="color:#3c3ce7;">
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
      <?php

    } else {
      ?>
       <head>
      <link rel="stylesheet" href="/CSS/adminlist.css">
      <title>Search Episode</title>
    </head>

    <body>
      <?php
      include_once "index.php";
      ?>
      <div class="container" id="bg">
        <div class="main">

          <!-- Tiêu đề -->

          <div class="title">
            <h1>Danh sách các tập phim</h1>
          </div>
          <div class="infor_search">
            <p>Kết quả tìm kiếm cho <?php echo $search ?></p>
          </div>
          <p>Không có phim như tìm kiếm</p>
      <?php
    }
  }

      ?>
      <?php
      if (isset($_POST['submit'])) {
        $search1 = $_POST['search_es'];
        $searchpreg1 = preg_replace("#[^0-9a-z]#i", "", $search1);
        $query1 = "SELECT * FROM movie where mv_name Like '%$search1%'  ";
        $run1 = mysqli_query($con, $query1);
        $count1 = mysqli_num_rows($run1);
        if ($count1 > 0) {

      ?>

          <head>
            <link rel="stylesheet" href="/CSS/adminlist.css">
          </head>

          <body>
            <div class="container" id="bg">
              <div class="main">

                <!-- Tiêu đề -->

                <div class="title">
                  <h1>Danh sách các tập phim</h1>
                </div>
                <div class="table">
                  <table>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tập</th>
                      <th scope="col">ID phim</th>
                      <th scope="col">Tên phim</th>
                      <th scope="col">Link tập</th>
                      <th scope="col">Chức năng</th>

                    </tr>
                    <?php

                    // Lấy dữ liệu từ database

                    while ($row1 = mysqli_fetch_assoc($run1)) {

                    ?>
                      <tr>

                        <?php
                        $id = $row1['id'];
                        $query2 = "SELECT * FROM movie,episode WHERE episode.mv_id=movie.id and episode.mv_id=$id";
                        $run2 = mysqli_query($con, $query2);
                        if ($run2) {
                          while ($row2 = mysqli_fetch_assoc($run2)) {

                        ?>
                            <th scope="row"><?php echo $row1['id']; ?></th>
                            <td><?php echo $row2['es_name']; ?></td>
                            <td><?php echo $row2['mv_id']; ?></td>

                            <td><?php echo $row1['mv_name']; ?></td>

                            <td><?php echo $row2['es_url']; ?></td>

                            <td>
                              <div class="curd_icon">
                                <a div class="curd" onclick="return confirm('Bạn có muốn xóa tập phim này không?')" href="deletees.php?page=<?php echo $page ?>&deleteid=<?php echo $row2['id']; ?>" style="color:#db183c;">
                                  <ion-icon name="trash"></ion-icon>
                                </a>
                                <a div class="curd" href="edites.php?id=<?php echo $row2['id']; ?>&episode_name=<?php echo $row2['es_name']; ?>&movie_id=<?php echo $row2['mv_id']; ?>&episode_url=<?php echo $row2['es_url']; ?>" style="color:#3c3ce7;">
                                  <ion-icon name="create"></ion-icon>
                                </a>
                              </div>
                            </td>
                      </tr>

                  <?php
                          }
                        }
                  ?>
                <?php
                    }

                ?>
                  </table>
                </div>
            <?php

          }
        }

            ?>

            <div class="turn_back">
              <a href="eslist.php">Quay lại danh sách tập phim</a>
            </div>