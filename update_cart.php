<?php 

include 'include/config.php';

$subject_id = $_GET['subject_id'];
if(isset($_SESSION['email'])){
    
$emails = $_SESSION['email'];
$select_info_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$emails'");
$res = mysqli_fetch_assoc($select_info_student);
$user_id = $res['student_id'];

$select_event = mysqli_query($connect,"SELECT * FROM student_subject JOIN subject ON student_subject.id_subject = subject.subject_id WHERE student_subject.id_user = $user_id AND student_subject.id_subject = $subject_id");
$res_event = mysqli_fetch_assoc($select_event);
// print_r($res_event);
$select_subject = mysqli_query($connect,"SELECT * FROM subject WHERE subject_id = $subject_id");
$res_subject = mysqli_fetch_assoc($select_subject);
// print_r($res_subject);
// cek jika subject yg dipilih tu ade x lagi dgn subject lain yang sama masa dengan time
if(mysqli_num_rows($select_event) > 0){
    if($res_event['name'] == $res_subject['name']){
if( $res_event['Day'] != $res_subject['Day']){
    if($res_event['start_time'] != $res_subject['start_time'] && $res_event['end_time'] != $res_subject['end_time']){
            // $insert_cart = mysqli_query($connect,"INSERT INTO `student_subject`(`id`, `id_user`, `id_subject`) VALUES ('','$user_id','$subject_id')");
            if($insert_cart){
            header("location: schedules.php");
            }else{
            echo "sql error";
            }
        }else{
            echo "error";
        }
}else{
    echo "<script>alert('you already added this subject')</script>";
    echo "<script>window.location.href = 'schedules.php'</script>";
}
}else{
    echo "Name Error";
}
}else{
    $insert_cart = mysqli_query($connect,"INSERT INTO `student_subject`(`id`, `id_user`, `id_subject`) VALUES ('','$user_id','$subject_id')");
    if($insert_cart){
    header("location: schedules.php");
    }else{
    echo "sql error";
    }
}

}else{
    header("location: login.php");
}
?>