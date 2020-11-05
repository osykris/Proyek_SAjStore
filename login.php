<?php
if(session_id() == '' || !isset($_SESSION)){
	session_start();
}
	if(isset($_SESSION["user"])){
       echo '
        <script>
          alert("Login Successful, Happy Shopping :)");
          window.location = "home.php?halaman=home"
        </script>
        ';
}
?>
<html>
<head>
	<title>Login||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/style.css">
	 <script src="js/vendor/modernizr.js"></script>
</head>
<body>
	<header>
		<div>
			<img src="img/logodangambar.png" class = "animated tada"/>
			<ul>
				<li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
				 <li><a href = "about.php?halaman=about_us">About Us</a></li>  
				<li><a href = "product.php?halaman=product">Product</a></li>
				<li><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
				<li><a href = "contact.php?halaman=contact_us">Contact Us</a></li>
				<?php
          		if(isset($_SESSION['email'])){
            		echo '<li><a href="account.php?halaman=my_account">Account</a></li>';
            		echo '<li><a href="logout.php?halaman=logout">Logout</a></li>';
          		}
          		else{
            		echo '<li class="active"><a href="login.php?halaman=login">Login</a></li>';
            		echo '<li><a href="register.php?halaman=register">Register</a></li>';
          		}
          		?>
			</ul>
		</div>
		<div class="title">
			<h2>SAj</h2>
			<h3>Shopping-in Aja Yukk!!!</h3>
		</div>
		<div class="kotak_login">
			<p class="tulisan_login">Please login :)</p>
		<form action="verify.php" method="POST">
			<label>email</label>
			<input type="text" name="email" class="form_login" placeholder="Email ..">
			<label>password</label>
			<input type="password" name="password" class="form_login" placeholder="Password ..">
			<input type="submit" name="login" class="tombol_login" value="LOGIN">
			<br/>
			<br/>
			<center>
				<a class="link" href="home.php?halaman=home">Back</a>
			</center>
		</form>
		</div>
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