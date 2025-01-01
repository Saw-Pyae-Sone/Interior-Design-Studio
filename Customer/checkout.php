<?php
include_once('../admin/connection.php'); 
session_start();
error_reporting(E_ALL ^ E_NOTICE);
  $cid = $_SESSION['C_ID'];
  if(!isset($cid) || empty($cid))
  {
      echo "<script>window.open('../Home/login.php','_self');</script>";
  }

  $cart = $_SESSION['cart'];
  if (!isset($cart) || empty($cart)) 
  {
  	echo "<script>window.open('shop.php','_self');</script>";
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
		<title>Check Out</title>
	</head>

	<body>

		<?php include_once('header.php') ?>

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		      	<div class="row">
		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Your Order</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
		                  <form action="" method="POST">
		                  <tbody>
		                  	<?php
		                  	 		$productIds = $_SESSION['cart'];
                            $grandTotal = 0;
                            foreach ($productIds as $key => $value) {
                            $sql = "SELECT * FROM ProductDetail WHERE ProductDetail_ID = $key";
                            $result = mysqli_query($con, $sql);
                            while ($productData = mysqli_fetch_assoc($result)) {

                                $productId = $productData['ProductDetail_ID'];
                                $productName = $productData['Name'];
                                $productDescription = $productData['Description'];
                                $productPrice = $productData['Price'];
                                $productQuantity = $_SESSION['cart'][$productId]; 

												        $subtotal = $productPrice * $productQuantity;
												        $grandTotal += $subtotal;
                          ?>
		                    <tr>
		                      <td> <?php echo $productName;?> <strong class="mx-2">x</strong> <?php echo $productQuantity; ?></td>
		                      <td>$<?php echo number_format($subtotal, 2); ?> </td>
		                    </tr>
		                    <?php
				                  	}
				                  }
		                    ?>
		                    <tr>
		                    	<td>Date</td>
		                      <td><?php echo date("d-m-Y"); ?></td>
		                    </tr>
		                    <tr>
		                    	<?php
													$totalQuantity = 0;
													foreach ($_SESSION['cart'] as $productId => $quantity) {
													    $totalQuantity += $quantity;
													}
													?>
		                    	<td>Total Quantity</td>
		                    	<td>
		                    		<?php echo $totalQuantity ?>
													</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
		                      <td class="text-black font-weight-bold"><strong>$<?php echo number_format($grandTotal, 2); ?></strong></td>
		                    </tr>
		                  </tbody>
		                </table>

		                <div class="borde mb-3 row">
		                	<div class="col-lg-4">
		                  	<input type="radio" name="payment" class="mx-3" value="wave-money"><img src="images/wave.png" class="img-fluid" width="100vw" height="150vh">
		                  	<label class="h5 mx-2 mt-2">Wave Money</label>
		                	</div>
		                	<div class="col-lg-4">
		                  	<input type="radio" name="payment" class="mx-3" value="kbz-pay"><img src="images/kpay.png" class="img-fluid" width="100vw" height="150vh">
		                  	<label class="h5 mx-2 mt-2">KBZ Pay</label>
		                	</div>
		                	<div class="col-lg-4">
		                  	<input type="radio" name="payment" class="mx-3" value="Cash-down"><img src="images/cast-down.png" class="img-fluid" width="100vw" height="150vh">
		                  	<label class="h5 mx-2 mt-2">Cash Down</label>
		                	</div>
		                </div>

		                <div class="form-group pt-3">
		                  <button type="submit" class="btn btn-black btn-lg py-3 btn-block" name="submit">Place Order</button>
		                </div>
		                </form>
		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		    </div>
		  </div>

		<?php include_once('footer.php') ?>

		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

	<?php
		if (isset($_POST['submit'])) 
		{
			$date = date('Y-m-d');
			$payment = $_POST['payment'];

			$insertP = "INSERT INTO P_Order(Totalamount,Status,Pay_type,O_Date,Customer_ID) VALUES ('$grandTotal','Pending','$payment','$date','$cid')";
			$run = mysqli_query($con,$insertP);
			if($run)
			{

				$oid = "SELECT * FROM P_Order ORDER BY Order_ID DESC";
        $running = mysqli_query($con,$oid);
        $fetch = mysqli_fetch_array($running);
        $orderid = $fetch['Order_ID'];

        foreach ($_SESSION['cart'] as $id => $qty) 
        {
            $sql = "INSERT INTO OrderDetail(Quantity,Order_ID,ProductDetail_ID) VALUES ('$qty','$orderid','$id')";
            $result=mysqli_query($con,$sql);
            echo "<script>window.open('thankyou.php','_self');</script>";
        }
        unset($_SESSION['cart']);
			}
			else
				echo mysqli_connect_error();
		} 
	?>
</html>
