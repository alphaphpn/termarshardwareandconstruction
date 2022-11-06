<?php

	include_once "../../inc/cnndb.php";

	try {
		$ordridfgh = isset($_GET['orderid']) ? $_GET['orderid'] : '<script>window.open("../../routes/item/","_self");</script>';
		$temidid = isset($_GET['itemid']) ? $_GET['itemid'] : '<script>window.open("../../routes/item/","_self");</script>';
		$nqty = isset($_GET['gqty']) ? $_GET['gqty'] : '<script>window.open("../../routes/item/","_self");</script>';

		$qry_checkitemord = "SELECT * FROM tbl_order_item WHERE order_id=:orderid AND item_id=:itemid AND deleted=0 LIMIT 1";
		$stmt_checkitemord = $cnn->prepare($qry_checkitemord);
		$stmt_checkitemord->bindParam(':orderid', $ordridfgh);
		$stmt_checkitemord->bindParam(':itemid', $temidid);
		$stmt_checkitemord->execute();
		$cnt_checkitemord = $stmt_checkitemord->rowCount();

		if ($cnt_checkitemord>0) {
			foreach ($stmt_checkitemord as $row_checkitemord) {
				$qty_checkitemord = $row_checkitemord['qty'];
				$price_checkitemord = $row_checkitemord['price'];
			}

			$qry_updateqtytordr = "UPDATE tbl_order_item SET qty=:qtynow, total_amt=:totamtupdateqtytordr WHERE order_id=:orderid AND item_id=:itemid AND deleted=0";
			$stmt_updateqtytordr = $cnn->prepare($qry_updateqtytordr);
			$qty_updateqtytordr = $qty_checkitemord+$nqty;
			$totamt_updateqtytordr = $price_checkitemord*$qty_updateqtytordr;
			$stmt_updateqtytordr->bindParam(':orderid', $ordridfgh);
			$stmt_updateqtytordr->bindParam(':itemid', $temidid);
			$stmt_updateqtytordr->bindParam(':qtynow', $qty_updateqtytordr);
			$stmt_updateqtytordr->bindParam(':totamtupdateqtytordr', $totamt_updateqtytordr);
			$stmt_updateqtytordr->execute();

			echo '<script>window.open("../../routes/item/","_self");</script>';
		} else {
			$qry_sfinditemfdbse = "SELECT * FROM tblitem WHERE item_id=:itemid3 AND deletedx=0 LIMIT 1";
			$stmt_sfinditemfdbse = $cnn->prepare($qry_sfinditemfdbse);
			$stmt_sfinditemfdbse->bindParam(':itemid3', $temidid);
			$stmt_sfinditemfdbse->execute();
			$cnt_sfinditemfdbse = $stmt_sfinditemfdbse->rowCount();

			if ($cnt_sfinditemfdbse>0) {
				foreach ($stmt_sfinditemfdbse as $row_sfinditemfdbse) {
					$barcode_sfinditemfdbse = $row_sfinditemfdbse['barcode'];
					$name_sfinditemfdbse = $row_sfinditemfdbse['name'];
					$unit_sfinditemfdbse = $row_sfinditemfdbse['unit'];
					$price_sfinditemfdbse = $row_sfinditemfdbse['sell_price'];
					$stock_sfinditemfdbse = $row_sfinditemfdbse['stock_available'];
					$extnem_sfinditemfdbse = $row_sfinditemfdbse['extnem'];
					$status_sfinditemfdbse = 'Process';
				}

				$qry_addqtytordr = "INSERT INTO tbl_order_item SET barcode=:barcodesfinditemfdbse, item_name=:namesfinditemfdbse, unit=:unitsfinditemfdbse, price=:pricesfinditemfdbse, extnem=:extnemsfinditemfdbse, cstock=:stocksfinditemfdbse, status=:statussfinditemfdbse, total_amt=:totamtaddqtytordr, qty=:qtynow2, order_id=:orderid2, item_id=:itemid2, deleted=0";
				$stmt_addqtytordr = $cnn->prepare($qry_addqtytordr);
				$totamt_addqtytordr = $nqty*$price_sfinditemfdbse;
				$stmt_addqtytordr->bindParam(':orderid2', $ordridfgh);
				$stmt_addqtytordr->bindParam(':itemid2', $temidid);
				$stmt_addqtytordr->bindParam(':qtynow2', $nqty);
				$stmt_addqtytordr->bindParam(':totamtaddqtytordr', $totamt_addqtytordr);
				$stmt_addqtytordr->bindParam(':barcodesfinditemfdbse', $barcode_sfinditemfdbse);
				$stmt_addqtytordr->bindParam(':namesfinditemfdbse', $name_sfinditemfdbse);
				$stmt_addqtytordr->bindParam(':unitsfinditemfdbse', $unit_sfinditemfdbse);
				$stmt_addqtytordr->bindParam(':pricesfinditemfdbse', $price_sfinditemfdbse);
				$stmt_addqtytordr->bindParam(':stocksfinditemfdbse', $stock_sfinditemfdbse);
				$stmt_addqtytordr->bindParam(':extnemsfinditemfdbse', $extnem_sfinditemfdbse);
				$stmt_addqtytordr->bindParam(':statussfinditemfdbse', $status_sfinditemfdbse);
				$stmt_addqtytordr->execute();

				echo '<script>window.open("../../routes/item/","_self");</script>';
			} else {
				echo '<script>window.open("../../routes/item/","_self");</script>';
			}
		}
	} catch (PDOException $exception) {
		die('ERROR: ' . $exception->getMessage());
	}