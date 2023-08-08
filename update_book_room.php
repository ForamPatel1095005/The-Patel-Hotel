<?php     
	require "database.php";// database connection
	require "header.php";//already created common templates 
?>
<!-- starting coding-->
<!-- Table -->
<!-- ============================================================== -->
<!-- =================HIDE AND SHOW FOR CHECKBOX=================== -->
		<style>
		#rt{
			display:none;
		}
		</style>
		<script>
		function showHide2(){
			if(document.getElementById('c').checked){
				document.getElementById('rt').style.display='block';
			}
			else
			{
				document.getElementById('rt').style.display='none';
			}
		}
		</script>
<!-- ============================================================== -->
	   <div class="col-lg-12">
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Update Book Room</h2>
                        </div>
					</div>
                </div>
				<div class="row">
					<div class="col-md-2"></div></br>
					<div class="col-md-8 form-group">
					<form method="post" action="#">
							<!------------------------fetch data into database------------------------>
							<?php if(isset($_GET['id']) && isset($_GET['rbid']))
									{
										$id=$_GET['id'];
										$rbid=$_GET['rbid'];
										
										$sql="select reg.*,room_book.* from reg,room_book where room_book.rb_id='$rbid' and reg.id='$id'";
										$result=mysqli_query($con,$sql);
										while($r=mysqli_fetch_assoc($result))
										{
										?>
						Mr./Ms.<b style="color:blue"><?php echo " ".$r['fname']."  ".$r['lname']." ";?></b>And Your Mo:<b style="color:blue"><?php echo "  ".$r['mob'];?></b></br>
						<div class="row">
							<div class="col-md-6">
								From Date:
								<input type="date" class="form-control" id="fdate" name="fdate" value="<?php echo $r['f_date'];?>">
							</div>
							<!-------------------Code For SET 'To Date' (Min) value---------------------->
							<script>
								document.getElementById("fdate").onchange=function() {
									var input=document.getElementById("tdate");
									input.value="";
									//input.readonly="";
									//input.setAttribute("min", this.value); // type 1
									input.min=this.value;					 // type 2
								}
							</script>
							<!------------------------------------------------------------------------>
							<div class="col-md-6">
								To Date:
								<input type="date" class="form-control" id="tdate" name="tdate" value="<?php echo $r['t_date'];?>">
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-4">
								Room:
								<input type="number" class="form-control" name="room" max="15" min="1" value="<?php echo $r['rooms'];?>">
							</div>
							<div class="col-md-4">
								Adult:
								<input type="number" class="form-control" name="adult" max="25" min="1" value="<?php echo $r['adult'];?>">
							</div>
							<div class="col-md-4">
								Child:
								<input type="number" class="form-control" name="child" max="8" min="0" value="<?php echo $r['child'];?>">
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-12">
								Current Room Type:<b style="color:blue"><?php echo " ".$r['room_type']." ";?></b>For change<input type="checkbox" id="c" name="c" onclick="showHide2()">
							</div>
						</div>
						<div class="row" >
							<div class="col-md-12" id="rt">
								<!--------------- Starting PHP Coding For Room Type----------------------------->
								<?php 
									$sql3="select * from room_info ";
									$result3=mysqli_query($con,$sql3);
									while($r3=mysqli_fetch_assoc($result3))
									{
								?>
								Room Type</br>
								<select class="form-control" name="room_type">
									<option><?php echo $r3['room_type'];?></option>
								</select>
								<?php }?>
								<!-------------- Ending PHP Coding For Room Type-------------------------------->
							</DIV>
						</div></br>
						<div class="row">
							<div class="col-md-12">
								<input type="hidden" class="form-control" name="hid" value="<?php echo $r['rb_id'];?>">
						<?php
										}
									} ?>
							
							<input type="submit" class="form-control btn btn-success" name="update" value="Update Book Info"></br></br>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
        </div>
	</div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!--------------- Starting PHP Coding For Insert Room Data In Database ----------------------------->
<?php 
	if(isset($_POST['update']))
	{
		$fd=$_POST['fdate'];
		$td=$_POST['tdate'];
		$rm=$_POST['room'];
		$a=$_POST['adult'];
		$c=$_POST['child'];
		$rt=$_POST['room_type'];
		$rn_id=$_POST['rn_id'];
		$hid=$_POST['hid'];//room book id is store in here
		if(isset($_POST['c']))//with room no and type
		{
			$up1="update room_book set f_date='$fd',t_date='$td',rooms='$rm',adult='$a',child='$c',room_type='$rt' where rb_id='$hid'";
			$upr1=mysqli_query($con,$up1);
			if($upr1)
			{
				echo "<script name='javascript'> alert('Updated with ROOM TYPE') </script> ";
				echo '<script> window.location.href="room_book_info_edit.php" </script>';
			}
			else
			{
				echo "<script name='javascript'> alert('Failed !') </script> ";
				echo '<script> window.location.href="room_book_info_edit.php" </script>';
			}	
		}
		else//with out checkbox
		{
			$up4="update room_book set f_date='$fd',t_date='$td',rooms='$rm',adult='$a',child='$c' where rb_id='$hid'";
			$upr4=mysqli_query($con,$up4);
			if($upr4)
			{
				echo "<script name='javascript'> alert('Updated with out ROOM TYPE') </script> ";
				echo '<script> window.location.href="room_book_info_edit.php" </script>';
			}
			else
			{
				echo "<script name='javascript'> alert('Failed !') </script> ";
				echo '<script> window.location.href="room_book_info_edit.php" </script>';
			}	
		}
	
	}
?>
<!--------------- Ending PHP Coding For Insert Room Data In Database ------------------------------->
