<?php
session_start();

ini_set('display_errors', 1);

echo "Debugging remove_from_cart.php";

if (isset($_POST['pid'])) {
  $productId = intval($_POST['pid']);

  // Check if the product ID exists in the cart
  if (array_key_exists($productId, $_SESSION['cart'])) {
    // Remove the product from the cart
    unset($_SESSION['cart'][$productId]);
  }

  // Optionally, you can return a response to the AJAX request
  echo 'success';
}
?>
