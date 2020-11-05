<?php

if(session_id() == '' || !isset($_SESSION)){
  session_start();
}
include 'db.php';

$email = $_POST["email"];
$password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");

$akunyangcocok = $result->num_rows;

if($akunyangcocok == 1){
  $akun = $result->fetch_assoc();
      $_SESSION["user"] = $akun;
      echo '
        <script>
          alert("Login Successful, Happy Shopping");
          window.location = "home.php"
        </script>
        ';
    } else {
  echo '
        <script>
          alert("Invalid Login!");
          window.location = "login.php"
        </script>
        ';
}

?>
