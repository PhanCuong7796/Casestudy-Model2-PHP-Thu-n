<?php
session_start();

$id = $_REQUEST['id'];
$quantity = $_REQUEST['quantity'];
if(isset($_SESSION['cart'][$id])){ 
              
    $_SESSION['cart'][$id]['quantity'] += $quantity; 
      
}else{
    $_SESSION['cart'][$id] = array( 
        "quantity" => $quantity
    ); 
}

header('location:cart.php');die;

// echo '<pre>';
// print_r($_SESSION);die;


