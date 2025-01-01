<?php
	include_once('../admin/connection.php'); 
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
		<title>Index</title>
	</head>

	<body>

		<?php include_once('header.php'); ?>

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
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

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
						<p class="mb-4">Welcome to our furniture website! We are dedicated to providing you with a wide range of high-quality furniture options that combine style, functionality, and comfort. </p>
						<p><a href="shop.php" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<?php
						$product = "SELECT * FROM ProductDetail ORDER BY ProductDetail_ID LIMIT 3";
						$runn = mysqli_query($con,$product);

						while ($fetch = mysqli_fetch_assoc($runn)) 
						{
					?>
							<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
								<a class="product-item" href="login.php">
									<img src="../Admin/upload/<?php echo $fetch['Image']; ?>" class="img-fluid product-thumbnail">
									<p><strong class="product-price"><?php echo $fetch['Name']; ?></strong></p>
									<p><?php echo $fetch['Description'] ?></p>
									<strong class="product-price">$<?php echo number_format($fetch['Price'], 2); ?></strong>
										<span class="icon-cross">
											<img src="images/cross.svg" class="img-fluid">
										</span> 
								</a>
							</div> 
					<?php
						}
					?>

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>We take pride in offering high-quality furniture crafted with precision and attention to detail. Our products are built to last and enhance the beauty of your space.</p>

						<div class="row my-5">

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Our user-friendly website and organized showroom allow you to browse and explore our furniture collection with ease.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>We understand the importance of providing excellent customer support whenever you need it.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>Simply reach out to our customer support team, and they will guide you through the return procedure, making it convenient for you.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
						<p> At our furniture shop, we are dedicated to helping you create a modern and stylish interior design for your space. Our wide selection of contemporary furniture pieces and accessories is curated to inspire and elevate your home decor.</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Knowledgeable staff and design resources to help you bring your vision to life.</li>
							<li>Transform your space into a modern sanctuary with our curated collection.</li>
							<li>Sleek, minimalistic furniture and trendy accents available to create a stylish</li>
							<li>Partner with us to create a modern interior design that reflects your unique style </li>
						</ul>
						<p><a href="shop.php" class="btn">Explore</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->


		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Latest Products</h2>
					</div>
				</div>

				<div class="row mt-3"> 
					<?php
						$product = "SELECT * FROM ProductDetail ORDER BY ProductDetail_ID DESC LIMIT 3";
						$run = mysqli_query($con,$product);

						while ($get = mysqli_fetch_assoc($run)) 
						{
							?>
							<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
								<div class="product-item-sm d-flex">
									<div class="thumbnail">
										<img src="../Admin/upload/<?php echo $get['Image'];?>" alt="Image" class="img-fluid">
									</div>
									<div class="pt-3">
										<h3><?php echo $get['Name'];?></h3>
										<p><?php echo $get['Description']; ?> </p>
										<p>$<?php echo number_format($get['Price'], 2); ?></p>
									</div>
								</div>
							</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<?php
								 $getc = "SELECT * FROM Feedback";
								 $running = mysqli_query($con,$getc);
								 while ($gg = mysqli_fetch_assoc($running)) {

								 	$CID = $gg['Customer_ID'];

								 	$Customer = "SELECT * FROM Customer WHERE Customer_ID = '$CID'";
								 	$fetching = mysqli_query($con,$Customer);
								 	$CC = mysqli_fetch_assoc($fetching);
								?>
									<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;<?php echo $gg['Feedback']; ?>&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="../Admin/images/default-profile.png" alt="Image" class="img-fluid">
													</div>
													<h3 class="font-weight-bold"><?php echo $CC['Customer_Name']?></h3>
													<!-- <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span> -->
												</div>
											</div>

										</div>
									</div>
								</div> 
								<?php
								 }
								?>
				
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<?php include_once('footer.php') ?>


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
