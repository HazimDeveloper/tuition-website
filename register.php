<?php 

include 'include/config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$email'");

    if(mysqli_num_rows($select_student) == 0){
        $insert_student = mysqli_query($connect,"INSERT INTO `user`(`student_id`, `name`, `email`, `password`) VALUES ('','$name','$email','$password')");

        if($insert_student){
            header("location: login.php");
        }else{
            echo "<script>alert('sql error')</script>";
        }
    }else{
        
        echo "<script>alert('your email has been registered')</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">

</head>
<body>
  
    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" >
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Need Any Subjects</h5>
                        <h1 class="text-white">20% Off For New Students</h1>
                    </div>
                    <p class="text-white">Are you a new student? if yes then it's your lucky day! We are offering 20% off first month of registration for new students! You will receive :</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Free stationary for new students</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Free Cikgu Norm Tuition Center T-Shirt</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Schedule of subject registered</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-light text-center p-4">
                            <h1 class="m-0">Sign Up Now</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="name" placeholder="Your name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" name="email" placeholder="Your email" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control border-0 p-4" name="password" placeholder="Your Password" required="required" />
                                </div>
                               
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" name="submit" type="submit">Sign Up </button>
                                </div>
                                
                                
                               
                             
                                <p class="text-light mt-2">Have an Account?</p>
                                <div>
                                    <a href="login.php" class="btn btn-dark btn-block border-0 py-2 mt-2">Login Now</a>
                                    <!-- <button  type="submit">Login</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->
</body>
</html>