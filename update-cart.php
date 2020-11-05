<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'db.php';

$product_id = $_GET['id'];
$action = $_GET['action'];


if($action === 'empty')
  unset($_SESSION['cart']);

$result = mysqli_query($conn, "SELECT qty FROM products WHERE id = ".$product_id);


if($result){

  if($obj = $result->fetch_object()) {

    switch($action) {

      case "add":
      if($_SESSION['cart'][$product_id]+1 <= $obj->qty)
        $_SESSION['cart'][$product_id]++;
      break;

      case "remove":
      $_SESSION['cart'][$product_id]--;
      if($_SESSION['cart'][$product_id] == 0)
        unset($_SESSION['cart'][$product_id]);
        break;

      case "delete":
      $product_id = $_GET["id"];
        unset($_SESSION['cart'][$product_id]);
        break;

    }
  }
}



header("location:viewcart.php");

?>
