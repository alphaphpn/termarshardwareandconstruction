<?php
	include_once "../../content/theme/".$themename."/frontend-navbar.php";
	include_once "../../content/theme/".$themename."/slick-home-banner.php";
?>

<div class="pt-5 pb-5" style="background-color: transparent;">
	<div id="products" class="<?php echo $contentwidth; ?>">
		<div class="row">
			<div class="col-lg-2"><h2>Products</h2></div>
			<div class="col-lg-10">
				<div class="input-group">
					<input id="category" type="text" class="form-control" placeholder="All Category" name="category" list="categoryList" style="max-width: max-content;">
					<datalist id="categoryList">
					<?php
						$stmtcategory = $cnn->prepare("SELECT * FROM tblitem GROUP BY category ORDER BY category ASC");
						$stmtcategory->execute();
						$resultcategory = $stmtcategory->setFetchMode(PDO::FETCH_ASSOC);
						foreach ($stmtcategory as $rowcategory) {
							echo "<option value='".$rowcategory['category']."'>";
						}
					?>
					</datalist>
				</div>
			</div>
		</div>

		<div id></div>
	</div>
</div>

<?php
	if ( empty($geomap) ) {
		echo "<p align='center'>Can't Load Map.</p>";
	} else {
		echo '<iframe class="responsive-iframe map-footer" src="https://maps.google.com/maps?q='.$geomap.'&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
	}
?>