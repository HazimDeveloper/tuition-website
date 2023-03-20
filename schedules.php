<?php 
include 'include/config.php';

if(isset($_SESSION['name'])){


$email = $_SESSION['email'];
$select_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$email'");
$row = mysqli_fetch_assoc($select_student);
$student_id = $row['student_id'];
$select_shedule = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE student_subject.id_user = '$student_id'");


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
                            <a href="about.php" class="nav-item nav-link ">About</a>
                            <a href="subject.php" class="nav-item nav-link">Subjects</a>
                            <a href="teacher.php" class="nav-item nav-link">Teachers</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Class Details</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="schedules.php" class="dropdown-item active">Schedules</a>
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
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Schedules</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Schedules</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Schedules Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row pb-3">
                        <a href="timetable.php" class="btn btn-dark mb-3">View Timetable </a>
                        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Day</th>
      <th scope="col">Time </th>
      <th scope="col">Category </th>
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;
    $sum = 0;
    ?>
                        <?php while($result = mysqli_fetch_assoc($select_shedule)) {?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $result['name'] ?></td>
      <td><?= $result['Day'] ?></td>
      <td><?= $result['start_time']?> - <?= $result['end_time'] ?></td>
      <td><?= $result['category'] ?></td>
    <td><a href="delete_cart.php?id_subject=<?= $result['subject_id']?>" class="btn btn-danger">Delete</a></td>
    
</tr>
<?php  $i++;
$sum += $result['price'] ;

} ?>
</tbody>
</table>

<a href="fees.php" class="btn btn-success">Make A Payment</a>
<!-- <p><?= $sum ?></p> -->
<!-- <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="img/blog-1.jpg" alt="">
                                <a class="blog-overlay text-decoration-none" href="">
                                    <h5 class="text-white mb-3"><?= $result['name'] ?></h5>
                                    <p class="text-primary m-0"><?= $result['Day'] ?>, <?= $result['start_time']?> -<?= $result['end_time'] ?></p>
                                </a>
                            </div>
                            <a href="<?= $result['link_gmeet'] ?>" target="_blank" class="btn btn-primary">Join Class Now</a>
                        </div> -->

                        <!-- <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg justify-content-center mb-0">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </div> -->
                    </div>
                </div>
    
          
            <div class="col-lg-4 mt-5 mt-lg-0">       
    <!-- Search Form -->
                    <!-- <div class="mb-5">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div> -->
    
                    <!-- Category List -->
                    <!-- <div class="mb-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">English</a>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Biology</a>
                                <span class="badge badge-primary badge-pill">131</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Chemistry</a>
                                <span class="badge badge-primary badge-pill">78</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">Account</a>
                                <span class="badge badge-primary badge-pill">56</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-decoration-none h6 m-0">History</a>
                                <span class="badge badge-primary badge-pill">98</span>
                            </li>
                        </ul>
                    </div> -->
    
                
    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Schedules End -->

 <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" >
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
<?php }else{
header("location: login.php");
}
    ?>