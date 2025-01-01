<?php
	include_once('../admin/connection.php'); 
	session_start();
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
		<title>Register</title>
	</head>

	<body>

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>SELENA</h1>
								<p class="mb-4">We're here to help you transform your house into a home that reflects your unique personality and taste. Enjoy your shopping experience and let us furnish your dreams!</p>
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
            	<div class="row">
								<div class="col-lg-7 mx-auto text-center">
									<h2 class="section-title">Register</h2>
								</div>
							</div>
              <form action="" method="POST">
                <div class="row mt-3">
                	<div class="col-6">
                    <div class="form-group">
                      <label class="text-black">Name</label>
                      <input type="text" class="form-control" name="Cname" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black">Password</label>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                  </div>
                </div>
                  <div class="form-group mt-3">
	              		<button type="submit" class="btn btn-primary-hover-outline" name="submit">Register</button>
	              		<button type="button" class="btn btn-danger" onclick="location.assign('login.php','_self')">Back</button>
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

		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>
<?php
	if(isset($_POST['submit']))
	{
		$name = $_POST['Cname'];
		$pass = md5($_POST['password']);

		 $Cname = "SELECT * FROM Customer WHERE Customer_Name = '$name'";
     $data = mysqli_query($con, $Cname);

      if($data->num_rows > 0)
      {   
          echo "<script>alert('Name Already Exist');</script>";
      }
      else
      {
      	$insert = "INSERT INTO Customer(Customer_Name,Password) VALUES ('$name','$pass')";
      	$runinsert = mysqli_query($con,$insert);
      	if($runinsert)
      	{
          echo "<script>alert('Your account has been created');</script>";
          echo "<script>window.open('login.php','_self');</script>";
        }
      }
    }

?>
</html>
