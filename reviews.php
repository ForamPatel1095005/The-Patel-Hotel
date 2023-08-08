<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
	
	$sql="select * from reviews,reg where reviews.id=reg.id order by re_id desc";
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
                                        <h2 class="card-title">Reviews</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
											<th>NAME</th>
											<th>EMAIL</th>
                                            <th>MO.</th>
											<th>REVIEWS</th>
                                            <th>RESULT</th>
											<th>DELETE</th>
									    </tr>
                                    </thead>
                                    <tbody>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['fname']?></td>
											<td><?php echo $r['email']?></td>
											<td><?php echo $r['mob']?></td>
											<td><?php echo $r['review']?></td>
											<td><a href="review_accept.php?idd=<?php echo $r['re_id']?>" class="btn btn-success">ACCEPT</a>
														<a href="review_denied.php?idd=<?php echo $r['re_id']?>" class="btn btn-primary">DENIED</a></td>
											<td><a onclick="return confirm('Are You sure?')" href="reviews.php?idd=<?php echo $r['re_id']?>" class="btn btn-danger">DELETE</a></td>
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
		
		$sql1="delete from reviews where re_id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="reviews.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="reviews.php" </script>';
		}
	}
?>
<!--------------------------------------------------------------------------------------> 
 