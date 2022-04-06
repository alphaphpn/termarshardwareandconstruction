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
		<a href="<?php echo $baklnk; ?>">Visit Site</a>
		<div id="close-sidebar">
			<i class="fas fa-times"></i>
		</div>
	</div>

	<!-- Current User Profile -->
	<div class="sidebar-header">
		<div class="user-pic user-pic-circle">
			<img class="img-responsive img-rounded" src="<?php echo $profpicsurr; ?>" alt="User picture">
			<?php // echo $baklnk.'storage/img/avatar2.png'; ?>
		</div>
		<div class="user-info">
			<span class="user-name"><?php echo $givename; ?>
				<strong><?php echo $lastname; ?></strong>
			</span>
			<span class="user-role"><?php echo $ptitle; ?></span>
			<span class="user-status">
				<i class="fa fa-circle"></i>
				<span>Online</span>
			</span>
		</div>
	</div>
	<!-- Current User Profile  -->

	<div class="sidebar-content">
		<!-- Menu  -->
		<div class="sidebar-menu">
			<ul>
				<!-- Main Menu -->
				<li class="header-menu">
					<span style="cursor: pointer;" onclick="window.open('<?php echo $baklnk; ?>routes/dashboard','_self');">Main</span>
				</li>
				<li class="d-none">
					<a href="<?php echo $baklnk; ?>routes/dashboard">
						<i class="fas fa-server"></i>
						<span>Dashboard</span>
						<span class="badge badge-pill badge-primary">Main</span>
					</a>
				</li>
				<li class="sidebar-dropdown">
					<a href="#" title="User">
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
										<a href="#" class="d-none">Writing</a>
									</li>
									<li>
										<a href="#" class="d-none">Reading</a>
									</li>
									<li>
										<a href="#" class="d-none">Discussion</a>
									</li>
									<li>
										<a href="#" class="d-none">Privacy</a>
									</li>
									<li class="d-none">
										<a href="<?php echo $baklnk; ?>routes/address" title="Address List">Address</a>
									</li>
								</ul>
							</div>
						</li>
						<?php
					}
				?>
				<li class="sidebar-dropdown d-none">
					<a href="#">
						<i class="fas fa-palette"></i>
						<span>Apperance</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
							<li>
								<a href="#">Theme</a>
							</li>
							<li>
								<a href="#">Color</a>
							</li>
							<li>
								<a href="<?php echo $baklnk; ?>routes/banner">Banner</a>
							</li>
							<li>
								<a href="#">Custom Style Sheet (CSS)</a>
							</li>
							<li>
								<a href="#">Custom JavaScript</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="sidebar-dropdown d-none">
					<a href="#">
						<i class="fas fa-sticky-note"></i>
						<span>Site</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
							<li class="sidebar-dropdown">
								<a href="#">Post</a>
								<div>
									<ul>
										<li>
											<a href="#">Product & Services</a>
										</li>
										<li>
											<a href="#">Testimonial</a>
										</li>
										<li>
											<a href="#">FAQ</a>
										</li>
										<li>
											<a href="#">Blog</a>
										</li>
										<li>
											<a href="#">Comments</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#">Media</a>
							</li>
							<li>
								<a href="#">Page</a>
								<div>
									<ul>
										<li>
											<a href="<?php echo $baklnk; ?>routes/page-about">About</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li class="sidebar-dropdown">
					<a href="#">
						<i class="fa fa-inbox"></i>
						<span>Contact</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
							<li>
								<a href="<?php echo $baklnk; ?>routes/contact-messages">Message(s)</a>
							</li>
							<li class="d-none">
								<a href="#">Contact List</a>
							</li>
						</ul>
					</div>
				</li>
				<!-- Main Menu -->

				<!-- Custom Menu -->
				<li class="header-menu d-none">
					<span>System</span>
				</li>
				<!-- ?php include_once "dashboard-navbar-menu.php"; ? -->
				<!-- Custom Menu -->

				<!-- Built-in App -->
				<li class="header-menu">
					<span>App</span>
				</li>
				<?php include_once "dashboard-navbar-app.php"; ?>
				<!-- Built-in App -->

				<!-- Extra Menu -->
				<li class="header-menu d-none">
					<span>Extra</span>
				</li>
				<li class="d-none">
					<a href="<?php echo $baklnk; ?>routes/crud" title="Create Read Update Delete Search">
						<i class="fa fa-book"></i>
						<span>CRUD</span>
						<span class="badge badge-pill badge-secondary">Native PHP</span>
					</a>
				</li>
				<li class="d-none">
					<a href="<?php echo $baklnk; ?>routes/crud-datatable" title="Create Read Update Delete Search">
						<i class="fa fa-book"></i>
						<span>CRUD</span>
						<span class="badge badge-pill badge-success">DataTable</span>
					</a>
				</li>
				<!-- Extra Menu -->

				<!-- Trash / Recycle Bin -->
				<li class="header-menu d-none">
					<span>Trash Data</span>
				</li>
				<li class="sidebar-dropdown d-none"> <!-- Sample Menu 1 -->
					<a href="#" title="Sample Menu">
						<i class="far fa-file-alt"></i>
						<span>Sample Menu 1</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
							<li>
								<a href="#">Sample Sub-Menu 1</a>
							</li>
							<li>
								<a href="#">Sample Sub-Menu 2</a>
							</li>
						</ul>
					</div>
				</li>
				<!-- Trash / Recycle Bin -->

				<!-- About -->
				<li class="header-menu d-none">
					<span>About</span>
				</li>
				<li class="d-none">
					<a href="<?php echo $baklnk; ?>routes/dashboard-theme" title="Dashboard Theme">
						<i class="fa fa-copyright"></i>
						<span>Dashboard</span>
						<span class="badge badge-pill badge-info">Theme</span>
					</a>
				</li>
				<!-- About -->
			</ul>
		</div>
		<!-- Menu  -->
	</div>

	<!-- Notification  -->
	<div class="sidebar-footer">
		<a href="#" title="Notification" class="d-none">
			<i class="fa fa-bell"></i>
			<span class="badge badge-pill badge-warning notification">3</span>
		</a>
		<a href="#" title="Message" class="d-none">
			<i class="fa fa-envelope"></i>
			<span class="badge badge-pill badge-success notification">7</span>
		</a>
		<a href="<?php echo $baklnk; ?>routes/setgener" title="Settings">
			<i class="fa fa-cog"></i>
			<span class="badge-sonar"></span>
		</a>
		<a href="" title="Refresh">
			<i class="fas fa-sync"></i>
		</a>
		<a href="<?php echo $baklnk; ?>inc/logout" title="Logout">
			<i class="fa fa-power-off"></i>
		</a>
	</div>
	<!-- Notification  -->
</nav>
<!-- sidebar-wrapper  -->