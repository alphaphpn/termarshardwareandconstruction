<script>
	function chkPage() {
		var curr_dirpage = window.location.pathname;
		var pathElements = curr_dirpage.replace(/\/$/, '').split('/');
		const lst_pgeurl = pathElements[pathElements.length - 1];

		console.log(lst_pgeurl);

		if (lst_pgeurl=="products") {
			
		} else {
			window.open(curr_dirpage+"routes/products","_self");
		}
	}
</script>

<section id="secnavbr" class="<?php echo $navbarorrient; ?>" style="<?php echo 'background-color: '.$forthcolor.';'; ?>">
	<nav id="navbar" class="navbar navbar-expand-sm navbar-danger <?php echo $contentwidth; ?>">
		<a class="navbar-brand" href="<?php echo $domainhome; ?>">
			<img id="mlogo" src="<?php echo $domainhome.'content/theme/'.$themename.'/storage/img/'.$syslogo; ?>">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<?php
					$cnn = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
					$qry_menuf = "SELECT * FROM tbl_menu_frontpage WHERE menable=1 ORDER BY menu_id ASC";
					$stmt_menuf = $cnn->prepare($qry_menuf);
					$stmt_menuf->execute();
					$cnt_menuf = $stmt_menuf->rowCount();

					if ($cnt_menuf > 0) {
						foreach ($stmt_menuf as $row_menuf) {
							$mfmenutitle	= $row_menuf['menu_title'];
							$mfmenuslug		= $row_menuf['menu_slug'];
							$mfmenuopen		= $row_menuf['menu_open'];
							?>
								<li class="nav-item">
									<a href="<?php echo $domainhome.'routes/'.$mfmenuslug; ?>" target="<?php echo $mfmenuopen; ?>" class="nav-link"><?php echo $mfmenutitle; ?></a>
								</li>
							<?php
						}
					} else {
						?>
							<li class="nav-item">
								<a href="<?php echo $domainhome; ?>" class="nav-link">Home</a>
							</li>
						<?php
					}
				?>
			</ul>

			<?php
				if ($membershow==1) {
					?>
						<ul class="navbar-nav my-2 my-lg-0">
							<li class="nav-item">
								<form>
									<div class="form-group mb-0 mr-3">
										<div class="input-group">
											<input id="searchproduct" type="text" class="form-control" placeholder="Search Product" name="searchproduct" onkeyup="productSearch(this.value)" onfocus="chkPage();" onclick="chkPage();">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fas fa-search" aria-hidden="true"></i>
												</span>
											</div>
										</div>
									</div>
								</form>
							</li>

							<?php
								if (empty($_SESSION["usercode"])) {
									echo '<li class="nav-item">
										<a class="nav-link" href="'.$domainhome.'routes/login">Login</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="'.$domainhome.'routes/signup">Register</a>
									</li>';
								} else {
									if ($_SESSION["ulevpos"]==1) {
										echo '<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Menu</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="'.$domainhome.'routes/dashboard">Dashboard</a>
												<a class="dropdown-item border-top" href="'.$domainhome.'routes/chngepss">Change Password</a>
												<a class="dropdown-item" href="'.$domainhome.'inc/logout">Logout</a>
											</div>
										</li>';
									} elseif ($_SESSION["ulevpos"]==3) {
										echo '<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Menu</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="'.$domainhome.'routes/dashboard">Dashboard</a>
												<a class="dropdown-item border-top" href="'.$domainhome.'routes/chngepss">Change Password</a>
												<a class="dropdown-item" href="'.$domainhome.'inc/logout">Logout</a>
											</div>
										</li>';
									} elseif ($_SESSION["ulevpos"]==6) {
										$cnn_getorid = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
										$qry_getorid = "SELECT * FROM tbl_order_customer WHERE customer_id=:customeer_id2 AND remarks=:processed2 ORDER BY order_id DESC LIMIT 1";
										$stmt_getorid = $cnn_getorid->prepare($qry_getorid);
										$customeer_id2 = $_SESSION["usercode"];
										$processed2 = 'Process';
										$stmt_getorid->bindParam(':customeer_id2', $customeer_id2);
										$stmt_getorid->bindParam(':processed2', $processed2);
										$stmt_getorid->execute();
										$row_order2 = $stmt_getorid->fetch(PDO::FETCH_ASSOC);
										$curr_ordr_id2 = $row_order2['order_id'] ?? '0';

										$cnn_getqty = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
										$qry_getqty = "SELECT SUM(qty) AS total_qty FROM tbl_order_item WHERE order_id=:order_id2";
										$stmt_getqty = $cnn_getqty->prepare($qry_getqty);
										$order_id2 = $curr_ordr_id2;
										$stmt_getqty->bindParam(':order_id2', $order_id2);
										$stmt_getqty->execute();
										$row_getqty = $stmt_getqty->fetch(PDO::FETCH_ASSOC);
										$sbtotalqty2 = $row_getqty['total_qty'];

										if (empty($sbtotalqty2)) {
											$cartqtyz = '';
										} else {
											$cartqtyz = '<span id="nmbtemi">'.$sbtotalqty2.'</span>';
										}

										if ($_SESSION["imglnkurl"]) {
											if (preg_match("(^https?://)",$_SESSION["imglnkurl"])) {
												$crntimgprfl = $_SESSION["imglnkurl"];
											} else {
												$crntimgprfl = $domainhome.$_SESSION["imglnkurl"];
											}
										} else {
											$crntimgprfl = $domainhome."storage/img/no-image.jpg";
										}

										
										echo '<li class="nav-item">
											<a class="nav-link" href="'.$domainhome.'routes/mcart">
												<span>
													<i class="fas fa-shopping-cart" style="font-size: xx-large;"></i>
												</span>
												'.$cartqtyz.'
											</a>
										</li>';

										echo '<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><img class="acct-img" src="'.$crntimgprfl.'"><span class="indiunem ">'.trim($_SESSION["firstname"]).'</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="'.$domainhome.'routes/mprofile">Profile</a>';

												if ($_SESSION["gogfirstime"]==1) {
													echo '<a class="dropdown-item" href="'.$domainhome.'routes/mpurchase">Purchase</a>
														<a class="dropdown-item border-top" href="'.$domainhome.'routes/chngepss-firstime">Change Password</a>
														<a id="#signout" class="dropdown-item" href="'.$domainhome.'inc/logout">Logout</a>
														</div>
													</li>';
												} else {
													echo '<a class="dropdown-item" href="'.$domainhome.'routes/mpurchase">Purchase</a>
														<a class="dropdown-item border-top" href="'.$domainhome.'routes/chngepss">Change Password</a>
														<a id="#signout" class="dropdown-item" href="'.$domainhome.'inc/logout">Logout</a>
														</div>
													</li>';
												}
									}
									
								}
							?>
						</ul>
					<?php
				}
			?>
		</div>
	</nav>
</section>

<script>
	function productSearch(str) {
		var dir_myhome = "<?php echo $domainhome; ?>";
		var curr_dirpage = window.location.pathname;
		var pathElements = curr_dirpage.replace(/\/$/, '').split('/');
		const lst_pgeurl = pathElements[pathElements.length - 1];

		console.log(lst_pgeurl);

		if (lst_pgeurl=="products") {
			if (str == "") {
				location.reload();
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("listofproducts").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", dir_myhome+"content/view/products/prodsresult.php?product=" + str, true);
				xmlhttp.send();
			}
		} else {
			window.open(dir_myhome+"routes/products","_self");
		}
	}
</script>