<?php
include 'db.php';
include 'ft.php';

$id = $_GET['unameid'];
$query = "DELETE FROM `admin` WHERE id = $id";
$run = mysqli_query($con,$query);
if($run){
    header("Location: adminlist.php?success=Đã xóa tài khoản thành công");
    exit();
}
else{
    header("Location: adminlist.php?error=Đã xảy ra lỗi");
    exit();
}
