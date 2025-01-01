<?php
session_start();

if (isset($_GET['pid']) && isset($_GET['qty'])) {
  $productId = intval($_GET['pid']);
  $quantity = intval($_GET['qty']);

  // Initialize the cart array in the session if empty
  if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

// Check if the product ID is already in the cart
  if (array_key_exists($productId, $_SESSION['cart'])) {
    // If the product is already in the cart, update its quantity
    $_SESSION['cart'][$productId] += $quantity;
  } else {
    // If the product is not in the cart, add it with the given quantity
    $_SESSION['cart'][$productId] = $quantity;
  }

    // Optionally, you can return a response to the AJAX request
    echo 'success';}
?>
