<?php
	require_once "session.php";
	if(isset($_SESSION["user"])){
		?>
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
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>My orders</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<?php
					require_once "data/connection.php";
					global $connection;
					$userId = $_SESSION["user"]->user_id;
					$countOrders = $connection->query("SELECT * FROM orders WHERE user_id = $userId")->rowCount();
					?>
					<table class="table">
						<thead>
							<td>First Name</td>
							<td>Last Name</td>
							<td>Address</td>
							<td>Phone</td>
							<td>Email</td>
						</thead>
						<tbody>
							<td><?php echo $_SESSION["user"]->first_name?></td>
							<td><?php echo $_SESSION["user"]->last_name?></td>
							<td><?php echo $_SESSION["user"]->address?></td>
							<td><?php echo $_SESSION["user"]->phone?></td>
							<td><?php echo $_SESSION["user"]->email?></td>
						</tbody>
					</table>
					<?php
					if($countOrders == 0){
						?>
						<h3>You do not have any orders. Check out our products <a href="products.php">here</a></h3>
						<?php
					}
					else{
						$orders = $connection->query("SELECT * FROM orders WHERE user_id = $userId")->fetchAll();
						foreach ($orders as $order) {
							$total = 0;
							?>
							<div class="col-lg-12">
							<table class="order-details w-100 text-center">
								<thead>
									<tr>
										<th>ID</th>
										<th>Product Name</th>
										<th>Image</th>
										<th>Price per product</th>
										<th>Quantity</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody class="order-details-body">
									<?php
										$orderProducts = $connection->query("SELECT *, op.product_id as id, op.quantity as q FROM order_product op INNER JOIN products pp ON pp.product_id = op.product_id INNER JOIN images i ON i.product_id = op.product_id INNER JOIN prices p ON p.product_id = op.product_id WHERE order_id = $order->order_id AND active = 1")->fetchAll();
										foreach ($orderProducts as $product) {
											?>
											<tr>
												<td><?php echo $product->id?></td>
												<td><?php echo $product->name?></td>
												<td><img src="assets/img/products/<?php echo $product->src?>" width="40px" height="40px" alt="<?php echo $product->name ?>"></td>
												<td><?php echo $product->price?>$</td>
												<td><?php echo $product->q?></td>
												<td><?php echo $product->q * $product->price?>$</td>
												<?php $total += $product->q * $product->price?>
											</tr>
											<?php
										}
									?>
									
								</tbody>
							</table>
							<table>
								<tbody class="checkout-details">
									<tr>
										<td>Total</td>
										<td><?php echo $total?>$</td>
									</tr>
									<tr>
										<td>Date</td>
										<td><?php echo $order->date?></td>
									</tr>
								</tbody>
							</table>
						</div>
							<?php
						}
						?>
						
						<?php
					}
				?>
				
			</div>
		</div>
	</div>
	<!-- end check out section -->

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