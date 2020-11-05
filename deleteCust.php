<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'db.php';
?>
<?php
  $result = mysqli_query($conn, "SELECT * FROM user WHERE idUser='$_GET[id]'");
  $pecah = $result->fetch_assoc();
  $query = mysqli_query($conn, "DELETE FROM user WHERE idUser='$_GET[id]'");
  echo '
        <script>
          alert("Customer Deleted");
          window.location = "customers.php?halaman=customers"
        </script>
        ';
?>