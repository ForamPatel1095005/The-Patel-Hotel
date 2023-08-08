<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates  LEFT JOIN order_item ON food_order.fid=order_item.fid
	
	$sql="select * from order_item order by oi_id desc";
	$ans=mysqli_query($con,$sql);
                                          
                                           
?>
<!-- starting coding-->
<!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="card-title">Item Order Information</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
											<th>ITEM</th>
											<th>QUANTITY</th>
                                            <th>EXTRA</th>
                                            <th>TOTAL</th>
											<th>G TOTAL</th>
											<th>R NO</th>
											<th>DATE</th>
											<th>DELETE</th>
									    </tr>
                                    </thead>
                                    <tbody>
									<?php  while($r=mysqli_fetch_array($ans))
                                            {
                                            	?>
                                        <tr>
											<td>
											<?php 
											 $item = explode(',', $r['ii_id']);
													foreach ($item as $i) {
														if ($i !== '') { // because before first comma or after last can be empty
																//echo $i ."</br>". PHP_EOL;
																$isn="select iname from item_info where ii_id='$i'";
																$risn=mysqli_query($con,$isn);
																while($ri=mysqli_fetch_assoc($risn))
																{
																	echo $ri['iname']." / ". PHP_EOL;
																}
													}
													}
											?></td>
											<td>
											<?php 
											 $qty = explode(',', $r['qty']);
													foreach ($qty as $q) {
														if ($q !== '') { // because before first comma or after last can be empty
															echo $q ." / ". PHP_EOL;
													}
													}
											?></td>
											<td><?php echo $r['custom']?></td>
											<td>
											<?php 
											 $item = explode(',', $r['ii_id']);
													foreach ($item as $i) {
														if ($i !== '') {
																$qty = explode(',', $r['qty']);
																foreach ($qty as $q){
																	$sum= array();
																	$isn="select price from item_info where ii_id='$i'";
																	$risn=mysqli_query($con,$isn);
																	while($ri=mysqli_fetch_assoc($risn))
																	{
																		$sum[]=$ri['price'] * $q;
																	}
																	$s1=implode('/', $sum);
																}
																//echo print_r($sum);
																$s2=$s1."/";
																echo $s2;
																//echo array_sum($sum);
														}
													}
											?></td>
											<?php 
												if($r['price']=='')
												{
											?>
												<td><a href="item_order_info.php?idd1=<?php echo $r['oi_id']?>&gt=
											<?php	$item = explode(',', $r['ii_id']);
													foreach ($item as $i) {
														if ($i !== '') {
																$qty = explode(',', $r['qty']);
																foreach ($qty as $q){
																	$sum= array();
																	$isn="select price from item_info where ii_id='$i'";
																	$risn=mysqli_query($con,$isn);
																	while($ri=mysqli_fetch_assoc($risn))
																	{
																		$sum[]=$ri['price'] * $q;
																	}
																	$s1=implode('/', $sum);
																}
																//echo print_r($sum);
																$s2=$s1."/";
																echo $s2;
																//echo array_sum($sum);
														}
													}?>" class="btn btn-success">TOTAL</a></td>
											<?php
												}
												else
												{
											?>
												<td>
												<?php 	
														$price= explode('/', $r['price']);
														$t=0;
														foreach ($price as $p) {
															$t = $t + intval($p);
														}?>
														<b style="color:red"><?php echo $t." ";?> &#8377 </b>
												</td>
											<?php } ?>
											<td><b style="color:blue"><?php echo $r['room_no']?></b></td>
											<td><?php echo $r['odate']?></td>
											<td><a onclick="return confirm('Are You sure?')" href="item_order_info.php?idd=<?php echo $r['oi_id']?>" class="btn btn-danger">DELETE</a></td>
													
										</tr>
									<?php 
								}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!------------------------------------- deleting data------------------------------------>
<?php 
	if(isset($_GET['idd']))
	{
		$idd=$_GET['idd'];
		
		$sql1="delete from order_item where oi_id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="item_order_info.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="item_order_info.php" </script>';
		}
	}
//--------------------------------------------------------------------------------------> 
	if(isset($_GET['idd1']) && isset($_GET['gt']) )
	{
		$idd1=$_GET['idd1'];
		$gt=$_GET['gt'];
		$sql1="update order_item set price='$gt' where oi_id='$idd1' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				//echo '<script> alert("Updated ..") </script>';
				echo '<script> window.location.href="item_order_info.php" </script>';
		}
		else
		{
				//echo '<script> alert("FAIL !!") </script>';
				echo '<script> window.location.href="item_order_info.php" </script>';
		}
	}
?>