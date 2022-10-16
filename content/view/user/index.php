<?php
	include_once "../../content/template-part/".$themename."/dashboard-navbar.php";
	include_once "../../content/template-part/{$themename}/dashboard-navbar-top.php";

	$usertypeget = isset($_GET['usertype']) ? $_GET['usertype'] : '';
	if ($usertypeget) {
		$labelusertype = $usertypeget;
	} else {
		$labelusertype = 'User';
	}
?>

<script>
	function showResult(str) {
		if (str == "") {
			location.reload();
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("viewRecordz").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "../../content/view/user/filter.php?searchforx=" + str, true);
			xmlhttp.send();
		}
	}

	function grpResult(str) {
		if (str == "") {
			location.reload();
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("viewRecordz").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "../../content/view/user/groupby.php?groupbyx=" + str, true);
			xmlhttp.send();
		}
	}

	function dateResultx(str) {
		if (str == "") {
			location.reload();
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("viewRecordz").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "../../content/view/user/grpbydate.php?fltrbydate=" + str, true);
			xmlhttp.send();
		}
	}

	function trash(id) {
		var answer = confirm('Delete record User ID: '+id+' ?');
		if (answer) {
			window.location = '../../content/view/user/deteled.php?upidid=' + id;
		}
	}
</script>

<main class="page-content">
	<div class="container-fluid bg-light-opacity">
		<div class="d-flex">
			<h4 class="mr-2 mb-2"><?php echo $labelusertype; ?></h4>
			<a href="../../routes/user/addnew" class="btn btn-danger mr-2 mb-2">Add New</a>

			<div class="mr-2 d-none">
				<form>
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text">Filter</span>
						</div>
						<input type="text" class="form-control" id="searchforx" name="searchforx" onkeyup="showResult(this.value);" placeholder="by text">
					</div>
				</form>
			</div>

			<div class="mr-2 d-none">
				<form>
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text">Group by</span>
						</div>
						<input type="text" class="form-control" id="groupbyx" name="groupbyx" onkeyup="grpResult(this.value);" list="lstgroupby" placeholder="text">
						<datalist id="lstgroupby">
							<?php
								$tblname = "tblsysuser";
								$prim_id = "usercode";
								include_once "../../inc/cnndb.php";
								$qry_grpby = $cnn->prepare("SELECT xposition FROM {$tblname} WHERE deletedx=0 GROUP BY xposition ORDER BY {$prim_id} ASC");
								$qry_grpby->execute();
								$rslt_grpby = $qry_grpby->setFetchMode(PDO::FETCH_ASSOC);
								foreach ($qry_grpby as $row_grpby) {
									echo "<option value='".$row_grpby['xposition']."'>";
								}
							?>
						</datalist>
					</div>
				</form>
			</div>

			<div class="mr-2 d-none">
				<form>
					<div class="input-group input-group-sm date" id="datetimepicker1">
						<div class="input-group-prepend">
							<span class="input-group-text">Date filter</span>
						</div>
						<input type="date" class="form-control" id="fltrbydate" name="fltrbydate" onchange="dateResultx(this.value);">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</form>
			</div>

			<div class="mr-2">
				<?php
					switch (true) {
						case ($usertypeget=='Administrator'):
							?>
								<a href="../../routes/user" class="btn btn-outline-secondary">All User</a>
								<a href="../../routes/user?usertype=Administrator" class="btn btn-secondary">Administrator</a>
								<a href="../../routes/user?usertype=Cashier" class="btn btn-outline-secondary">Cashier</a>
								<a href="../../routes/user?usertype=Rider" class="btn btn-outline-secondary">Rider</a>
								<a href="../../routes/user?usertype=Customer" class="btn btn-outline-secondary">Customer</a>
							<?php
						break;

						case ($usertypeget=='Cashier'):
							?>
								<a href="../../routes/user" class="btn btn-outline-secondary">Cashier</a>
								<a href="../../routes/user?usertype=Administrator" class="btn btn-outline-secondary">Administrator</a>
								<a href="../../routes/user?usertype=Cashier" class="btn btn-secondary">Cashier</a>
								<a href="../../routes/user?usertype=Rider" class="btn btn-outline-secondary">Rider</a>
								<a href="../../routes/user?usertype=Customer" class="btn btn-outline-secondary">Customer</a>
							<?php
						break;

						case ($usertypeget=='Rider'):
							?>
								<a href="../../routes/user" class="btn btn-outline-secondary">Rider</a>
								<a href="../../routes/user?usertype=Administrator" class="btn btn-outline-secondary">Administrator</a>
								<a href="../../routes/user?usertype=Cashier" class="btn btn-outline-secondary">Cashier</a>
								<a href="../../routes/user?usertype=Rider" class="btn btn-secondary">Rider</a>
								<a href="../../routes/user?usertype=Customer" class="btn btn-outline-secondary">Customer</a>
							<?php
						break;

						case ($usertypeget=='Customer'):
							?>
								<a href="../../routes/user" class="btn btn-outline-secondary">Customer</a>
								<a href="../../routes/user?usertype=Administrator" class="btn btn-outline-secondary">Administrator</a>
								<a href="../../routes/user?usertype=Cashier" class="btn btn-outline-secondary">Cashier</a>
								<a href="../../routes/user?usertype=Rider" class="btn btn-outline-secondary">Rider</a>
								<a href="../../routes/user?usertype=Customer" class="btn btn-secondary">Customer</a>
							<?php
						break;

						default:
							?>
								<a href="../../routes/user" class="btn btn-secondary">All User</a>
								<a href="../../routes/user?usertype=Administrator" class="btn btn-outline-secondary">Administrator</a>
								<a href="../../routes/user?usertype=Cashier" class="btn btn-outline-secondary">Cashier</a>
								<a href="../../routes/user?usertype=Rider" class="btn btn-outline-secondary">Rider</a>
								<a href="../../routes/user?usertype=Customer" class="btn btn-outline-secondary">Customer</a>
							<?php
						break;
					}
				?>
			</div>
		</div>

		<div id="viewRecordz" class="table-responsive">
			<?php
				include_once "viewall.php";
			?>
		</div>

		<?php include_once "../../inc/paging.php"; ?>
	</div>
</main>