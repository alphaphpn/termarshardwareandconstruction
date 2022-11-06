<?php

	if(empty($_SESSION["usercode"])) {
		echo '<script>window.open("../../","_self");</script>';
	} else {
		$deuzerkedpos = $_SESSION['usercode'];
	}

	include_once "../../content/template-part/{$themename}/dashboard-navbar.php";
	include_once "../../content/template-part/{$themename}/dashboard-navbar-top.php";
	$categoryad = trim($_GET['category']);
	$labelcat = 'Item';
	$btnactivcatg3 = 'btn-info';
	if ($categoryad) {
		$labelcat = $categoryad;
		$btnactivcatg3 = 'btn-outline-info';
	}

?>

<link rel="stylesheet" href="<?php echo $dirbak; ?>assets/datatables/1.11.3/css/jquery.dataTables.min.css">
<script src="<?php echo $dirbak; ?>assets/datatables/1.11.3/js/jquery.dataTables.min.js"></script>

<main class="page-content">
	<div class="container-fluid bg-light-opacity">
		<div class="d-flex">
			<h4 class="mr-2 mb-2"><?php echo $labelcat; ?></h4>
			<a href="../../routes/item/addnew" class="btn btn-outline-danger mr-2 mb-2">Add New</a>
			<a href="../../routes/item" class="btn <?php echo $btnactivcatg3; ?> mr-2 mb-2">All</a>
			<?php
				$qrybycateggrp2 = $cnn->prepare("SELECT category FROM tblitem WHERE deletedx=0 GROUP BY category ORDER BY category ASC");
				$qrybycateggrp2->execute();
				$rsltbycateggrp2 = $qrybycateggrp2->setFetchMode(PDO::FETCH_ASSOC);
				foreach ($qrybycateggrp2 as $rsltbycateggrp2) {
					$categnowz2 = $rsltbycateggrp2['category'];
					$btnactivcatg = 'btn-outline-info';
					if ($categnowz2==$categoryad) {
						$btnactivcatg = 'btn-info';
					}
					?>
					<a href="<?php echo '../../routes/item?category='.$categnowz2; ?>" class="btn <?php echo $btnactivcatg; ?> mr-2 mb-2"><?php echo $categnowz2; ?></a>
					<?php
				}
			?>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div id="" class="table-responsive-sm">
					<table id="listRecView" class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>No.</th>
								<th>Item</th>
								<th>Category</th>
								<th>Unit</th>
								<th>Price</th>
								<th class="d-none">Sale Price</th>
								<th class="d-none">Supplier Price</th>
								<th>Stock</th>
								<th class="d-none">Date</th>
								<th class="d-none">Created</th>
								<th class="d-none">Item Code</th>
								<th class="d-none">Ctrl#</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>

						<tbody>
							<?php
								$tblname = "tblitem";
								$prim_id = "item_id";
								$cnn = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
								if ($categoryad) {
									$qry = "SELECT * FROM {$tblname} WHERE category=:categoryx AND deletedx=0 ORDER BY {$prim_id} DESC";
									$stmt = $cnn->prepare($qry);
									$stmt->bindValue(":categoryx", $categoryad);
								} else {
									$qry = "SELECT * FROM {$tblname} WHERE deletedx=0 ORDER BY {$prim_id} DESC";
									$stmt = $cnn->prepare($qry);
								}
								$stmt->execute();
								$xno = 0;

								for($i=0; $row = $stmt->fetch(); $i++) {
									$xno++;
									$id2=$row['item_id'];
									$id=sprintf('%011d',$id2);
									$barcode=$row['barcode'];
									$itemname=$row['name'];
									$category=$row['category'];
									$unit=$row['unit'];
									$sell_price=$row['sell_price'];
									$sale_price=$row['sale_price'];
									$supplier_price=$row['supplier_price'];
									$stock_available=$row['stock_available'];
									$modified2=$row['modified'];
									$modified=date_format(new DateTime($modified2),'Y/m/d');
									$created2=$row['created'];
									$created=date_format(new DateTime($created2),'Y/m/d');
							?>

									<tr>
										<td><?php echo $xno; ?></td>
										<td data-filter="<?php echo $itemname; ?>"><?php echo $itemname; ?></td>
										<td data-filter="<?php echo $category; ?>"><?php echo $category; ?></td>
										<td data-filter="<?php echo $unit; ?>"><?php echo $unit; ?></td>
										<td data-filter="<?php echo $sell_price; ?>"><?php echo $sell_price; ?></td>
										<td class="d-none"><?php echo $sale_price; ?></td>
										<td class="d-none"><?php echo $supplier_price; ?></td>
										<td data-filter="<?php echo $stock_available; ?>"><?php echo $stock_available; ?></td>
										<td class="d-none"><?php echo $modified; ?></td>
										<td class="d-none"><?php echo $created; ?></td>
										<td class="d-none"><?php echo $barcode; ?></td>
										<td class="d-none"><?php echo $id; ?></td>
										<td class="text-right tbl-action">
											<a href="../../routes/item/editupdate?id=<?php echo $id; ?>" class="btn-sm btn-success btn-inline" title="Edit">
												<span class="far fa-edit"></span>
											</a>
											<a class="btn-sm btn-dark btn-inline ml-1" href="#" onclick="trash(<?php echo $id2; ?>)" title="Delete">
												<span class="fas fa-trash-alt"></span>
											</a>
											<a href="#" class="btn-sm btn-danger btn-inline ml-1" onclick="fnAddToCartzPOS(<?php echo $id2; ?>,1)" title="Add to Cart"><span class="fas fa-plus"></span></a>
										</td>
									</tr>
							<?php
								}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td class="remove-dropdown"></td>
								<td class="remove-dropdown"></td>
								<td></td>
								<td></td>
								<td class="remove-dropdown"></td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown d-none"></td>
								<td>Stock</td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown"></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="col-lg-5 bg-light pt-2">
				<?php include_once "../../inc/pos/index.php" ?>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript">
	$(document).ready( function () {
		$('#listRecView').DataTable( {
			"lengthMenu": [ 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 100, 200, 300, 400, 500 ], 
			initComplete: function () {
				this.api().columns().every( function () {

					/** Filter Group for each column Start **/
					var column = this;
					var select = $('<select><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
					);

					column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					});

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					});
				});
			}
		} );
	});	

	function trash(id) {
		var answer = confirm('Delete record Ctrl#'+id+' ?');
		if (answer) {
			window.location = '../../content/view/item/deteled.php?upidid=' + id;
		} 
	}

	function fnAddToCartzPOS(itemidpos,qty) {
		var dircz_pos = "<?php echo $domainhome; ?>";
		var userCode_pos = "<?php echo $deuzerkedpos; ?>";
		var ordrid = "<?php echo $curprodidi_pospayorder; ?>";
		if (userCode_pos) {
			console.log(userCode_pos);
			// Add to Cart
			window.open(dircz_pos+'inc/pos/addorderitem.php?orderid='+ordrid+'&itemid='+itemidpos+'&gqty='+qty, '_self');
			alert('You are adding to order. '+ordrid+' | '+itemidpos);
		} else {
			console.log('No User');
			alert('Login first before you can order.');
			// window.open(dircz_pos+'routes/login', '_self');
		}
	}
</script>