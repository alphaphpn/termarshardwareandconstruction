<?php

	try {
		$chidr = isset($_GET['chid']) ? $_GET['chid'] : die('ERROR: Record ID not found.');
		$rcvrer = isset($_GET['rcvrer']) ? $_GET['rcvrer'] : die('ERROR: Record ID not found.');
		$rcvrerphn = isset($_GET['rcvrerphn']) ? $_GET['rcvrerphn'] : die('ERROR: Record ID not found.');
		$adrex2 = isset($_GET['adrex2']) ? $_GET['adrex2'] : die('ERROR: Record ID not found.');
		$rcremail = isset($_GET['rcremail']) ? $_GET['rcremail'] : die('ERROR: Record ID not found.');

		include_once "../../../inc/core.php";
		include_once "../../../inc/srvr.php";
		$cnn_cvr = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);

		$qry_sbtotal8 = "SELECT SUM(total_amt) AS subtotal, COUNT(*) AS total_rows, SUM(qty) AS total_qty FROM tbl_order_item WHERE order_id=:orderid8";
		$stmt_sbtotal8 = $cnn_cvr->prepare($qry_sbtotal8);
		$stmt_sbtotal8->bindParam(':orderid8', $chidr);
		$stmt_sbtotal8->execute();
		$row_sbtotal8 = $stmt_sbtotal8->fetch(PDO::FETCH_ASSOC);
		$sbtotztal8 = $row_sbtotal8['subtotal'];
		$sbtotalrows8 = $row_sbtotal8['total_rows'];
		$sbtotalqty8 = $row_sbtotal8['total_qty'];

		$qry_cvr = "UPDATE tbl_order_customer SET remarks=:order_remzr, receiver=:namerecepient, receiver_phone=:phonerecepient, remail=:emailrecepient, d_location=:addressrecepient, sub_total_qty=:subtotalqty, sub_total_item=:subtotalitem, sub_total=:subtotal WHERE order_id=:ordrcridr";
		$stmt_cvr = $cnn_cvr->prepare($qry_cvr);
		$ordrcridr = $chidr;
		$order_remzr = 'Checkout';
		$name_recepient = $rcvrer;
		$phone_recepient = $rcvrerphn;
		$address_recepient = $adrex2;
		$email_recepient = $rcremail;
		$stmt_cvr->bindParam(':ordrcridr', $ordrcridr);
		$stmt_cvr->bindParam(':order_remzr', $order_remzr);
		$stmt_cvr->bindParam(':namerecepient', $name_recepient);
		$stmt_cvr->bindParam(':phonerecepient', $phone_recepient);
		$stmt_cvr->bindParam(':addressrecepient', $address_recepient);
		$stmt_cvr->bindParam(':emailrecepient', $email_recepient);
		$stmt_cvr->bindParam(':subtotalqty', $sbtotalqty8);
		$stmt_cvr->bindParam(':subtotalitem', $sbtotalrows8);
		$stmt_cvr->bindParam(':subtotal', $sbtotztal8);
		if ($stmt_cvr->execute()) {
			echo "<script>alert('Successfully checkout. OrderID:[".$ordrcridr."] Kindly monitor your email/phone for instruction of the payment or you may reach thru this number ".$phone_recepient.". Thank you');window.location=('../../../routes/mpurchase');</script>";
			// header('Location:../../../routes/mpurchase');
		} else {
			echo "<script>alert('Unable to checkout record. OrderID:[".$chidr."]');</script>";
			die('Unable to checkout record.');
			header('Location:../../../routes/mcart');
		}
	} catch (PDOException $exception) {
		die('ERROR: ' . $exception->getMessage());
	}