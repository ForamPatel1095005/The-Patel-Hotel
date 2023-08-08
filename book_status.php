<?php 
	include ('header.php');
	include ('link.html');
	require_once "connection.php" ;
	$conn = connect();
	
	if(isset($_SESSION['id']))
	{	
		$id=$_SESSION['id'];
	}
	else
		echo "<script>window.location.href='index.php'</script>";
	
	$sql="select reg.*,room_book.* from reg,room_book where reg.id='$id' and room_book.id='$id' order by b_date desc";
	$result=mysqli_query($conn,$sql);

?>

  <body id="rooms-1__page">
		
    <!-- Info Section
    ================================================== -->
    
  	<!-- Navbar
    ================================================== -->
  

    <!-- CONTENT
      ================================================== -->

    <!-- section rooms-1 -->
    <section class="section__rooms-1">
    	<div class="container">
    		<div class="row">
				<div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="card-title">Room Booking Info.</h2>
                                        </div>
									</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
											<th>Mobile no.</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Rooms</th>
											<th>Room TYPE</th>
											<th>Adult/Children</th>
											<th>DOB</th>
											<th>STATUS</th>
											<th>CANCEL</th>
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
											<?php if($r['status']=="P") {?>
													<td><a class="btn bg-danger">PENDING</a></td>
													<td><a href="cancel.php?rbid=<?php echo $r['rb_id']?>&X" class="btn bg-danger">CANCEL</a></td>
											<?php } if($r['status']=="C") {?>
													<td><a class="btn bg-success">CONFIRMED</a></td>
													<td></td>
											<?php } if($r['status']=="X") {?>
													<td><a class="btn primary">CANCELED</a></td>
													<td><?php echo $r['cmsg'] ?></td>
											<?php } if($r['status']=="") {?>
													<td><a class="btn primary">WAIT</a></td>
													<td><a href="cancel.php?rbid=<?php echo $r['rb_id']?>&X" class="btn bg-danger">CANCEL</a></td>
											<?php } ?>
											
										</tr>
									<?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- / .container -->
    </section> <!-- / .section__rooms-1 -->

		
<?php 
include 'footer.html';
?>
</body>
</html>