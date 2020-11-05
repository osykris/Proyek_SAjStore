<?php
session_start();
include "db.php";
?>
<!DOCTYPE>
<html>
<head>
	<title>Shopping history||SAj</title>
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
        <li><a href = "viewcart.php?halaman=view_cart">Cart</a></li>
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
		<h1 class="ball"><?php echo $_SESSION["user"]["namaUser"]?>'s Shopping History</h1>
    <div class="row">
      <div class="large-12">
          <table>
            <thead>
                <tr>
                    <th style="color: #DB7093; font-weight: bold; font-size: 20px; text-align: center;">No.</th>
                    <th style="color: #DB7093; font-weight: bold; font-size: 20px; text-align: center;">Date</th>
                    <th style="color: #DB7093; font-weight: bold; font-size: 20px; text-align: center;">Status</th>
                    <th style="color: #DB7093; font-weight: bold; font-size: 20px; text-align: center;">Total</th>
                    <th style="color: #DB7093; font-weight: bold; font-size: 20px; text-align: center;">Option</th>
                </tr>
                <?php
                $nomor = 1;
                $id_pelanggan = $_SESSION["user"]["idUser"];
                $ambil = mysqli_query($conn, "SELECT * FROM orders WHERE idUser = '$id_pelanggan'");
                while ($pecah = $ambil->fetch_assoc()){
                ?>
                <tr>
                    <td style="color: #00CED1; text-align: center; font-size: 16px;"><?php echo $nomor; ?></td>
                    <td style="color: #00CED1; text-align: center; font-size: 16px;"><?php echo $pecah["date"]?></td>
                    <td style="color: #00CED1; text-align: center; font-size: 16px;">
                    <?php echo $pecah["statusPembelian"] ?>
                    <br>
                    <?php if (!empty($pecah['resiPengiriman'])):?>
                    No. Receipt : <?php echo $pecah['resiPengiriman'] ?> 
                    </td>
                  <?php endif ?>
                    <td style="color: #00CED1; text-align: center; font-size: 16px;">Rp. <?php echo number_format($pecah['total']) ?></td>
                    <td>
                      <a href="nota.php?id=<?php echo $pecah['idOrders'] ?>" class="button alert">Proof of Purchase</a>
                      <?php if ($pecah['statusPembelian']=='pending'): ?>
                      <a href="payment.php?id=<?php echo $pecah['idOrders']?>" class="button [secondary success alert]">Input Payment</a>
                      <?php else:?>
                      <a href="seePayment.php?id=<?php echo $pecah['idOrders']?>" style ="background-color:   #BDB76B;" class="button [secondary success alert]">See Payment</a>
                      <?php endif ?>
                    </td>
                </tr>
                <?php $nomor++; ?>
              <?php } ?>
            </thead>  
          </table>
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