<?php     
	require "connection.php";
	$conn = connect();
	$room_type=$_POST['room_type'];
$name=$_POST['name'];
$phone=$_POST['phone'];
 $item_name = implode(",",$_POST['item_name']);
  $item_qty = implode(",",$_POST['item_qty']);
$custom=$_POST['custom'];

?>
<?php

$sql = "INSERT INTO food_order (room_number,name,phone) 
values ('$room_type','$name','$phone')";

$result = mysqli_query($conn,$sql);


if ($result === TRUE) {
	$last_id = $conn->insert_id;
	//echo $last_id;

$sql1 = "INSERT INTO item_order (fid,item_name,item_qty,custom) 
values ('$last_id','$item_name','$item_qty','$custom')";


$result1 = mysqli_query($conn,$sql1);
if ($result === TRUE) {

echo "Order Successfully Placed";
header('Location: index.php');
}
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>