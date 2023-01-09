<?php
$con = mysqli_connect('localhost', 'root', '', 'vsh_movie');
if(!$con){
    header('location:/404.php'); 
}
?>