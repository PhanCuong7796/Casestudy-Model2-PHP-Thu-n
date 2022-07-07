<?php
include '../layouts/db.php';
$id = $_REQUEST['id'];
global $conn;
$sql = "DELETE FROM orders WHERE id = '$id'";
$conn->query($sql);
header('location:orders.php');