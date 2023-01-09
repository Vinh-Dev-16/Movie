<?php
include 'db.php';
include 'ft.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowsPerPage = 05;
$perRow = ($page - 1) * 05;
$query = "SELECT * FROM complete  LIMIT $perRow,$rowsPerPage";
$run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/CSS/adminlist.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete</title>
</head>

<body>
    <?php
    include_once "index.php";
    ?>
    <div class="container">
        <div class="main">
            <div class="title">
                <h1>Danh sách phản hồi đã đọc</h1>
            </div>
            <?php if (isset($_GET['error'])) { ?>
                <p class="alert"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <div class="table">
                <table>
                    <tr>
                        <th>ID Message</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Tin nhắn</th>
                        <th>Ngày</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php

                    while ($row = mysqli_fetch_assoc($run)) {

                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['uname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['complete_date']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <div class="curd_icon">
                                    <a title="Xóa" div class="curd" onclick="return confirm('Bạn có muốn xóa admin này không?')" href="deleteComplete.php?id=<?php echo $row['id']; ?>" style="color:#db183c;">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>

                            </td>
            </div>
            </tr>
        <?php
                    }


        ?>
        </table>

        </div>
        <ul class="pagination">

            <?php
            $query2 = "SELECT * FROM contact ";
            $run2 = mysqli_query($con, $query2);
            $total = mysqli_num_rows($run2);
            $total_page = ceil($total / $rowsPerPage);

            if ($page > 1) {
                echo "<li ><a class='prev' href='completeAdmin.php?page=" . ($page - 1) . "'  >Prev</a></li>";
            } else {
                echo "<li ><a class='prev' href='completeAdmin.php?page=" . ($total_page) . "'  >Prev</a></li>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
                // if($i != $page){

                if ($i  > $page - 3 && $i < $page + 3) {
                    echo "<li ><a class='pageNumber' href='completeAdmin.php?page=" . ($i) . "'  >$i</a></li>";
                }
            }

            if ($total_page > $page) {
                echo "<li ><a class='next' href='completeAdmin.php?page=" . ($page + 1) . "'  >Next </a></li>";
            } else {
                echo "<li ><a class='next' href='completeAdmin.php?page=1'  >Next </a></li>";
            }

            ?>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

</body>

</html>