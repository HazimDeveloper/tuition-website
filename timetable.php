<?php 

include 'include/config.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Timetable </h1>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Day</th>
      <th scope="col">8.00 PM - 10.00 PM</th>
      <th scope="col">11.00 AM - 1.00 PM</th>
      <th scope="col">2.00 - 4.00</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sunday</th>
      <td id="sun-morning"></td>
      <td id="sun-lunch"></td>
      <td id="sun-evening"></td>
    </tr>
    <tr>
      <th scope="row">Monday</th>
      <td id="mon-morning"></td>
      <td id="mon-lunch"></td>
      <td id="mon-evening"></td>
    </tr>
    <tr>
      <th scope="row">Tuesday</th>
      <td id="tue-morning"></td>
      <td id="tue-lunch"></td>
      <td id="tue-evening"></td>
    </tr>
    <tr>
      <th scope="row">Wednesday</th>
      <td id="wed-morning"></td>
      <td id="wed-lunch"></td>
      <td id="wed-evening"></td>
    </tr>
    <tr>
      <th scope="row">Thursday</th>
      <td id="thu-morning"></td>
      <td id="thu-lunch"></td>
      <td id="thu-evening"></td>
    </tr>
    <tr>
      <th scope="row">Friday</th>
      <td id="fri-morning"></td>
      <td id="fri-lunch"></td>
      <td id="fri-evening"></td>
    </tr>
    <tr>
      <th scope="row">Saturday</th>
      <td id="sat-morning"></td>
      <td id="sat-lunch"></td>
      <td id="sat-evening"></td>
    </tr>
  </tbody>
</table>

<a href="schedules.php" class="btn btn-primary">Back To Schedule</a>

<?php
$emails = $_SESSION['email'];
$select_info_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$emails'");
$res = mysqli_fetch_assoc($select_info_student);
$user_id = $res['student_id'];

$sunday = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE subject.Day = 'Sunday' AND student_subject.id_user = $user_id");
while($res_sun = mysqli_fetch_assoc($sunday)){
// var_dump($res_sun);
if($res_sun['start_time'] == "8.00 PM" ){
    // Find the correct cell in the table to insert the data
    echo "<script>
    var sunmorning = document.getElementById('sun-morning');
    sunmorning.innerHTML = '" . $res_sun['name'] . "';
  </script>";

}elseif($res_sun['start_time'] == "10.00 PM"){
 // Find the correct cell in the table to insert the data
 echo "<script>
 var sunlunch = document.getElementById('sun-lunch');
 sunlunch.innerHTML = '" . $res_sun['name'] . "';
</script>";

}else{
// Find the correct cell in the table to insert the data
echo "<script>
var sunevening = document.getElementById('sun-evening');
sunevening.innerHTML = '" . $res_sun['name'] . "';
</script>";

}
}
    

$monday = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE subject.Day = 'Monday' AND student_subject.id_user = $user_id");
while($res_mon = mysqli_fetch_assoc($monday)){
if(mysqli_num_rows($monday) > 0){
    
if($res_mon['start_time'] == "8.00 PM" ){
    // Find the correct cell in the table to insert the data
    echo "<script>
    var monmorning = document.getElementById('mon-morning');
    monmorning.innerHTML = '" . $res_mon['name'] . "';
  </script>";

}elseif($res_mon['start_time'] == "11.00 AM"){
 // Find the correct cell in the table to insert the data
 echo "<script>
 var monlunch = document.getElementById('mon-lunch');
 monlunch.innerHTML = '" . $res_mon['name'] . "';
</script>";

}else{
// Find the correct cell in the table to insert the data
echo "<script>
var monevening = document.getElementById('mon-evening');
monevening.innerHTML = '" . $res_mon['name'] . "';
</script>";

}
}
}
$tuesday = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE subject.Day = 'Tuesday' AND student_subject.id_user = $user_id");
while($res_tue = mysqli_fetch_assoc($tuesday)){
if(mysqli_num_rows($tuesday) > 0){
    
if($res_tue['start_time'] == "8.00 PM" ){
    // Find the correct cell in the table to insert the data
    echo "<script>
    var tuemorning = document.getElementById('tue-morning');
    tuemorning.innerHTML = '" . $res_tue['name'] . "';
  </script>";

}elseif($res_tue['start_time'] == "11.00 AM"){
 // Find the correct cell in the table to insert the data
 echo "<script>
 var tuelunch = document.getElementById('tue-lunch');
 tuelunch.innerHTML = '" . $res_tue['name'] . "';
</script>";

}else{
// Find the correct cell in the table to insert the data
echo "<script>
var tueevening = document.getElementById('tue-evening');
tueevening.innerHTML = '" . $res_tue['name'] . "';
</script>";

}
}
}

$wednesday = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE subject.Day = 'Wednesday' AND student_subject.id_user = $user_id");
while( $res_wed = mysqli_fetch_assoc($wednesday)){

if(mysqli_num_rows($wednesday) > 0){
    
    if($res_wed['start_time'] == "8.00 PM" ){
        // Find the correct cell in the table to insert the data
        echo "<script>
        var wedmorning = document.getElementById('wed-morning');
        wedmorning.innerHTML = '" . $res_wed['name'] . "';
      </script>";
    
    }elseif($res_wed['start_time'] == "11.00 AM"){
     // Find the correct cell in the table to insert the data
     echo "<script>
     var wedlunch = document.getElementById('wed-lunch');
     wedlunch.innerHTML = '" . $res_wed['name'] . "';
    </script>";
    
    }else{
    // Find the correct cell in the table to insert the data
    echo "<script>
    var wedevening = document.getElementById('wed-evening');
    wedevening.innerHTML = '" . $res_wed['name'] . "';
    </script>";
    
    }
  }
    }

$thursday = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE subject.Day = 'Thursday' AND student_subject.id_user = $user_id");

while($res_thu = mysqli_fetch_assoc($thursday)){
  

if(mysqli_num_rows($thursday) > 0){
    
    if($res_thu['start_time'] == "8.00 PM" ){
        // Find the correct cell in the table to insert the data
        echo "<script>
        var thumorning = document.getElementById('thu-morning');
        thumorning.innerHTML = '" . $res_thu['name'] . "';
      </script>";
    
    }elseif($res_thu['start_time'] == "11.00 AM"){
     // Find the correct cell in the table to insert the data
     echo "<script>
     var thulunch = document.getElementById('thu-lunch');
     thulunch.innerHTML = '" . $res_thu['name'] . "';
    </script>";
    
    }else{
    // Find the correct cell in the table to insert the data
    echo "<script>
    var thuevening = document.getElementById('thu-evening');
    thuevening.innerHTML = '" . $res_thu['name'] . "';
    </script>";
    
    }
    
}
    }
?>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>