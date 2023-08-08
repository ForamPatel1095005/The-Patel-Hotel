<?php 
	session_start();
	if(isset($_SESSION['id']))
	{
		session_destroy();
		//echo '<script> window.location="pages-login.php" </script>';
		header('Location:login.php');
	}
	//echo "<script name='javascript'> alert('bye bye') </script> ";
	
?>