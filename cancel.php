<?php 
	include ('header.php');
	include ('link.html');
	require_once "connection.php" ;
	$conn = connect();
	$id=$_SESSION['id'];
	$rbid=intval($_GET['rbid']);
	$sql="select reg.*,room_book.* from reg,room_book where reg.id='$id' and room_book.rb_id='$rbid' ";
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
                                        <?php 
											while($r=mysqli_fetch_assoc($result))
											{
										?>
										<h2 style="color:blue" class="card-title"><?php echo $r['fname'];?></h2>
										<h5>Room Type: <?php echo $r['room_type'];?></h5>
										<h5>Booking Date: <?php echo $r['b_date'];?></h5>
                                    </div>
								</div>
                            </div>
                            <div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6">
								<form method="post" action="#">
									<div class="row">
										<textarea name="cmsg" maxlength="300" rows="5" class="form-control" required="" placeholder="Enter Reason For Cancel"></textarea></br></br>
										<input type="hidden" name="hrbid" value="<?php echo $r['rb_id'];?>" class="form-control">
										<input type="submit" name="cl" class="bg-success" value="Cancel">
									</div>
								</form>
										<?php }?>
								</div>
								<div class="col-md-3"></div>
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
<?php
	if(isset($_POST['cl']))
	{
		$cmsg=$_POST['cmsg'];
		$hrbid=$_POST['hrbid'];
		$up="update room_book set cmsg='$cmsg',status='X' where rb_id='$hrbid'";
		$rup=mysqli_query($conn,$up);
		if($rup)
		{
			echo "<script>alert('Booking Canceled !!')</script>";
			echo "<script>window.location.href='book_status.php'</script>";
		}
		else
		{
			echo "<script>alert('failed !!')</script>";
		}
	}
?>