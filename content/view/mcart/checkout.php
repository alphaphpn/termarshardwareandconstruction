<?php

	try {
		$chidx = isset($_GET['chid']) ? $_GET['chid'] : die('ERROR: Record ID not found.');

		include_once "../../../inc/core.php";
		include_once "../../../inc/srvr.php";
		$cnn_remx = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);

		$qry_sbtotal9 = "SELECT SUM(total_amt) AS subtotal, COUNT(*) AS total_rows, SUM(qty) AS total_qty FROM tbl_order_item WHERE order_id=:orderid9";
		$stmt_sbtotal9 = $cnn_remx->prepare($qry_sbtotal9);
		$stmt_sbtotal9->bindParam(':orderid9', $chidx);
		$stmt_sbtotal9->execute();
		$row_sbtotal9 = $stmt_sbtotal9->fetch(PDO::FETCH_ASSOC);
		$sbtotztal9 = $row_sbtotal9['subtotal'];
		$sbtotalrows9 = $row_sbtotal9['total_rows'];
		$sbtotalqty9 = $row_sbtotal9['total_qty'];

		$qry_remx = "UPDATE tbl_order_customer SET remarks=:order_remzx, sub_total_qty=:subtotalqty, sub_total_item=:subtotalitem, sub_total=:subtotal WHERE order_id=:ordrcridx";
		$stmt_remx = $cnn_remx->prepare($qry_remx);
		$ordrcridx = $chidx;
		$order_remzx = 'Checkout';
		$stmt_remx->bindParam(':ordrcridx', $ordrcridx);
		$stmt_remx->bindParam(':order_remzx', $order_remzx);
		$stmt_remx->bindParam(':subtotalqty', $sbtotalqty9);
		$stmt_remx->bindParam(':subtotalitem', $sbtotalrows9);
		$stmt_remx->bindParam(':subtotal', $sbtotztal9);
		if ($stmt_remx->execute()) {
			echo "<script>alert('Successfully checkout. OrderID:[".$chidx."] Kindly monitor your email/phone for instruction of the payment. Thank you');window.location=('../../../routes/mpurchase');</script>";
		} else {
			echo "<script>alert('Unable to checkout record. OrderID:[".$chidx."]');</script>";
			die('Unable to checkout record.');
			header('Location:../../../routes/mcart');
		}
	} catch (PDOException $exception) {
		die('ERROR: ' . $exception->getMessage());
	}