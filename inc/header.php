<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<div class="site-logo">
							<a href="index.php">
								<span class="logoIcon">GameLand</span>
							</a>
						</div>
						<nav class="main-menu">
							<ul>
								<?php
									require_once "data/connection.php";
									global $connection;
									$menu = $connection->query("SELECT * FROM menu")->fetchAll();
									foreach ($menu as $m) {
										// 3 vrste
										// neulogovan, ulogovan i admin
										/* ADMIN */
										if(isset($_SESSION["user"]) AND $_SESSION["user"]->is_admin == 1 AND !in_array($m->href,["login.php","register.php"])){
											echo "<li><a href='$m->href'>$m->name</a></li>";
										}
										/* NEULOGOVAN */
										if(!isset($_SESSION["user"]) AND !in_array($m->href,["cart.php","checkout.php", "adminpanel.php" , "myorders.php"])){
											echo "<li><a href='$m->href'>$m->name</a></li>";
										}
										/* ULOGOVAN */
										if(isset($_SESSION["user"]) AND $_SESSION["user"]->is_admin == 0 AND !in_array($m->href,["login.php","register.php","adminpanel.php"])){
											echo "<li><a href='$m->href'>$m->name</a></li>";
										}
										
									}
									if(isset($_SESSION["user"])){
										echo "<li class='ml-2'><form  action='backend/logout.php' method='POST'><input class='buttonFix' type='submit' value='Log out'></form></li>";
									}
								?>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
					</div>
				</div>
			</div>
		</div>
	</div>