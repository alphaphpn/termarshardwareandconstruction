					<ul id="nav-tab-sales" class="nav nav-tabs mb-2">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dailysales">DAILY</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#monthlysales">MONTHLY</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#yearlysales">YEARLY</a></li>
					</ul>

					<div class="tab-content" id="nav-tabContent-Sales">
						<div id="dailysales" class="tab-pane fade show active">
							<div class="table-responsive">
								<table id="listRecView" class="table table-striped table-hover">
									<thead>
										<tr>
											<th class="bg-menprim-locor border">Product</th>
											<th class="bg-menprim-locor border">Quantity</th>
											<th class="bg-menprim-locor border">Price</th>
											<th class="d-none border">Ctrl#</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											$qrynz1 = "SELECT `tbl_order_item`.`item_order_id`, `tbl_order_item`.`item_name`, `tbl_order_item`.`price`, `tbl_order_customer`.`status`, SUM(`tbl_order_item`.`qty`) AS qty, `tbl_order_customer`.`deleted` FROM tbl_order_item INNER JOIN tbl_order_customer ON `tbl_order_item`.`order_id` = `tbl_order_customer`.`order_id` WHERE `tbl_order_customer`.`deleted`=0 AND `tbl_order_customer`.`status`=:salespaid AND DATE(`tbl_order_customer`.`modified`)=:detodey GROUP BY `tbl_order_item`.`item_id` ORDER BY `tbl_order_item`.`item_order_id` DESC";
											$stmtnz1 = $cnn->prepare($qrynz1);
											$salespaid = 'Paid';
											$stmtnz1->bindParam(':salespaid', $salespaid);
											$stmtnz1->bindParam(':detodey', $datenowen);
											$stmtnz1->execute();
											$cntmenz1 = $stmtnz1->rowCount();
											$xnonz1 = 0;

											if ($cntmenz1 > 0) {

											} else {
												echo '<label>No Sales today.</label>';
											}

											for($i=0; $rownz1 = $stmtnz1->fetch(); $i++) {
												$xnonz1++;
												$item_namenz1=$rownz1['item_name'];
												$qtynz1=$rownz1['qty'];
												$pricenz1=$rownz1['price'];
												$id2nz1=$rownz1['item_order_id'];
										?>
											<tr>
												<td class="text-left chr-limit10"><?php echo $item_namenz1; ?></td>
												<td><?php echo $qtynz1; ?></td>
												<td class="text-left"><?php echo $dcurrencyx.$pricenz1; ?></td>
												<td class="d-none"><?php echo $id2nz1; ?></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="monthlysales" class="tab-pane fade">
							<div class="table-responsive">
								<table id="listRecView2" class="table table-striped table-hover">
									<thead>
										<tr>
											<th class="bg-menprim-locor border">Product</th>
											<th class="bg-menprim-locor border">Quantity</th>
											<th class="bg-menprim-locor border">Price</th>
											<th class="d-none border">Ctrl#</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											$qrynz2 = "SELECT `tbl_order_item`.`item_order_id`, `tbl_order_item`.`item_name`, `tbl_order_item`.`price`, `tbl_order_customer`.`status`, SUM(`tbl_order_item`.`qty`) AS qty, `tbl_order_customer`.`deleted` FROM tbl_order_item INNER JOIN tbl_order_customer ON `tbl_order_item`.`order_id` = `tbl_order_customer`.`order_id` WHERE `tbl_order_customer`.`deleted`=0 AND `tbl_order_customer`.`status`=:salespaidz2 AND YEAR(date(`tbl_order_customer`.`modified`))=:myearz2 AND MONTH(date(`tbl_order_customer`.`modified`))=:mmonthz2 GROUP BY `tbl_order_item`.`item_id` ORDER BY `tbl_order_item`.`item_order_id` DESC";
											$stmtnz2 = $cnn->prepare($qrynz2);
											$salespaidz2 = 'Paid';
											$hjyearz2 = date("Y", strtotime($mdatenowen));
											$hjmonthz2 = date("m", strtotime($mdatenowen));
											$stmtnz2->bindParam(':myearz2', $hjyearz2);
											$stmtnz2->bindParam(':mmonthz2', $hjmonthz2);
											$stmtnz2->bindParam(':salespaidz2', $salespaidz2);
											$stmtnz2->execute();
											$cntmenz2 = $stmtnz2->rowCount();
											$xnonz2 = 0;

											if ($cntmenz2 > 0) {

											} else {
												echo '<label>No Sales this Month.</label>';
											}

											for($i=0; $rownz2 = $stmtnz2->fetch(); $i++) {
												$xnonz2++;
												$item_namenz2=$rownz2['item_name'];
												$qtynz2=$rownz2['qty'];
												$pricenz2=$rownz2['price'];
												$id2nz2=$rownz2['item_order_id'];
										?>
											<tr>
												<td class="text-left chr-limit10"><?php echo $item_namenz2; ?></td>
												<td><?php echo $qtynz2; ?></td>
												<td class="text-left"><?php echo $dcurrencyx.$pricenz2; ?></td>
												<td class="d-none"><?php echo $id2nz2; ?></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="yearlysales" class="tab-pane fade">
							<div class="table-responsive">
								<table id="listRecView3" class="table table-striped table-hover">
									<thead>
										<tr>
											<th class="bg-menprim-locor border">Product</th>
											<th class="bg-menprim-locor border">Quantity</th>
											<th class="bg-menprim-locor border">Price</th>
											<th class="d-none border">Ctrl#</th>
										</tr>
									</thead>
									<tbody>
										<?php
											
											$qrynz3 = "SELECT `tbl_order_item`.`item_order_id`, `tbl_order_item`.`item_name`, `tbl_order_item`.`price`, `tbl_order_customer`.`status`, SUM(`tbl_order_item`.`qty`) AS qty, `tbl_order_customer`.`deleted` FROM tbl_order_item INNER JOIN tbl_order_customer ON `tbl_order_item`.`order_id` = `tbl_order_customer`.`order_id` WHERE `tbl_order_customer`.`deleted`=0 AND `tbl_order_customer`.`status`=:salespaidz3 AND YEAR(date(`tbl_order_customer`.`modified`))=:myearz3 GROUP BY `tbl_order_item`.`item_id` ORDER BY `tbl_order_item`.`item_order_id` DESC";
											$stmtnz3 = $cnn->prepare($qrynz3);
											$salespaidz3 = 'Paid';
											$hjyearz3 = date("Y", strtotime($mdatenowen));
											$stmtnz3->bindParam(':myearz3', $hjyearz3);
											$stmtnz3->bindParam(':salespaidz3', $salespaidz3);
											$stmtnz3->execute();
											$cntmenz3 = $stmtnz3->rowCount();
											$xnonz3 = 0;

											if ($cntmenz3 > 0) {

											} else {
												echo '<label>No Sales this year.</label>';
											}

											for($i=0; $rownz3 = $stmtnz3->fetch(); $i++) {
												$xnonz3++;
												$item_namenz3=$rownz3['item_name'];
												$qtynz3=$rownz3['qty'];
												$pricenz3=$rownz3['price'];
												$id2nz3=$rownz3['item_order_id'];
										?>
											<tr>
												<td class="text-left chr-limit10"><?php echo $item_namenz3; ?></td>
												<td><?php echo $qtynz3; ?></td>
												<td class="text-left"><?php echo $dcurrencyx.$pricenz3; ?></td>
												<td class="d-none"><?php echo $id2nz3; ?></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>