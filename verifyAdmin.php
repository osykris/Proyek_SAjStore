<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'db.php';

$email = $_POST["email"];
$password = $_POST["password"];
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");

 $result = mysqli_query($conn, "SELECT email,password from admin order by idAdmin asc");

if($result === FALSE){
  die(mysqli_error($conn));
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->email === $email && $obj->password === $password) {

      $_SESSION['email'] = $email;
      echo '
        <script>
          alert("Welcome Happy Admin");
          window.location = "homeAdmin.php"
        </script>
        ';
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '
        <script>
          alert("Invalid Login!");
          window.location = "loginAdmin.php"
        </script>
        ';
}


?>
