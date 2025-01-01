<?php
 include_once('../Admin/connection.php');
 session_start();
 error_reporting(E_ALL ^ E_NOTICE);
  $cid = $_SESSION['C_ID'];
  if(!isset($cid) || empty($cid))
  {
      echo "<script>window.open('../Home/login.php','_self');</script>";
  }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Cart</title>
  </head>

  <body>

    <?php include_once('header.php'); ?>

    <!-- Start Hero Section -->
      <div class="hero">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-5">
              <div class="intro-excerpt">
                <h1>Order Detail</h1>
              </div>
            </div>
            <div class="col-lg-7">
              
            </div>
          </div>
        </div>
      </div>
    <!-- End Hero Section -->

    

    <div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Name</th>
                          <th class="product-name">Description</th>
                          <th class="product-price">Unit Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            $oid = $_GET['oid'];
                            $sqlOD = "SELECT * FROM OrderDetail WHERE Order_ID = $oid";
                            $resultOD = mysqli_query($con, $sqlOD);
                            while($odData = mysqli_fetch_assoc($resultOD))
                            {
                            $key = $odData['ProductDetail_ID'];
                            $sql = "SELECT * FROM ProductDetail WHERE ProductDetail_ID = $key";
                            $result = mysqli_query($con, $sql);
                            $gt = 0;
                            while ($productData = mysqli_fetch_assoc($result)) {

                                $productId = $productData['ProductDetail_ID'];
                                $productName = $productData['Name'];
                                $productDescription = $productData['Description'];
                                $productPrice = $productData['Price'];
                                $productQuantity = $odData['Quantity']; 
                                $total = $productData['Price'] *  $odData['Quantity'];
                            ?>
                            <tr>
                              <td class="product-thumbnail">
                                <img src="../Admin/upload/<?php echo $productData['Image'] ?>" alt="Image" class="img-fluid">
                              </td>
                              <td class="product-name">
                                <h2 class="h5 text-black"><?php echo $productData['Name']; ?></h2>
                              </td>
                              <td class="product-name">
                                <h2 class="h5 text-black"><?php echo $productData['Description']; ?></h2>
                              </td>
                              <td>$<?php echo $productData['Price'].'.00' ?> <input type="hidden" class="iprice" value="<?php echo $productData['Price'].'.00'  ?>"> </td>
                              <td>
                               <?php echo $productQuantity ?>
                              </td>
                              <td class="itotal">$<?php echo $total.'.00' ?></td>
                            </tr>
                            
                              <?php
                            }}

                        ?>

                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
            </div>
          </div>
    

    <?php include_once('footer.php'); ?>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">

      var gt = 0;
      var iprice = document.getElementsByClassName('iprice');
      var iquantity = document.getElementsByClassName('iquantity');
      var itotal = document.getElementsByClassName('itotal');
      var gtotal = document.getElementById('gtotal');

      function subtotal() {
        gt = 0;
        for (var i = 0; i < iprice.length; i++) {
          var newQuantity = parseInt(iquantity[i].value); // Parse the new quantity as an integer
          var productPrice = parseFloat(iprice[i].value); // Parse the product price as a float

          // Update the displayed total for the product based on the new quantity
          itotal[i].innerText = '$' + (productPrice * newQuantity).toFixed(2);

          // Update the grand total
          gt += productPrice * newQuantity;

          // Get the product ID for the current row
          var productId = iquantity[i].getAttribute('data-product-id');

          // Update the quantity for the product in the session using AJAX
          updateQuantity(productId, newQuantity);
        }

        gtotal.innerText = '$' + gt.toFixed(2);
      }

      window.addEventListener('load', function() {
        subtotal();
      });

      //Funcation to Cancel All Products
      $('#cancelAllBtn').on('click', function(e) {
        e.preventDefault();

        // Make an AJAX request to the cancel_all_products.php script
        $.ajax({
          type: 'POST', // You can use POST or GET, depending on how you handle it in cancel_all_products.php
          url: 'cancel_all_products.php',
          success: function(response) {
            // If the request is successful, redirect the user to the cart page
            window.location.href = 'shop.php';
          },
          error: function(xhr, status, error) {
            console.error('Error canceling all products:', error);
          }
        });
      });

      // Function to update the quantity of a product in the cart
      function updateQuantity(productId, newQuantity) {
        // Make an AJAX request to update the session data with the new quantity
        $.ajax({
          type: 'POST',
          url: 'update_cart.php', // Replace with the path to your PHP script that handles session update
          data: { pid: productId, qty: newQuantity },
          success: function(response) {
            // Optionally, you can handle the response from the server if needed
            console.log('Product ID ' + productId + ' quantity updated to ' + newQuantity);
          },
          error: function(xhr, status, error) {
            // Handle errors if the AJAX request fails
            console.error('Error updating product quantity:', error);
          }
        });
      }

      // Function to remove a product from the cart
      function removeProduct(productId) {
        // Make an AJAX request to remove the product from the session data
        $.ajax({
          type: 'POST',
          url: 'remove_from_cart.php',
          data: { pid: productId },
          success: function(response) {
            window.location.href = 'cart.php';
            // Optionally, you can handle the response from the server if needed
            console.log(response); // Log the response to the console for debugging
            console.log('Product ID ' + productId + ' removed from cart.');
            // Remove the table row for the product from the cart display
            $('tr[data-product-id="' + productId + '"]').remove();
            // Recalculate the subtotal after removing the product
            subtotal();
          },
          error: function(xhr, status, error) {
            // Handle errors if the AJAX request fails
            console.error('Error removing product from cart:', error);
          }
        });
      }

    </script>



  </body>

</html>
