<?php
// Start the session
session_start();

// Check if the user has submitted the registration form
if(isset($_POST['Submit'])) {
     $_SESSION['error'] = "Reseravtion cannot be made.";
    header("Location: reservation.php?error=Password is required");
    
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $seats = $_POST['seats'];
    $comments = $_POST['comments'];
    
    if(empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($seats)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: register.php");
        exit();
    }
else {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_db";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
         $sql = "INSERT INTO reservation (name, email, phone, date, time, seats, comments) VALUES ('$name', '$email', '$phone', '$date', '$time', '$seats', '$comments')";
        
        if(mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Reservation successful.Thanks for choosing our restaurant";
            header("Location: start.php");
            exit();
        }
        else {
            $_SESSION['error'] = "Reseravtion cannot be made.";
            header("Location: reservation.php?error=Password is required");
            exit();
        }
    
    // Close the database connection
       mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reservation Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="css/boxicons.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">


    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
        <!-- Preloader -->
        <div class="loader" style="display: none;">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Navbar Area -->
        <div class="navbar-area fixed-top">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="/" class="logo">
                    <img src="img/logo2.png" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="/" class="active">Home</a></li>
                                <li class="nav-item"><a href="about">About Us</a></li>			
								<li class="nav-item"><a href="reservation.php">Reservation</a></li>
								<li class="nav-item"><a href="menu">Menu</a></li>                                
								<li class="nav-item"><a href="offers.php">Offers</a></li>                                  
								<li class="nav-item"><a href="register.php">Register</a></li>  
								<li class="nav-item"><a href="login.php">Login</a></li>  
								<li class="nav-item"><a href="https://leisuresquare.in/onlineorder/">Order Now</a></li>
                                <li class="nav-item"><a href="contact-us">Contact Us</a></li>
							</ul>
                           
                        </div>
                        <a class="navbar-brand" href="/">
                            <img src="img/logo.png" alt="Logo">
                        </a>
                    </nav>
                </div>
            </div>
        </div>
		
	<h1 style="padding:11% 0px 0px 31%">Restaurant Reservation</h1>
<div class="contain" style="padding:0% 15px 8px 35%"> 
	<form action="reservation.php" method="post">
        <input type="hidden" name="Submit" value="true">
    <!-- Rest of the form -->
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone" required><br><br>
		<label for="date">Date:</label>
		<input type="date" id="date" name="date" required><br><br>
		<label for="time">Time:</label>
		<input type="time" id="time" name="time" required><br><br>
		<label for="seats">Number of Guests:</label>
		<input type="number" id="guests" name="guests" required><br><br>
		<label for="comments">Comments:</label><br>
		<textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>
		<input type="submit" value="Submit">
	</form>
</div>
       <!-- Footer -->
	   <footer class="footer-area-two pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-logo">
                                <a href="/">
                                    <img src="img/logo.png" alt="Logo">
                                </a>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                               -->
                            </div>
                        </div>
                    </div>
                        <div class="footer-item">
                            <div class="footer-service">
                                <h3>Our Product</h3>
                                <ul>
                                    <li>
                                        <a href="contact-us.html">
                                            <i class='bx bx-chevron-right'></i>
                                            Pizza
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bx-chevron-right'></i>
                                            Burger
                                        </a>
                                    </li>
                                    <li>
                                        <a href="chefs.html">
                                            <i class='bx bx-chevron-right'></i>
                                            Noth indian
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class='bx bx-chevron-right'></i>
                                            Punjabi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="privacy-policy.html">
                                            <i class='bx bx-chevron-right'></i>
                                            Fast Food
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-4 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-service">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li>
                                        <a href="/">
                                            <i class="bx bx-chevron-right"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about">
                                            <i class="bx bx-chevron-right"></i>
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="menu">
                                            <i class="bx bx-chevron-right"></i>
                                            Menu
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery">
                                            <i class="bx bx-chevron-right"></i>
                                            Gallery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact-us">
                                            <i class="bx bx-chevron-right"></i>
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-service">
                                <h3>Contact Us</h3>
                                <ul>
                                    <li>
                                        <a href="tel:6366304818">
                                            <i class="bx bx-phone-call"></i>
                                            6366304818
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:leisuresquare8384@gmail.com">
                                            <i class="bx bx-message-detail"></i>
                                            leisuresquare8384@gmail.com
                                        </a>
                                    </li>
                                    <li>
                                        <i class="bx bx-location-plus"></i>
                                        178/6 14th main road, 20th, 50th Main Rd, Kumaraswamy Layout, Bengaluru, Karnataka 560078
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Copyright -->
        <div class="copyright-area  copyright-area-two">
            <div class="container">
                <div class="copyright-item">
                    <p>All Rights Reserved By Leisure Square Grub &amp; Wine @2022. Design By <a href="https://petpooja.com/" target="_blank">PETPOOJA</a>.</p>
                </div>
            </div>
        </div>
        <!-- End Copyright -->

        
        <!-- Essential JS -->
        <script src="js/jquery-3.5.0.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Meanmenu JS -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- Owl Carousel JS -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Mixitup JS -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Slick Slider JS -->
        <script src="js/slick.min.js"></script>
        <!-- Form Ajaxchimp JS -->
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<!-- Form Validator JS -->
		<script src="js/form-validator.min.js"></script>
		<!-- Contact JS -->
        <script src="js/contact-form-script.js"></script>
        <!-- Magnific Popup JS -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Custom JS -->
        <script src="js/custom.js"></script><div id="toTop" class="back-to-top-btn" style="display: none;"><i class="bx bxs-up-arrow-alt"></i></div>
    
</body>
</html>
