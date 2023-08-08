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
								<h2 class="card-title">Add New Item.</h2>
                        </div>
					</div>
                </div>
				<form method="post" action="#">
					<div class="row">
						<div class="col-md-3"></div></br>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control" name="iname" maxlength="25" required="" pattern="[A-Za-z]{1,25}$" title="Allow maximum 25 Character" placeholder="Enter New Item"></br></br>
							<input type="text" class="form-control" name="price" maxlength="4" pattern="\d{1,4}$" title="Enter maximum 4 digit" required="" placeholder="Enter Item Price"></br></br>
							<label>Select Item Categories</label>
							<select class="form-control" name="ctg">
								<option>SOUP</option>
								<option>SALAD</option>
								<option>SNACKS</option>
								<option>PUNJABI</option>
								<option>CHINESE</option>
								<option>SAUTH INDIAN</option>
								<option>TANDOORI</option>
								<option>COLD DRINK</option>
							</select></br></br>
							<input type="submit" class="form-control btn btn-success" name="add" value="Add Item"></br></br>
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
<!--- Add item information in database-->	 
<?php 
	if(isset($_POST['add']))
	{
		$in=$_POST['iname'];
		$p=$_POST['price'];
		$cat=$_POST['ctg'];
		
		//echo "<script name='javascript'> alert('Added') </script> ";
		$sql="select * from item_info where iname='".$in."' ";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==1)
		{
			echo "<script name='javascript'> alert('Already Added This Item  ') </script> ";
		}
		else
		{
			$sql1="insert into item_info (iname,price,categories) values('$in','$p','$cat')";
			$result1=mysqli_query($con,$sql1);
			if($result1)
			{
				echo "<script name='javascript'> alert('Added This Item  ') </script> ";
			}
			else
			{
				echo "<script name='javascript'> alert('Failed !!') </script> ";
			}
		}
	}
?>