<?php
	// Top Container
	// Sidebar - Menu
	include_once "../../content/template-part/{$themename}/dashboard-navbar.php";
	include_once "../../content/template-part/{$themename}/dashboard-navbar-top.php";
	include_once "../../inc/dashboard/analysis-front.php";
	$datenowen = date("Y-m-d");
	$mdatenowen = date("Y-m");
	$ydatexnowen = date("Y");
	$tblnamenz1 = "tbl_order_item";
	$prim_idnz1 = "item_order_id";
	$cnn = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
?>

<link rel="stylesheet" href="<?php echo $dirbak; ?>assets/datatables/1.11.3/css/jquery.dataTables.min.css">
<script src="<?php echo $dirbak; ?>assets/datatables/1.11.3/js/jquery.dataTables.min.js"></script>

<main class="page-content">
	<div class="container-fluid bg-light-opacity">
		<div class="card-deck mb-3">
			<div class="card bg-default">
				<div class="card-body text-center">
					<a href="../../routes/user?dailynewuser=true">
						<div class="card-innerBody d-flex">
							<div class="mr-auto">
								<h4 class="card-text text-center "><?php echo $total_newuser; ?></h4>
								<h6 class="card-label text-center text-muted">Daily Signups</h6>
							</div>
							<div class="card-icon text-light"><i class="fa fa-user"></i></div>
						</div>
					</a>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<div class="mr-auto">
							<h4 class="card-text text-center "><?php echo $total_pagevisits; ?></h4>
							<h6 class="card-label text-center text-muted">Visitors</h6>
						</div>
						<div class="card-icon text-light"><i class="fas fa-user-clock"></i></div>
					</div>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-body text-center">
					<a href="../../routes/item-order/?strem=1&whatnow=Unpaid">
						<div class="card-innerBody d-flex">
							<div class="mr-auto">
								<h4 class="card-text text-center "><?php echo $total_order; ?></h4>
								<h6 class="card-label text-center text-muted">Pending Orders</h6>
							</div>
							<div class="card-icon text-light"><i class="fas fa-cart-arrow-down"></i></div>
						</div>
					</a>
				</div>
			</div>

			<div class="card bg-default">
				<div class="card-body text-center">
					<a href="../../routes/item-order/?strem=0&whatnow=Complete">
						<div class="card-innerBody d-flex">
							<div class="mr-auto">
								<h4 class="card-text text-center "><?php echo $total_complete; ?></h4>
								<h6 class="card-label text-center text-muted">Completed Orders</h6>
							</div>
							<div class="card-icon text-light"><i class="fas fa-shopping-bag"></i></div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="card-deck mb-3">
			<div class="card bg-default">
				<div class="card-header d-flex"><h5 class="w-100 text-center">SALES REPORT</h5></div>
				<div class="card-body text-center">
					<?php include_once "../../inc/dashboard/sales-report.php"; ?>
				</div>
				<div class="card-footer d-flex"></div>
			</div>

			<div class="card bg-default">
				<div class="card-header d-flex"><h5 class="w-100 text-center">DAILY CUSTOMERs ORDER</h5></div>
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<?php include_once "../../inc/dashboard/new-customer.php"; ?>
					</div>
				</div>
				<div class="card-footer d-flex"></div>
			</div>

			<div class="card bg-default">
				<div class="card-header d-flex"><h5 class="w-100 text-center">RECENT ORDERS</h5></div>
				<div class="card-body text-center">
					<div class="card-innerBody d-flex">
						<?php include_once "../../inc/dashboard/recent-orders.php"; ?>
					</div>
				</div>
				<div class="card-footer d-flex"></div>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript">
	$(document).ready( function () {
		$('#listRecView').DataTable({
			"lengthMenu": [ 5, 10 ], 
			"searching": false
		});

		$('#listRecView2').DataTable({
			"lengthMenu": [ 5, 10 ], 
			"searching": false
		});

		$('#listRecView3').DataTable({
			"lengthMenu": [ 5, 10 ], 
			"searching": false
		});

		$('#listRecViewNCustmz24').DataTable({
			"lengthMenu": [ 2, 5 ], 
			"searching": false
		});

		$('#listRecViewNRecentOrd69').DataTable({
			"lengthMenu": [ 5, 10 ], 
			"searching": false
		});
	});
</script>