
<?php
session_start();

// FIX: If 'cart' isn't set, default it to an empty array
$cart = $_SESSION['cart'] ?? []; 

// Now count() will work even if the cart is empty
$itemCount = count($cart); 
?><?php include('includes/header.php'); ?>

<div class="container mt-5">
    <h2>Checkout & Billing</h2>
    <div class="row">
        <!-- Order Summary -->
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Cart</span>
                <span class="badge badge-secondary badge-pill"><?php echo $itemCount; ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $item): 
                    $total += $item['price'];
                ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $item['name']; ?></h6>
                    </div>
                    <span class="text-muted">$<?php echo number_format($item['price'], 2); ?></span>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$<?php echo number_format($total, 2); ?></strong>
                </li>
            </ul>
        </div>

        <!-- Billing Form -->
        <div class="col-md-8 order-md-1">
            <form action="send_order.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Full Name</label>
                        <input type="text" name="client_name" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="client_email" class="form-control" placeholder="you@example.com" required>
                </div>
                <div class="mb-3">
                    <label>Delivery Address in Kampala</label>
                    <input type="text" name="address" class="form-control" placeholder="1234 Main St" required>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order via Email</button>
            </form>
        </div>
    </div>
</div>