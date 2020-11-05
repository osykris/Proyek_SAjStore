<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'db.php';
?>
<!DOCTYPE>
<html>
<head>
	<title>Product||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/style3.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			<ul>
				<li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
				<li><a href = "about.php?halaman=about_us">About Us</a></li>  
				<li class="active"><a href = "product.php?halaman=product">Product</a></li>
				<li><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
				<li><a href = "contact.php?halaman=contact_us">Contact Us</a></li>
				 <?php
          if(isset($_SESSION['user'])){
            echo '<li><a href="history.php?halaman=history">History</a></li>';
            echo '<li><a href="logout.php?halaman=welcome">Logout</a></li>';
          }
          else{
            echo '<li><a href="login.php?halaman=login">Login</a></li>';
            echo '<li><a href="register.php?halaman=register">Register</a></li>';
          }
          ?>
			</ul>
		</div>
		<h1  class="ball">SAj Product</h1>
    <div class="box">
      <div class="container-4">
        <form action="pencarian.php" method="get">
        <input type="search" name="keyword" id="search" placeholder="Search..." />
        <button class="icon" ><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
		<div class="row">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
			$result = mysqli_query($conn, "SELECT * FROM products");
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<br/>';
                echo '<br/>';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<br/>';
              echo '<img src="img/'.$obj->product_img_name.'" alt="Image" height="435px" width="350px"/>';
              echo '<br/>';
              echo '<br/>';
              echo '<p>Product Code : '.$obj->product_code.'</p>';
               echo '<br/>';
              echo '<p><strong>Description</strong> : '.$obj->product_desc.'</p>';
               echo '<br/>';
              echo '<p><strong>Units Available</strong> : '.$obj->qty.'</p>';
               echo '<br/>';
              echo '<p><strong>Price (Per Unit)</strong> : Rp. '.number_format($obj->price).'</p>';
               echo '<br/>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #00CED1; border: none; color: #F8F8FF; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>
</header>
  		<footer>
           <p class="footer">Copyrights &copy; 2020 SAj Shopping-in Aja Yukk!!!. All Rights Reserved.</p>
        </footer>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>