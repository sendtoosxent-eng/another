<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "nexcell_db";

// Make sure this variable name is exactly $conn
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>