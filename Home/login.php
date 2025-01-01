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
		<title>Login</title>
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
									<h2 class="section-title">Login</h2>
								</div>
							</div>
              <form action="" method="POST">
                <div class="row">
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
	              		<button type="submit" class="btn btn-primary-hover-outline" name="submit">Login</button>
	              	</div>
	              	<div class="form-group mt-4">
	              		<a href="register.php">New to the Website? Register Here.</a>
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
          $fetch = mysqli_fetch_assoc($data);

          if($pass == $fetch['Password']) 
          {
              echo "<script>alert('Welcome $name !!');</script>";
              echo "<script>window.open('../Customer/index.php','_self');</script>";

              $_SESSION['C_ID'] = $fetch['Customer_ID'];
          }
          else
          {
              echo "<script>alert('Password is incorrect');</script>";
          }
      }
      else
      {
          echo "<script>alert('Name is incorrect');</script>";
      }  

	} 
?>
</html>
