<?php

	global $curprodidi_pospayorder;

	include_once "../../inc/cnndb.php";

	$qry_pospayorder = "SELECT * FROM tbl_order_customer WHERE customer_id=:guestidpospayorder AND cashier_id=:cashieridnw AND status=:statuspospayorder AND remarks=:remarxpospayorder AND deleted=0 ORDER BY order_id DESC LIMIT 1";
	$stmt_pospayorder = $cnn->prepare($qry_pospayorder);
	$remarx_pospayorder = 'Process';
	$status_pospayorder = 'Unpaid';
	$guestid_pospayorder = '00000000001';
	$cashieridnw = $_SESSION["usercode"];	
	$stmt_pospayorder->bindParam(':cashieridnw', $cashieridnw);
	$stmt_pospayorder->bindParam(':remarxpospayorder', $remarx_pospayorder);
	$stmt_pospayorder->bindParam(':statuspospayorder', $status_pospayorder);
	$stmt_pospayorder->bindParam(':guestidpospayorder', $guestid_pospayorder);
	$stmt_pospayorder->execute();
	$num_pospayorder = $stmt_pospayorder->rowCount();

	if ($num_pospayorder>0) {
		foreach ($stmt_pospayorder as $row_pospayorder) {
			$curprodidi_pospayorder = $row_pospayorder['order_id'];

			if ($row_pospayorder['sub_total_item']) {
				$totalitem_pospayorder = $row_pospayorder['sub_total_item'];
			} else {
				$totalitem_pospayorder = 0;
			}

			if ($row_pospayorder['sub_total_qty']) {
				$totalqty_pospayorder = $row_pospayorder['sub_total_qty'];
			} else {
				$totalqty_pospayorder = 0;
			}

			if ($row_pospayorder['sub_total']) {
				$amtopay_pospayorder = $row_pospayorder['sub_total'];
			} else {
				$amtopay_pospayorder = '0.00';
			}
			
			$curcash_pospayorder = $row_pospayorder['curcash'];
			$urchange_pospayorder = $row_pospayorder['urchange'];
		}

?>

				<div class="table-responsive-sm">
					<div class="d-flex justify-content-between">
						<h4>Order Menu</h4>
						<label id="ordernumber">Order No.: <?php echo $curprodidi_pospayorder; ?></label>
					</div>

					<table id="listRecViewToAddCart" class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>Item</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Total</th>
								<th class="d-none">Code</th>
								<th class="d-none">Ctrl#</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>

						<tbody>
							<?php
								$qry_subitemposord = "SELECT * FROM tbl_order_item WHERE order_id=:orderid ORDER BY item_order_id DESC";
								$stmt_subitemposord = $cnn->prepare($qry_subitemposord);
								$stmt_subitemposord->bindParam(':orderid', $curprodidi_pospayorder);
								$stmt_subitemposord->execute();
								$cntme_subitemposord = $stmt_subitemposord->rowCount();
								$xnosubitemposord = 0;

								if ($cntme_subitemposord > 0) {
									for($i=0; $rowsubitemposord = $stmt_subitemposord->fetch(); $i++) {
										$xnosubitemposord++;
										$itemid6969=$rowsubitemposord['item_id'];
										$barcode6969=$rowsubitemposord['barcode'];
										$itemname6969=$rowsubitemposord['item_name'];
										$qty6969=$rowsubitemposord['qty'];
										$price6969=$rowsubitemposord['price'];
										$totalamt6969=$rowsubitemposord['total_amt'];
										$id6969=$rowsubitemposord['item_order_id'];
										?>
											<tr>
												<td class="chr-limit10"><?php echo $itemname6969; ?></td>
												<td><?php echo number_format($price6969,2); ?></td>
												<td><input type="number" name="xqty6969" value="<?php echo $qty6969; ?>" class="qty_edit"></td>
												<td><?php echo number_format($totalamt6969,2); ?></td>
												<td class="d-none"><?php echo $barcode6969; ?></td>
												<td class="d-none"><?php echo $id6969; ?></td>
												<td class="m-auto text-center"><a class="btn-sm btn-dark btn-inline m-auto" href="#" title="Delete"><span class="fas fa-trash-alt m-auto text-center"></span></td>
											</tr>
										<?php
									}
								} else {
									?>
										<tr>
											<td colspan="7" class="text-center">No Item found</td>
										</tr>
										<tr>
											<td colspan="7" class="text-center">No Item found</td>
										</tr>
										<tr>
											<td colspan="7" class="text-center">No Item found</td>
										</tr>
										<tr>
											<td colspan="7" class="text-center">No Item found</td>
										</tr>
										<tr>
											<td colspan="7" class="text-center">No Item found</td>
										</tr>
									<?php
								}
							?>
						</tbody>

						<tfoot>
							<tr>
								<td class="remove-dropdown"></td>
								<td class="remove-dropdown"></td>
								<td class="remove-dropdown"></td>
								<td class="remove-dropdown"></td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown d-none"></td>
								<td class="remove-dropdown"></td>
							</tr>

							<tr>
								<?php
									$qry_getsubinfoorder = "SELECT SUM(total_amt) AS sumtotalamt, COUNT(*) AS totalrowsx, SUM(qty) AS totalqtyx FROM tbl_order_item WHERE order_id=:orderidg ORDER BY item_order_id DESC";
									$stmt_getsubinfoorder = $cnn->prepare($qry_getsubinfoorder);
									$stmt_getsubinfoorder->bindParam(':orderidg', $curprodidi_pospayorder);
									$stmt_getsubinfoorder->execute();
									$row_getsubinfoorder = $stmt_getsubinfoorder->fetch(PDO::FETCH_ASSOC);
									$thetotalitemx = $row_getsubinfoorder['totalrowsx'];
									$thetotalqtyx = $row_getsubinfoorder['totalqtyx'];
									$thetotalpayx = number_format($row_getsubinfoorder['sumtotalamt'],2);
								?>
								<td colspan="3">Total Item: <?php echo $thetotalitemx; ?></td>
								<td colspan="4">Total Qty: <?php echo $thetotalqtyx; ?></td>
							</tr>
						</tfoot>
					</table>

					<script>
						$(document).ready( function () {
							$('#listRecViewToAddCart').DataTable({
								"lengthMenu": [ 1, 3, 5, 10 ], 
								"searching": false
							});
						});
					</script>

					<hr>
					<form>
					<div class="row">
						<div class="col-sm-6 text-right">Total:</div>
						<div class="col-sm-6">
							<label class="w-100 m-1 text-right text-white bg-danger p-2"><?php echo $dcurrencyx.' '.$thetotalpayx; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 text-right">CASH:</div>
						<div class="col-sm-6">
							<input id="cashucnow" type="number" name="cash" placeholder="0.00" class="w-100 m-1 text-right" onchange="fnChngeTheCash();" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 text-right">Change:</div>
						<div class="col-sm-6">
							<input id="thechangeugive" type="text" name="change" placeholder="Your change" class="w-100 m-1 text-right text-danger">
						</div>
					</div>

					<script>
						function fnChngeTheCash() {
							var amtuseenow = <?php echo $row_getsubinfoorder['sumtotalamt']; ?>;
							console.log(amtuseenow);
							var cashucnow = $('#cashucnow').val();
							console.log(cashucnow);
							var givethchnge = cashucnow-amtuseenow;
							$('#thechangeugive').val(givethchnge.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
						}
					</script>

					<div class="row mb-2">
						<div class="col-sm-6"></div>
						<div class="col-sm-6">
							<button class="btn btn-success w-100">Pay</button>
						</div>
					</div>
					</form>
				</div>

<?php

	} else {
		$qry_findguest = "SELECT * FROM tblsysuser WHERE username=:guestme ORDER BY username DESC LIMIT 1";
		$stmt_findguest = $cnn->prepare($qry_findguest);
		$guestme = 'guest';
		$stmt_findguest->bindParam(':guestme', $guestme);
		$stmt_findguest->execute();
		$num_findguest = $stmt_findguest->rowCount();

		if ($num_findguest>0) {
			foreach ($stmt_findguest as $row_findguest) {
				$guestnow_id = $row_findguest['usercode'];
				$clientname666 = $row_findguest['fullname'];
				$clientphone666 = $row_findguest['umobileno'];
				$clientemail666 = $row_findguest['uemail'];
				$clientaddress666 = $row_findguest['address'];
				$receivername666 = $row_findguest['fullname'];
				$receiverphone666 = $row_findguest['umobileno'];
				$receiveremail666 = $row_findguest['uemail'];
				$receiveraddress666 = $row_findguest['address'];
			}
		} else {
			$guestnow_id = '00000000001';
			$clientname666 = 'Customer G. Guest';
			$clientphone666 = '+639066669696';
			$clientemail666 = 'guest@gmail.com';
			$clientaddress666 = 'Guest, Guest Address';
			$receivername666 = 'Customer G. Guest';
			$receiverphone666 = '+639066669696';
			$receiveremail666 = 'guest@gmail.com';
			$receiveraddress666 = 'Guest, Guest Address';
		}

		$qry_posaddcustordr = "INSERT INTO tbl_order_customer SET customer_id=:guestnow_id, customer_name=:clientname666, phone=:clientphone666, cemail=:clientemail666, address=:clientaddress666, receiver=:receivername666, receiver_phone=:receiverphone666, remail=:receiveremail666, d_location=:receiveraddress666, remarks=:remarkx666, status=:statuz666, cashier_id=:cashierid666, cashier_name=:cashiername666, deleted=0";
		$stmt_posaddcustordr = $cnn->prepare($qry_posaddcustordr);

		$remarkx666 = 'Process';
		$statuz666 = 'Unpaid';
		$cashierid666 = $_SESSION["usercode"];
		$cashiername666 = $_SESSION["username"];;
		$stmt_posaddcustordr->bindParam(':guestnow_id', $guestnow_id);
		$stmt_posaddcustordr->bindParam(':remarkx666', $remarkx666);
		$stmt_posaddcustordr->bindParam(':statuz666', $statuz666);
		$stmt_posaddcustordr->bindParam(':clientname666', $clientname666);
		$stmt_posaddcustordr->bindParam(':clientphone666', $clientphone666);
		$stmt_posaddcustordr->bindParam(':clientemail666', $clientemail666);
		$stmt_posaddcustordr->bindParam(':clientaddress666', $clientaddress666);
		$stmt_posaddcustordr->bindParam(':receivername666', $receivername666);
		$stmt_posaddcustordr->bindParam(':receiverphone666', $receiverphone666);
		$stmt_posaddcustordr->bindParam(':receiveremail666', $receiveremail666);
		$stmt_posaddcustordr->bindParam(':receiveraddress666', $receiveraddress666);
		$stmt_posaddcustordr->bindParam(':cashierid666', $cashierid666);
		$stmt_posaddcustordr->bindParam(':cashiername666', $cashiername666);
		$stmt_posaddcustordr->execute();
		echo '<script>window.open("../../routes/item/","_self");</script>';
	}

?>