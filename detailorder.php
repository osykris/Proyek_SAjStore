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
<!DOCTYPE>
<html>
<head>
	<title>Purchase Details||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/detail.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			 <ul>
        <li><a href = "homeAdmin.php?halaman=produk?halaman=home">Home</a></li>
        <li><a href = "productAdmin.php?halaman=productAdmin">Product</a></li>
        <li class="active"><a href = "Purchase.php?halaman=purchase">Purchase</a></li>
         <li><a href = "PurchaseReport.php?halaman=purchaseReport">Purchase Report</a></li>
          <li><a href = "customers.php?halaman=customers">Customers</a></li>
         <?php
          if(isset($_SESSION['email'])){
            echo '<li><a href="logout.php?halaman=welcome">Logout</a></li>';
          }
          else{
            echo '<li><a href="loginAdmin.php?halaman=login">Login</a></li>';
          }
          ?>
      </ul>
		</div>
		<h1>SAj Purchase Details</h1>
      <?php $result = mysqli_query($conn, "SELECT * FROM orders JOIN user ON orders.idUser = user.idUser WHERE orders.idOrders='$_GET[id]'");
        $detail = $result->fetch_assoc();
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
        Total : Rp.  <?php echo number_format($detail['total']); ?> <br>
        Status :  <?php echo $detail['statusPembelian']; ?>
        </p>
    <table  style="width: 750px;">
      <thead>
          <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Sub Total</th>
          </tr>
          <?php $result = mysqli_query($conn, "SELECT * FROM oder_products JOIN products ON oder_products.id = products.id WHERE oder_products.idOrders='$_GET[id]'"); ?>
      <?php while ($pecah = $result->fetch_assoc()){?>
          <tr>
              <td><?php echo $pecah['product_name']; ?></td>
              <td>Rp. <?php echo number_format($pecah['price']); ?></td>
              <td><?php echo $pecah['jumlah']; ?></td>
              <td>Rp. <?php echo number_format($pecah['jumlah']*$pecah['price']); ?></td>
          </tr>
        <?php } ?>
      </thead>  
    </table>
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