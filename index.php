<?php     
	require "database.php";
	require "header.php";
	$sql="select reg.*,room_book.* from reg,room_book where room_book.id=reg.id order by rb_id desc ";
	$result=mysqli_query($con,$sql);
?>
<!-- starting coding-->
<!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="card-title">Room Booking</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
											<th>NAME</th>
											<th>MO</th>
                                            <th>FROM</th>
                                            <th>TO</th>
                                            <th>R</th>
											<th>R TYPE</th>
											<th>BOOK</th>
											<th>STATUS</th>
											<th>CANCEL</th>
											<th>IN</th>
											<th>OUT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['rb_id'];?></td>
											<td><?php echo $r['fname']?></td>
											<td><?php echo $r['mob']?></td>
											<td><?php echo $r['f_date']?></td>
											<td><?php echo $r['t_date']?></td>
											<td><?php echo $r['rooms'];?></td>
											<td><b style="color:orange"><?php echo $r['room_type']?></b></td>
											<td><?php echo $r['b_date']?></td>
											<?php if($r['status']=="P") {?>
													<td><a href="index.php?rbid=<?php echo $r['rb_id'] ?>&C" class="btn btn-danger">P</a></td>
													<td></td>
													<td></td>
													<td></td>
											<?php } if($r['status']=="C") {?>
													<td><a  class="btn btn-success">C</a></td>
													<td></td>
													<?php 
														$cr=$r['rb_id'];
														$cbd=$r['b_date'];
														$sql1="select * from room_book where rb_id='$cr' and b_date='$cbd'";
														$result1=mysqli_query($con,$sql1);
														/*print_r($sql1);
														die();*/
														if(mysqli_num_rows($result1) == $r['rooms'])
														{
													?>
														<td>Done</td>
													<?php	
														}
														else
														{
													?>
														<td><a href="check_rooms.php?id=<?php echo $r['id']?>&rbid=<?php echo $r['rb_id']?>&rt=<?php echo $r['room_type']?>&bd=<?php echo $r['b_date']?>" class="btn btn-primary">IN</a></td>
													<?php 
														}
													?>
													<?php 
														$cr1=$r['rb_id'];
														$cbd1=$r['b_date'];
														$sql2="select * from book_no where rb_id='$cr1' and cin='$cbd1' and cout!='0000-00-00 00:00:00'";
														$result2=mysqli_query($con,$sql2);
														if(mysqli_num_rows($result2)==$r['rooms'])
														{
													?>
														<td>Done</td>
													<?php	
														}
														else
														{
													?>
														<td><a href="book_room_no.php?id=<?php echo $r['id']?>&rbid=<?php echo $r['rb_id']?>" class="btn btn-danger">OUT</a></td>
													<?php 
														}
													?>
											<?php } if($r['status']=="") {?>
													<td><a href="index.php?rbid=<?php echo $r['rb_id'] ?>&C" class="btn btn-success">C</a><a href="index.php?rbid=<?php echo $r['rb_id'] ?>&P"class="btn btn-danger">P</a></td>
													<td></td>
													<td></td>
													<td></td>
											<?php } if($r['status']=="X") {?>
													<td><a href="index.php?rbid=<?php echo $r['rb_id'] ?>&C" class="btn btn-danger">X</a></td>
													<td><?php echo $r['cmsg']?></td>
													<td></td>
													<td></td>
											<?php } ?>
										</tr>
									<?php endwhile;?>
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
<?php
	if(isset($_GET['rbid']) && isset($_GET['C']))// for conform
	{
		$rbid=$_GET['rbid'];
		
		$up1="update room_book set status='C',cmsg='' where rb_id='$rbid'";
		$rup1=mysqli_query($con,$up1);
		if($rup1)
		{
			echo "<script>alert('Booking Conform')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
		else
		{
			echo "<script>alert('Failed')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
	}
	if(isset($_GET['rbid']) && isset($_GET['P']))// for panding
	{
		$rbid1=$_GET['rbid'];
		
		$up2="update room_book set status='P',cmsg='' where rb_id='$rbid1'";
		$rup2=mysqli_query($con,$up2);
		if($rup2)
		{
			echo "<script>alert('Booking Pending')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
		else
		{
			echo "<script>alert('Failed')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
	}
?>