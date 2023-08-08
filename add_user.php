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
								<h2 class="card-title">Add New User</h2>
                        </div>
					</div>
                </div>
				<form method="post" action="#">
				<div class="row">
					<div class="col-md-3"></div></br>
					<div class="col-md-6 form-group">
						<!-- -->
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" name="fname" required="" maxlength="15" pattern="[A-Za-z]{1,15}$" title="Allow Only Character" placeholder="First Name"></br></br>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lname" required="" maxlength="15" pattern="[A-Za-z]{1,15}$" title="Allow Only Character" placeholder="Last Name"></br></br>
							</div>
						</div>
						<!-- -->
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" name="city" maxlength="20" required="" pattern="[A-Za-z]{1,20}$" title="Allow Only Character" placeholder="City"></br></br>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="mob" maxlength="10" pattern="\d{10}" title="Enter 10 digit of Number" required="" placeholder="Mobile Number"></br></br>
							</div>
							</div>
							<input type="email" class="form-control" name="email" maxlength="30" required="" placeholder="Email Address"></br></br>
							<input type="password" class="form-control" name="pass" maxlength="10" required="" placeholder="Password(Maximum 10 digit)"></br></br>
							<label>Select Security Question</label>
							<select class="form-control" required="" name="seq_qus">
								<option >What is your Dream ?</option>
								<option >Where are you Live ?</option>
								<option >What is your Favorite ?</option>
								<option >What is your Hobby ?</option>
							</select></br></br>
							<input type="password" class="form-control" required="" maxlength="20" name="seq_ans" pattern="[A-Za-z]{1,20}$" title="Allow Only Character" placeholder="Enter Security Question Answer"></br></br>
							<input type="submit" class="form-control btn btn-success" name="add" value="Add User"></br></br>
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
<!-- starting insert data into the database-->
<?php
	if(isset($_POST['add']))
	{
		$f=$_POST['fname'];
		$l=$_POST['lname'];
		$c=$_POST['city'];
		$m=$_POST['mob'];
		$e=$_POST['email'];
		$p=$_POST['pass'];
		$sq=$_POST['seq_qus'];
		$se=$_POST['seq_ans'];
		
		$sql="select * from reg where email='".$e."' and mob='$m' ";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==1)
		{
			echo "<script name='javascript'> alert('This Email/Mo. Already Used') </script> ";
		}
		else
		{
			$sql1="INSERT INTO reg (fname,lname,city,mob,email,password,seq_qus,seq_ans) VALUES ('$f','$l','$c','$m','$e','$p','$sq','$se')";
			$result1=mysqli_query($con,$sql1);
			if($result1)
			{
				echo "<script name='javascript'> alert(' New User Add') </script> ";
			}
			else
			{
				echo "<script name='javascript'> alert('Failed !') </script> ";
			}
		}
	}
	
?>
 