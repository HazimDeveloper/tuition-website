<?php 
include '../include/config.php';

$teacher_id = $_GET['teacher_id'];

$delete_user = mysqli_query($connect,"DELETE FROM `teacher` WHERE teacher_id = $teacher_id");

if($delete_user){
    header("location: teacher.php");
}else{
    echo "sql error";
}

