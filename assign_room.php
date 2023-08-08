<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
<!-- ============================================================== -->
        <div class="col-lg-12">
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Assign Room</h2>
                        </div>
					</div>
                </div>
				<form method="post" id="fm" action="#">
					<div class="row">
						<div class="col-md-3"></div></br>
						<div class="col-md-6 form-group">
						<?php
							if(isset($_GET['id']) && isset($_GET['rnid']) && isset($_GET['rbid']) && isset($_GET['bd']))
							{
								$id=$_GET['id'];
								$rnid=$_GET['rnid'];
								$rbid=$_GET['rbid'];
								$bd=$_GET['bd'];
								
								$ts="select * from reg where id='$id'";
								$tr=mysqli_query($con,$ts);
								while($tr1=mysqli_fetch_assoc($tr))
								{?>
							Mr./Ms.<b style="color:blue"><?php echo $tr1['fname']." ".$tr1['lname']." ";?></b>His Mo.<b style="color:blue"><?php echo $tr1['mob']?></b></br></br>
						<?php   } ?>
								
						<?php	$sql="select * from room_no where rn_id='$rnid'";
								$result=mysqli_query($con,$sql);
								while($r=mysqli_fetch_assoc($result))
								{	
									$room_type=$r['room_type'];
								?>
							Room Type:</br>
							<input type="text" class="form-control" name="room_type" readonly="" value="<?php echo $r['room_type'];?>" ></br></br>
							
							<div class="row">
								<div class="col-md-6">
						<?php	
								$ts1="select * from room_info where room_type='$room_type'";
								$tr1=mysqli_query($con,$ts1);
								while($tr2=mysqli_fetch_assoc($tr1))
								{?>
									Room Price:</br>
									<input type="text" class="form-control" id="rp" name="room_price" readonly="" value="<?php echo $tr2['price'];?>" ></br></br>
						<?php   } ?>
								</div>
								<div class="col-md-6">
						<?php	
									$ts2="select * from room_book where rb_id='$rbid'";
									$tr2=mysqli_query($con,$ts2);
									while($trr2=mysqli_fetch_assoc($tr2))
									{
										$d1=strtotime($trr2['f_date']);
										$d2=strtotime($trr2['t_date']);
										$d=ceil(abs($d2-$d1)/86400);
						?>
										Total Night:</br>
										<input type="text" class="form-control" id="n" readonly name="night"  value="<?php echo $d;?>" ></br></br>
						
									<?php   	} ?>
								</div>
							</div>
							<!-----------------For Total Price-------------------------------->
							<script>
								document.getElementById("n").onfocus=function(){
									var rp1=document.getElementById('rp').value;
									var n1=document.getElementById('n').value;
									var s=rp1 * n1;
									if(n1==0)
									{
										document.getElementById('tp').value=rp1;
									}
									else
									{
										document.getElementById('tp').value=s;
									}
									//document.write(s);
								}
							</script>
							<!---------------------------------------------------------------->
							Total Price:</br>
							<input type="text" class="form-control" id="tp" readonly="" placeholder="click on the night value" name="tp"></br></br>
							Room No:</br>
							<input type="text" class="form-control" name="room_no" readonly="" value="<?php echo $r['room_no'];?>"></br></br>
							<input type="hidden" class="form-control" name="hid" value="<?php echo $id;?>">
							<input type="hidden" class="form-control" name="rb_id" value="<?php echo $rbid ;?>">
							<input type="hidden" class="form-control" name="hrnid" value="<?php echo $r['rn_id'];?>">
							<input type="hidden" class="form-control" name="hbd" value="<?php echo $bd ;?>">
								<?php 
								}
							}
						?>
							<input type="submit" class="form-control btn btn-success" name="assign" value="Assign Room"></br></br>
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
<?php 
	if(isset($_POST['assign']))
	{
		$rn=$_POST['room_no'];
		$hid=$_POST['hid'];//reg id
		$rbi=$_POST['rb_id'];//room book id
		$hrnid=$_POST['hrnid'];//room no id
		$hbd=$_POST['hbd'];// booking date
		$tp=$_POST['tp'];
		
		if(!empty($tp))
		{
			date_default_timezone_set("Asia/Kolkata");
			$cd=date('Y-n-d G:i:00'); //check in time and date
			$sql2="insert into book_no(rb_id,rn_id,id,room_no,cin,price,b_date) values('$rbi','$hrnid','$hid','$rn','$cd','$tp','$hbd')";
			$result2=mysqli_query($con,$sql2);
			if($result2)
			{	
				$s=1;
				$up1="update room_no set status='$s' where rn_id='$hrnid'";
				$upr1=mysqli_query($con,$up1);
				if($upr1)
				{
					echo "<script>alert('room book with no')</script>";
					echo '<script> window.location.href="index.php" </script>';
				}
				else
					echo "<script>alert('failed!!')</script>";
					echo '<script> window.location.href="check_rooms.php" </script>';
			}
			else
				echo "<script>alert('room status updated but room book with no not inserted')</script>";
		}
		else
			echo "<script>alert('click the night ')</script>";
	}
?>