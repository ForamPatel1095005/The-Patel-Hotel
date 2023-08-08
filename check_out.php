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
                                        <h2 class="card-title">Check OUT</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
								<!------------------------------------------------------------>
									<?php if(isset($_GET['id']) && isset($_GET['rbid']) && isset($_GET['bnid']) && isset($_GET['rn']))
										  {
											$id=$_GET['id'];
											$rbid=$_GET['rbid'];
											$rn=$_GET['rn'];?>
											
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
									<?php $sql1="select reg.*,room_book.*,book_no.* from reg,room_book,book_no where reg.id='$id' and room_book.rb_id='$rbid' and book_no.id='$id' and book_no.rb_id='$rbid' and book_no.room_no='$rn' and book_no.cout='0000-00-00 00:00:00' ";
											//$sql1="select reg.*,room_book.*,book_no.* from reg,room_book,book_no where book_no.id=reg.id and book_no.rb_id=room_book.rb_id";
											$result1=mysqli_query($con,$sql1);
											while($r1=mysqli_fetch_assoc($result1)):?>
                                        <tr>
											<td><?php echo $r1['fname']?></td>
											<td><?php echo $r1['mob']?></td>
											<td><?php echo $r1['b_date']?></td>
											<td><b style="color:red"><?php echo $r1['room_no']?></b></td>
											<td><?php echo $r1['room_type']?></td>
											<td><b style="color:red"><?php echo $r1['price']?></b></td>
											<td><?php echo $r1['cin']?></td>
									<?php 	if($r1['cout']=="0000-00-00 00:00:00")
											{ ?>
												<td><a onclick="return confirm('Are You sure For Check OUT?')" href="check_out.php?bnid1=<?php echo $r1['bn_id']?>&rn1=<?php echo $r1['room_no']?>"  class="btn btn-danger">OUT</a></td>
									<?php   }
											else
											{ ?>
												<td><?php echo $r1['cout']?></td>
									<?php   } ?>
										</tr>
									<?php endwhile;?>
									<!--------------------------------------------------------------------->
									</tbody>
							<?php 	}	?>
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
<!-------------------------------------check out ------------------------------------>
<?php 
	if(isset($_GET['rn1']) && isset($_GET['bnid1']))
	{
		$bnid1=$_GET['bnid1'];
		$rn1=$_GET['rn1'];
		
		$sql3="update room_no set status=0 where room_no='$rn1'";
		$result3=mysqli_query($con,$sql3);
		if($result3)
		{
				date_default_timezone_set("Asia/Kolkata");
				$co=date('Y-n-d G:i:00');
				$sql4="update book_no set cout='$co' where bn_id='$bnid1'";
				$result4=mysqli_query($con,$sql4);
				if($result4)
				{
					//echo '<script> alert("room status updated") </script>';
					echo '<script> alert("Check OUT Updated!!") </script>';
				}
				else
				{
					echo '<script> alert("room status not updated")</script>';
				}
				
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
 
 