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
		<title> Shop </title>
	</head>

	<body>

		<?php include_once('header.php'); ?>

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      <form action="" method="POST">
		      	<div class="row form-group">
		      			<div class="col-lg-3 col-md-3 mb-5">
	                <select class="form-control" name="wood" required>
	                	<option selected readonly>Please Select Wood Type</option>
	                	<?php
			      			$wt = "SELECT * FROM WoodType";
			      			$run = mysqli_query($con,$wt);

			      			while ($get = mysqli_fetch_assoc($run)) 
			      			{
			      		?>
            				<option value="<?php echo $get['WoodType_ID']; ?>"><?php echo $get['WoodType_Name'];?></option>
			      		<?php
			      			}
			      		?>

	                </select>
                </div>

                <div class="col-lg-3 col-md-3 mb-5">
	                <select class="form-control" name="Cselect" id="selectC" required>
	                	<option selected readonly value="0">Please Select Category</option>
	                	 <?php
			      			$ct = "SELECT * FROM Category";
			      			$runn = mysqli_query($con,$ct);

			      			while ($get = mysqli_fetch_assoc($runn)) 
			      			{
								echo "<option value='".$get['Category_ID']."'>".$get['Category_Name']."</option>";
			      			}
			      		?>
	                </select>
                </div>

                <div class="col-lg-3 col-md-3 mb-5">
	                <select class="form-control" name="Sselect" id="selectS" required>
	                	<option selected readonly value="1">Please Select SubCategory</option>

	                </select>
                </div>

                <div class="col-lg-3 col-md-3 mb-5">
	                <input type="submit" name="submit" value="Search" class="btn btn-primary-hover-outline">
	                <input type="button" value="All" onclick="window.location.assign('shop.php');" class="btn btn-primary-hover-outline">
                </div>
						</div>
					</form>

					<div class="row">

		      	<?php
		      	if(isset($_POST['submit']))
		      	{
		      		$WT = $_POST['wood'];
		      		$CC = $_POST['Cselect'];
		      		$SC = $_POST['Sselect'];

							$product = "SELECT * FROM ProductDetail WHERE WoodType_ID = '$WT' OR SubC_ID = '$SC'";
							$runn = mysqli_query($con,$product);

							while ($fetch = mysqli_fetch_assoc($runn)) 
							{
						?>
							<div class="col-12 col-md-4 col-lg-3 mb-5 mt-5">
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
					}
					else
					{
						$product1 = "SELECT * FROM ProductDetail";
						$runn1 = mysqli_query($con,$product1);

						while ($fetch1 = mysqli_fetch_assoc($runn1)) 
						{
					?>
						<div class="col-12 col-md-4 col-lg-3 mb-5 mt-5">
							<a class="product-item" href="login.php">
								<img src="../Admin/upload/<?php echo $fetch1['Image']; ?>" class="img-fluid product-thumbnail">
								<p><strong class="product-price"><?php echo $fetch1['Name']; ?></strong></p>
								<p><?php echo $fetch1['Description'] ?></p>
								<strong class="product-price">$<?php echo number_format($fetch1['Price'], 2); ?></strong>
									<span class="icon-cross">
										<img src="images/cross.svg" class="img-fluid">
									</span> 
							</a>
						</div> 
					<?php
						}
					}
					?>
		      	</div>
		    </div>
		</div>

		<?php include_once('footer.php'); ?>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){

        $('#selectC').change(function(){

            var Cid = $(this).val();
            
            $('#selectS').find('option').not(':first').remove();
            
            $.ajax({
                url: 'ajaxfile.php',
                type: 'post',
                data: {request: 1, Cid:Cid},
                dataType: 'json',
                success: function(response){
                    
                    var len = response.length;

                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                            
                        $("#selectS").append("<option value='"+id+"'>"+name+"</option>");

                    }
                }
            });
            
        });
    });
    </script>
	</body>

</html>
