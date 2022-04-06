<?php

	include_once "../../inc/cnndb.php";

	// User
	$qry_user = "SELECT * FROM tblsysuser WHERE deletedx=0";
	$stmnt_user = $cnn->prepare($qry_user);
	$stmnt_user->execute();
	$rwCntUsr = $stmnt_user->rowCount();

	// Order
	$qry_order = "SELECT * FROM tbl_order_customer WHERE remarks=:process OR remarks=:checkout OR remarks=:reviewed OR remarks=:approved OR remarks=:shipped AND status=:unpaid AND deleted=0";
	$stmnt_order = $cnn->prepare($qry_order);
	$process = 'Process';
	$checkout = 'Checkout';
	$reviewed = 'Reviewed';
	$approved = 'Approved';
	$shipped = 'Shipped';
	$unpaid = 'Unpaid';
	$stmnt_order->bindParam(':process', $process);
	$stmnt_order->bindParam(':checkout', $checkout);
	$stmnt_order->bindParam(':reviewed', $reviewed);
	$stmnt_order->bindParam(':approved', $approved);
	$stmnt_order->bindParam(':shipped', $shipped);
	$stmnt_order->bindParam(':unpaid', $unpaid);
	$stmnt_order->execute();
	$rwCntOrdr = $stmnt_order->rowCount();

	// Sales
	$qry_sales = "SELECT SUM(sub_total) AS tsales FROM tbl_order_customer WHERE status=:paid AND deleted=0";
	$stmnt_sales = $cnn->prepare($qry_sales);
	$paid = 'Paid';
	$stmnt_sales->bindParam(':paid', $paid);
	$stmnt_sales->execute();
	$row_sales = $stmnt_sales->fetch(PDO::FETCH_ASSOC);
	if ($row_sales['tsales']==0) {
		$rwCntSals = '0.00';
	} else {
		$rwCntSals = $row_sales['tsales'];
	}
	

	// Global Variable for Analytics
	$total_user = $rwCntUsr;
	$total_order = $rwCntOrdr;
	$total_sales = number_format($rwCntSals,2,',','.');
	