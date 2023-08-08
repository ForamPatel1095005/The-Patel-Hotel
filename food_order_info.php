<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
	
	$sql="select * from reg";
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
											<th>NO.</th>
                                            <th>F NAME</th>
											<th>L NAME</th>
                                            <th>GENDER</th>
                                            <th>MO.</th>
                                            <th>CITY</th>
											<th>EMAIL</th>
											<th>PASSWORD</th>
											<th>EDIT</th>
											<th>DELETE</th>
									    </tr>
                                    </thead>
                                    <tbody>
									<?php while($r=mysqli_fetch_assoc($result)):?>
                                        <tr>
											<td><?php echo $r['id']?></td>
											<td><?php echo $r['f_name']?></td>
											<td><?php echo $r['l_name']?></td>
											<td><?php echo $r['gender']?></td>
											<td><?php echo $r['mob']?></td>
											<td><?php echo $r['city']?></td>
											<td><?php echo $r['email']?></td>
											<td><?php echo $r['password']?></td>
											<td><a href="user_edit.php" class="btn btn-primary">EDIT</a></td>
											<td><a href="user_delete.php" class="btn btn-danger">DELETE</a></td>
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
 