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
		<h1 class="ball">Check Out</h1>
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
                echo '<td style="color: #00CED1;">'.$jumlah.'</td>';
                echo '<td style="color: #00CED1;">Rp. '.number_format($cost).'</td>';
                echo '</tr>';
              }
            }

          }

          echo '<tr>';
          echo '<td style="color: #DB7093; font-size: 21px; font-weight: bold;" colspan="3" align="right">Total</td>';
          echo '<td style="color: #00CED1;">Rp. '.number_format($total).'</td>';
          echo '</tr>';
          echo '</table>';
          echo '<h3>Receiver</h3>';
          echo ' <form method="post">';
          echo ' <input style="background: #00CED1; color: #F8F8FF; font-size: 16px; font-family: Century Gothic; border: none; font-weight: bold;" type="text" readonly value="'. $_SESSION["user"]['namaUser'].'">';
          echo ' <input style="background: #00CED1; color: #F8F8FF; font-size: 16px; font-family: Century Gothic; border: none; font-weight: bold;" type="text" readonly value="'. $_SESSION["user"]['alamat'].'">';
          echo ' <input style="background: #00CED1; color: #F8F8FF; font-size: 16px; font-family: Century Gothic; border: none; font-weight: bold;" type="text" readonly value="'. $_SESSION["user"]['telepon'].'">';   
          echo '<label>Shipping Address</label>';
          echo '<textarea style="background: #00CED1; color: #F8F8FF; font-size: 1p6x; font-family: Century Gothic; border: none; font-weight: bold; height: 70px;" name="alamat" placeholder="Enter the Shipping Address.."></textarea>';
          echo '  <select class="ss" name="idOngkir">';
          echo ' <option value="">Select Shipping Post</option>';
           $result = mysqli_query($conn, "SELECT * FROM ongkir");
              while ($perongkir = $result->fetch_assoc()) {
          echo ' <option value="'.$perongkir["idOngkir"] .'">';
          echo ''.$perongkir['namaKota'].'-';
          echo 'Rp. ' . number_format($perongkir['tarif']) .'</option>';
        }
        echo '  </select>';
        echo '<button class="button1" name="checkout">Check Out</button>';
          echo '</form>';
        }
          echo '</div>';
          echo '</div>';
          ?>  
          <?php
          if (isset($_POST["checkout"])) {
            $_idpelanggan = $_SESSION["user"]["idUser"];
            $idOngkir = $_POST["idOngkir"];
            $tanggalpembelian = date("Y-m-d");
            $alamat =$_POST["alamat"];
            $ambil = mysqli_query($conn, "SELECT *FROM ongkir WHERE idOngkir='$idOngkir'");
            $arrayOngkir = $ambil->fetch_assoc();
            $namaKota = $arrayOngkir['namaKota'];
            $tarif=$arrayOngkir['tarif'];
            $totalpembelian = $total + $tarif; 
            $query = mysqli_query($conn, "INSERT INTO orders (idOngkir, idUser, total, date, namaKota, tarif, alamatPengiriman) VALUES  ('$idOngkir', '$_idpelanggan',  '$totalpembelian', '$tanggalpembelian', '$namaKota', '$tarif', '$alamat')");
            $idOrders = $conn->insert_id;
            foreach ($_SESSION["cart"] as $product_id => $jumlah) {
              $ambil = mysqli_query($conn, "SELECT * FROM products WHERE id = ".$product_id);
              $perproduk = $ambil->fetch_assoc();
              $code = $perproduk['product_code'];
              $nama = $perproduk['product_name'];
              $harga = $perproduk['price'];
              $subharga = $perproduk['price'] * $jumlah ;
              $query = mysqli_query($conn, "INSERT INTO oder_products (idOrders, id, jumlah, product_code, product_name, price, subharga) VALUES ('$idOrders', '$product_id', '$jumlah', '$code', '$nama', '$harga', '$subharga') ");
             $query = mysqli_query($conn, "UPDATE products SET qty=qty-$jumlah WHERE id = ".$product_id);
             
            }    
            unset($_SESSION["cart"]);
            echo "<script>alert('Successful Purchase :)');</script>";
            echo "<script>location = 'nota.php?id=$idOrders'</script>";
          }
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