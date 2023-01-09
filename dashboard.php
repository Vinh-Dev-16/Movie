<?php
include 'db.php';
include 'ft.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/CSS/dashboard.css">
     <title>DashBoard</title>
</head>
 <?php
     include 'index.php';
   ?> 
<div class="container_dashboard">
    <div class="main_dashboard">
        <div class="card_box">
            <div class="card">
                <div>
                    <?php
                    $update = "UPDATE view set view_page=view_page+1 limit 1";
                    $run1 = mysqli_query($con, $update);
                    $query = "SELECT * FROM view";
                    $run = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($run);
                    ?>
                    <div class="numbers"><?php echo $row['view_page']; ?></div>
                    <div class="card_name">Số lượt truy cập trang</div>
                </div>
                <div class="icon_bx">
                    <ion-icon name="eye"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                <?php
                    $query1 = "SELECT count(*)  as total FROM account";
                    $run2 = mysqli_query($con, $query1);
                    if ($run2) {
                        while ($row2 = mysqli_fetch_assoc($run2)) {
                    ?>
                            <div class="numbers"><?php echo $row2['total']; ?></div>
                    <?php
                        }
                    }
                    ?>
                    <div class="card_name">Số thành viên</div>
                </div>
                <div class="icon_bx">
                    <ion-icon name="person-add"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php
                    $query1 = "SELECT count(*)  as total FROM movie";
                    $run2 = mysqli_query($con, $query1);
                    if ($run2) {
                        while ($row2 = mysqli_fetch_assoc($run2)) {
                    ?>
                            <div class="numbers"><?php echo $row2['total']; ?></div>
                    <?php
                        }
                    }
                    ?>

                    <div class="card_name">Số phim</div>
                </div>
                <div class="icon_bx">
                    <ion-icon name="film"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                <?php
                    $query1 = "SELECT count(*)  as total FROM contact";
                    $run2 = mysqli_query($con, $query1);
                    if ($run2) {
                        while ($row2 = mysqli_fetch_assoc($run2)) {
                    ?>
                            <div class="numbers"><?php echo $row2['total']; ?></div>
                    <?php
                        }
                    }
                    ?>
                    <div class="card_name">Số đóng góp</div>
                </div>
                <div class="icon_bx">
                    <ion-icon name="chatboxes"></ion-icon>
                </div>
            </div>
        </div>
        <div class="body">
            <h2> Đây là sản phẩm của đề tài thực tập</h2>
            <br>
            <p>Thông tin</p>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
</body>

</html>