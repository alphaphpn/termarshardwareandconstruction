<?php

	include_once "../../inc/cnndb.php";
	$seendate = date("Y-m-d");

	// Page Visit
	$qry_pagevisit = "SELECT * FROM conf WHERE id=:ownerid LIMIT 1";
	$stmt_pagevisit = $cnn->prepare($qry_pagevisit);
	$stmt_pagevisit->bindParam(':ownerid', $owner_id);
	$stmt_pagevisit->execute();
	$row_pagevisit = $stmt_pagevisit->fetch(PDO::FETCH_ASSOC);
	$pagevisit = $row_pagevisit['page_visit'];

	// User
	$qry_user = "SELECT * FROM tblsysuser WHERE deletedx=0";
	$stmnt_user = $cnn->prepare($qry_user);
	$stmnt_user->execute();
	$rwCntUsr = $stmnt_user->rowCount();

	// Daily Signup
	$qry_dailynewuser = "SELECT * FROM tblsysuser WHERE deletedx=0 AND DATE(created)=:detodeyuio";
	$stmnt_dailynewuser = $cnn->prepare($qry_dailynewuser);
	$stmnt_dailynewuser->bindParam(':detodeyuio', $seendate);
	$stmnt_dailynewuser->execute();
	$rwCntUsr_dailynewuser = $stmnt_dailynewuser->rowCount();

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

	// Complete
	$qry_completez = "SELECT * FROM tbl_order_customer WHERE remarks=:completex AND status=:paidx1 AND deleted=0";
	$stmnt_completez = $cnn->prepare($qry_completez);
	$paidx1 = 'Paid';
	$completex = 'Complete';
	$stmnt_completez->bindParam(':paidx1', $paidx1);
	$stmnt_completez->bindParam(':completex', $completex);
	$stmnt_completez->execute();
	$rwCntCompleteZ = $stmnt_completez->rowCount();
	

	// Global Variable for Analytics
	$total_pagevisits = $pagevisit;
	$total_newuser = $rwCntUsr_dailynewuser;
	$total_user = $rwCntUsr;
	$total_order = $rwCntOrdr;
	$total_complete = $rwCntCompleteZ;
	$total_sales = number_format($rwCntSals,2,',','.');
	