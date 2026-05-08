<?php
include 'db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM cart WHERE id = $id");
header("Location: " . $_SERVER['HTTP_REFERER']); // Send user back to where they were
?>