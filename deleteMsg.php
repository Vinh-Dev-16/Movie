<?php
include 'db.php';
include 'header.php';
include 'ft.php';
if(isset($_GET['page'])){
    $page= $_GET['page'];
  }
$id = $_GET['id'];
$query = "DELETE FROM `contact` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:contactAdmin.php');
}else{
    echo"<script>alert('Đã xảy ra lỗi'); window.location.href='contactAdmin.php?page=<?php echo $page; ?>';</script>";
}
?>