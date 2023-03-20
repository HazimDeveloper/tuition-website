<?php 
include '../include/config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $subject = $_POST['subject'];

   $insert_teacher =  mysqli_query($connect,"INSERT INTO `teacher`(`teacher_id`, `name`, `email`, `education`, `subject`) VALUES ('','$name','$email','$education','$subject')");

   if($insert_teacher){
    echo "<script>alert('teacher added successfully')</script>";
    header("location: teacher.php");
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

    <title>SB Admin 2 - Teacher</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add A Teacher</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name" name="name">
                                    </div>
                             
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>    
                                
                            <select class="form-select rounded p-2" name="education" aria-label="Default select example">

                            <option selected value="" disabled>Select your Education level</option>
                    <!-- <option selected value="<?= $res['education_level'] ?>"><?= $res['education_level'] ?></option> -->
  <option value="SPM">SPM</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Master">Master</option>
                                        <option value="PhD">PhD</option>
</select>              
                  <p class="help-block text-danger"></p>
                            

                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Subject To Teach .. ">
                                    </div>
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-user btn-block">
                                <a href="teacher.php" class="btn btn-primary btn-user btn-block">
                                    Cancel
                                </a>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
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

</body>

</html>