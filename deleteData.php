<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'db.php';
?>
<?php
  $result = mysqli_query($conn, "SELECT * FROM products WHERE id='$_GET[id]'");
  $pecah = $result->fetch_assoc();
  $foroproduk = $pecah['product_img_name'];
  if (file_exists("product_img_name/.$foroproduk")) {
    unlink("product_img_name/.$foroproduk");
  }
  $query = mysqli_query($conn, "DELETE FROM products WHERE id='$_GET[id]'");
  echo '
        <script>
          alert("Product Removed");
          window.location = "productAdmin.php?halaman=productAdmin"
        </script>
        ';
?>