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
                                        <h2 class="card-title">Room Info./Edit</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th>Room Type</th>
                                            <th>Price</th>
                                            <th>Desc.1</th>
                                            <th>Desc.2</th>
											<th>Desc.3</th>
											<th>Desc.4</th>
											<th>Image</th>
											<th>EDIT</th>
											<th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
											$sql="select * from room_info";
											$result=mysqli_query($con,$sql);
											
											while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><b style="color:blue"><?php echo $r['room_type']?></b></td>
											<td name="p1" > &#36 <?php echo $r['price']." "?>  </td>
											<td><?php echo $r['detail1']?></td>
											<td><?php echo $r['detail2']?></td>
											<td><?php echo $r['detail3']?></td>
											<td><?php echo $r['detail4']?></td>
											<td><img src="room_pic/<?php echo $r['image1']?>" style="width:100px;height:100px"></td>
											<td><a onclick="return confirm('Are You sure?')" href="update_room.php?idd=<?php echo $r['ri_id']?>" class="btn btn-success">Edit</a></td>
											<td><a onclick="return confirm('Are You sure?')" href="room_info.php?idd=<?php echo $r['ri_id']?>&i1=<?php echo $r['image1']?>" class="btn btn-danger">DELETE</a></td>
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
	if(isset($_GET['idd']) && isset($_GET['i1']))
	{
		$idd=$_GET['idd'];
		$i1=$_GET['i1'];
		
		$sql1="delete from room_info where ri_id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				unlink("room_pic/$i1");
				echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="room_info.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="room_info.php" </script>';
		}
	}
?>
<!--------------------------------------------------------------------------------------> 
 