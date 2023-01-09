<?php
include 'db.php';
include 'ft.php';
session_start();
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $msg = $_POST['contribute'];
  $date = date('Y-m-d', strtotime($_POST['date']));
  $nowday = date("Y-m-d");
                if ($nowday < $birthday) {
                    echo "<div class='noti'> 
                            <h2> Thông báo lỗi </h2>
                            <p> Ngày này quá thời gian thực </p>
                         </div>";
                    exit();
                }
  $query = "INSERT INTO `contact`( `uname`, `email`, `message`,`msg_date`) VALUES ('$username','$email','$msg','$date')";
  $run = mysqli_query($con, $query);
  if ($run) {
    if (!isset($_SESSION['user'])) {
      echo "<script> window.location.href='/home.php';
        Swal.fire(
            'Good job!',
            'Đã gửi thông tin!',
            'success'
          )</script>";
    } else {
      echo "<script> window.location.href='/homeLogin.php';
      Swal.fire(
          'Good job!',
          'Đã gửi thông tin!',
          'success'
        )</script>";
    }
  } else {
    if (!isset($_SESSION['user'])) {

      echo "<script> window.location.href='/home.php';
    Swal.fire(
        'Oh, No',
        'Đã xảy ra lỗi!',
        'error'
      )</script>";
    } else {

      echo "<script> window.location.href='/homeLogin.php';
    Swal.fire(
        'Oh, No',
        'Đã xảy ra lỗi!',
        'error'
      )</script>";
    }
  }
}
