<?php
session_start();
include "db.php";
?>
<!DOCTYPE>
<html>
<head>
  <title>Register||SAj</title>
  <link rel = "stylesheet" type="text/css" href="asset/register.css">
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
            echo '<li><a href="history.php?halaman=history">History</a></li>';
            echo '<li><a href="logout.php?halaman=welcome">Logout</a></li>';
          }
          else{
            echo '<li><a href="login.php?halaman=login">Login</a></li>';
            echo '<li  class="active"><a href="register.php?halaman=register">Register</a></li>';
          }
          ?>
      </ul>
    </div>
    <h1 class="ball">Register Become a Customer</h1>
    <h2>Please fill out the form below....</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">User Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name" placeholder="Enter your user name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" name="email" placeholder="your email.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Password</label>
      </div>
      <div class="col-75">
        <input type="text" name="password" placeholder="Password.." required>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="subject">Address</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="address" required placeholder="Your address.." style="height:150px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Telephone</label>
      </div>
      <div class="col-75">
        <input type="text" name="telp" required placeholder="Your telephone..">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="register" value="Register">
    </div>
  </form>
  <?php
  if (isset($_POST["register"])) {
    $namaUser = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $telephone = $_POST["telp"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $cocok = $result->num_rows;
    if ($cocok==1) {
      echo "<script>alert('Registration failed, email has already been used :)');</script>";
      echo "<script>location='register.php?halaman=register';</script>";
    } else {
      $conn->query("INSERT INTO user (namaUser, email, password, alamat, telepon) VALUES ('$namaUser', '$email', '$password', '$address', '$telephone')");
    echo "<script>alert('Registration successful, please login :)');</script>";
    echo "<script>location='login.php?halaman=login';</script>";
  }
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