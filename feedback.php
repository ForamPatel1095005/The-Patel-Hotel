<?php 
	include ('header.php');
	include ('link.html');
	require_once "connection.php" ;
	$conn = connect();
	$id=$_SESSION['id'];
	$sql="select * from reg where id='$id'";
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
										<h2 style="color:blue" class="card-title"><?php echo $r['fname'];?></h2>Send your <b>FEEDBACK</b> Here..
										<?php }?>
                                    </div>
								</div>
                            </div>
                            <div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6">
								<form method="post" action="#">
									<div class="row">
										<textarea name="ur" maxlength="300" rows="5" class="form-control" required="" placeholder="Your FeedBack"></textarea></br></br>
										<input type="submit" name="sr" class="bg-primary" value="SEND">
									</div>
								</form>
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
	if(isset($_POST['sr']))
	{
		$ur=$_POST['ur'];
		$ins="insert into reviews(review,result,id)values('$ur','0','$id')";
		$rins=mysqli_query($conn,$ins);
		if($rins)
		{
			echo "<script>alert('your reviews send to admin')</script>";
		}
		else
		{
			echo "<script>alert('failed !!')</script>";
		}
	}
?>