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
								<h2 class="card-title">Reply</h2>
                        </div>
					</div>
                </div>
				<form method="post" action="#">
					<div class="row">
						<div class="col-md-3"></div></br>
						<div class="col-md-6 form-group">
						<?php
							if(isset($_GET['idd']))
							{
								$idd=$_GET['idd'];
								$sql="select * from contact where co_id='$idd'";
								$result=mysqli_query($con,$sql);
								while($r=mysqli_fetch_assoc($result))
								{?>
							Name:<b style="color:blue"><?php echo "  ".$r['name'];?></b></br>
							<input type="hidden" name="name" class="form-control" value="<?php echo $r['name'];?>" readonly=""></br>
							Email:</br>
							<input type="text" name="email" class="form-control" value="<?php echo $r['email'];?>" readonly=""></br>
							Message:</br>
							<textarea readonly=""  class="form-control"><?php echo $r['message'];?> </textarea></br>
							Your Reply:</br>
							<textarea name="yr" maxlength="250" rows="3" class="form-control"></textarea></br></br>
							<input type="hidden" class="form-control" name="hid" value="<?php echo $r['co_id'];?>">
								<?php 
								}
							}
						?>
							<input type="submit" class="form-control btn btn-success" name="reply" value="Reply"></br></br>
						</div>
					</div>
				</form>
			</div>
        </div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>
<?php 
	if(isset($_POST['reply']))
	{
		$yr=$_POST['yr'];
		//$e=$_POST['email'];
		$hid=$_POST['hid'];
		$up1="update contact set reply='$yr' where co_id='$hid'";
		$upr1=mysqli_query($con,$up1);
		if($upr1)
		{
			//echo "<script> alert('reply inserted') </script> ";
			$to = "patel.ujas009@gmail.com"; // this is your Email address
			$from = $_POST['email']; // this is the sender's Email address
			$name = $_POST['name'];
			$subject = "Website Contact Form:  $name";
			$subject2 = "Copy of your form submission";
			$message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['yr'];
			$headers = "From:" . $from;
			$headers2 = "From:" . $to;
			mail($to,$subject,$headers,$message);
			mail($from,$subject2,$phone,$headers2); // sends a copy of the message to the sender
			//echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
			echo "<script> alert('reply inserted and send to the sender') </script> ";
			echo '<script> window.location.href="details.php" </script>';
		}
		else
		{
			echo "<script> alert('reply not inserted') </script> ";
			echo '<script> window.location.href="details.php" </script>';
		}
	}
?>