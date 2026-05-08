<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_email = "admin@nexcellgadgets.com"; // Your email
    $name = $_POST['client_name'];
    $email = $_POST['client_email'];
    $address = $_POST['client_address'];
    $cart_details = $_POST['cart_data'];

    $subject = "New Order from " . $name;
    $message = "You have a new order!\n\n" .
               "Client: $name\n" .
               "Email: $email\n" .
               "Address: $address\n\n" .
               "Order Details:\n" . $cart_details;

    $headers = "From: webmaster@nexcellgadgets.com";

    if(mail($admin_email, $subject, $message, $headers)) {
        echo "Order sent successfully!";
    } else {
        echo "Failed to send order.";
    }
}
?>