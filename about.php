<?php
	require_once "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
	require_once "inc/head.php";
	?>

</head>
<body>
	
	<?php
		require_once "inc/preload.php";
	?>
    
	
	<!-- header -->
	<?php
		require_once "inc/header.php";
	?>
	<!-- end header -->

	
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>We provide gaming experience</p>
						<h1>About Us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="featured-text">
						<h2 class="pb-3">Why <span class="orange-text">GameLand</span></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-tv"></i>
									</div>
									<div class="content">
										<h3>Best products</h3>
										<p>We provide best products.</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-gamepad"></i>
									</div>
									<div class="content">
										<h3>Custom gaming</h3>
										<p>Custom made consoles/PC's and the newest technology on the market.</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Our <span class="orange-text">Team</span></h3>
						<p>Our team is made out of the experts in both console, PC, gaming and business fields</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require_once "inc/footer.php";
	require_once "inc/scripts.php";
	?>
</body>
</html>