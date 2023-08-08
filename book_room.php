
<?php     
	require "database.php";// database connection
	require "header.php";
	//require "link.html";//already created common templates 
?>

<!-- starting coding-->
<!-- Table -->
<!-- ============================================================== -->
        <div class="col-lg-12">
			<div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
								<h2 class="card-title">Book Room</h2>
                        </div>
					</div>
                </div>
				<form method="post" action="#">
				<div class="row">
					<div class="col-md-3"></div></br>
					<div class="col-md-6 form-group">
						<div class="row">
							<div class="col-md-6">
								From Date:
								<input type="date" class="form-control" id="fdate" required="" min="<?php echo date("Y-n-d")?>" max="<?php echo date("Y-n-t",strtotime('today'));?>" name="fdate"></br></br>
							</div>
				
							<!-------------------Code For SET 'To Date' (Min) value---------------------->
							<script>
								document.getElementById("fdate").onchange=function() {
									var input=document.getElementById("tdate");
									input.value="";
									//input.setAttribute("min", this.value); // type 1
									input.min=this.value;					 // type 2
								}
							</script>
							<!------------------------------------------------------------------------>
							<div class="col-md-6">
								To Date:
								<input type="date" class="form-control" max="<?php echo date("Y-n-t",strtotime('today'));?>"  id="tdate" required="" name="tdate"></br></br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								Room:
								<input type="number" class="form-control" required="" name="room" max="15" min="1"></br></br>
							</div>
							<div class="col-md-4">
								Adult:
								<input type="number" class="form-control" name="adult" required="" max="25" min="1"></br></br>
							</div>
							<div class="col-md-4">
								Child:
								<input type="number" class="form-control" name="child" max="15" min="0"></br></br>
							</div>
						</div>
					
							<input type="email" class="form-control" name="email" required="" placeholder="Email Address"></br></br>
							<label>Room Type</label>
							
							<?php 
								$sql="select room_type from room_info";
								$result=mysqli_query($con,$sql);
							?>
							<select class="form-control" name="room_type" required>
								<option value="">select room type</option>
								<?php while($r=mysqli_fetch_assoc($result)):?>
								<option ><?php echo $r['room_type'];?></option>
								<?php endwhile;?>
						
							</select></br></br>
							<input type="submit" class="form-control btn btn-success" name="book" value="Book Now"></br></br>
						</div>
					</div>
					<div class="col-md-3"></div></br>
				</form>
			</div>
        </div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!--------------- Starting PHP Coding For Insert Room Data In Database ----------------------------->
<?php 
	if(isset($_POST['book']))
	{
		$fd=$_POST['fdate'];
		$td=$_POST['tdate'];
		$rm=$_POST['room'];
		$a=$_POST['adult'];
		$c=$_POST['child'];
		$e=$_POST['email'];
		$rt=$_POST['room_type'];
		$bd=date("Y-n-d"); 
		if(isset($_POST['email']))
		{
			$sql1="select * from reg where email='$e' ";
			$result1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1)==1)
			{
				while($r1=mysqli_fetch_assoc($result1))
				{
					$id=$r1['id'];
				}
				//echo "<script name='javascript'> alert(' Register !! ') </script> ";
				$sql2="insert into room_book (f_date,t_date,rooms,room_type,adult,child,b_date,id) values('$fd','$td','$rm','$rt','$a','$c','$bd','$id')";
				$result2=mysqli_query($con,$sql2);
				if($result2)
				{
					echo "<script name='javascript'> alert(' Room Is Book ') </script> ";
				}
				else
				{
					echo "<script name='javascript'> alert(' Failed ! !') </script> ";
				}
			}
			else
			{
				echo "<script name='javascript'> alert(' Please Register !! ') </script> ";
			}
		}
	}
?>
<!--------------- Ending PHP Coding For Insert Room Data In Database ------------------------------->
