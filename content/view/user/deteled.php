<?php

	$tblname = "tblsysuser";
	$prim_id = "usercode";
	include_once "../../../inc/core.php";
	include_once "../../../inc/srvr.php";
	include_once "../../../inc/cnndb.php";

	try {
		$upidid = isset($_GET['upidid']) ? $_GET['upidid'] : die('ERROR: Record ID not found.');

		$qrynodeladmin = "SELECT * FROM {$tblname} WHERE {$prim_id}=:xusercode OR username=:xusername LIMIT 1";
		$stmtadmin = $cnn->prepare($qrynodeladmin);
		$usercode = trim('00000000000');
		$username = trim('admin');
		$stmtadmin->bindParam(':xusercode', $usercode);
		$stmtadmin->bindParam(':xusername', $username);
		$stmtadmin->execute();
		$existyes = $stmtadmin->rowCount();

		if ($existyes>0) {
			echo '<script>alert("Access Denied! Cannot delete Built-in Administrator, you can only change its password.");window.open("../../../routes/user","_self");</script>';
		} else {
			$qry = "UPDATE {$tblname} SET deletedx=1 WHERE {$prim_id}=:upidid";
			$stmt = $cnn->prepare($qry);
			$stmt->bindParam(':upidid', $upidid);
			if ($stmt->execute()) {
				header('Location:../../../routes/user/?action=deleted&upidid='.$upidid);
			} else {
				die('Unable to delete record.');
			}
		}
	} catch (PDOException $exception) {
		die('ERROR: ' . $exception->getMessage());
	}