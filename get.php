<!DOCTYPE html>
<html>
<head>
  <title>Order</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="logo.jpg" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <meta charset="utf-8">
</head>
<body>
  <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="mainpage.html">回首頁</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="managerSelect.html">管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="managerPwd.html">登出</a>
  </li>
  
</ul>

<div class="k"> <img src="kiehls.png" width="30%"></div>
  <hr>
  <div class="r"> <img src="check.png" width="8%"></div>

<?php 

	require 'ini.php';

	$phonenumber=$_REQUEST["phonenumber"];
	$amount1 = $con->real_escape_string($_POST['amount1']);
	$amount2 = $con->real_escape_string($_POST['amount2']);
	$amount3 = $con->real_escape_string($_POST['amount3']);
	$amount4 = $con->real_escape_string($_POST['amount4']);
	$amount5 = $con->real_escape_string($_POST['amount5']);
	$amount6 = $con->real_escape_string($_POST['amount6']);
	$amounts = array($amount1,$amount2,$amount3,$amount4,$amount5,$amount6);
	$today = getdate();
 	date("Y-m-d H:i");  //日期格式化
 	$year = $today["year"]; //年
 	$month = $today["mon"]; //月
 	$day = $today["mday"];  //日
 	$today_date = $year."-".$month."-".$day;


 	$totalprice = 1200 * $amount1 + 800* $amount2 + 900 * $amount3 + 1800 * $amount4 + 2300* $amount5 + 900 * $amount6;

 	$query0 = "SELECT * FROM inventory";
 	$success0 = $con->query($query0);
 	if (!$success0) {
	    die("Couldn't enter data: ".$con->error);
	}
	$num=0;
	while($row = mysqli_fetch_array($success0)){
		if($row['remain']<$amounts[$num]){
			echo "<script>alert('訂單低於庫存，無法購買!'); window.history.go(-1);</script>";
			exit;
		}
		$num++;
	}

	

	

	$query  = "INSERT into record (type1, type2, type3, type4, type5, type6, date, phone) VALUES('" . $amount1 . "','" . $amount2 . "','" . $amount3 . "','" . $amount4 . "','" . $amount5 . "','" . $amount6 . "', '$today_date', '$phonenumber')";
	

	$query1 = "UPDATE inventory SET remain = remain - '$amount1' WHERE id = 1";
	$query2 = "UPDATE inventory SET remain = remain - '$amount2' WHERE id = 2";
	$query3 = "UPDATE inventory SET remain = remain - '$amount3' WHERE id = 3";
	$query4 = "UPDATE inventory SET remain = remain - '$amount4' WHERE id = 4";
	$query5 = "UPDATE inventory SET remain = remain - '$amount5' WHERE id = 5";
	$query6 = "UPDATE inventory SET remain = remain - '$amount6' WHERE id = 6";
	
	$success = $con->query($query);
	if (!$success) {
	    die("Couldn't enter data: ".$con->error);
	}
	$success1 = $con->query($query1);
	if (!$success1) {
	    die("Couldn't enter data: ".$con->error);
	}
	$success2 = $con->query($query2);
	$success3 = $con->query($query3);
	$success4 = $con->query($query4);
	$success5 = $con->query($query5);
	$success6 = $con->query($query6);
	echo "<h2>完成訂單</h2> ";
	echo "<hr>";
	$query7="SELECT * FROM inventory;";
	$success7 = $con->query($query7);
	if(!$success7)
	{
		echo ("Error: ".mysqli_error($con));
		// exit();
	}
	while($row = mysqli_fetch_array($success7)){
		$remain=$row['remain'];
		$ROP=$row['ROP'];
		$Iid=$row['id'];
		$date=$row['date'];
		if( $date=="0" && $remain<$ROP){
			$query8 = "UPDATE inventory SET date = '$today_date' WHERE id = '$Iid';";
			$success8 = $con->query($query8);
			if(!$success8)
				{
					echo ("Error: ".mysqli_error($con));
					// exit();
				}
			$text= $row['name'].' 已達再訂購點，於'.$today_date. '系統自動叫貨 ! ';
			echo "<script type='text/javascript'>alert('$text');</script>";
		}
	}

 ?>

 <!-- 印出此筆訂單資訊 -->
 <h3>明細</h3>
 <table class="table table-striped" width="80%">
 	<thread>
 	<tr>
		<th scope="col">訂單編號</th>
		<th scope="col">亞馬遜白泥淨緻毛孔系列</th>
		<th scope="col">冰河保濕-無油清爽系列</th>
		<th scope="col">冰河保濕系列</th>
		<th scope="col">光極淨白系列</th>
		<th scope="col">超能量抗痕彈力系列</th>
		<th scope="col">極限男性系列</th>

	</tr>
</thread>
<?php 
	require 'ini.php';
	$sql = "SELECT * FROM record ORDER BY rid desc LIMIT 1";
	$result = mysqli_query($con, $sql);
	if(!$result)
	{
		echo ("Error: ".mysqli_error($con));
		// exit();
	}
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['rid'];
		$type1 = $row['type1'];
		$type2 = $row['type2'];
		$type3 = $row['type3'];
		$type4 = $row['type4'];
		$type5= $row['type5'];
		$type6 = $row['type6'];

?>
	<tr>
		<td><?php echo $id ?></td>
		<td><?php echo $type1 ?></td>
		<td><?php echo $type2 ?></td>
		<td><?php echo $type3 ?></td>
		<td><?php echo $type4 ?></td>
		<td><?php echo $type5 ?></td>
		<td><?php echo $type6 ?></td>
	</tr>

<?php }; ?>		
	</table>
		<h3 text-align="right">總金額 : <?php echo $totalprice?> 元 </h3>
		<hr>
		<h3>庫存剩餘</h3>
<!-- 印出庫存TABLE -->
	<table class="table table-striped"  >
		<thread>
 	<tr>
		<th align="center">名稱</th>
		<th align="center">剩餘</th>
	</tr>
</thread>
<?php 
	$sql1 = "SELECT name, remain FROM inventory ORDER BY id";
	$stock = mysqli_query($con, $sql1);
	while($row1 = mysqli_fetch_array($stock))
	{
		$name = $row1['name'];
		$remain = $row1['remain'];
?>
	<tr>
		<td><?php echo $name ?></td>
		<td><?php echo $remain ?></td>
	</tr>

<?php }; ?>		
	</table>
	<a class='btn btn-outline-dark' href="findmember.php" role="button">完成</a></div>

<style type="text/css">
body{
    font-family: "微軟正黑體";
    position: relative;
}
.justify-content-end{
    background-color: black;
}
.justify-content-end a{
    color: white;
}
.k{
    margin: 40px;
    display: block;
    text-align: center;
}
hr{
  width: 70%;
  height: 1px;
}
.r,h3,h2,.btn{
    margin: 30px;
    display: block;
    text-align: center;
}
.table{
	padding: 15px;
	border: 2px solid;
	border-radius: 100px;
	margin: 20px 40px;
	text-align: center;
	height: 90%;
	width: 80%;
	margin-left:auto; 
	margin-right:auto;
}