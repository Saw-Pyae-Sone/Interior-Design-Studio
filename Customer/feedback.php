<?php
	include_once('../admin/connection.php');
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
		<title>Feedback</title>
	</head>

	<body>

		<?php include_once('header.php'); ?>

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Feedback</h1>
								<p class="mb-4">We would love to hear about your experience with our furniture shop. Please share your feedback with us:</p>
								<p><a href="shop.php" class="btn btn-secondary me-2">Shop Now</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		
		<!-- Start Contact Form -->
		<div class="untree_co-section">
      <div class="container">

        <div class="block">
          <div class="row justify-content-center">


            <div class="col-md-8 col-lg-8 pb-4">

              <form action="" method="POST">
                <div class="row">
                	<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Customer's Feedback</h2>
					</div>
                  <div class="col-6 mt-3">
		                <div class="form-group mb-5">
		                  <label class="text-black" for="message">Feedback</label>
		                  <textarea name="message" class="form-control" id="message" cols="30" rows="5" required></textarea>
		                </div>
	              		<button type="submit" class="btn btn-primary-hover-outline" name="submit">Send Feedback</button>
	              	</div>
	              </div>
              </form>

            </div>

          </div>

        </div>

      </div>


    </div>
  </div>

  <!-- End Contact Form -->

  <?php include_once('footer.php'); ?>

		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>
<?php
	if(isset($_POST['submit']))
	{
		$Cid = $_SESSION['C_ID'];
		$message = $_POST['message'];

		$feed = "INSERT INTO Feedback(Feedback,Customer_ID) VALUES ('$message','$Cid')";
		$run = mysqli_query($con,$feed);
		if ($run) {
			echo "<script>alert('Your Feedback has been submitted');</script>";
		}
		else
			echo mysqli_connect_error();
	} 
?>
</html>
