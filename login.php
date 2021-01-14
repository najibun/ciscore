<?php 
error_reporting(0);
//cek status login
session_start();
if($_SESSION['status']!="login"){
} else {
header("location:index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CIS Security Score</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/hamburgers.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
  <main>
        <div class="slider-area hero-bg1 hero-overly">
            <div class="single-slider hero-overly  slider-height1 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center pb-150">
                        <div class="col-xl-4 col-lg-10">
                            <!-- Hero Caption -->
                            <div class="hero__caption">
                                <h1><a href="index.php">CISCORE</a>.</h1>
                                <p><?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "Login failed, wrong username or password!";
    }else if($_GET['pesan'] == "logout"){
      echo "You have successfully logged out";
    }else if($_GET['pesan'] == "belum_login"){
      echo "You must be logged in to access the admin page";
    }
  }
  ?></p>

                            </div>

                            <!--Hero form -->
                            <form action="cek_login.php" class="search-box mb-50" method="POST">
                                <input class="form-control mb-20" id="inputEmail" name="username" type="text" placeholder="Username" autofocus>
                                <input class="form-control mb-20" type="password" id="inputPassword" name="password" placeholder="Password"> 
                                <button class="btn btn-lg btn-block btn-signin" type="submit"  name="submit">Sign in</button>    
                            </form> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- JS here -->

      <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
      <!-- Jquery, Popper, Bootstrap -->
      <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
      <script src="./assets/js/popper.min.js"></script>
      <script src="./assets/js/bootstrap.min.js"></script>
      <!-- Jquery Mobile Menu -->
      <script src="./assets/js/jquery.slicknav.min.js"></script>

      <!-- Jquery Slick , Owl-Carousel Plugins -->
      <script src="./assets/js/owl.carousel.min.js"></script>
      <script src="./assets/js/slick.min.js"></script>
      <!-- One Page, Animated-HeadLin -->
      <script src="./assets/js/wow.min.js"></script>
      <script src="./assets/js/animated.headline.js"></script>
      <script src="./assets/js/jquery.magnific-popup.js"></script>

      <!-- Date Picker -->
      <script src="./assets/js/gijgo.min.js"></script>
      <!-- Nice-select, sticky -->
      <script src="./assets/js/jquery.nice-select.min.js"></script>
      <script src="./assets/js/jquery.sticky.js"></script>
      
      <!-- counter , waypoint,Hover Direction -->
      <script src="./assets/js/jquery.counterup.min.js"></script>
      <script src="./assets/js/waypoints.min.js"></script>
      <script src="./assets/js/jquery.countdown.min.js"></script>
      <script src="./assets/js/hover-direction-snake.min.js"></script>

      <!-- contact js -->
      <script src="./assets/js/contact.js"></script>
      <script src="./assets/js/jquery.form.js"></script>
      <script src="./assets/js/jquery.validate.min.js"></script>
      <script src="./assets/js/mail-script.js"></script>
      <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
      
      <!-- Jquery Plugins, main Jquery -->  
      <script src="./assets/js/plugins.js"></script>
      <script src="./assets/js/main.js"></script>
</body>
</html>