<?php
$id = $_REQUEST['id'];
include '../layouts/db.php';
global $conn;
$sql = "DELETE FROM categories WHERE id = '$id'";
$conn->query($sql);
header('location:categories-list.php');