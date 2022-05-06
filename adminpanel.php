<?php
require_once "session.php";
	if(isset($_SESSION["user"]) AND $_SESSION["user"]->is_admin == 1){
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
						<p>ADMIN PANEL</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
					$id = (isset($_GET["id"]) AND !empty($_GET["id"])) ? $_GET["id"] : 0;
                    require_once "adminpanel/menu.php";
					echo "<hr>";
                    if($id == 1) require_once "adminpanel/users.php";
                    if($id == 2) require_once "adminpanel/products.php";
                    if($id == 3) require_once "adminpanel/orders.php";
                    if($id == 4) require_once "adminpanel/categories.php";
                    if($id == 5) require_once "adminpanel/contact.php";
                    ?>
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
<?php
	}
	else{
		http_response_code(404);
	} 
?>