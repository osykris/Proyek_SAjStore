<?php
session_start();
include 'db.php';
if (empty($_SESSION["cart"]) OR !isset($_SESSION["cart"])) {
   echo '
        <script>
          alert("Empty Cart Please Shop First :)");
          window.location = "product.php?halaman=product"
        </script>
        ';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/cart.css">
	 <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			<ul>
				<li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
				<li><a href = "about.php?halaman=about_us">About Us</a></li>  
				<li><a href = "product.php?halaman=product">Product</a></li>
				<li class="active"><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
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
		<h1 class="ball">Your Shopping Cart</h1>
		<br/>
         <br/>
		<div class="row">
      <div class="large-12">
        <?php
          if(($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th style="color: #DB7093; font-size: 21px; font-weight: bold;">Code</th>';
            echo '<th style="color: #DB7093; font-size: 21px; font-weight: bold;">Name</th>';
            echo '<th style="color: #DB7093; font-size: 21px; font-weight: bold;">Quantity</th>';
            echo '<th style="color: #DB7093; font-size: 21px; font-weight: bold;">Cost</th>';
            echo '<th style="color: #DB7093; font-size: 21px; font-weight: bold;">Action</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $jumlah) {
$result = mysqli_query($conn, "SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);

            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $jumlah; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td style="color: #00CED1;">'.$obj->product_code.'</td>';
                echo '<td style="color: #00CED1;">'.$obj->product_name.'</td>';
                echo '<td style="color: #00CED1;">'.$jumlah.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td style="color: #00CED1;">Rp. '.number_format($cost).'</td>';
                echo '<td><a  href="update-cart.php?action=delete&id='.$product_id.'" class="button alert">Delete</a>
                </td>';
                echo '</tr>';
              }
            }

          }



          echo '<tr>';
          echo '<td colspan="3" align="right" style="color: #DB7093; font-size: 21px; font-weight: bold;">Total</td>';
          echo '<td style="color: #00CED1;">Rp. '.number_format($total).'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="5" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="product.php" class="button [secondary success alert]">Continue Shopping</a>';
          if(isset($_SESSION['user'])) {
            echo '<a href="checkOut.php"><button style="float:right; background-color: #00CED1;  font-weight: bold; font-family: Century Gothic;">Check Out</button></a>';
          }

          else {
            echo '<a href="login.php"><button style="float:right; background-color: #00CED1;  font-weight: bold; font-family: Century Gothic;">Login</button></a>';
          }

          echo '</td>';
          echo '</tr>';
          echo '</table>';
        }

       
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