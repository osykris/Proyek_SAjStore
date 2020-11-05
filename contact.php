<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>
<!DOCTYPE>
<html>
<head>
	<title>Conntact Us||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/style4.css">
	<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			<ul>
				<li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
				 <li><a href = "about.php?halaman=about_us">About Us</a></li>  
				<li><a href = "product.php?halaman=product">Product</a></li>
				<li><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
				<li class="active"><a href = "contact.php?halaman=contact_us">Contact Us</a></li>
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
			<h1>Contact Us</h1>
			<h2>SAj Shopping-in Aja Yukk!!!</h2><br>
			<h3>Address: Perum Mandosi Permai blok D no 3 Jati Asih South Bekasi 17425.
Bekasi - West Java</h3><br>
			<h3>Phone Number: 087808787473</h3>
			<h3>Instagram: @SAjOfficial</h3>
			<h3>Twitter: @SAjyukk</h3>
			<h3>Line: @SAjOfficial</h3><br><br>
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