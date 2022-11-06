					<div class="table-responsive">
						<table id="listRecViewNCustmz24" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="bg-menprim-locor border">Customer</th>
									<th class="bg-menprim-locor border">Order(s)</th>
									<th class="bg-menprim-locor border">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qry_newcustmr = "SELECT `tblsysuser`.`extname`, `tblsysuser`.`img_url`, `tbl_order_customer`.`receiver`, `tbl_order_customer`.`receiver_phone`, `tbl_order_customer`.`remail`, COUNT(DISTINCT `tbl_order_customer`.`order_id`) AS orderz, SUM(`tbl_order_customer`.`sub_total`) AS sumorderz, `tbl_order_customer`.`modified`, `tbl_order_customer`.`customer_id` FROM tbl_order_customer INNER JOIN tblsysuser ON `tbl_order_customer`.`customer_id` = `tblsysuser`.`usercode` WHERE `tbl_order_customer`.`deleted`=0 AND `tbl_order_customer`.`status`=:salezpaid AND DATE(`tbl_order_customer`.`modified`)=:detodeyz GROUP BY `tbl_order_customer`.`customer_id` ORDER BY `tbl_order_customer`.`order_id` DESC";

									$stmt_newcustmr = $cnn->prepare($qry_newcustmr);
									$salezpaid = 'Unpaid';
									$stmt_newcustmr->bindParam(':salezpaid', $salezpaid);
									$stmt_newcustmr->bindParam(':detodeyz', $datenowen);
									$stmt_newcustmr->execute();
									$cnt_newcustmr = $stmt_newcustmr->rowCount();
									$xno_newcustmr = 0;

									if ($cnt_newcustmr > 0) {

									} else {
										echo '<label>No Pending Order.</label>';
									}

									for($i=0; $row_newcustmr = $stmt_newcustmr->fetch(); $i++) {
										$xno_newcustmr++;
										if ($row_newcustmr['img_url']) {
											$imgpcurl="../../".$row_newcustmr['img_url'];
										} else {
											$imgpcurl="../../storage/img/no-image.jpg";
										}
										$custmrnew=$row_newcustmr['receiver'];
										$receiverphone=$row_newcustmr['receiver_phone'];
										$remail=$row_newcustmr['remail'];
										$numboforders=$row_newcustmr['orderz'];
										$sumtotordrs=$row_newcustmr['sumorderz'];
								?>
									<tr>
										<td class="text-left">
											<img class="acct-img-sqr" src="<?php echo $imgpcurl; ?>"><br>
											<?php echo $custmrnew.'<br>'.$receiverphone.'<p class="m-0" style="font-size: 8px;">'.$remail.'</p>'; ?>
										</td>
										<td><?php echo $numboforders; ?></td>
										<td class="text-left"><?php echo $dcurrencyx.number_format($sumtotordrs,2); ?></td>
									</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>