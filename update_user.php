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
								<h2 class="card-title">Update User Details</h2>
                        </div>
					</div>
                </div>
				<?php
					if(isset($_GET['idd']))
					{
						$idd=$_GET['idd'];
						$sql="select * from reg where id='$idd'";
						$result=mysqli_query($con,$sql);
						while($r=mysqli_fetch_assoc($result))
						{
				?>
				
				<form method="post" action="#">
				<div class="row">
					<div class="col-md-3"></div></br>
					<div class="col-md-6 form-group">
						<div class="row">
							<div class="col-md-6">
								First Name</br>
								<input type="text" class="form-control" name="fname" maxlength="15" required="" pattern="[A-Za-z]{1,15}$" title="Allow Only 15 Character" value="<?php echo $r['fname'];?>"></br></br>
							</div>
							<div class="col-md-6">
								Last Name</br>
								<input type="text" class="form-control" name="lname" maxlength="15" required="" pattern="[A-Za-z]{1,15}$" title="Allow Only 15 Character" value="<?php echo $r['lname'];?>"></br></br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								City</br>
								<input type="text" class="form-control" name="city" maxlength="20" required="" pattern="[A-Za-z]{1,20}$" title="Allow Only 20 Character"  value="<?php echo $r['city'];?>"></br></br>
							</div>
							<div class="col-md-6">
								Mobile Number</br>
								<input type="text" class="form-control" name="mob" maxlength="10" required="" pattern="\d{10}" title="Enter maximum 10 digit" value="<?php echo $r['mob'];?>"></br></br>
							</div>
							</div>
								Email Address</br>
								<input type="email" class="form-control" name="email" maxlength="30" required="" value="<?php echo $r['email'];?>"></br></br>
								<input type="hidden" name="hid" value="<?php echo $r['id'];?>"></br>
							<?php
									}
								}
							?>
							<input type="submit" class="form-control btn btn-success" name="update" value="Update"></br></br>
						</div>
					</div>
					<div class="col-md-3"></div></br>
				</form>
			</div>
        </div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!-- starting update data into the database-->
<?php

	if(isset($_POST['update']))
	{
		$i=$_POST['hid'];
		$f=$_POST['fname'];
		$l=$_POST['lname'];
		$c=$_POST['city'];
		$m=$_POST['mob'];
		$e=$_POST['email'];
		
		$sql1="update reg set fname='$f',lname='$l',city='$c',mob='$m',email='$e' where id='$i'";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
			echo "<script name='javascript'> alert('Updated') </script> ";
			echo '<script> window.location.href="user_details.php" </script>';
		}
		else
		{
			echo "<script name='javascript'> alert('Failed !') </script> ";
			echo '<script> window.location.href="user_details.php" </script>';
		}	
	}

?>
 