<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'db.php';
?>
<?php 
$keyword = $_GET["keyword"];
$semudata=array();
$result = mysqli_query($conn, "SELECT * FROM products WHERE product_name LIKE '%$keyword%' OR product_desc LIKE '%$keyword%'");
while ($pecah = $result->fetch_assoc()) {
  $semudata[]=$pecah;
}
?>
<!DOCTYPE>
<html>
<head>
	<title>Search||SAj</title>
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
		<h1 class="ball">Search Results : <?php echo $keyword ?></h1>
    <?php if (empty($semudata)):?>
      <div style="font-size: 23px; color: #DB7093; position: absolute; top: 30%; left: 8%;"> <?php echo $keyword ?> product not found</div>
    <?php endif?>
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
        <?php foreach($semudata as $key => $value): ?>
        <div class="large-4 columns">
          <h3><?php echo $value["product_name"]?></h3>
          <br>
          <img src="img/<?php echo $value["product_img_name"]?>"alt="Image" height="435px" width="350px">
          <br><br>
          <p>Product Code : <?php echo $value["product_code"]?></p><br>
          <p><strong>Description</strong> : <?php echo $value["product_desc"]?></p><br>
          <p><strong>Units Available</strong> : <?php echo $value["qty"]?></p><br>
          <p><strong>Price (Per Unit)</strong> : Rp. <?php echo number_format($value["price"])?></p><br>
          <p><a href="update-cart.php?action=add&id='<?php echo $value["id"]?>'"><input type="submit" value="Add To Cart" style="clear:both; background: #00CED1; border: none; color: #F8F8FF; font-size: 1em; padding: 10px;" /></a></p>
        </div>
      <?php endforeach ?>
      </div>
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