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
	<link rel = "stylesheet" type="text/css" href="asset/addproduct.css">
	  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<header>
		<div>
			 <ul>
        <li><a href = "homeAdmin.php?halaman=produk?halaman=home">Home</a></li>
        <li class="active"><a href = "productAdmin.php?halaman=productAdmin">Product</a></li>
        <li><a href = "Purchase.php?halaman=purchase">Purchase</a></li>
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
		<h1>Update SAj Product</h1>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id='$_GET[id]'");
    $pecah = $result->fetch_assoc();
     ?>
    <div class="container">
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Code</label>
      </div>
      <div class="col-75">
        <input type="text" name="code" value="<?php echo $pecah['product_code'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name" value="<?php echo $pecah['product_name'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" style="height:200px"><?php echo $pecah['product_desc'];?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Quantity</label>
      </div>
      <div class="col-75">
        <input type="text" name="qty" value="<?php echo $pecah['qty'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Price</label>
      </div>
      <div class="col-75">
        <input type="text" name="price" value="<?php echo $pecah['price'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Change Photo</label>
      </div>
      <div class="col-75">
        <img src="img/<?php echo $pecah['product_img_name'] ?>" width ="100">
        <input type="file" name="photo">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="Update" value="Update">
    </div>
  </form>
  <?php
  if(isset($_POST['Update'])){
   $nama = $_FILES['photo']['name'];
    $lokasi = $_FILES['photo']['tmp_name'];
    if(!empty($lokasi)){
      move_uploaded_file($lokasi, "img/" . $nama);
      $query = mysqli_query($conn, "UPDATE products SET product_code='$_POST[code]', product_name='$_POST[name]', product_desc='$_POST[subject]', qty='$_POST[qty]', price='$_POST[price]', product_img_name='$namafoto' WHERE id='$_GET[id]'");
    }
    else{
       $query = mysqli_query($conn, "UPDATE products SET product_code='$_POST[code]', product_name='$_POST[name]', product_desc='$_POST[subject]', qty='$_POST[qty]', price='$_POST[price]' WHERE id='$_GET[id]'");
    }
    echo '
        <script>
          alert("Data Successfully Changed");
          window.location = "productAdmin.php?halaman=productAdmin"
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