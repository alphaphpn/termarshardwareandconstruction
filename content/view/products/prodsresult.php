<?php

	include_once "../../../inc/webconfig/conf.php";
	include_once "../../../inc/srvr.php";
	$cnn = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
	$product = trim($_GET['product']);
	$qryproduct = "SELECT * FROM tblitem WHERE name LIKE :product AND deletedx=0 ORDER BY name ASC";
	$stmtproduct = $cnn->prepare($qryproduct);
	$stmtproduct->bindValue(":product", '%'.$product.'%');
	$stmtproduct->execute();
	$num = $stmtproduct->rowCount();
	$xno = 0;

?>

<div class="d-flex flex-wrap justify-content-center py-3">
	<?php
		if ($num>0) {
			foreach ($stmtproduct as $row) {
				$xno++;
				extract($row);
				$id4img = 'xditem'.$item_id;
	?>

	<div class="card border-0 m-3 flex-fill" style="max-width: 220px;">
		<div class="card-header">
			<img id="<?php echo $id4img; ?>" class="card-img-top img-front-product" style="background-image: url('<?php echo $domainhome."content/theme/".$themename."/storage/img/item/ITEM".$item_id.".".$extnem; ?>');" data-item-id="<?php echo $item_id; ?>" data-unit="<?php echo $unit; ?>" data-currency="<?php echo $dcurrencyx; ?>" data-toggle="modal" data-target="#ymModalItemPreviewFront" data-item-name="<?php echo $name; ?>" data-price="<?php echo $sell_price; ?>" data-size="<?php echo $size; ?>" data-color="<?php echo $color; ?>" data-quality="<?php echo $quality; ?>" data-stock="<?php echo $stock_available; ?>" data-item-description="<?php echo $description; ?>" onclick="getIdOnClick(this.id);" data-value="<?php echo $domainhome."content/theme/".$themename."/storage/img/item/ITEM".$item_id.".".$extnem; ?>">
		</div>
		<div class="card-body text-right p-1">
			<h5 class="card-title mb-0"><?php echo $name; ?></h5>
			<p class="card-text mb-0"><?php echo $dcurrencyx.' '.number_format($sell_price,2); ?></p>
			<div class="text-center"><a href="#" class="btn btn-link" onclick="document.getElementById('<?php echo $id4img; ?>').click();">See details</a></div>		
		</div>
		<div class="card-footer">
			<a href="#" class="btn btn-danger w-100" onclick="fnAddToCartz(<?php echo $item_id; ?>); return false;">Add to Cart</a>
		</div>
	</div>

	<?php
			}
		} else {
	?>

	<div class="card border-0 m-3 flex-fill" style="max-width: 220px;">
		<div class="card-header">
			<img class="card-img-top img-front-product" src="<?php echo $domainhome; ?>storage/img/no-image.jpg" style="background-image: url('<?php echo $domainhome; ?>storage/img/no-image.jpg');" alt="No Item" data-toggle="modal" data-target="#ymModalItemPreviewFront">
		</div>
		<div class="card-body text-right">
			<h4 class="card-title">No Item Found.</h4>
		</div>
	</div>
	<?php
		}
	?>
</div>