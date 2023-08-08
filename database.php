<?php

	$con=mysqli_connect('127.0.0.1','root','');
	
	if(!$con)
	{
		echo "<script name='javascript'> alert('not connected to server') </script> ";
		//echo " not connected to server ";
	}
	if(!mysqli_select_db($con,'project'))
	{
		echo "<script name='javascript'> alert('DB not connected!') </script> ";
		//echo " DB not connected ";
	}

?>