<?php 
	require('database.php');
	if(isset($_GET['idd1']) && isset($_GET['gt']) )
	{
		$idd1=$_GET['idd1'];
		$gt=$_GET['gt'];
		$sql1="update order_item set price='$gt' where oi_id='$idd1' ";
		$result1=mysqli_query($con,$sql1);
		if($result1)
		{
				echo "Updated ..";
				//echo '<script> window.location.href="item_order_info.php" </script>';
		}
		else
		{
				echo "FAIL !!";
				//echo '<script> window.location.href="item_order_info.php" </script>';
		}
	}?>