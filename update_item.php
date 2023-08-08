<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
<!-- ============================================================== -->
	<style>
		#ctg{
			display:none;
		}
	</style>
	<script>
	function showHide(){
		if(document.getElementById('c').checked){
			document.getElementById('ctg').style.display='block';
		}
		else
		{
			document.getElementById('ctg').style.display='none';
		}
	}
	</script>
		<div class="col-lg-12">
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Update Item.</h2>
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
								$sql="select * from item_info where ii_id='$idd'";
								$result=mysqli_query($con,$sql);
								while($r=mysqli_fetch_assoc($result))
								{
						?>
							Item Name:</br>
							<input type="text" class="form-control" name="iname" maxlength="25" required="" pattern="[A-Za-z]{1,25}$" title="Allow maximum 25 Character"  placeholder="Enter New Item" value="<?php echo $r['iname'];?>" ></br></br>
							Item Price:</br>
							<input type="text" class="form-control" name="price" maxlength="4" required="" pattern="\d{1,4}$" title="Enter maximum 4 digit" placeholder="Enter Item Price" value="<?php echo $r['price'];?>" ></br></br>
							<!----------------for Label------------------------------------------------------->
							<label class="checkbox-inline" ><b style="color:green"><?php echo $r['iname']?></b>'s Current Categories is 
							<b style="color:green"><?php echo $r['categories']?></b>.
							And if you want to change then click here 
							<input type="checkbox" name="c" id="c" onclick="showHide()"> and select the following,</label>
							<!--------------------------------------------------------------------------------->
							<select class="form-control" name="ctg" id="ctg">
								<option>SOUP</option>
								<option>SALAD</option>
								<option>SNACKS</option>
								<option>PUNJABI</option>
								<option>CHINESE</option>
								<option>SAUTH INDIAN</option>
								<option>TANDOORI</option>
								<option>COLD DRINK</option>
							</select></br></br>
							<input type="hidden" class="form-control" name="hid" value="<?php echo $r['ii_id'];?>">
							<?php		
								}
							}
						?>
							<input type="submit" class="form-control btn btn-success" name="update" value="Update"></br></br>
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
<!--- Update item information in database-->	 
<?php 
	if(isset($_POST['update']))
	{
		$in=$_POST['iname'];
		$p=$_POST['price'];
		$hid=$_POST['hid'];
		
		if(isset($_POST['c']))
		{
			$cat=$_POST['ctg'];
			$sql1="update item_info set iname='$in',price='$p',categories='$cat' where ii_id='$hid'";
			$result1=mysqli_query($con,$sql1);
			if($result1)
			{
				echo "<script name='javascript'> alert('Updated') </script> ";
				echo '<script> window.location.href="item_info.php" </script>';
			}
			else
			{
				echo "<script name='javascript'> alert('Failed !') </script> ";
				echo '<script> window.location.href="item_info.php" </script>';
			}	
		}
		else
		{
			$sql2="update item_info set iname='$in',price='$p' where ii_id='$hid'";
			$result2=mysqli_query($con,$sql2);
			if($result2)
			{
				echo "<script name='javascript'> alert('Updated With New Categories') </script> ";
				echo '<script> window.location.href="item_info.php" </script>';
			}
			else
			{
				echo "<script name='javascript'> alert('Failed !') </script> ";
				echo '<script> window.location.href="item_info.php" </script>';
			}
		}
	}
?>