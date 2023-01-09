<?php
include 'db.php';
include 'ft.php';

$id = $_GET['id'];
$query = "DELETE FROM `nation` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:genrelist.php');
}else{
    echo"<script>alert('Đã xảy ra lỗi'); window.location.href='genrelist.php';</script>";
}
?>