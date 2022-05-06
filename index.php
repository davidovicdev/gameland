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
    require_once "inc/header.php";
    ?>
	
	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Best Gaming Experience</p>
							<h1>Gaming equipment from gamers for gamers</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->
	<?php if(isset($_SESSION["user"])):?>
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 mb-4 mb-lg-12">
					<div class="list-box d-flex align-items-center justify-content-center">
						<div class="content">
							<h1 class="text-center">Survey</h1>
							<?php 
								require_once "data/connection.php";
								global $connection;
								$user_id = $_SESSION["user"]->user_id;
								$userAnswer = $connection->query("SELECT * FROM user_answer WHERE user_id = $user_id")->fetch();
								if($userAnswer){
									$answerId = $userAnswer->answer_id;
									$votes = $connection->query("SELECT * FROM user_answer")->rowCount();
									$yourVote = $connection->query("SELECT * FROM answers WHERE answer_id = $answerId")->fetch()->answer;
									//VOTED
									?>
										<h3>Total votes: <?php echo $votes ?></h3>
										<h4>You voted for: <?php echo $yourVote?></h4>
										<div class="container votes" id="votes">
											<table class="table">
												<thead>
													<th>Answer</th>
													<th>Votes</th>
												</thead>
												<tbody>
												

											<?php
												foreach ($connection->query("SELECT * FROM answers")->fetchAll() as $answer) {
													$answerId = $answer->answer_id;
													$votes = $connection->query("SELECT COUNT(answer_id) as votes FROM user_answer WHERE answer_id = $answerId")->fetch()->votes;
													?>
													<tr>
														<td><?php echo $answer->answer?></td>
														<td><?php echo $votes?></td>
													</tr>
													<?php
												} 
											?>
											</tbody>
											</table>
										</div>
									<?php
								}
								else{
									//SURVEY
									?>
									<h4>How much time do you spend on gaming ?</h4>
									<?php
									$answers = $connection->query("SELECT * FROM answers")->fetchAll();
									foreach ($answers as $answer) {
										?>
										<a href="backend/userAnswer.php?id=<?php echo $answer->answer_id?>" class="btn btn-primary"><?php echo $answer->answer?> </a>
										<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over 1000$</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->
    <?php
    require_once "inc/footer.php";
    require_once "inc/scripts.php";
    ?>

</body>
</html>