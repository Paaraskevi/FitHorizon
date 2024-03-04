
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <!-- NAVBAR -->
   <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
         <div class="container">
            <div class="logo">
               <img src="assets/images/logo2.png" width="125px">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" href="#">HOME</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">SHOP</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">ABOUT US</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">CONTACT</a>
                  </li>
                  <li class="nav-item">
                     <i class="fas fa-shopping-bag"></i>
                     <i class="fas fa-user"></i>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <!-- Login -->
   <section class="my-5 py-5">
      <div class="container text-center nt-3 pt-5">
         <h2 class="form-weight-bold">Log in</h2>
         <hr class="mx-auto">
      </div>
      <div class="mx-auto container">
         <form id="login-form" method="post" onsubmit="return formValidation();">
            <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" id="login-email" name="email" placeholder="E-mail" required/>
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
               <input type="submit" class="btn" id="login-btn" value="Login"/>
            </div>
            <div class="form-group">
               <a id="register-url">Don't have an account?</a><br>
               <a href="register.php" class="btn">Register here</a>
            </div>
         </form>
      </div>
   </section>

   <footer class="footer">
      <section class="grid">
         <div class="box">
            <h3>Quick links</h3>
            <a href="index.php"><i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> About</a>
            <a href="shop.php"><i class="fas fa-angle-right"></i> Shop</a>
            <a href="contact.php"><i class="fas fa-angle-right"></i> Contact</a>
         </div>
         <div class="box">
            <h3>Extra links</h3>
            <a href="login.php"><i class="fas fa-angle-right"></i> Login</a>
            <a href="register.php"><i class="fas fa-angle-right"></i> Register</a>
            <a href="cart.php"><i class="fas fa-angle-right"></i> Cart</a>
            <a href="orders.php"><i class="fas fa-angle-right"></i> Orders</a>
         </div>
         <div class="box">
            <h3>Contact us</h3>
            <a href="tel:1234567890"><i class="fas fa-phone"></i> +210 456 7899</a>
            <a href="tel:11122233333"><i class="fas fa-phone"></i> +210 222 3333</a>
            <a href="mailto:info@gmail.com"><i class="fas fa-envelope"></i> info@gmail.com</a>
            <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i> Greece 404</a>
         </div>
         <div class="box">
            <h3>Follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
         </div>
      </section>
      <div class="credit">&copy; <?= date('Y'); ?> by <span>Asprou Paraskevi</span></div>
   </footer>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <script>
      function formValidation() {
         var form = document.getElementById('login-form');
         if (form.checkValidity() == false) {
            var list = form.querySelectorAll(':invalid');
            for (var item of list) {
               item.focus();
            }
         }
      }
   </script>
</body>
</html>
<?php

session_start();
$servername = "localhost";
$username = "eva";
$password = "12345";
$dbname = "php_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failure: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    header('Location: cart.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = $email; 
        // Store user's ID in the session
        header("Location: cart.php");
        exit();
    } else {
        echo "Incorrect email or password";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <!-- NAVBAR -->
   <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
         <div class="container">
            <div class="logo">
               <img src="assets/images/logo2.png" width="125px">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" href="#">HOME</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">SHOP</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">ABOUT US</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">CONTACT</a>
                  </li>
                  <li class="nav-item">
                     <i class="fas fa-shopping-bag"></i>
                     <i class="fas fa-user"></i>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>

   <!-- Login -->
   <section class="my-5 py-5">
      <div class="container text-center nt-3 pt-5">
         <h2 class="form-weight-bold">Log in</h2>
         <hr class="mx-auto">
      </div>
      <div class="mx-auto container">
         <form id="login-form" method="post" onsubmit="return formValidation();">
            <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" id="login-email" name="email" placeholder="E-mail" required/>
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
               <input type="submit" class="btn" id="login-btn" value="Login"/>
            </div>
            <div class="form-group">
               <a id="register-url">Don't have an account?</a><br>
               <a href="register.php" class="btn">Register here</a>
            </div>
         </form>
      </div>
   </section>

   <footer class="footer">
      <section class="grid">
         <div class="box">
            <h3>Quick links</h3>
            <a href="index.php"><i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> About</a>
            <a href="shop.php"><i class="fas fa-angle-right"></i> Shop</a>
            <a href="contact.php"><i class="fas fa-angle-right"></i> Contact</a>
         </div>
         <div class="box">
            <h3>Extra links</h3>
            <a href="login.php"><i class="fas fa-angle-right"></i> Login</a>
            <a href="register.php"><i class="fas fa-angle-right"></i> Register</a>
            <a href="cart.php"><i class="fas fa-angle-right"></i> Cart</a>
            <a href="orders.php"><i class="fas fa-angle-right"></i> Orders</a>
         </div>
         <div class="box">
            <h3>Contact us</h3>
            <a href="tel:1234567890"><i class="fas fa-phone"></i> +210 456 7899</a>
            <a href="tel:11122233333"><i class="fas fa-phone"></i> +210 222 3333</a>
            <a href="mailto:info@gmail.com"><i class="fas fa-envelope"></i> info@gmail.com</a>
            <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i> Greece 404</a>
         </div>
         <div class="box">
            <h3>Follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
         </div>
      </section>
      <div class="credit">&copy; <?= date('Y'); ?> by <span>Asprou Paraskevi</span></div>
   </footer>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <script>
      function formValidation() {
         var form = document.getElementById('login-form');
         if (form.checkValidity() == false) {
            var list = form.querySelectorAll(':invalid');
            for (var item of list) {
               item.focus();
            }
         }
      }
   </script>
</body>
</html>
