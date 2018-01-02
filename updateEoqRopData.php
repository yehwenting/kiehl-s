<?php
$host = "140.119.19.37";
$Username = "kiehls";
$Password = "loveyou";
$dbName = "kiehls_db";
$con = mysqli_connect($host, $Username, $Password, $dbName);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqlEOQ=$_POST['sqlEOQ'];
$sqlROP=$_POST['sqlROP'];
$result=mysqli_query($con,$sqlEOQ);
$result2=mysqli_query($con,$sqlROP);
if($result && $result2){
	$status='OK';
}else{
	$status='$result FAILED'. mysqli_error($con);
	
}

echo json_encode(array("response"=>$status));
mysqli_close($con);



?>