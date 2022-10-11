<?php

	if(empty($_SESSION["usercode"])) {
		
	} else {
		header('location:../../');
	}

	include_once "../../content/template-part/".$themename."/partner-navbar.php";
	include_once "../../inc/cnndb.php";
	include_once "../../inc/random-code/index.php";
	
?>

<div class="w768center">
	<div class="card mt-4">
		<div class="card-header text-center">
			<h2>Signup</h2>
			<div>
				<a href="../login" >Login</a> | <a href="">Refresh</a>
			</div>
		</div>

		<form method="post" class="needs-validation" novalidate>
		<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="lname" placeholder="Last Name (required)" name="lname" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="fname" placeholder="First Name (required)" name="fname" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname">
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="younickname" placeholder="Username (required)" name="younickname" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="xemail" placeholder="E-mail (required)" name="xemail" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="xphone" placeholder="Phone (required)" name="xphone" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<textarea class="form-control" id="zaddress" placeholder="Address (required)" name="zaddress" autofocus required></textarea>
								<div class="input-group-append">
									<button id="updaddress" class="btn btn-success" type="button" data-toggle="modal" data-target="#ymModalAddress">Address</button>
								</div>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
							<label>Suggested Password</label>
							<div class="input-group mb-3" id="show_hide_password1">
								<input type="text" class="form-control" id="passcodeshow" value="<?php echo $randSSPass; ?>" placeholder="Password (required)" name="passcodeshow" required>
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fa fa-eye" aria-hidden="true" onclick="PwShowHide()"></i>
									</span>
								</div>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
								<!-- div class="invalid-feedback">Note: Password must contain letters and numbers. Minimum of 6 and Maximum of 12 character.</div -->
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="checkbox" name="acceptme" class="form-control form-check-input" style="cursor: pointer;" required>
								<p class="my-auto">I have agree with the <a href="#">Terms and Conditions</a>.</p>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please accept the terms to proceed.</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3"></div>
				</div>

				<?php include_once "../../inc/signup/index.php"; ?>
		</div>

		<div class="card-footer">
			<div class="row">
				<div class="col-sm-6 mb-2">
					<a href="../../" class="text-dark text-decoration-none">
						<i>&#8592;</i> Back to Homepage
					</a>
				</div>
				<div class="col-sm-6 mb-2 text-right">
					<button type="submit" class="btn btn-block btn-info w-auto ml-auto" name="btnSubmit">Submit</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

<?php include_once "../../inc/address/index.php"; ?>