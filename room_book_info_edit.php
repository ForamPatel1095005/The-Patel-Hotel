<?php     
require "database.php";// database connection
require "header.php";//already created common templates 
$sql="select reg.*,room_book.* from reg,room_book where reg.id=room_book.id order by rb_id and b_date desc";
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
                                        <h2 class="card-title">Room Booking Info./Edit</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
											<th>MO</th>
                                            <th>FROM</th>
                                            <th>TO</th>
                                            <th>ROOMS</th>
											<th>R TYPE</th>
											<th>Adult/Child</th>
											<th>BOOK</th>
											<th>EDIT</th>
											<th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['fname']?></td>
											<td><?php echo $r['mob']?></td>
											<td><?php echo $r['f_date']?></td>
											<td><?php echo $r['t_date']?></td>
											<td><?php echo $r['rooms']?></td>
											<td><?php echo $r['room_type']?></td>
											<td><?php echo $r['adult']?>/<?php echo $r['child']?></td>
											<td><?php echo $r['b_date']?></td>
											<td><a onclick="return confirm('Are You sure?')"  href="update_book_room.php?id=<?php echo $r['id']?>&rbid=<?php echo $r['rb_id']?>" class="btn btn-primary">EDIT</a></td>
											<td><a onclick="return confirm('Are You sure?')" href="room_book_info_edit.php?idd=<?php echo $r['rb_id']?>" class="btn btn-danger">DELETE</a></td>
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
		
		$sql1="delete from room_book where rb_id='$idd' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo '<script> alert("DELETED ..") </script>';
				echo '<script> window.location.href="room_book_info_edit.php" </script>';
		}
		else
		{
				echo '<script> alert("FAILED !!") </script>';
				echo '<script> window.location.href="room_book_info_edit.php" </script>';
		}
	}
?>
<!--------------------------------------------------------------------------------------> 
 
 