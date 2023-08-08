<?php 
	require_once "connection.php" ;
	$conn = connect();
	if(isset($_POST['subscribe']))
	{
		$email=$_POST['semail'];
		
		$sql="select * from subscribe where email='$email'";
		$result=mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($result)==1)
		{
			echo "<script>alert('Your Email is already used')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
		else
		{
			$sql1="insert into subscribe(email) values('$email')";
			$result1=mysqli_query($conn,$sql1);
			
			if($result1)
			{
				echo "<script>alert('Your Email is Saved')</script>";
				echo "<script>window.location.href='index.php'</script>";
			}
			else
			{
				echo "<script>alert('Failed !!')</script>";
				echo "<script>window.location.href='index.php'</script>";
			}
		}
	}
?>