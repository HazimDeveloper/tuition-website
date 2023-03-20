<?php 
include 'include/config.php';

$status =0;

$emails = $_SESSION['email'];
$select_info_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$emails'");
$res = mysqli_fetch_assoc($select_info_student);
$user_id = $res['student_id'];


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $IC = $_POST['IC'];
    $address = $_POST['address'];
    $date_birth = $_POST['date_birth'];
    $gender = $_POST['gender'];
    $education_level = $_POST['education_level'];

    // $select_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$emails'");
    // $row = mysqli_fetch_assoc($select_student);
    // $user_id = $row['user_id'];
    // $insert_contact = mysqli_query($connect,"INSERT INTO `contact_us`(`contact_id`, `contact_name`, `contact_email`, `subject`, `message`) VALUES ('','$name','$email','$subject','$message')");

$update_profile = mysqli_query($connect,"UPDATE user SET name = '$name' , email = '$email' , IC= '$IC' , address = '$address' , date_birth = '$date_birth' , gender = '$gender' , education_level = '$education_level' WHERE student_id = '$user_id'");
    
if($update_profile){
       echo "<script>alert('Edit Successfull');
       window.location = 'edit_profile.php';
       </script>";
        // header("location: edit_profile.php");
    }else{
        echo 'sql error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ECOURSES - Online Courses HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script> -->
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0"><span class="text-primary">C</span>NC</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Location</h6>
                        <small>23A, Level 1, Jalan SG 8/7, Taman Sri Gombak, Batu Caves, Malaysia.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>cikgunormcentre@gmail.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>010-4225377</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


 <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span class="text-primary">C</span>NC</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <a href="subject.php" class="nav-item nav-link">Subjects</a>
                            <a href="teacher.php" class="nav-item nav-link">Teachers</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Class Details</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="schedules.php" class="dropdown-item">Schedules</a>
                                    <!-- <a href="fees.php" class="dropdown-item">Fees</a> -->
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="edit_profile.php" class="dropdown-item">Edit Profile</a>
                                    <!-- <a href="my_class.php" class="dropdown-item">My Class</a> -->
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link  active">Contact</a>
                        </div>
                        <?php if(isset($_SESSION['name']) ) { ?>
<p class="nav-item nav-link alert alert-primary py-2 mt-2 mr-4 ml-3 " style="width: 250px;"><?= $_SESSION['name'] ?></p>

<a class="btn btn-primary py-2  ml-4 d-none d-lg-block" style="margin-left: 50px;" href="logout.php">Logout</a>
                         
                            <?php }else{ ?>
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="register.php">Join Now</a>
                    <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Edit Profile Information</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">CNC Tuition Centre</h5>
                <h1>Edit Profile Information</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                        <?php if($status == 1){?>
                        <div id="success" class="alert alert-success">Edit Successfully!!</div>
                        <?php } ?>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST" action="">
                            <div class="control-group">
                                <input type="text" name="name" value="<?= $res['name'] ?>" class="form-control border-0 p-4" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control border-0 p-4" value="<?= $res['email'] ?>" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" name="IC" class="form-control border-0 p-4" value="<?= $res['IC'] ?>" id="email" placeholder="Your IC" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="mb-3">
  <!-- <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label> -->
  <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3" placeholder="Your Address "><?= $res['address']?></textarea>
</div>
                            <div class="control-group">
                                <input type="date"  name="date_birth" class="form-control border-0 p-4" value="<?= $res['date_birth'] ?>" id="email" placeholder="Date Of Birth" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <select class="form-select" name="gender" aria-label="Default select example">
                            <?php if($res['gender'] == "") { ?>
  <option selected value="">Select your gender</option>
  <?php }else{ ?>
    <option selected value="<?= $res['gender']?>"><?= $res['gender']?></option>
 
 <?php } ?>
    <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="random">Random</option>
  
</select>              
                  <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                            <select class="form-select" name="education_level" aria-label="Default select example">
  <?php if($res['education_level'] == ""){ ?>
                            <option selected value="">Select your Education level</option>
                   <?php }else{ ?>
                    <option selected value="<?= $res['education_level'] ?>"><?= $res['education_level'] ?></option>
                    <?php  } ?>
  <option value="SPM">SPM</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Master">Master</option>
                                        <option value="PhD">PhD</option>
                                       
</select>              
                  <p class="help-block text-danger"></p>
                            </div>
                        
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit" name="submit" id="sendMessageButton">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>23A, Level 1, Jalan SG 8/7, Taman Sri Gombak, Batu Caves, Malaysia.</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>010-4225377</p>
                        <p><i class="fa fa-envelope mr-2"></i>cikgunormcentre@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            
                            <a class="btn btn-outline-light btn-square mr-2" href="https://www.facebook.com/cikgunormcentre/"><i class="fab fa-facebook-f"></i></a>
                          
                            <a class="btn btn-outline-light btn-square" href="https://www.instagram.com/cnc_hometuition/?hl=en"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Our Main Subjects</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Bahasa Malaysia</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>English</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Mathematics</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Science</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>History</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Join Now </h5>
              
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">CNC Tuition Centre</a>. All Rights Reserved. Designed by <a href="">Nasrizzal, Misha, Maisarah, Syakirah</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <!-- <script src="mail/jqBootstrapValidation.min.js"></script> -->
    <!-- <script src="mail/contact.js"></script> -->

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->
</body>

</html>