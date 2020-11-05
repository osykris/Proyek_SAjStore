<?php

session_start();
include "db.php";


?>
<html>
<head>
	<title>Home||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/style2.css">
   <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			<img src="img/logodangambar.png"  class = "animated tada"/>
      <ul>
				<li class="active"><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
				<li><a href = "about.php?halaman=about_us">About Us</a></li> 
        <li><a href = "product.php?halaman=product">Product</a></li>
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
		<div class="slideshow-container">


  <div class="mySlides fade">
    <div class="numbertext">Best Seller SAj 1 / 4</div>
    <img src="img/g2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">Best Seller SAj 2 / 4</div>
    <img src="img/g3.jpg" style="width:100%">
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext">Best Seller SAj 3 / 4</div>
    <img src="img/g4.jpg" style="width:100%">
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext">Best Seller SAj 4 / 4</div>
    <img src="img/g1.jpg" style="width:100%">
  </div>


 
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
   <span class="dot" onclick="currentSlide(3)"></span>
     <span class="dot" onclick="currentSlide(4)"></span>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<h1> SAj is our online store site engaged in online sales. The products we offer are the products you need at affordable prices. Here we sell various kinds of women's clothing products online at affordable prices. So whatever your taste, we will offer here. Make sure you pay attention to the description of each item on the product</h1> 
<h2>page, because each product has a description that needs attention. Our product is equipped with a simple and convenient design that can be used for offices, lectures, and other activities.</h2>
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
