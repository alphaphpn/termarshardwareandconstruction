<?php
	// Top Container
	// Sidebar - Menu
	include_once "../../content/template-part/{$themename}/dashboard-navbar.php";
	include_once "../../content/template-part/{$themename}/dashboard-navbar-top.php";
	include_once "../../inc/dashboard/analysis-front.php";
?>

<main class="page-content">
	<div class="container-fluid bg-light-opacity">
		<h4><?php echo $sysname; ?></h4>
		<p><?php echo $quotetitle ; ?></p>

		<div class="card-deck mb-3">
			<div class="card bg-default">
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<div class="mr-auto">
							<h4 class="card-text text-center "><?php echo $total_user; ?></h4>
							<h4 class="card-label text-center text-muted">Daily Signups</h4>
						</div>
						<div class="card-icon text-light"><i class="fa fa-user"></i></div>
					</div>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<div class="mr-auto">
							<h4 class="card-text text-center "><?php echo $total_user; ?></h4>
							<h4 class="card-label text-center text-muted">Daily Visitors</h4>
						</div>
						<div class="card-icon text-light"><i class="fas fa-user-clock"></i></div>
					</div>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<div class="mr-auto">
							<h4 class="card-text text-center "><?php echo $total_user; ?></h4>
							<h4 class="card-label text-center text-muted">Daily Pending Orders</h4>
						</div>
						<div class="card-icon text-light"><i class="fas fa-cart-arrow-down"></i></div>
					</div>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<div class="mr-auto">
							<h4 class="card-text text-center "><?php echo $total_user; ?></h4>
							<h4 class="card-label text-center text-muted">Daily Completed Orders</h4>
						</div>
						<div class="card-icon text-light"><i class="fas fa-shopping-bag"></i></div>
					</div>
				</div>
			</div>
		</div>

		<div class="card-deck mb-3">
			<div class="card bg-default">
				<div class="card-header d-flex"><h3 class="w-100 text-center">SALES REPORT</h3></div>
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<img src="../../storage/img/salesreport.JPG" class="w-100">
					</div>
				</div>
				<div class="card-footer d-flex">
					<label class="text-muted">Total Sales:</label>
					<small class="text-success ml-auto">
						<i aria-hidden="true" class="fa fa-caret-up"></i> Php 5,350.00
					</small>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-header d-flex"><h3 class="w-100 text-center">NEW CUSTOMER</h3></div>
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<img src="../../storage/img/newcustomer.JPG" class="w-100">
					</div>
				</div>
				<div class="card-footer d-flex"></div>
			</div>

			<div class="card bg-default">
				<div class="card-header d-flex"><h3 class="w-100 text-center">RECENT ORDERS</h3></div>
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<img src="../../storage/img/recentorders.JPG" class="w-100">
					</div>
				</div>
				<div class="card-footer d-flex"></div>
			</div>
		</div>
	</div>
</main>