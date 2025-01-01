<?php
session_start();

// Unset the 'cart' session
unset($_SESSION['cart']);

// // Redirect back to the cart page (you can change the URL to any desired page)
// header('Location: cart.php');
exit;
?>
