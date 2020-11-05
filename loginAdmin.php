<?php
if(session_id() == '' || !isset($_SESSION)){
	session_start();
}
if(isset($_SESSION["email"])){
       echo '
        <script>
          alert("Welcome Happy Admin");
          window.location = "homeAdmin.php"
        </script>
        ';
}
?>

<html>
<head>
	<title>Login||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/styleAdmin.css">
	 <script src="js/vendor/modernizr.js"></script>
</head>
<body>
	<header>
			<img src="img/logodangambar.png" class = "animated tada"/>
		<div class="title">
			<h2>Welcome Admin</h2>
			<h3>SAj Online Shop</h3>
		</div>
		<div class="kotak_login">
			<p class="tulisan_login">Please login :)</p>
		<form action="verifyAdmin.php" method="POST">
			<label>email</label>
			<input type="text" name="email" class="form_login" placeholder="Email ..">
			<label>password</label>
			<input type="password" name="password" class="form_login" placeholder="Password ..">
			<input type="submit" name="login" class="tombol_login" value="LOGIN">
			<br/>
			<br/>
			<center>
				<a class="link" href="index.php">Back</a>
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

