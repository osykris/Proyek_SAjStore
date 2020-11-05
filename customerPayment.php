<?php
session_start();
include "db.php";
$idOrders = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM payment WHERE idOrders = '$idOrders'");
$detail = $result->fetch_assoc();
?>
<!DOCTYPE>
<html>
<head>
	<title>Customer Payment||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/purchase.css">
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
    <h1>Payment Data</h1>
		 <table>
      <thead>
          <tr>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Customer's Name</th>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Bank</th>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Total</th>
              <th style="color: #DB7093; font-weight: bold; font-size: 20px;">Date</th>
          </tr>
          <tr>
            <td><?php echo $detail['namaUser']?></td>
            <td><?php echo $detail['bank']?></td>
             <td>Rp. <?php echo number_format($detail['jumlahBayar'])?></td>
             <td><?php echo $detail['tglBayar']?></td>
          </tr>
      </thead> 
      <img src="img/<?php echo $detail['buktiPembayaran']?>" alt="" class = "imgya"> 
    </table>
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">No. Delivery Receipt</label>
      </div>
      <div class="col-75">
        <input type="text" name="resi" placeholder="Enter Shipping Receipt..">
      </div>
    </div>
    <div class="row">
      <div class="col-25"> 
        <label for="fname">Status</label>
      </div>
      <div class="col-75">
        <select style="width: 375px;  padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; background-color: #F8F8FF; resize: vertical;" name="status">
          <option value="">Select status</option>
          <option value="Paid Off">paid off</option>
          <option value="Goods Shipped">Goods Shipped</option>
          <option value="Cancel">Cancel</option>
        </select>
      </div>
    <div class="row">
      <input type="submit" name="Process" value="Process">
    </div>
  </form>
  <?php
  if (isset($_POST["Process"])) {
     $resi = $_POST["resi"];
     $status = $_POST["status"];
     $conn->query("UPDATE orders SET resiPengiriman = '$resi', statusPembelian= '$status' WHERE idOrders = '$idOrders'");
      echo '
        <script>
          alert("Purchase Data Updated");
          window.location = "purchase.php?halaman=purchase"
        </script>
        ';
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