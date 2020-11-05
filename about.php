<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>
<!DOCTYPE>
<html>
<head>
	<title>About Us||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/style4.css">
	<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			<ul>
				<li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
				 <li class="active"><a href = "about.php?halaman=about_us">About Us</a></li> 
				<li><a href = "product.php?halaman=product">Product</a></li>
				<li><a href = "viewcart.php?halaman=view_cart">Cart</a><li> 
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
		<div class = "title">
			<h1>About SAj</h1>
			<h2>Shopping-in Aja Yukk!!!</h2><br><br>
			<h3>SAj is established in 2020 by someone passionate in IT Technology.</h3><br>
			<h3>We see a problem that a lot of people have but nobody solve. Thus, we equipped ourselves and jump to solve this problem.</h3><br><br><br>
			<h3>Copyrights &copy; 2020 SAj Shopping-in Aja Yukk!!!. All Rights Reserved.</h3>
		</div>
</header>
<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>