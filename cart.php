<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    // If the user has already added a product to the cart
    if (isset($_SESSION['cart'])) {
        $product_array_ids = array_column($_SESSION['cart'], "product_id");
        $product_id = $_POST['product_id'];
        
        // Check if the product has already been added to the cart
        if (!in_array($product_id, $product_array_ids)) {
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity
            );
            
            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            echo '<script>alert("Product was already added to the cart.");</script>';
        }
    } else {
        // If this is the first product being added to the cart
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );
        
        $_SESSION['cart'][$product_id] = $product_array;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
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
    </div>

    <!-- Cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="<?php echo $value['product_image']; ?>" alt="Product Image">
                            <div>
                                <p><?php echo $value['product_name']; ?></p>
                                <small><span>$</span><?php echo $value['product_price']; ?></small><br>
                                <a class="remove-btn" href="#">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" value="1">
                    </td>
                    <td>
                        <span>$</span>
                        <span class="product-price">23.00</span>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$23.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$32.00</td>
                </tr>
            </table>
        </div>
        <div class="checkout-container">
            <button class="btn checkout-btn">Check Out</button>
        </div>
    </section>

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
                <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i> Greece 404 </a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>twitter</a>
                <a href="#"><i class="fab fa-instagram"></i>instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
            </div>
        </section>
        <div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>asprou paraskevi</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
    </script>
</body>

</html>
<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    // If the user has already added a product to the cart
    if (isset($_SESSION['cart'])) {
        $product_array_ids = array_column($_SESSION['cart'], "product_id");
        $product_id = $_POST['product_id'];
        
        // Check if the product has already been added to the cart
        if (!in_array($product_id, $product_array_ids)) {
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity
            );
            
            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            echo '<script>alert("Product was already added to the cart.");</script>';
        }
    } else {
        // If this is the first product being added to the cart
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );
        
        $_SESSION['cart'][$product_id] = $product_array;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
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
    </div>

    <!-- Cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="<?php echo $value['product_image']; ?>" alt="Product Image">
                            <div>
                                <p><?php echo $value['product_name']; ?></p>
                                <small><span>$</span><?php echo $value['product_price']; ?></small><br>
                                <a class="remove-btn" href="#">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" value="1">
                    </td>
                    <td>
                        <span>$</span>
                        <span class="product-price">23.00</span>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$23.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$32.00</td>
                </tr>
            </table>
        </div>
        <div class="checkout-container">
            <button class="btn checkout-btn">Check Out</button>
        </div>
    </section>

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
                <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i> Greece 404 </a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>twitter</a>
                <a href="#"><i class="fab fa-instagram"></i>instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
            </div>
        </section>
        <div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>asprou paraskevi</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
    </script>
</body>

</html>
