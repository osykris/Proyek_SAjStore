<?php
session_start();
include "db.php";

if (!isset($_SESSION['email'])){
  echo '
        <script>
          alert("You Must Be Logged In :)");
          window.location = "loginAdmin.php?halaman=loginAdmin"
        </script>
        ';
}

?>
<html>
<head>
	<title>Home||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/styleAdmin.css">
   <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			<img src="img/logodangambar.png" class = "animated tada"/>
      <ul>
				<li class="active"><a href = "homeAdmin.php?halaman=produk?halaman=home">Home</a></li>
        <li><a href = "productAdmin.php?halaman=productAdmin">Product</a></li>
        <li><a href = "Purchase.php?halaman=purchase">Purchase</a></li>
          <li><a href = "PurchaseReport.php?halaman=purchaseReport">Purchase Report</a></li>
          <li><a href = "customers.php?halaman=customers">Customers</a></li>
        <li><a href="logout.php?halaman=welcome">Logout</a></li>
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
<h4> SAj is our online store site engaged in online sales. The products we offer are the products you need at affordable prices. Here we sell various kinds of women's clothing products online at affordable prices. So whatever your taste, we will offer here. Make sure you pay attention to the description of each item on the product</h4> 
<h5>page, because each product has a description that needs attention. Our product is equipped with a simple and convenient design that can be used for offices, lectures, and other activities.</h5>
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
