<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
	
	$sql="select * from reg order by email";
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
                                        <h2 class="card-title">User Information</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
											<th>F NAME</th>
											<th>L NAME</th>
                                            <th>MO.</th>
                                            <th>CITY</th>
											<th>EMAIL</th>
											<th>EDIT</th>
											<th>DELETE</th>
									    </tr>
                                    </thead>
                                    <tbody>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['fname']?></td>
											<td><?php echo $r['lname']?></td>
											<td><?php echo $r['mob']?></td>
											<td><?php echo $r['city']?></td>
											<td><?php echo $r['email']?></td>
											<td><a onclick="return confirm('Are You sure?')" href="update_user.php?idd=<?php echo $r['id']?>" class="btn btn-primary">EDIT</a></td>
											<td><a onclick="return confirm('Are You sure?')" href="user_details.php?idd=<?php echo $r['id']?>"class="btn btn-danger">DELETE</a></td>
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
 <!------------------------------------- deleting data------------------------------------>
<?php 
	if(isset($_GET['idd']))
	{
		$idd=$_GET['idd'];
		
		$sql1="delete from reg where id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="user_details.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="user_details.php" </script>';
		}
	}
?>
<!--------------------------------------------------------------------------------------> 
 