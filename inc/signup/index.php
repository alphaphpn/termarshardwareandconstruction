<?php

	try {
		if (isset($_POST["btnSubmit"])) {
			if (empty($_POST["younickname"]) || empty($_POST["passcodeshow"])) {
				echo '<div class="alert alert-danger alert-dismissible fade show">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo 'Please enter username and password.';
				echo '</div>';
			} else {
				$query = "SELECT * FROM tblsysuser WHERE username=:younickname OR uemail=:xemail OR umobileno=:xphone LIMIT 1";
				$statement = $cnn->prepare($query);
				$username = $_POST['younickname'];
				$xemail = $_POST['xemail'];
				$xphone = $_POST['xphone'];
				$statement->bindParam(':younickname', $username);
				$statement->bindParam(':xemail', $xemail);
				$statement->bindParam(':xphone', $xphone);
				$statement->execute();
				$count = $statement->rowCount();
				if ($count > 0) {
					echo '<div class="alert alert-danger alert-dismissible fade show">';
						echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						echo 'Account already exist';
					echo '</div>';
				} else {
					include_once "../../inc/signup/autogen.php";
					$qry_insert = "INSERT INTO tblsysuser SET 
							usercode=:idx, 
							username=:younicknamex, 
							uemail=:xemail, 
							umobileno=:xphone, 
							fullname=:xfullname, 
							lname=:xlname, 
							fname=:xfname, 
							mname=:xmname, 
							address=:xaddress, 
							passcode=:passcodeshow, 
							ulevpos=6, 
							xposition=:xposition, 
							ustatz=1, 
							gogfirstime=0, 
							pin=:pin"
						;
					$stmt_insert = $cnn->prepare($qry_insert);
					$younickname = $_POST['younickname'];
					$xemail = $_POST['xemail'];
					$xphone = $_POST['xphone'];
					$xlname = $_POST['lname'];
					$xfname = $_POST['fname'];
					$xmname = $_POST['mname'];
					$xfullname = trim($xfname).' '.trim(substr($xmname, 0, 1)).'. '.trim($xlname);
					$xaddress = $_POST['zaddress'];
					$passcodeshow = md5($_POST['passcodeshow']);
					$xposition = "Customer";
					$permitted_chars2 = '0123456789';
					$pin = substr(str_shuffle($permitted_chars2), 0, 6);
					$stmt_insert->bindParam(':idx', $fromidted);
					$stmt_insert->bindParam(':younicknamex', $younickname);
					$stmt_insert->bindParam(':xemail', $xemail);
					$stmt_insert->bindParam(':xlname', $xlname);
					$stmt_insert->bindParam(':xfname', $xfname);
					$stmt_insert->bindParam(':xmname', $xmname);
					$stmt_insert->bindParam(':xfullname', $xfullname);
					$stmt_insert->bindParam(':xphone', $xphone);
					$stmt_insert->bindParam(':xaddress', $xaddress);
					$stmt_insert->bindParam(':passcodeshow', $passcodeshow);
					$stmt_insert->bindParam(':xposition', $xposition);
					$stmt_insert->bindParam(':pin', $pin);
					$stmt_insert->execute();

					$err_msg = "Save successfully. ".$fromidted;
					echo "<script>alert('".$err_msg."');</script>";
					echo "<script>window.open('../../routes/login?&username=".$younickname."&passcode=".$_POST['passcodeshow']."','_self');</script>";
				}
			}
		}
	} catch (PDOException $error) {
		die('ERROR: ' . $error->getMessage());
	}
	
?>