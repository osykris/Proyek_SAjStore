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
		<h1>Add SAj Product</h1>
    <div class="container">
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Id</label>
      </div>
      <div class="col-75">
        <input type="text" name="id" placeholder="Product Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Code</label>
      </div>
      <div class="col-75">
        <input type="text" name="code" placeholder="Product Code..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name" placeholder="Product name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Quantity</label>
      </div>
      <div class="col-75">
        <input type="text" name="qty" placeholder="Product Quantity..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Price</label>
      </div>
      <div class="col-75">
        <input type="text" name="price" placeholder="Product Price..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Photo</label>
      </div>
      <div class="col-75">
        <input type="file" name="photo" placeholder="Product photo..">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="Save" value="Save">
    </div>
  </form>
  <?php
  if(isset($_POST['Save'])){
    $nama = $_FILES['photo']['name'];
    $lokasi = $_FILES['photo']['tmp_name'];
    move_uploaded_file($lokasi, "img/" . $nama);
    $query = mysqli_query($conn, "INSERT INTO products (id, product_code, product_name, product_desc, product_img_name, qty, price) VALUES('$_POST[id]', '$_POST[code]','$_POST[name]', '$_POST[subject]', '$nama', '$_POST[qty]', '$_POST[price]')");
    echo '
        <script>
          alert("Data Saved");
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