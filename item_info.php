<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
	
	$sql="select * from item_info order by iname";
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
                                        <h2 class="card-title">Item Information</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
											<th>NAME</th>
											<th>PRICE</th>
                                            <th>CATEGORIES</th>
                                            <th>EDIT</th>
											<th>DELETE</th>
									    </tr>
                                    </thead>
                                    <tbody>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['iname']?></td>
											<td> &#36 <?php echo $r['price']." "?>  </td>
											<td><?php echo $r['categories']?></td>
											<td><a onclick="return confirm('Are You sure?')" href="update_item.php?idd=<?php echo $r['ii_id']?>" class="btn btn-primary">EDIT</a></td>
											<td><a onclick="return confirm('Are You sure?')" href="item_info.php?idd=<?php echo $r['ii_id']?>" class="btn btn-danger">DELETE</a></td>
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
		
		$sql1="delete from item_info where ii_id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="item_info.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="item_info.php" </script>';
		}
	}
?>
<!--------------------------------------------------------------------------------------> 
 
 