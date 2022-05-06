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
	<?php
	require_once "inc/header.php";
	?>

	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>We develop web sites</p>
						<h1>Author</h1>
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
						<h3><span class="orange-text">Author</span></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"></div>
						<h4>Matija Davidović<span>Web Developer</span></h4>
						<ul class="social-link-team">
							<li><a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="single-team-item text-center mt-5">
						<h3>About author of the site</h3>
						<p>I am Matija Davidović, student of Information and Communication Technologies. <br />
							I'm 24, born in Belgrade, Serbia. Graduated from High School in 2018. <br />
							Currently, I am student of Visoka ICT college<br>
						</p>
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