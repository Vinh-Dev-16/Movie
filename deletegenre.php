<?php
include 'db.php';
include 'ft.php';

$id = $_GET['deleteid'];
$query = "DELETE FROM `genre` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:nation.php');
}else{
    echo"<script>alert('Đã xảy ra lỗi'); window.location.href='genrelist.php';</script>";
}
?>