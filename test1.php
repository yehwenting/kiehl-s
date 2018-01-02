<?php

$host = "140.119.19.37";
$Username = "kiehls";
$Password = "loveyou";
$dbName = "kiehls_db";

$con = mysqli_connect($host, $Username, $Password, $dbName);
mysqli_query($con,"SET NAMES utf8");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT * FROM inventory";
$result = mysqli_query($con,$sql);
$number_of_rows = mysqli_num_rows($result);
$result_array=array();
if($number_of_rows>0){
	while($row=mysqli_fetch_assoc($result)){
		$result_array[]=$row;
	}
}
echo json_encode($result_array);
mysqli_close($con);
?>