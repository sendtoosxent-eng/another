<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $item_array = array(
        'id'    => $product_id,
        'name'  => $product_name,
        'price' => $product_price,
        'qty'   => 1
    );

    // If cart is not empty, check if product exists to increment qty, else add new
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'][] = $item_array;
    } else {
        $_SESSION['cart'] = array($item_array);
    }
    header("Location: cart.php");
}
?>