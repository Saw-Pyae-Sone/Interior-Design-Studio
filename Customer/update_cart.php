<?php
session_start();

if (isset($_POST['pid']) && isset($_POST['qty'])) {
  $productId = intval($_POST['pid']);
  $quantity = intval($_POST['qty']);

  // Check if the product ID exists in the cart
  if (array_key_exists($productId, $_SESSION['cart'])) {
    // If the new quantity is greater than 0, update the cart with the new quantity
    if ($quantity > 0) {
      $_SESSION['cart'][$productId] = $quantity;
    } else {
      // If the new quantity is 0 or less, remove the product from the cart
      unset($_SESSION['cart'][$productId]);
    }
  }

  // Optionally, you can return a response to the AJAX request
  echo 'success';
}
?>
