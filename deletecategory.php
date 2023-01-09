<?php
include 'db.php';
include 'ft.php';

$id = $_GET['deleteid'];
$query = "DELETE FROM `category` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:categorylist.php');
}else{
    echo"<script>alert('Đã xảy ra lỗi'); window.location.href='categorylist.php';</script>";
}
?>