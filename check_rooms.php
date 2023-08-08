<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">
			<?php if(isset($_GET['er']))
					{ ?>
						<div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <h2 class="card-title">Room Edit/Delete</h2>
								</div>
							</div>
                        </div>
						<div class="table-responsive">
                            <table class="table table-hover no-wrap">
								<thead>
									<tr>
										<th>Room No.</th>
										<th>R Type</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$sql3="select * from room_no ";
									$result3=mysqli_query($con,$sql3);
									while($r3=mysqli_fetch_assoc($result3))
									{
								?>
									<tr>
										<td><?php echo $r3['room_no']?></td>
										<td><?php echo $r3['room_type']?></td>
										<td><a onclick="return confirm('Are You Sure ?')" href="add_room_no.php?er&rn=<?php echo $r3['room_no']?>" class="btn btn-success">Edit</a></td>
										<td><a onclick="return confirm('Are You Sure ?')" href="check_rooms.php?er&rn=<?php echo $r3['room_no']?>" class="btn btn-danger">Delete</a></td>
									</tr>
								<?php 
									}
								?>
								</tbody>
							</table>
						</div>
           <?php 	}
					else 
					{	
			?>	
				  <?php 
						if(isset($_GET['id']) && isset($_GET['rbid']) && isset($_GET['rt']) && isset($_GET['bd']) )
						{?>
							<div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="card-title">Room Assign</h2>
									</div>
								</div>
                            </div>
							<div class="table-responsive">
                                <table class="table table-hover no-wrap">
									<thead>
										<tr>
											<th>Room No.</th>
											<th>R Type</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
							<!------------------------fetch room no data into database------------------------>
								
							<?php 
									$rbid=$_GET['rbid'];
									$trt=$_GET['rt'];
									$id=$_GET['id'];
									$bd=$_GET['bd'];
									
									$sql1="select * from room_no where room_type='$trt' ";
									$result1=mysqli_query($con,$sql1);
									while($r1=mysqli_fetch_assoc($result1))
									{
							?>
									<tr>
										<td><?php echo $r1['room_no']?></td>
										<td><?php echo $r1['room_type']?></td>
										<?php if($r1['status']==1)
										      {
										?>
													<td><a class="btn btn-danger">Booked</a></td>
										<?php }
											  else 
											  {	?>
													<td><a onclick="return confirm('Are You Sure ?')" href="assign_room.php?id=<?php echo $id;?>&rnid=<?php echo $r1['rn_id']?>&rbid=<?php echo $rbid ?>&bd=<?php echo $bd?>" class="btn btn-success">Available</a></td>
										<?php }   ?>
									</tr>
							<?php 
									}?>
									</tbody>
								</table>
							</div>
				<?php	}
						else
						{?>
							<div class="card-body">
								<div class="d-flex">
									<div>
										<h2 class="card-title">Room Available/Booked</h2>
										<a href="add_room_no.php" class="btn btn-success">Add Room</a>
										<a href="check_rooms.php?er" class="btn btn-primary">Edit Rooms</a>
									</div>
								</div>
							</div>
							 
                    <!-- ============================================================== -->
							<div class="row">   
                   			<?php 
										$sql3="select * from room_no ";
										$result3=mysqli_query($con,$sql3);
										while($r3=mysqli_fetch_assoc($result3))
										{
								?>
								<div class="col-md-2">
									<center>
										<table class="table" style="border:10px solid blue">
											<br>
											<h4><b style="color:red"><?php echo $r3['room_no'] ?></b></h4>
											<h4  style="color:blue"><?php echo $r3['room_type']?></h4>
											<?php if($r3['status']==1)
													{
											?>
														<a class="btn btn-danger">Booked</a>
											<?php 	}
													else 
													{	?>
														<a class="btn btn-success">Available</a>
											<?php 	}   ?>
										</table>
									</center>
								</div>
								<?php   } ?>
							</div>
                <!-- ============================================================== -->

						</div>
			<?php 		}
					} ?>
                    </div>
				</div>
                <!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
 <?php 
	if(isset($_GET['er']) && isset($_GET['rn']))
	{
		$rn=$_GET['rn'];
		$del="delete from room_no where room_no='$rn'";
		$rdel=mysqli_query($con,$del);
		if($rdel)
		{
			echo "<script>alert('room deleted..')</script>";
			echo "<script>window.location.href='check_rooms.php'</script>";
		}
		else
		{
			echo "<script>alert('room NOT deleted !!')</script>";
		}
	}
?>