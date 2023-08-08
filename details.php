<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="card-title">Contact Us Info.</h2>
                                    </div>
								</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
											<th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>MESSAGES</th>
											<th>REPLY</th>
											<th>DELETE</th>
									    </tr>
                                    </thead>
                                    <tbody>
									<?php
										$sql="select * from contact order by co_id desc";
										$result=mysqli_query($con,$sql);
									?>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['name']?></td>
											<td><?php echo $r['email']?></td>
											<td><?php echo $r['message']?></td>
									<?php 	if($r['reply']=="")
											{?>
												<td><a href="reply.php?idd=<?php echo $r['co_id']?>" class="btn btn-success">REPLY</a></td>
									<?php 	
											} 	
											else
											{ ?>	
													<td><?php echo $r['reply']?></td>
									<?php   } ?>	
											<td><a onclick="return confirm('Are You sure?')" href="details.php?idd=<?php echo $r['co_id']?>" class="btn btn-danger">DELETE</a></td>
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
<!-------------------------deleting data----------------------------------------------->
<?php 
	if(isset($_GET['idd']))
	{
		$idd=$_GET['idd'];
		
		$sql1="delete from contact where co_id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo '<script> alert("DELETED....") </script>';
				echo '<script> window.location.href="details.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="details.php" </script>';
		}
	}
?>
<!---------------------------------------------------------------------------------------> 