<?php session_start()?>
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
    <title>Admin Login Page</title>
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">THE PATEL HOTEL</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="" method="post">
                        <h3 class="text-center m-b-20">Forgot Password</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required="" placeholder="Enter Your Email"> 
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
                                <input class="form-control" type="password" name="seq_ans" required="" placeholder="Enter Security Answer"> 
							</div>
                        </div>
						 <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="pass" required="" placeholder="Enter New Password"> 
							</div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" name="update" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                   </div>
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
    <!--Custom JavaScript -->
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
	require('database.php');

	if(isset($_POST['email']))
	{
		$e=$_POST['email'];
		$sq=$_POST['seq_qus'];
		$sa=$_POST['seq_ans'];
		$p=$_POST['pass'];
	
		$sql="select * from login where email='$e' and seq_qus='$sq' and seq_ans='$sa' ";
		$result=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result)==1)
		{
			$sql1="update login set password='$p' where email='$e' and seq_qus='$sq' and seq_ans='$sa' ";
			$result1=mysqli_query($con,$sql1);
			if($result1)
			{
				echo "<script name='javascript'> alert('Password Updated ') </script> ";
				echo '<script> window.location="login.php" </script>';
			}
		}
		else
		{
			echo "<script name='javascript'> alert('Check Your Information') </script> ";
		}
	}
?>