<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates  LEFT JOIN order_item ON food_order.fid=order_item.fid
	$id=$_GET['id'];
	$sql="select * from item_order where fid=$id";
	$ans=mysqli_query($con,$sql);
                                          
                                           
?>



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
											<th>NO.</th>
                                            <th>Item Name</th>
											
                                            <th>QUANTITY</th>
                                            <th>Custom</th>
                                           
											
									    </tr>
                                    </thead>
                                    <tbody>
									<?php  while($r=mysqli_fetch_array($ans))
                                            {
                                            	?>
                                        <tr>
                                        	<td><?php echo $r['fid']?></td>
											<td><?php echo $r['item_name']?></td>
											
											<td><?php echo $r['item_qty']?></td>
											<td><?php echo $r['custom']?></td>
										
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












<?php
	require "footer.php";
?>	 