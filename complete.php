<?php 
  include 'db.php';

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * From contact where id=$id";
    $run = mysqli_query($con,$query);
    if($run){
        while($row = mysqli_fetch_assoc($run)){
          $uname = $row['uname'];
          $email = $row['email'];
          $msg = $row['message'];
          $date= date('Y-m-d',strtotime($_POST['date']));
      $query1= "INSERT INTO `complete`(`uname`, `email`, `message`,`complete_date`) VALUES ('$uname','$email','$msg','$date')";
      $run1 = mysqli_query($con,$query1);
      if($run1){
        $query2 = "DELETE FROM contact where id=$id";
        $run2 = mysqli_query($con,$query2);
        if ($run2){
            echo "<script> alert('Đã đọc'); window.location.href='contactAdmin.php'</script>";
        }
      }
    }
  }
}
  ?>