<?php
session_start();
include "db.php";

?>
<!DOCTYPE>
<html>
<head>
	<title>Proof of Purchase||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/detail.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			 <ul>
        <li><a href = "home.php?halaman=produk?halaman=home">Home</a></li>
        <li><a href = "about.php?halaman=about_us">About Us</a></li>  
        <li><a href = "product.php?halaman=product">Product</a></li>
        <li ><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
        <li><a href = "contact.php?halaman=contact_us">Contact Us</a></li>
         <?php
          if(isset($_SESSION['user'])){
           echo '<li class="active"><a href="history.php?halaman=history">History</a></li>';
            echo '<li><a href="logout.php?halaman=welcome">Logout</a></li>';
          }
          else{
            echo '<li><a href="login.php?halaman=login">Login</a></li>';
            echo '<li><a href="register.php?halaman=register">Register</a></li>';
          }
          ?>
      </ul>
		</div>
		<h1>Proof of Purchase from SAj</h1>
     <?php $result = mysqli_query($conn, "SELECT * FROM orders JOIN user ON orders.idUser = user.idUser WHERE orders.idOrders='$_GET[id]'");
        $detail = $result->fetch_assoc();
        ?>
        <?php
        $idpelangganygbeli = $detail["idUser"];
        $idpelangganygloggin = $_SESSION["user"]["idUser"];
        if ($idpelangganygbeli!== $idpelangganygloggin) {
          echo "<script>alert('Do Not Be Naughty!');</script>";
          echo "<script>location='history.php?halaman=history';</script>";
          exit();
        }
        ?>
        <h4>Customer<br>
        ------------------</h4>
        <p class="pr1">
        <?php echo $detail['namaUser']; ?><br>
        <?php echo $detail['alamat']; ?>
        <?php echo $detail['telepon']; ?> <br>
        <?php echo $detail['email']; ?><br>
       </p>
       <h5>Delivery<br>
        ------------------</h5>
        <p class="pr2">
          Shipping to <?php echo $detail['namaKota']; ?><br>
          Postal Fee : Rp. <?php echo number_format($detail['tarif']); ?> <br>
          Address : <?php echo $detail['alamatPengiriman']; ?> 
        </p>
        <h6>Purchase<br>
        ------------------</h6>
        <p class="pr3">No. Purchase : <?php echo $detail['idOrders']; ?> <br>
        Date : <?php echo $detail['date']; ?> <br>
        Total : Rp.  <?php echo number_format($detail['total']); ?>
        </p>
    <table>
      <thead>
          <tr>
              <th style="color: #696969; font-weight: bold;">Product Code</th>
              <th style="color: #696969; font-weight: bold;">Product Name</th>
              <th style="color: #696969; font-weight: bold;">Price</th>
              <th style="color: #696969; font-weight: bold;">Quantity</th>
              <th style="color: #696969; font-weight: bold;">Sub Total</th>
          </tr>
         
          <?php $result = mysqli_query($conn, "SELECT * FROM oder_products WHERE idOrders ='$_GET[id]'"); ?>
      <?php while ($pecah = $result->fetch_assoc()){?>
          <tr>
              <td><?php echo $pecah['product_code']; ?></td>
              <td><?php echo $pecah['product_name']; ?></td>
              <td>Rp. <?php echo number_format($pecah['price']); ?></td>
              <td><?php echo $pecah['jumlah']; ?></td>
              <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
          </tr>
        <?php } ?>
      </thead>  
    </table>
    <div class = "bayar">
    <p style="color: #F8F8FF;">Please make a payment Rp. <?php echo number_format($detail['total']);?> at <br>
      BNI Bank 197-000281-10 on behalf of PT. SAj Indonesia. Thank You!</p>
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