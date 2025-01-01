<?php
session_start();

if (isset($_POST['pid']) && isset($_POST['qty'])) {
    $productId = $_POST['pid'];
    $newQuantity = $_POST['qty'];

    // Assuming you have the cart data stored in $_SESSION['cart'] as an array of product IDs and their quantities

    // Update the quantity for the specified product in the session data
    $_SESSION['cart'][$productId] = $newQuantity;

    // You can also calculate the updated grand total here and store it in the session if needed

    // Send a success response back to the AJAX request
    echo json_encode(['status' => 'success']);
} else {
    // Send an error response if the required data is not provided
    echo json_encode(['status' => 'error', 'message' => 'Missing product ID or quantity']);
}
?>
