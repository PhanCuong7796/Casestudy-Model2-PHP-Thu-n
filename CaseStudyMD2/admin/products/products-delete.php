<?php
include '../layouts/db.php';
$id = $_REQUEST['id'];
global $conn;
$sql = "DELETE FROM products WHERE id = '$id'";
$conn->query($sql);
header('location:products-list.php');

