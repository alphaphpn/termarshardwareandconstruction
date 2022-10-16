<?php
	$chckfle2 = file_exists("../../inc/xsession.php");
	if ($chckfle2) {
		include_once "../../inc/xsession.php";
		$baklnk = "../../";
	} else {
		include_once "../../../inc/xsession.php";
		$baklnk = "../../../";
	}

	if ($imgpext == '') {
		$profpicsurr = $imgpixg;
	} else {
		$profpicsurr = $baklnk.$imgpixg;
	}
?>

<!-- style type="text/css">
	nav#sidebar {
		background: blue;
	}

	nav#sidebar .sidebar-brand a {
		color: #fff;
	}

	nav#sidebar .sidebar-header .user-info span {
		color: red;
	}

	nav#sidebar .sidebar-header .user-pic-circle {
		padding: unset;
		border-radius: 30px;
	}

	nav#sidebar .header-menu span {
		color: #fff000;
	}

	nav#sidebar .sidebar-menu ul li a i {
		background: red;
		color: pink;
	}

	nav#sidebar .sidebar-menu ul li a span {
		color: pink;
	}

	nav#sidebar .sidebar-menu ul li a:after {
		color: purple;
	}
</style -->

<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
	<i class="fas fa-bars"></i>
</a>

<!-- sidebar-wrapper  -->
<nav id="sidebar" class="sidebar-wrapper">
	<div class="sidebar-brand">
		<?php
			if ($sidelogdbr=1) {
				?>
					<a href="<?php echo $baklnk; ?>" class="text-left">
						<img src="<?php echo $baklnk.'content/theme/'.$themename.'/storage/img/Logo-Dashboard-Header.png'; ?>" class="dboard-top-left-logo">
					</a>
				<?php
			} else {
				?>
					<a href="<?php echo $baklnk; ?>">Visit Site</a>
				<?php
			}
		?>
		<div id="close-sidebar">
			<i class="fas fa-times"></i>
		</div>
	</div>

	<div class="sidebar-content">
		<!-- Menu  -->
		<div class="sidebar-menu">
			<ul>
				<!-- Main Menu -->
				<li class="header-menu">
					<span style="cursor: pointer;" onclick="window.open('<?php echo $baklnk; ?>routes/dashboard','_self');">Main</span>
				</li>
				<li>
					<a href="<?php echo $baklnk; ?>routes/dashboard">
						<i class="fas fa-server"></i>
						<span>Dashboard</span>
						<span class="badge badge-pill badge-primary">Main</span>
					</a>
				</li>
				<li class="sidebar-dropdown">
					<a href="<?php echo $baklnk; ?>routes/user" title="User">
						<i class="fas fa-users"></i>
						<span>User</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
							<?php
								if ($_SESSION["ulevpos"]==1) {
									?>
										<li>
											<a href="<?php echo $baklnk; ?>routes/user">All User</a>
										</li>
										<li>
											<a href="<?php echo $baklnk; ?>routes/user">Admin</a>
										</li>
										<li>
											<a href="<?php echo $baklnk; ?>routes/user">Cashier</a>
										</li>
										<li>
											<a href="<?php echo $baklnk; ?>routes/user">Rider</a>
										</li>
										<li>
											<a href="<?php echo $baklnk; ?>routes/user">Customer</a>
										</li>
										<li>
											<a href="<?php echo $baklnk; ?>routes/user/addnew">Add New</a>
										</li>
									<?php
								}
							?>
							<li class="d-none">
								<a href="<?php echo $baklnk; ?>routes/user/profile">Profile</a>
							</li>
						</ul>
					</div>
				</li>

				<?php
					if ($_SESSION["ulevpos"]==1) {
						?>
						<li class="sidebar-dropdown">
							<a href="<?php echo $baklnk; ?>routes/item" title="Products">
								<i class="fas fa-shopping-bag"></i>
								<span>Products</span>
							</a>
						</li>

						<li class="sidebar-dropdown">
							<a href="#" title="Orders">
								<i class="fas fa-shopping-cart"></i>
								<span>Orders</span>
							</a>
							<div class="sidebar-submenu">
								<ul>
									<li><a href="<?php echo $baklnk; ?>routes/item-order">All</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/process">Process</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/unpaid">Unpaid</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/canceled">Canceled</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/paid">Paid</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/checkout">Checkout</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/reviewed">Reviewed</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/approved">Approved</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/declined">Declined</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/shipped">Shipped</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/item-order/completed">Completed</a></li>
								</ul>
							</div>
						</li>

						<li class="sidebar-dropdown"> <!-- Reporst -->
							<a href="#" title="Sales Reports">
								<i class="far fa-file-alt"></i>
								<span>Sales Reports</span>
							</a>
							<div class="sidebar-submenu">
								<ul>
									<li><a href="<?php echo $baklnk; ?>routes/reports/daily">Daily</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/reports/monthly">Monthly</a></li>
									<li><a href="<?php echo $baklnk; ?>routes/reports/yearly">Yearly</a></li>
								</ul>
							</div>
						</li>
						<?php
					}
				?>
				
				<li class="sidebar-dropdown">
					<a href="<?php echo $baklnk; ?>routes/contact-messages">
						<i class="far fa-comment-alt"></i>
						<span>Message</span>
					</a>
				</li>

				<li class="sidebar-dropdown">
					<a href="<?php echo $baklnk; ?>#">
						<i class="fa fa-bell"></i>
						<span>Notification</span>
					</a>
				</li>

				<?php
					if ($_SESSION["ulevpos"]==1) {
						?>
						<li class="sidebar-dropdown">
							<a href="#">
								<i class="fas fa-cogs"></i>
								<span>Setting</span>
							</a>
							<div class="sidebar-submenu">
								<ul>
									<li>
										<a href="<?php echo $baklnk; ?>routes/setgener" title="General Settings">General</a>
									</li>
									
									<li>
										<a href="<?php echo $baklnk; ?>routes/address" title="Address List">Address</a>
									</li>
								</ul>
							</div>
						</li>
						<?php
					}
				?>
				<!-- Main Menu -->
			</ul>
		</div>
		<!-- Menu  -->
	</div>
</nav>
<!-- sidebar-wrapper  -->