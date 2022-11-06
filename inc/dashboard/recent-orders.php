					<div class="table-responsive">
						<table id="listRecViewNRecentOrd69" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="bg-menprim-locor border">ID</th>
									<th class="bg-menprim-locor border">Product</th>
									<th class="bg-menprim-locor border">Qty</th>
									<th class="bg-menprim-locor border">Cost</th>
									<th class="bg-menprim-locor border">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qry_recentordxd = "SELECT `tbl_order_item`.`order_id`, `tbl_order_item`.`item_name`, `tbl_order_item`.`qty`, `tbl_order_item`.`total_amt`, `tbl_order_customer`.`status` FROM tbl_order_item INNER JOIN tbl_order_customer ON `tbl_order_customer`.`order_id` = `tbl_order_item`.`order_id` WHERE `tbl_order_item`.`deleted`=0 AND `tbl_order_customer`.`status`=:statusk ORDER BY `tbl_order_item`.`order_id` DESC";

									$stmt_recentordxd = $cnn->prepare($qry_recentordxd);
									$stratuietu = 'Unpaid';
									$stmt_recentordxd->bindParam(':statusk', $stratuietu);
									$stmt_recentordxd->execute();
									$cnt_recentordxd = $stmt_recentordxd->rowCount();
									$xno_recentordxd = 0;

									if ($cnt_recentordxd > 0) {

									} else {
										echo '<label>No Recent Order.</label>';
									}

									for($i=0; $row_recentordxd = $stmt_recentordxd->fetch(); $i++) {
										$xno_recentordxd++;
										$orderidrecentordxd=$row_recentordxd['order_id'];
										$itemnamerecentordxd=$row_recentordxd['item_name'];
										$qtyrecentordxd=$row_recentordxd['qty'];
										$totalamtrecentordxd=$row_recentordxd['total_amt'];
										$statusrecentordxd=$row_recentordxd['status'];
										if ($statusrecentordxd=='Unpaid') {
											$statusrecentordxd2='Pending';
										}
								?>
									<tr>
										<td class="text-left"><?php echo $orderidrecentordxd; ?></td>
										<td class="text-left chr-limit10"><?php echo $itemnamerecentordxd; ?></td>
										<td class="text-left"><?php echo $qtyrecentordxd; ?></td>
										<td class="text-left"><?php echo $dcurrencyx.number_format($totalamtrecentordxd,2); ?></td>
										<td class="text-left"><?php echo $statusrecentordxd2; ?></td>
									</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>