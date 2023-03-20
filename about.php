<?php 
include 'include/config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $subject = $_POST['subject'];
    
    $select_email_teacher = mysqli_query($connect,"SELECT * FROM teacher WHERE email = '$email'");
    if(mysqli_num_rows($select_email_teacher) == 0){

        $insert_teacher = mysqli_query($connect,"INSERT INTO `teacher`(`teacher_id`, `name`, `email`, `education`, `subject`) VALUES ('','$name','$email','$education','$subject')");

        if($insert_teacher){
            header("location: teacher/index.php");
        }
    }else{

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CNC</title>
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

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                            <a href="about.php" class="nav-item nav-link active">About</a>
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
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
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
                <h3 class="display-4 text-white text-uppercase">About</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="img/cnclogo.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
                        <h1>Open To All UPSR, PT3, SPM Students</h1>
                    </div>
                    <p>Hello dear students! Cikgu Norm Center is open to all UPSR, PT3 And SPM! We will provide full education and well-trained teachers for you. We can assure you the best experience by joining us and help you to get your best grades in your examinations! What are you wiating for? come and join us now!  </p>
                    <a href="https://www.facebook.com/cikgunormcentre/" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Want To Be Our Teacher</h5>
                        <h1 class="text-white">Got A New Knowledge From Experienced Teacher</h1>
                    </div>
                    <p class="text-white">Are you a new teacher or experience teacher? if yes then it's your lucky day! We are offering 20% off first month of registration for new students! You will receive:</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Free stationary for new teacher</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Free Cikgu Norm Tuition Center T-Shirt</li>
                        <!-- <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Schedule of subject registered</li> -->
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-light text-center p-4">
                            <h1 class="m-0">Sign Up Now</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5" style="padding-bottom: 20px;">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="name" placeholder="Your name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" name="email" placeholder="Your email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" name="education">
                                        <option selected>Select Your Education</option>
                                        <option value="SPM">SPM</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Master">Master</option>
                                        <option value="PhD">PhD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" name="subject">
                                        <option selected>Select a subject</option>
                                        <option value="English">English</option>
                                        <option value="Math">Mathematics</option>
                                        <option value="Science">Science</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" name="submit" type="submit">Be Our Teacher </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->



    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Testimonial</h5>
                <h1>What Say Our Students</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-normal mb-4">Good service and friendly tutors!</h4>
                            <img class="img-fluid mx-auto mb-3" src="img/testimonial-1.jpg" alt="">
                            <h5 class="m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-normal mb-4">This tuition helps me to understand the syllabus in every subjects in more details</h4>
                            <img class="img-fluid mx-auto mb-3" src="img/testimonial-2.jpg" alt="">
                            <h5 class="m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-normal mb-4">Friendly staff and tutors!</h4>
                            <img class="img-fluid mx-auto mb-3" src="img/testimonial-3.jpg" alt="">
                            <h5 class="m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


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
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>