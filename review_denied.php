<?php
	require('database.php');
	if(isset($_GET['idd']))
	{
		$idd=$_GET['idd'];
		$sql="update reviews set result=0 where re_id='$idd'";
		$result=mysqli_query($con,$sql);
		if($result)
		{
			echo "<script>alert('denied')</script>";
			echo '<script> window.location.href="reviews.php" </script>';
		}
		else
		{
			//echo "<script>alert('fail')</script>";
			echo '<script> window.location.href="reviews.php" </script>';
		}
	}
	
?>