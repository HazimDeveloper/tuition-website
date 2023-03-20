<?php 
include '../include/config.php';

$id_user = $_GET['id_user'];

$delete_user = mysqli_query($connect,"DELETE FROM `user` WHERE student_id = $id_user");

if($delete_user){
    header("location: student.php");
}else{
    echo "sql error";
}

