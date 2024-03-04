<?php

include 'assets/server/connection.php';

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['confirmPassword']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'Email already exists!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'Confirm password does not match!';
        } else {
            $insert_user = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
            $insert_user->execute([$name, $email, $cpass]);
            $message[] = 'Registered successfully! Please login.';
        }
    }
}
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
<!---NAVBAR-->
<div class="header">
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
    <!--Register-->
    <section class="my-5 py-5">
        <div class="container text-center nt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST">
                <?php if (isset($message) && !empty($message)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($message as $msg) : ?>
                            <p><?php echo $msg; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="register-name">Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Enter your Name" required>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="Enter your E-mail" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="register-confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm your Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-login-btn" name="submit" value="Register">
                </div>
                <div class="form-group">
                    <a href="#" id="register-url">Do you have an account?</a><br>
                    <a href="#" id="register-url" class="btn">Login here</a>
                </div>
            </form>
        </div>
    </section>
</div>
<footer class="footer">
    <section class="grid">
        <div class="box">
            <h3>quick links</h3>
            <a href="index.php"><i class="fas fa-angle-right"></i> home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> about</a>
            <a href="shop.php"><i class="fas fa-angle-right"></i> shop</a>
            <a href="contact.php"><i class="fas fa-angle-right"></i> contact</a>
        </div>
        <div class="box">
            <h3>extra links</h3>
            <a href="login.php"><i class="fas fa-angle-right"></i> login</a>
            <a href="register.php"><i class="fas fa-angle-right"></i> register</a>
            <a href="cart.php"><i class="fas fa-angle-right"></i> cart</a>
            <a href="orders.php"><i class="fas fa-angle-right"></i> orders</a>
        </div>
        <div class="box">
            <h3>contact us</h3>
            <a href="tel:1234567890"><i class="fas fa-phone"></i> +210 456 7899</a>
            <a href="tel:11122233333"><i class="fas fa-phone"></i> +210 222 3333</a>
            <a href="info@gmail.com"><i class="fas fa-envelope"></i> info@gmail.com.com</a>
            <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i> Greece 404</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
            <a href="#"><i class="fab fa-twitter"></i>twitter</a>
            <a href="#"><i class="fab fa-instagram"></i>instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
        </div>
    </section>
    <div class="credit">&copy; <?php echo date('Y'); ?> by <span>asprou paraskevi</span></div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
