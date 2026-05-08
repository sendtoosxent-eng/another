<?php
// Start the session at the very beginning of the included file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nexcell Gadgets - E-commerce</title>
    <!-- CSS Files (Adjust paths as necessary) -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <!-- Top Bar -->
        <div class="header-top">
            <div class="container">
                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li><a href="wishlist.php"><i class="icon-heart-o"></i>Wishlist</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <li class="login">
                                        <a href="dashboard.php">
                                            <i class="icon-user"></i>
                                            <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
                                        </a>
                                    </li>
                                    <li class="login"><a href="logout.php">Logout</a></li>
                                <?php else: ?>
                                    <li class="login">
                                        <a href="#signin-modal" data-toggle="modal">
                                            <i class="icon-user"></i>Login / Sign Up
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Middle Header -->
        <div class="header-middle sticky-header">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <i class="icon-bars"></i>
                    </button>
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="Logo" width="105" height="25">
                    </a>
                </div>

                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="products.php">Gadgets</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="header-right">
                    <div class="wishlist">
                        <a href="wishlist.php" title="Wishlist">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count">0</span>
                        </a>
                    </div>

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">
                                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?>
                            </span>
                        </a>
                        <!-- Cart Dropdown Content can be added here -->
                    </div>
                </div>
            </div>
        </div>
    </header>