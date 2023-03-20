<?php 
include 'include/config.php';


$email = $_SESSION['email'];
$select_student = mysqli_query($connect,"SELECT * FROM user WHERE email = '$email'");
$row = mysqli_fetch_assoc($select_student);
$student_id = $row['student_id'];
$select_shedule = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE student_subject.id_user = '$student_id'");

$sum = 0;
while($res_schedule = mysqli_fetch_assoc($select_shedule)){
$sum += $res_schedule['price'];
// echo $res_schedule['id_subject']  .  "<br>";
// $id_subject = $res_schedule['id_subject'];
// $update_status_payment = mysqli_query($connect,"UPDATE student_subject SET status = 'success' WHERE id_user = $student_id AND id_subject = $id_subject");
}

if(isset($_SESSION['name'])){
if(isset($_POST['submit'])){


    $card_name = $_POST['name'];
    $card_number = $_POST['card_number'];
    $card_type = $_POST['card_type'];
    $expiry = $_POST['exp_date'];
    $CVV = $_POST['cvv'];

    // $select_subject = mysqli_query($connect , "SELECT * FROM subject WHERE subject_id = '$subject_id'");
    // $res = mysqli_fetch_assoc($select_subject);
    $amount = $sum;
    
    $insert_payment = mysqli_query($connect,"INSERT INTO `payment`(`payment_id`, `student_id`,`card_name`, `card_number`, `card_type`, `expiry`, `CVV`, `amount`) VALUES ('','$student_id','$card_name','$card_number','$card_type','$expiry','$CVV','$amount')");
 
    

    if($insert_payment){
        $select_shedule = mysqli_query($connect,"SELECT * FROM subject JOIN student_subject ON subject.subject_id = student_subject.id_subject WHERE student_subject.id_user = '$student_id'");
        while($result_schedule = mysqli_fetch_assoc($select_shedule)){
            // $sum += $res_schedule['price'];
            // echo $res_schedule['id_subject']  .  "<br>";
            // echo "<script>alert('done')</script>";
            $id_subject = $result_schedule['id_subject'];
            $update_status_payment = mysqli_query($connect,"UPDATE student_subject SET status = 'success' WHERE id_user = $student_id AND id_subject = $id_subject");
            if($update_status_payment){
    
                echo "<script>alert('Payment Successfully!!')</script>";
                echo "<script>window.location.href = 'receipt.php'</script>";
            }else{
                echo "sql error";
            }
        }
        // header("Location: ");
    }else{
        echo "sql error";
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
    <link href="payment/style.css" rel="stylesheet">
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
                                    <a href="schedules.php" class="dropdown-item">Schedules</a>
                                    <a href="fees.php" class="dropdown-item active">Fees</a>
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
                <h3 class="display-4 text-white text-uppercase">Fees</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Fees</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="mainscreen" style="margin: 0;">
    <!-- <img src="https://image.freepik.com/free-vector/purple-background-with-neon-frame_52683-34124.jpg"  class="bgimg " alt="">  -->
      <div class="card" style="position: relative;top:-2px;height:600px">
        <div class="leftside" style="background-color: #1A120B;">
            
          <img
            src="img/about.jpg"
            class="product"
            alt="Subjects"
          />
        </div>
        <div class="rightside">

        <form action="" method="POST">
            <h3>Checkout</h3>
            <!-- <h2>Payment Information</h2> -->
            <p>Cardholder Name</p>
            <input type="text" class="inputbox" name="name" required />
            <p>Card Number</p>
            <input type="number" class="inputbox" name="card_number" id="card_number" required />

            <p>Card Type</p>
            <select class="inputbox" name="card_type" id="card_type" required onchange="change()">
              <option value="">--Select a Card Type--</option>
              <option value="debit">Debit</option>
              <option value="credit card">Credit Card</option>
              <option value="online banking">Online Banking</option>
            </select>

            <select class="inputbox" name="bank_type" id="bank_type" style="display: none;" >
              <option value="">--Select a Bank --</option>
              <option value="bank islam">Bank Islam</option>
              <option value="maybank">Maybank</option>
            </select>
<div class="expcvv">

            <p class="expcvv_text">Expiry</p>
            <input type="date" class="inputbox" name="exp_date" id="exp_date" required />

            <p class="expcvv_text2">CVV</p>
            <input type="password" class="inputbox" name="cvv" id="cvv" required />
        </div>
        <hr>
        <div>
        <p>Total Price : RM <?= $sum ?></p>  
        </div>    
        <!-- <p></p> -->
            <button type="submit" class="button" name="submit" style="padding-bottom: 8px;">Checkout</button>
          </form>
        </div>
      </div>
    </div>
                    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5">
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
    <script>
        function change(){
            var bank = document.getElementById("card_type").value;
            var bank_type = document.getElementById("bank_type");
            // alert(bank);
            if(bank == "online banking" || bank == "debit"){


                bank_type.style.display = "block"; 

            }else{
bank_type.style.display ="none";
            }
        }
    </script>
</body>

</html>
<?php 
}else{
    header("location:login.php");
}
?>