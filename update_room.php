<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
<!-- ============================================================== -->
<!-- ================HIDE AND SHOW EFFECT========================== -->
		<style>
		#i1 {
			display:none;
		}
		</style>
		<script>
		function showHide(){
			if(document.getElementById('c').checked){
				document.getElementById('i1').style.display='block';
				
			}
			else
			{
				document.getElementById('i1').style.display='none';
			}
		}
		</script>
<!-- ============================================================== -->
        <div class="col-lg-12">
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Update Room Info.</h2>
                        </div>
					</div>
				</div>
				<form method="post" action="#" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-1"></div></br>
					<div class="col-md-10 form-group">
						<?php if(isset($_GET['idd']))
									{
										$rd=$_GET['idd'];
										$sql="select * from room_info where ri_id='$rd' ";
										$result=mysqli_query($con,$sql);
										while($r=mysqli_fetch_assoc($result))
										{?>
						<div class="row">
							<div class="col-md-6">
							<!--------------- Starting PHP Coding For Room Type----------------------------->
								Room Type:</br>
								<select class="form-control" name="room_type">
									<option><?php echo $r['room_type'];?></option>
								</select>
							<!-------------- Ending PHP Coding For Room Type-------------------------------->
						</div>
							<div class="col-md-6">
								Room Price:</br>
								<input type="text" class="form-control" name="price" required="" pattern="\d{1,5}$" title="Enter maximum 5 digit" value="<?php echo $r['price']?>">
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-6">
								Description 1</br>
								<input type="text" class="form-control" name="detail1" maxlength="30" required="" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character" value="<?php echo $r['detail1']?>" >
							</div>
							<div class="col-md-6">
								Description 2</br>
								<input type="text" class="form-control" name="detail2" maxlength="30" required="" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character"  value="<?php echo $r['detail2']?>">
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-6">
								Description 3</br>
								<input type="text" class="form-control" name="detail3"  maxlength="30" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character"  value="<?php echo $r['detail3']?>">
							</div>
							<div class="col-md-6">
								Description 4</br>
								<input type="text" class="form-control" name="detail4" maxlength="30" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character"  value="<?php echo $r['detail4']?>">
							</div>
						</div></br>
						If You Want To Change Images Click Here:<input type="checkbox" id="c" name="c" onclick="showHide()"></br>
						<div class="row" >
							<div class="col-md-12" id="i1">
								Image</br>
								<input type="file" class="form-control" name="image1" >
							</div>
						</div></br>
						<?php		 }
								}
							?>
						<div class="row">
							<input type="submit" class="form-control btn btn-success" name="add" value="Update"></br></br>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				</form>
			</div>
        </div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!-- full update in database-->
<?php 
	if(isset($_POST["add"]))
	{
		$name=$_POST['room_type'];
		$p=$_POST['price'];
		$d1=$_POST['detail1'];
		$d2=$_POST['detail2'];
		$d3=$_POST['detail3'];
		$d4=$_POST['detail4'];
		$img1=$_FILES['image1']['name'];
		if(isset($_POST['c']))
		{
			if(!empty($img1))
			{
				$up1="update room_info set price='$p',detail1='$d1',detail2='$d2',detail3='$d3',detail4='$d4',image1='$img1' where room_type='$name'"; 
				$upr1=mysqli_query($con,$up1);
				if($upr1)
				{
					move_uploaded_file($_FILES['image1']['tmp_name'],"room_pic/$img1");
					echo "<script name='javascript'> alert('Updated With Images') </script> ";
					echo '<script> window.location.href="room_info.php" </script>';
				}
				else
				{
					echo "<script name='javascript'> alert('Failed !') </script> ";
				}
			}
			else
			{
				echo "<script name='javascript'> alert('select 3 images!!') </script> ";
			}
		}
		else
		{
				$up2="update room_info set price='$p',detail1='$d1',detail2='$d2',detail3='$d3',detail4='$d4' where room_type='$name'"; 
				$upr2=mysqli_query($con,$up2);
				if($upr2)
				{
					echo "<script name='javascript'> alert('Updated Without Images') </script> ";
					echo '<script> window.location.href="room_info.php" </script>';
				}
				else
				{
					echo "<script name='javascript'> alert('Failed !') </script> ";
				}
		}
	}
?>
<!------------------------------>
