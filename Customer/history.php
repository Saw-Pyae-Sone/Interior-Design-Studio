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
                <h1>Order History</h1>
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
                          <th>Order_ID</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>View Detail</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            $cid = $_SESSION['C_ID'];
                            $sql = "SELECT * FROM p_order WHERE Customer_ID = $cid";
                            $result = mysqli_query($con, $sql);
                            while ($oData = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                              <td class="product-name">
                                <?php echo $oData['Order_ID'] ?>
                              </td>
                              <td class="product-name">
                                $<?php echo $oData['Totalamount'] ?>
                              </td>
                              <td>
                                 <?php echo $oData['O_Date'] ?>
                              </td>
                              <td>
                                 <a href="odetail.php?oid=<?php echo $oData['Order_ID'] ?>">View Detail</a>
                              </td>
                              <td>
                                <?php echo $oData['Status'] ?>
                              </td>
                            </tr>
                            
                              <?php
                            }

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
