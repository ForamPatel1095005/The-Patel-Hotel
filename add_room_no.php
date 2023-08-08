<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
<!-- ============================================================== -->
        <div class="col-lg-12">
<?php  if(isset($_GET['er']) && isset($_GET['rn']))
	   { 
			$rn=$_GET['rn'];
			$rs="select * from room_no where room_no='$rn' ";
			$rers=mysqli_query($con,$rs);
			while($re=mysqli_fetch_assoc($rers))
			{
		?>
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Update Room</h2>
                        </div>
					</div>
                </div>
				<form method="post">
				<div class="row ">
					<div class="col-md-3"></div>
					<div class="col-md-6 form-group">
						<div class="row">
								Room No:
								<input type="text" class="form-control" maxlength="3" pattern="\d{3}" title="Enter minimum 3 digit" required="" name="room_no" value="<?php echo $re['room_no'];?>"></br></br>
						</div></br>
						<div class="row">
							<label>Room Type:</label>
							<!--------------- Starting PHP Coding For Room Type----------------------------->
							<?php 
								$sql="select room_type from room_info";
								$result=mysqli_query($con,$sql);
							?>
							<select class="form-control" name="room_type">
							<?php while($r=mysqli_fetch_assoc($result))
								  {
										if($r['room_type']==$re['room_type'])
										{ ?>
											<option selected><?php echo $r['room_type'];?></option>
								<?php   }
										else
										{?>
											<option><?php echo $r['room_type'];?></option>
								<?php   }
								  }      ?>
							<!-------------- Ending PHP Coding For Room Type-------------------------------->
							</select>
						</div></br></br>
						<div class="row">
							<input type="hidden" class="form-control"name="hrnid" value="<?php echo $re['rn_id'];?>"></br></br>
							<input type="submit" class="form-control btn btn-success" name="update" value="Update Room"></br></br>
						</div></br>
					</div>
					<div class="col-md-3"></div>
				</div>
				</form>
			</div>
<?php  		}
		}
	   else
	   { ?>
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Add Room</h2>
                        </div>
					</div>
                </div>
				<form method="post">
				<div class="row ">
					<div class="col-md-3"></div>
					<div class="col-md-6 form-group">
						<div class="row">
								Room No:
								<input type="text" class="form-control" maxlength="3" required="" pattern="\d{3}" title="Enter minimum 3 digit" placeholder="Enter 3 Digit Room No" name="room_no"></br></br>
						</div></br>
						<div class="row">
							<label>Room Type:</label>
							<!--------------- Starting PHP Coding For Room Type----------------------------->
							<?php 
								$sql="select room_type from room_info";
								$result=mysqli_query($con,$sql);
							?>
							<select class="form-control" name="room_type" required>
								<option value="">select room type</option>
								<?php while($r=mysqli_fetch_assoc($result)):?>
								<option><?php echo $r['room_type'];?></option>
								<?php endwhile;?>
							<!-------------- Ending PHP Coding For Room Type-------------------------------->
							</select>
						</div></br></br>
						<div class="row">
							<input type="submit" class="form-control btn btn-success" name="add" value="Add New Room"></br></br>
						</div></br>
					</div>
					<div class="col-md-3"></div>
				</div>
				</form>
			</div>
	<?php  } ?>
        </div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!--------------- Starting PHP Coding For Insert Room Data In Database ----------------------------->
<?php 
	if(isset($_POST['room_no']))
	{	
		$rn=$_POST['room_no'];
		$rt=$_POST['room_type'];
		
		if(isset($_POST['add']))
		{
			$s=0;
		
			$sql1="select * from room_no where room_no='$rn' ";
			$result1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1)==1)
			{
				echo "<script name='javascript'> alert('Already Used this Room No!!') </script> ";
			}
			else
			{
				$sql2="insert into room_no(room_no,room_type,status) values('$rn','$rt','$s')";
				$result2=mysqli_query($con,$sql2);
				if($result2)
				{
					echo "<script name='javascript'> alert('Room No Add ') </script> ";
				}
				else
				{
					echo "<script name='javascript'> alert('Failed !!') </script> ";
				}
			}
		}
//--------------- Ending PHP Coding For Insert Room Data In Database -------------------------------
		if(isset($_POST['update']))
		{
			$hrnid=$_POST['hrnid'];
			$up="update room_no set room_no='$rn',room_type='$rt' where rn_id='$hrnid' ";
			$rup=mysqli_query($con,$up);
			if($rup)
			{
				echo "<script name='javascript'> alert('Room Is Updated ') </script> ";
				echo "<script>window.location.href='check_rooms.php'</script> ";
			}
			else
			{
				echo "<script name='javascript'> alert('failed') </script> ";
			}
		}
	}
?>
