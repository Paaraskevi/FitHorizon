<?php
include 'assets/server/connection.php';
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $products = $stmt->get_result();

    if ($products->num_rows > 0) {
        $row = $products->fetch_assoc();
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible"content="IE=edge">
	<meta name="viewport"content="width=device-width , initial-scale=1.0">
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
          <a class="nav-link" href="">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.hmtl">SHOP</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT US </a>
        </li>
        <li class="nav-item">
          <a class="nav-link "href="contact.html">CONTACT </a>

          <li class="nav-item">
        	<i class="fas fa-shopping-bag"></i>
        	<i class="fas fa-user"></i>
        </li>

      </ul>
  </div>
    </div>
  </div>
</nav>
<!--Single product-->
<section class=" container single-product my-5 pt-5">
	<div class="row mt-5">
		<?php while ($row=$product->fetch_assoc()){ ?>
			
		<div class="col-lg-5 col-md-6 col-sm-12">
			<img  class ="img-fluid w-100 pb-1" src="assets/images/<?php echo  $row['product_image']; ?>" id="mainImg">
				<div class="small-img-group">
					<div class="small-img-col">
						<img src="assets/images/<?php echo  $row['product_image1']; ?>" width="100%" class="small-img"/>
				</div>
				<div class="small-img-col">
						<img src="assets/images/<?php echo  $row['product_image2']; ?>" width="100%" class="small-img"/>
				</div>
				<div class="small-img-col">
						<img src="assets/images/<?php echo  $row['product_image3']; ?>" width="100%" class="small-img"/>
				</div>
				<div class="small-img-col">
						<img src="assets/images/<?php echo  $row['product_image4']; ?>" width="100%" class="small-img"/>
				</div>
			</div>
		</div>
	<?php  } ?>
			<div class="col-lg-6 col-md-12 col-12">
				<h6>Woman/Leggins Set</h6>
				<h3 class="py-4"><?php echo['product_name'];?></h>
				<h2><?php echo $row['product_price'];?> </h2>

				<form method="POST" action="cart.php">

					<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>"/>
					<input type="hidden" name="product_image" value="<?php echo  $row['product_image']; ?>" />
					<input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>"/>
					<input type="hidden" name="product_name" value="<?php echo $row['product_price'] ?>"/>
					<input type="number" name="product_quantity"value="1"/>
					<a href="" class="btn" type="sumbit" name="add_to_cart">Add to Cart</a>
			</form>
				
				<h4 class="mt-5">Product Details</h4>
				<span>
					<?php echo $row['product_description'];?> 
				</span>
		
		</div>
	<?php  ?>
</div>
</section>
<!--Realated products-->
<section id="related-products" class="my-5 pb5">
	<div class="container text-center mt-5 py-5">
		<h3>Related Products</h3>
		<hr>
	</div>
	<div class="row mx-auto container-fluid">
		<div class="product col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid mb-3" src="assets/images/p1.png"> 
			<div class="star">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<h5 class="p-name"> Leggins Set </h5>
			<h4 class="p-price"> $23.00</h4>
			<a href="" class="btn">Buy now</a>

		</div>
		<div class="product col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid mb-3" src="assets/images/p2.png"> 
			<div class="star">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<h5 class="p-name"> Leggins Set </h5>
			<h4 class="p-price"> $23.00</h4>
			<a href="" class="btn">Buy now</a>

		</div>
		<div class="product col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid mb-3" src="assets/images/p3.png"> 
			<div class="star">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<h5 class="p-name"> Leggins Set </h5>
			<h4 class="p-price"> $23.00</h4>
			<a href="" class="btn">Buy now</a>
		</div>
		<div class="product col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid mb-3" src="assets/images/p4.png"> 
			<div class="star">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<h5 class="p-name"> Leggins Set </h5>
			<h4 class="p-price"> $23.00</h4>
			<a href="" class="btn">Buy now</a>

		</div>
	</div>

</section>
</section><footer class="footer">

   <section class="grid">

      <div class="box">
         <h3>quick links</h3>
         <a href="index.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="shop.php"> <i class="fas fa-angle-right"></i> shop</a>
         <a href="contact.php"> <i class="fas fa-angle-right"></i> contact</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
         <a href="register.php"> <i class="fas fa-angle-right"></i> register</a>
         <a href="cart.php"> <i class="fas fa-angle-right"></i> cart</a>
         <a href="orders.php"> <i class="fas fa-angle-right"></i> orders</a>
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

   <div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>asprou paraskevi </span></div>

</footer>
	<script 
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
<script>
	var mainImg = document.getElementById("mainImg");
var smallImg = document.getElementsByClassName("small-img");

for (let i = 0; i > 4; i++) {
  smallImg[i].onclick = function () {
    mainImg.src = smallImg[i].src;
  };
}
</script>
</body>
</html>