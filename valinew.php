<?php
include 'db.php';
if (isset($_POST['submit'])){
    $mv_name = $_POST['mv_name'];
    if(empty($mv_name)){
        header("Location: listmovie.php?error=Không được để trống trường tên phim");
    exit();
    }
    $sql = "SELECT * FROM movie WHERE mv_name = '$mv_name' ";
    $run = mysqli_query($con, $sql);
    if (mysqli_num_rows($run) > 0) {
      header("Location: listmovie.php?error=Phim này đã tồn tại&$user");
      exit();
    }
    $id = $_POST['id'];
    $mv_cat = $_POST['mv_cat'];
    foreach($mv_cat as $cat){

    $query1 = "INSERT INTO `cat_mv`(`mv_id`, `category_id`) VALUES ('1','$cat')";
    $run1 = mysqli_query($con,$query1);

    } 
    $mv_genre = $_POST['mv_genre'];
    $mv_actor = $_POST['mv_actor'];
    $mv_des = $_POST['mv_des'];
    $mv_nation = $_POST['mv_nation'];
    $mv_quality = $_POST['mv_quality'];
    $mv_duration = $_POST['mv_duration'];
    $mv_year = ($_POST['mv_year']);
    $mv_date= date('Y-m-d',strtotime($_POST['mv_date']));
    $mv_tag = $_POST['mv_tag'];
    $mv_status = $_POST['mv_status'];
    $mv_trailer = $_POST['mv_trailer'];
    $mv_request = $_POST['mv_request'];
    $IMDb = $_POST['IMDb'];
    $mv_role = $_POST['mv_role'];
    $mv_img = $_POST['mv_img'];
    $mv_bg = $_POST['mv_bg'];
    $mv_deces = $_POST['mv_deces'];
    $sql = "SELECT * FROM `movie` WHERE mv_name = '$mv_name' ";
    $check = mysqli_query($con,$sql);
    if( mysqli_num_rows($check)>0 ){
        header("Location: addmovie.php?error=Phim này đã tồn tại");
        exit();
    } else{
    $query = "INSERT INTO `movie`( `id`,`genre_id`,`mv_nation`,
    `mv_year`, `mv_date`,`mv_name`, `mv_actor`, `mv_des`, 
    `mv_img`, `mv_bg`, `mv_quality`, `mv_duration`,
     `mv_tag`, `mv_status`, `mv_trailer`,`IMDb`,`mv_role`, `mv_request`, `mv_deces`) VALUES 
    ($id,'$mv_genre','$mv_nation','$mv_year','$mv_date','$mv_name','$mv_actor','$mv_des','$mv_img','$mv_bg',
     '$mv_quality','$mv_duration','$mv_tag','$mv_status',
     '$mv_trailer','$IMDb','$mv_role','$mv_request','$mv_deces')";
     $run = mysqli_query($con,$query);
    if ($run){
        header("Location: listmovie.php?success=Đã thêm phim thành công");
    exit();
    }else
    header("Location: listmovie.php?error=Đã xảy ra lỗi");
    exit();
}
}
