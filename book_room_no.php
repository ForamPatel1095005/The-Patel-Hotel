<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
	//$sql="select * from reg";
?>
<!-- starting coding-->
<!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="card-title">Room Booking Info./Edit</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
								<!------------------------------------------------------------>
									<?php if(isset($_GET['id']) && isset($_GET['rbid']))
										  {
											$id=$_GET['id'];
											$rbid=$_GET['rbid'];?>
											
									<thead>
                                        <tr>
                                            <th>NAME</th>
											<th>MO</th>
                                            <th>B DATE</th>
                                            <th>R NO</th>
											<th>R TYPE</th>
											<th>PRICE</th>
                                            <th>IN</th>
											<th>OUT</th>
										</tr>
                                    </thead>
                                    <tbody>
									<?php $sql1="select reg.*,room_book.*,book_no.* from reg,room_book,book_no where reg.id='$id' and room_book.rb_id='$rbid' and book_no.id='$id' and book_no.rb_id='$rbid' ";
											//$sql1="select reg.*,room_book.*,book_no.* from reg,room_book,book_no where book_no.id=reg.id and book_no.rb_id=room_book.rb_id";
											$result1=mysqli_query($con,$sql1);
											while($r1=mysqli_fetch_assoc($result1)):?>
                                        <tr>
											<td><?php echo $r1['fname']?></td>
											<td><?php echo $r1['mob']?></td>
											<td><?php echo $r1['b_date']?></td>
											<td><b style="color:red"><?php echo $r1['room_no']?></b></td>
											<td><?php echo $r1['room_type']?></td>
											<td><b style="color:red"><?php echo $r1['price']." "?> &#8377 </b></td>
											<td><?php echo $r1['cin']?></td>
									<?php 	if($r1['cout']=="0000-00-00 00:00:00")
											{ ?>
												<td><a onclick="return confirm('Are You sure?')" href="check_out.php?id=<?php echo $r1['id']?>&rbid=<?php echo $r1['rb_id']?>&bnid=<?php echo $r1['bn_id']?>&rn=<?php echo $r1['room_no']?>"  class="btn btn-danger">OUT</a></td>
									<?php   }
											else
											{ ?>
												<td><?php echo $r1['cout']?></td>
									<?php   } ?>
										</tr>
									<?php endwhile;?>
									<!--------------------------------------------------------------------->
									</tbody>
							<?php 	}
									else
									{ ?>
                                    <!-------------------start book room no---------------------->
									<thead>
                                        <tr>
                                            <th>NAME</th>
											<th>MO</th>
                                            <th>B DATE</th>
                                            <th>R NO</th>
											<th>R TYPE</th>
											<th>PRICE</th>
                                            <th>IN</th>
											<th>OUT</th>
										<!--<th>EDIT</th>-->
											<th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
											$sql2="select reg.*,room_book.*,book_no.* from reg,room_book,book_no where book_no.id=reg.id and book_no.rb_id=room_book.rb_id order by bn_id desc";
											$result2=mysqli_query($con,$sql2);
											while($r2=mysqli_fetch_assoc($result2)):?>
                                        <tr>
											<td><?php echo $r2['fname']?></td>
											<td><?php echo $r2['mob']?></td>
											<td><?php echo $r2['b_date']?></td>
											<td><b style="color:red"><?php echo $r2['room_no']?></b></td>
											<td><?php echo $r2['room_type']?></td>
											<td><b style="color:red"><?php echo $r2['price']." "?> &#8377 </b></td>
											<td><?php echo $r2['cin']?></td>
											<?php 	if($r2['cout']=="0000-00-00 00:00:00")
											{ ?>
												<td><a onclick="return confirm('Are You sure?')" href="check_out.php?id=<?php echo $r2['id']?>&rbid=<?php echo $r2['rb_id']?>&bnid=<?php echo $r2['bn_id']?>&rn=<?php echo $r2['room_no']?>" class="btn btn-danger">OUT</a></td>
												<!--<td><a onclick="return confirm('You Can Edit After check Out!')" href="book_room_no.php" class="btn btn-success">EDIT</a></td>-->
									<?php   }
											else
											{ ?>
												<td><?php echo $r2['cout']?></td>
												<!--<td><a onclick="return confirm('Are You sure?')" href="update_book_room_no.php?bnid=<?php echo $r2['bn_id']?>&rn=<?php echo $r2['room_no']?>" class="btn btn-success">EDIT</a></td>-->
									<?php   } ?>
											<td><a onclick="return confirm('Are You sure?')" href="book_room_no.php?drn=<?php echo $r2['room_no']?>" class="btn btn-danger">DELETE</a></td>
											</tr>
									<?php endwhile;?>
									<!-------------------end book room no---------------------->
									</tbody>
							<?php   } ?>
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
	if(isset($_GET['drn']))
	{
		//$bnid=$_GET['bnid'];
		$drn=$_GET['drn'];
		
		$sql3="update room_no set status=0 where room_no='$drn'";
		$result3=mysqli_query($con,$sql3);
		if($result3)
		{
				$sql4="delete from book_no where room_no='$drn' ";
				$result4=mysqli_query($con,$sql4);
				if($result4)
				{
					//echo '<script> alert("room status updated") </script>';
					echo '<script> alert("DELETED ..") </script>';
				}
				else
				{
					echo '<script> alert("room status not updated") </script>';
				}
				//echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="book_room_no.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="book_room_no.php" </script>';
		}
	}
?>
<!--------------------------------------------------------------------------------------> 
 
 