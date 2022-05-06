<?php
	require_once "session.php";
	if(isset($_SESSION["user"])){
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
						<p>Product</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<?php
				require_once "data/connection.php";
				global $connection;
				$userId = $_SESSION["user"]->user_id;
				$total = 0;
				$itemsInCart = $connection->query("SELECT * FROM cart WHERE user_id = $userId")->rowCount();
				if(isset($_POST["id"])){ 
					$productId = $_POST["id"];
					$connection->query("DELETE FROM cart WHERE user_id = $userId AND product_id = $productId");
				}
				if($itemsInCart < 1){
					echo "<h2>No items in cart yet</h2>";
				}
				else{
				?>
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								require_once "data/connection.php";
								global $connection;
								$cart= $connection->query("SELECT * FROM cart WHERE user_id = $userId")->fetchAll();
							
								foreach ($cart as $cartProduct) {
									$product = $connection->query("SELECT * FROM products p INNER JOIN images i on p.product_id=i.product_id INNER JOIN prices pp ON p.product_id = pp.product_id WHERE pp.active=1 AND p.product_id = $cartProduct->product_id")->fetch();
									?>
									<tr class="table-body-row">
									<td class="product-remove"><form action="cart.php" method="POST">
										<input type="hidden" name="id" class='id' value="<?php echo $product->product_id?>">
										<button class="btn btn-danger">X</button>
									</form></td>
									<td class="product-image"><img src="assets/img/products/<?php echo $product->src ?>" alt="<?php echo $product->name ?>"></td>
									<td class="product-name"><?php echo $product->name?></td>
									<td class="product-price"><input type="hidden" name="price" class='price' value="<?php echo $product->price?>"><?php echo $product->price ?>$</td>
									<td class="product-quantity"><input type="number" name='quantity' class="quantity" value="<?php echo $cartProduct->quantity?>" min="1" max="10"></td>
									<td class="product-total"><?php echo $product->price*$cartProduct->quantity ?>$</td>
								</tr>
									<?php
									$total += $product->price*$cartProduct->quantity;
								}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								
								<tr class="total-data">
									<td><?php echo $total?>$</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<button class="btn btn-primary" id='makeOrder'>Order</button>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<!-- end cart -->

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