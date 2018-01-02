<?php
	include ("ini.php");
	$pname =  $_GET['pname'];
	$sql = "SELECT cid FROM Customer ORDER BY cid DESC LIMIT 1";
	$result = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);
	$cid = $row["cid"];
    $sql2 = "INSERT INTO Preference (cid, pname) VALUES ('$cid', '$pname')";
	$SaveNewData = mysqli_query($con, $sql2);
	if(!$SaveNewData){
	 echo "Save New Data Failed";
	 }else{
	 	echo '<ul class="nav justify-content-end">
    		<li class="nav-item">
    		<a class="nav-link active" href="mainpage.html">回首頁</a>
    		</li>
		  </ul>
  			<div class="k"> <img src="kiehls.png" width="25%"></div>
  			<hr>
  			<div class="rpic"><img src="gift.png" width="8%"></div>
  			';
	 echo "<div id='t1'>感謝您註冊成為Kiehl's會員！</div>";
	 echo "<div id='t1'>憑此QRCODE來實體店面即送來店禮</div>";
	 echo "<div id='p1'><img src='https://s7d4.turboimg.net/sp/d0fb2b84da9512242b31e49012317098/qrcode.png' width='200px'><div>";
	  }

?>
<head>
	<title>Kiehl's</title>
	<link rel="Shortcut Icon" type="image/x-icon" href="logo.jpg" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
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
.rpic{
    margin: 40px;
    display: block;
    text-align: center;
}
#t1{
	margin:10px;
	font-size: 20px;
	text-align: center;
}
#p1{
	text-align: center;
}
</style>