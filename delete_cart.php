<?php 
include 'include/config.php';

$emails = $_SESSION['email'];
$select_info_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$emails'");
$res = mysqli_fetch_assoc($select_info_student);
$user_id = $res['student_id'];
$id_subject = $_GET['id_subject'];
$delete_cart = mysqli_query($connect,"DELETE FROM student_subject WHERE id_user = $user_id AND id_subject = $id_subject");

if($delete_cart){
    header("location: schedules.php");
}

?>