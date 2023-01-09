<?php
include 'db.php';
include 'ft.php';

$id = $_GET['id'];
$query = "DELETE FROM `year` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:year.php');
}else{
    echo"<script>alert('Đã xảy ra lỗi'); window.location.href='year.php';</script>";
}
?>