<?php
    error_reporting();
	include_once('../admin/connection.php'); 
	session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Profile</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
        <?php include_once('header.php')?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Profile</h1>
								<p class="mb-4">Explore our collection and create a space that reflects your unique personality and enhances your everyday living.</p>
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

		

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container d-flex justify-content-center">
				
				<div class="row">
                        <?php
                            $cid = $_SESSION['C_ID'];
                            $take = "SELECT * FROM customer WHERE Customer_ID = '$cid'";
                            $run = mysqli_query($con,$take);
                            $get = mysqli_fetch_assoc($run);
                        ?>
                        <form action="" method="POST">
                            <div class="mx-auto text-center">
                                <img src="../Admin/images/default-profile.png" alt="Image" class="img-fluid" style="width: 23vw; height: 26vh;">
                                <h2 class="section-title">Profile</h2>
                                <hr>
                            </div>
                            <div class="col-lg-12 mt-3 align_center">
                                <div class="form-group mb-5">
                                    <label class="text-black" for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required value="<?php echo($get['Customer_Name'])?>">
                                </div>
                                <div class="form-group mb-5">
                                    <label class="text-black" for="name">Password</label>
                                    <input type="password" name="password" class="form-control" required value="<?php echo($get['Password'])?>">
                                </div>
                                <button type="submit" class="btn btn-primary-hover-outline" name="update">Update Profile</button>
                            </div>

                        </form>
			

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

		

		<!-- Start Footer Section -->
		<?php include_once('footer.php') ?>
		<!-- End Footer Section -->	

		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

    <?php
        if(isset($_POST['update']))
        {
            $cid = $_SESSION['C_ID'];
            $name = $_POST['name'];
            $pass = md5($_POST['password']);

            $sel = "UPDATE customer SET Customer_Name='$name', Password='$pass' WHERE Customer_ID = '$cid'";
            $runn = mysqli_query($con,$sel);
            if($runn)
            {
                echo "<script>alert('Update Successfully'); location.href='Profile.php';</script>";
            }
        }
    ?>
</html>
