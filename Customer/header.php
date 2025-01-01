 <?php 
  session_start(); 
  $cart=0;
  if (isset($_SESSION['cart'])) 
  {
    foreach ($_SESSION['cart'] as $qty) 
    {
      $cart+=$qty;
    }
  }
?>

<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.php">SELENA<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li><a class="nav-link" href="shop.php">Shop</a></li>
						<li><a class="nav-link" href="about_us.php">About us</a></li>
						<li><a class="nav-link" href="service.php">Services</a></li>
						<li><a class="nav-link" href="feedback.php">Feedback</a></li>
						<li><a class="nav-link" href="history.php">History</a></li>
						<li><a class="nav-link" href="Profile.php">Profile</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li>
							<a class="nav-link" href="logout.php"><img src="images/log-out.svg"></a>
						</li>   
               <span class="badge badge-danger mb-3 ml-3" style="color: yellow;"><?php if($cart==0) echo ""; else echo $cart; ?></span>
						<li>
							<a class="nav-link" href="cart.php"><img src="images/cart.svg"></a>
						</li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->
