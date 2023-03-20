<?php 

include '../include/config.php';

$subject = $_POST['subject'];
$select_teacher = mysqli_query($connect,"SELECT * FROM teacher WHERE subject = '$subject'");

$data = array();
while($row = mysqli_fetch_assoc($select_teacher)){
$data[] = $row;
}

echo json_encode($data);

?>