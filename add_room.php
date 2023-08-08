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
								<h2 class="card-title">Add New Room</h2>
                        </div>
					</div>
				</div>
				<form method="post" action="#" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-1"></div></br>
					<div class="col-md-10 form-group">
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" name="room_type" required=""  maxlength="15" pattern="[A-Za-z ]+" title="Allow Only Character" placeholder="Enter Room Type"></br></br>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="price" required="" maxlength="5" pattern="\d{1,5}$" title="Enter maximum 5 digit" placeholder="Enter Price"></br></br>
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" name="detail1" maxlength="30" required="" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character" placeholder="Enter Description 1"></br></br>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="detail2" maxlength="30" required="" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character" placeholder="Enter Description 2"></br></br>
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" name="detail3"  maxlength="30" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character" placeholder="Enter Description 3"></br></br>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="detail4"  maxlength="30" pattern="[A-Za-z0-9&- ]+" title="Allow Only Character" placeholder="Enter Description 4"></br></br>
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-12">
								<input type="file" class="form-control" name="image1" required=""></br></br>
							</div>
						</div></br>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" class="form-control btn btn-success" name="add" value="Add Room"></br></br>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div></br>
				</form>
				</div>
			</div>
        </div>
<!-- ============================================================== -->
<!-- ending coding-->
<?php
	require "footer.php";
?>	 
<!-- insert in database-->
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
		
		if(!empty($name) && !empty($p))
		{
			$sql1="select * from room_info where room_type='".$name."' ";
			$result1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1)==1)
			{
				echo "<script name='javascript'> alert('This Type of Room Already Used') </script> ";
			}
			else
			{
				$sql="insert into room_info(room_type,price,detail1,detail2,detail3,detail4,image1) values('$name','$p','$d1','$d2','$d3','$d4','$img1')";
				if(mysqli_query($con,$sql))
				{
					move_uploaded_file($_FILES['image1']['tmp_name'],"room_pic/$img1");
					echo "<script name='javascript'> alert(' New Room Is Add') </script> ";
				}
				else
				{
					echo "<script name='javascript'> alert('Failed !') </script> ";
				}
			}
		}
		
	}
?>