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
		require_once "inc/header.php";
		$message = !empty($_GET["message"]) ? $_GET["message"] : "";
	?>
	
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Get our gaming support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Ask us anything?</h2>
						<p>If you have any questions, recommendations or complaints feel free to notify us in the form below!</p>
					</div>
				 	<div id="form_status"></div>
					 <h3 class="text text-success mt-2 mb-2"><?php echo $message?></h3>
					<div class="contact-form">
						<form  action="" method="" id="contact">
							<div class="form-group">
								<input type="text" class='form-control' placeholder="Name" name="name" id="name">
								<span class="text text-danger" id="contactNameError"></span>
							</div>
							<div class="form-group">
								<input type="email" class='form-control'  placeholder="Email" name="email" id="email">
								<span class="text text-danger" id="contactEmailError"></span>
							</div>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
							<span class="text text-danger" id="contactMessageError"></span>
							<p><input class='btn btn-primary mt-2' type="button" id="contactButton" value="Submit"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>69/420 <br> Hobbiton <br> New Zealand</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +381/1234567 <br> Email: support@GameLand.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://maps.google.com/maps?q=hobitton&t=&z=13&ie=UTF8&iwloc=&output=embed" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	<?php
	require_once "inc/footer.php";
	require_once "inc/scripts.php";
	?>
</body>
</html>