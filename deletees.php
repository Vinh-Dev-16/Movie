<?php
include 'db.php';
include 'header.php';
include 'ft.php';
if(isset($_GET['page'])){
    $page= $_GET['page'];
  }
$id = $_GET['deleteid'];
$query = "DELETE FROM `episode` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:eslist.php');
}else{
    echo"<script>alert('Đã xảy ra lỗi'); window.location.href='eslist.php?page=<?php echo $page; ?>';</script>";
}
?>