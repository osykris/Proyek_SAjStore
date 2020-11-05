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
	<title>Product||SAj</title>
	<link rel = "stylesheet" type="text/css" href="asset/product.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			 <ul>
        <li><a href = "homeAdmin.php?halaman=produk?halaman=home">Home</a></li>
        <li class="active"><a href = "productAdmin.php?halaman=productAdmin">Product</a></li>
        <li><a href = "Purchase.php?halaman=purchase">Purchase</a></li>
          <li><a href = "customers.php?halaman=customers">Customers</a></li>
           <li><a href = "PurchaseReport.php?halaman=purchaseReport">Purchase Report</a></li>
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
		<h1>SAj Product</h1>
    <a href="addData.php?halaman=addData" class="button [secondary success1 alert]">Add Data</a>
    <table>
      <thead>
          <tr>
              <th>Id</th>
              <th>Code</th>
              <th>Name</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Photos</th>
              <th>Price</th>
              <th>Action</th>
          </tr>
          <?php $result = mysqli_query($conn, "SELECT * FROM products"); ?>
          <?php while ($pecah = $result->fetch_assoc()){?>
          <tr>
              <td><?php echo $pecah['id']; ?></td>
              <td><?php echo $pecah['product_code']; ?></td>
              <td><?php echo $pecah['product_name']; ?></td>
              <td><?php echo $pecah['product_desc']; ?></td>
              <td><?php echo $pecah['qty']; ?></td>
              <td><img src="img/<?php echo $pecah['product_img_name']; ?>"width="100"></a></td>
              <td>Rp. <?php echo number_format($pecah['price']); ?></td>
              <td>
                  <a href="deleteData.php?halaman=deleteData&id=<?php echo $pecah['id'];?>" class="button alert">Delete</a>
                  <a href="updateData.php?halaman=updateData&id=<?php echo $pecah['id']?>" class="button [secondary success alert]">Update</a>
              </td>
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