<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'casestudy2';
global $conn;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

