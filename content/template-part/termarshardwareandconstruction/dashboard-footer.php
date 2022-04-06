<?php
	$chckfledashf = file_exists("../../assets/css/style.css");
	if ($chckfledashf) {
		$dirbakf = "../../";
	} else {
		$chckfledashf1 = file_exists("../../../assets/css/style.css");
		if ($chckfledashf1) {
			$dirbakf = "../../../";
		} else {
			$dirbakf = "../../../../";
		}
	}
?>

	</div>

	<?php include_once $dirbakf."content/view/item-pay/index.php" ?>
	<script src="<?php echo $dirbakf; ?>assets/js/dashboard.js"></script>
	<script src="<?php echo $dirbakf; ?>assets/js/script.js"></script>
</body>
</html>