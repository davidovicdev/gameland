<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
					<h2 class="widget-title">About us</h2>
					<p>We rent out gaming experience.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title">Contact us</h2>
					<ul>
						<li>New Zealand / Hobbiton</li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box pages">
					<h2 class="widget-title">Pages</h2>
					<ul>
						<?php
						require_once "data/connection.php";
						global $connection;
						$menu = $connection->query("SELECT * FROM menu")->fetchAll();
						foreach ($menu as $m) {
							// 3 vrste
							// neulogovan, ulogovan i admin
							/* ADMIN */
							if (isset($_SESSION["user"]) and $_SESSION["user"]->is_admin == 1 and !in_array($m->href, ["login.php", "register.php"])) {
								echo "<li><a href='$m->href'>$m->name</a></li>";
							}
							/* NEULOGOVAN */
							if (!isset($_SESSION["user"]) and !in_array($m->href, ["cart.php", "checkout.php", "adminpanel.php", "myorders.php"])) {
								echo "<li><a href='$m->href'>$m->name</a></li>";
							}
							/* ULOGOVAN */
							if (isset($_SESSION["user"]) and $_SESSION["user"]->is_admin == 0 and !in_array($m->href, ["login.php", "register.php", "adminpanel.php"])) {
								echo "<li><a href='$m->href'>$m->name</a></li>";
							}
						}
						?>
						<li><a href="Documentation.pdf">Documentation</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">

			</div>
		</div>
	</div>
</div>
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p>Copyrights &copy; 2022 - <a href="https://www.instagram.com/">Matija Davidovic</a>, All Rights Reserved.</p>
			</div>
			<div class="col-lg-6 text-right col-md-12">
				<div class="social-icons">
					<ul>
						<li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>