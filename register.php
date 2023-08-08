<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>THE PATEL HOTEL ADMIN SIDE</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">THE PATEL</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="#" method="post">
                    <!--<div class="text-center">
                        <a href="javascript:void(0)" class="db"><img src="assets/images/logo-icon.png" alt="Home" /><br/><img src="assets/images/logo-text.png" alt="Home" /></a>
                    </div>-->
                    <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account</small>
        			<div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" maxlength="15" name="name1" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" maxlength="30" name="email1" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" maxlength="10" name="password1" placeholder="Password">
                        </div>
                    </div>
					<div class="form-group ">
                        <label style="color:blue">Select Your Security Question</label></br>
						<select class="form-control" required="" name="seq_qus">
							<option >What is your Dream ?</option>
							<option >Where are you Live ?</option>
							<option >What is your Favorite ?</option>
							<option >What is your Hobby ?</option>
						</select>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="seq_ans" maxlength="20" required="" placeholder="Enter Security Answer"> 
						</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="check" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="signup" type="submit">Sign Up</button>
                        </div>
                    </div>
				    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="login.php" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>
<?php
	$n=$_POST['name1'];
	$e=$_POST['email1'];
	$p=$_POST['password1'];
	$sq=$_POST['seq_qus'];
	$sa=$_POST['seq_ans'];
	
	require('database.php'); // I have already create the database connection file
	if(isset($_POST['signup']))
	{
		if(isset($_POST['check']))
		{
			if(!empty($n) && !empty($e) && !empty($p) && !empty($sq) && !empty($sa))
			{
				$sql1="select * from login where email='".$e."' ";
				$result1=mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1)==1)
				{
					echo "<script name='javascript'> alert('This Email Address Already Used') </script> ";
				}
				else
				{
					$sql="INSERT INTO login (name,email,password,seq_qus,seq_ans) VALUES ('$n','$e','$p','$sq','$sa')";
					if(mysqli_query($con,$sql))
					{
						echo "<script name='javascript'> alert('Registration Succeeded !!') </script> ";
						//header('Location: pages-login.php');
						echo '<script> window.location="index.php" </script>';
					}
					else
					{
						echo "<script name='javascript'> alert('Registration Failed !') </script> ";
					}
				}
			}
		}
		else
			echo "<script name='javascript'> alert('click allow option !') </script> ";
	}
?>