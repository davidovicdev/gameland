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
						<p>Best gaming products</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<?php
	if (!isset($_GET["id"])) {
	?>
		<div class="search-text w-100 d-flex justify-content-center mt-5">
			<?php
			$categoryId = isset($_GET["category"]) ? $_GET["category"] : "";
			$search = isset($_GET["search"]) ? $_GET["search"] : "";
			?>
			<form action="products.php" method="GET">
				<div class="input-group rounded">
					<input type="search" class="form-control rounded" name='search' id='search' placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
					<input type="hidden" name="category" id="category" value='<?php echo $categoryId ?>'>
					<span class="input-group-text border-0" id="search-addon">
						<i class="fas fa-search"></i>
					</span>
				</div>
			</form>
		</div>

		<br>
		<div class="product-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 d-flex justify-content-center text-center">
						<ul class="list-group list-group-horizontal">
							<?php
							$activeClass = $categoryId == "" ? "bg-secondary" : "";
							$bgColor = $categoryId == "" ? "text-light" : "";
							?>
							<li class="list-group-item <?php echo $activeClass ?>"><a class='<?php echo $bgColor ?>' href="products.php?search=<?php echo $search ?>">All</a></li>
							<?php
							require_once "data/connection.php";
							global $connection;
							$query = "SELECT * FROM categories";
							$categories = $connection->query($query)->fetchAll();
							foreach ($categories as $category) {
								$bgColor = $category->category_id == $categoryId ? "text-light" : "";
								$activeClass = $category->category_id == $categoryId ? "bg-secondary" : "";
							?>
								<li class='list-group-item <?php echo $activeClass ?>'><a class='<?php echo $bgColor ?>' href='products.php?category=<?php echo $category->category_id ?>&search=<?php echo $search ?>'><?php echo $category->name ?></a></li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
				<br>

				<?php
				if ($search != "") {
				?>
					<h5 class="text-center">Results for: <?php echo $search ?></h5>
				<?php
				}
				if ($categoryId != "") {
					$category = $connection->query("SELECT * FROM categories where category_id = $categoryId")->fetch()->name;
				?>
				<?php
				}
				?>
				<div class="row product-lists">

					<?php
					require_once "data/connection.php";
					global $connection;
					$limit = 6;
					$page = !isset($_GET["page"]) ? 1 : $_GET["page"];
					$query = "SELECT * FROM products";
					if ($categoryId != "") {
						$query .= " WHERE category_id = $categoryId ";
					}
					if ($search != "" and $categoryId != "") {
						$query .= " AND (name LIKE '%$search%' OR description LIKE '%$search%')";
					}
					if ($search != "" and $categoryId == "") {
						$query .= " WHERE (name LIKE '%$search%' OR description LIKE '%$search%')";
					}
					$pageCount = ceil($connection->query($query)->rowCount() / $limit);
					$start = ($page - 1) * $limit;
					$query = "SELECT * FROM products p INNER JOIN images i on p.product_id=i.product_id INNER JOIN prices pp ON p.product_id = pp.product_id WHERE pp.active=1";
					if ($categoryId != "") $query .= " AND p.category_id = $categoryId";
					if ($search != "") $query .= " AND (p.name LIKE '%$search%' OR p.description LIKE '%$search%')";
					$query .= " LIMIT $start, $limit";

					$products = $connection->query($query)->fetchAll();

					foreach ($products as $product) {
					?>
						<div class="col-lg-4 col-md-6 text-center">
							<div class="single-product-item">
								<div class="product-image">
									<a href="products.php?id=<?php echo $product->product_id ?>"><img width='100px' src="assets/img/products/<?php echo $product->src ?>" alt="<?php echo $product->name ?>"></a>
								</div>
								<h3><?php echo $product->name ?></h3>
								<p><?php echo $product->description ?></p>
								<p class="product-price"> <?php echo $product->price ?>$ </p>
								<?php
								if (isset($_SESSION['user'])) {
								?>
									<a href="products.php?id=<?php echo $product->product_id ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> View product</a>
								<?php

								}
								?>
							</div>
						</div>
					<?php

					}

					?>
				</div>
				<?php
				if ($pageCount > 1) {
					$output = "<br><div class='row col-12'>
					<div class='col-lg-12 text-center'>
						<div class='pagination-wrap'><ul>";
					for ($i = 1; $i <= $pageCount; $i++) {
						$class = $page == $i ? 'active' : "";
						$output .= "<li class='" . $class . "'><a href='products.php?search=$search&category=$categoryId&page=" . $i . "'>" . $i . "</a></li>";
					}
					$output .= "</ul></div></div></div>";
					echo $output;
				}
				?>
			</div>
		</div>
		<br>
		<br>
	<?php
	} else {
		$productId = $_GET["id"];
		require_once "data/connection.php";
		global $connection;
		$product = $connection->query("SELECT * FROM products p INNER JOIN images i on p.product_id=i.product_id INNER JOIN prices pp ON p.product_id = pp.product_id WHERE pp.active=1 AND p.product_id = $productId")->fetch();
		$category = $connection->query("SELECT c.name as name FROM categories c INNER JOIN products p ON p.category_id = c.category_id WHERE product_id = $productId")->fetch();
	?>
		<div class="single-product mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="single-product-img">
							<img src="assets/img/products/<?php echo $product->src ?>" alt="<?php echo $product->name ?>">
						</div>
					</div>
					<div class="col-md-7">
						<div class="single-product-content">
							<h3><?php echo $product->name ?></h3>
							<p class="single-product-pricing"><?php echo $product->price ?>$</p>
							<p><?php echo $product->description ?></p>
							<div class="single-product-form">
								<?php if (isset($_SESSION["user"])) : ?>
									<form action="#" method="">
										<input type="number" class="quantityPerProduct" data-price="<?php echo $product->price ?>" placeholder="1" value='1' min='1' max="10">
										<button class="addToCart" data-id="<?php echo $product->product_id ?>">Add to Cart</button>
									</form>
								<?php endif; ?>
								<p><strong>Category: </strong><?php echo $category->name ?></p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	<!-- end products -->

	<?php
	require_once "inc/footer.php";
	require_once "inc/scripts.php";
	?>
</body>

</html>