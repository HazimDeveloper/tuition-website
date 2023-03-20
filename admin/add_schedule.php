<?php 
include '../include/config.php';

$select_teacher = mysqli_query($connect,"SELECT *FROM teacher");
$select_subject = mysqli_query($connect,"SELECT DISTINCT name FROM subject");

if(isset($_POST['submit'])){
    $name_teacher = $_POST['name'];

    $select_id_teacher = mysqli_query($connect,"SELECT * FROM teacher WHERE name = '$name_teacher'");
    $data_teacher = mysqli_fetch_assoc($select_id_teacher);

    $id_teacher = $data_teacher['teacher_id'];
    $name = $_POST['subject'];
    $time = $_POST['hours']; 
    $price = $_POST['price']; 
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $Day = $_POST['day'];
    $category = $_POST['category'];
    $link_gmeet = $_POST['link_gmeet'];

   $insert_subject =  mysqli_query($connect,"INSERT INTO `subject`(`subject_id`, `teacher_id`, `name`, `time`, `price`, `start_time`, `end_time`, `Day`, `category`, `link_gmeet`) VALUES ('','$id_teacher','$name','$time','$price','$start_time','$end_time','$Day','$category','$link_gmeet')");

   if($insert_subject){
    echo "<script>alert('teacher added successfully')</script>";
    header("location: schedule.php");
   }else{
    echo "<script>alert('sql error')</script>";
    
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Schedule</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5" style="width: 700px;">
            <div class="p-0">
                <!-- Nested Row within Card Body -->
            
                    <div class="col-6 mt-4 mb-4 ml-4 p-0">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add A Schedule</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                
                            <div class="form-group">
                            <select onchange="getTeacher()" class="form-select  rounded p-2" id="subject" name="subject" aria-label="Default select example">

<option selected value="" disabled>Select Your Subject</option>
<option  value="Mathematics" >Mathematics</option>
<option value="Bahasa Malaysia" >Bahasa Malaysia</option>
<option  value="English" >English</option>
<option  value="Science" >Science</option>
<option  value="History" >History</option>
<option  value="Chemistry" >Chemistry</option>
<option  value="Biology" >Biology</option>
<option  value="Account" >Account</option>
<?php while($row = mysqli_fetch_assoc($select_subject)) { ?>
<option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
<?php }?>
</select>
</div>

<div class="form-group">

<select class="form-select rounded p-2" id="teacher" name="name" aria-label="Default select example">

<option selected value="" disabled >Select Your Teacher</option>
<?php while($row = mysqli_fetch_assoc($select_teacher)) { ?>
<!-- <option value=""><?= $row['name'] ?></option> -->
<?php }?>
</select>     
</div>

<div class="form-group">                       
<select class="form-select rounded p-2" name="category" aria-label="Default select example">

<option selected value="" disabled>Select Category</option>
<!-- <option selected value="<?= $res['education_level'] ?>"><?= $res['education_level'] ?></option> -->
<option value="UPSR">UPSR</option>
<option value="PT3">PT3</option>
<option value="SPM">SPM</option>
</select>     
</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Price .. " name="price" required>
                                            <p class="text-danger">Do Not Add RM In Front Of</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">How Many Hours</label>
                                        <input type="number" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="How many hours" name="hours" value="2" required min="1" max="2"  >
                                    </div>
                             
                                <div class="form-group">
                                    
                                <label for="">Start Time</label>
                                    <input type="time" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Start Time" name="start_time" required>
                                </div>    
                                <div class="form-group">
                                    <label for="">End Time</label>
                                    <input type="time" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="End Time" name="end_time" required>
                                </div>    
                                <div class="form-group">                       
<select class="form-select rounded p-2" name="day" aria-label="Default select example" required>

<option selected value="" disabled>Select Day</option>
<option value="Sunday">Sunday</option>
<option value="Monday">Monday</option>
<option value="Tuesday">Tuesday</option>
<option value="Wednesday">Wednesday</option>
<option value="Thursday">Thursday</option>
<option value="Friday">Friday</option>
<option value="Saturday">Saturday</option>
</select>     
</div> 
         
         
                  <p class="help-block text-danger"></p>
                            

                                    <div class="form-group">
                                        <input type="text" name="link_gmeet" required class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Link Gmeet .. ">
                                    </div>
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-user btn-block">
                                <a href="schedule.php" class="btn btn-primary btn-user btn-block">
                                    Cancel
                                </a>
                                <hr>
                            </form>
                          
                    </div>
           
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script>

function getTeacher(){

    var subject = $("#subject").val();
    // alert(subject)
    $.ajax({
        type: "POST",
        url: "get_subject.php",
        data: {
            subject : subject
        },
        dataType: "json",
        success: function (response) {
            // alert(response.length);
            for(var i=0;i<response.length;i++){
                var teacher = $("#teacher");
                var option = $("<option></option>").val(response[i].name).text(response[i].name);
                teacher.append(option);
            }
        }
    });
}
    </script>
</body>

</html>