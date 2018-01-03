<?php
include ("ini.php");
//echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
$noInfo_flag = false;
$duplicate_flag = false;
$success_flag=false;
$fail_flag=false;
$phone = $_GET['phone_number'];
$name = $_GET['name'];
$password = $_GET['password'];
$sex = $_GET['sex'];
$birthday = $_GET['birthday'];
$pore = $_GET['pore'];
$skin = $_GET['skin'];


//送出鍵按出後
if(isset($_GET['submit'])==true){
 //檢査所有欄位有沒有輸入
 if(empty($sex)==true || empty($_GET['password'])==true || empty($_GET['name'])==true || empty($_GET['phone_number'])==true|| empty($_GET['birthday'])==true|| empty($_GET['pore'])==true|| empty($_GET['skin'])==true){
 //有缺的話，叫使用者寫完
 $noInfo_flag = true;
}
}

//送出鍵按出，使用者也有輸入資料的情況
if(isset($_GET['submit'])==true && empty($_GET['name'])==false && empty($_GET['password'])==false && empty($_GET['phone_number'])==false && empty($_GET['sex'])==false && empty($_GET['birthday'])==false && empty($_GET['pore'])==false && empty($_GET['skin'])==false){

 //用 WHERE 檢查是否重複註冊
 //mysql_query()裡面要用'' 參考
 $sql="SELECT * FROM Customer WHERE phone='$phone';";
 $result = mysqli_query($con, $sql);
 $row=mysqli_fetch_array($result);
 if($row["phone"] == $phone){
 //重覆到的話，退回
 $duplicate_flag = true;
 }else{
 if($birthday>2018||$birthday<0){
	$fail_flag=true;
}else{
 //沒有重複到，寫入資料
 $sql2="INSERT INTO Customer (name, pwd, sex, phone, birthday, pore, skin_type) VALUES('$name','$password','$sex','$phone','$birthday','$pore','$skin')";
 $SaveNewData = mysqli_query($con, $sql2);
  //檢查註冊是否成功
 if(!$SaveNewData){
 $fail_flag=true;
 }else{
 $success_flag=true;
 }
 }
}
}
 if($noInfo_flag){ 
 	// location.href = 'register.html';
 echo "<script>alert('請完成所有必答問題！'); window.history.go(-1);</script>";
 exit(0);
 }
 if($duplicate_flag){ 
 echo "<script>alert('此電話號碼已被註冊！'); window.history.go(-1);</script>";
 exit(0);
 }
 if($success_flag){ 
 	echo '<ul class="nav justify-content-end">
    		<li class="nav-item">
    		<a class="nav-link active" href="mainpage.html">回首頁</a>
    		</li>
		  </ul>
  			<div class="k"> <img src="kiehls.png" width="30%"></div>
  			<hr>
  			<div class="rpic"><img src="recommended.png" width="5%"></div>
  			';
 	echo "<div id='t1'>以下為kiehl's根據您的膚況所推薦的系列產品，請選取一項您最有興趣的產品</div> <hr>";
 	echo "<div class='container'>
  			<div class='row'>";
 if($sex=='2'){
	echo "<div class='col'><div class='r1'>男性系列</div>";
    echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'men'>";
	echo "<img src='https:\/\/s.yimg.com/wb/images/02ABB881A095A6CB8483245A0114A204ACCE0DD7' style='height:300; width: 300;'>";
//	echo "<input type='checkbox' name='pname' value = 'men'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";
		
}elseif ($pore>3){
	echo "<div class='col'><div class='r1'>雅馬遜白尼系列</div>";
	echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'Rare_earth'>";
	echo "<img src='http://cdn-wpmsa.defymedia.com/wp-content/uploads/sites/3/2009/07/20090722-kiehls-rare-earth-collection-590x335.jpg' style='height:300; width: 300;'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";

}elseif ($skin>3){
	echo "<div class='col'><div class='r1'>亞馬遜白泥系列</div>";
	echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'Rare_earth'>";
	echo "<img src='http://cdn-wpmsa.defymedia.com/wp-content/uploads/sites/3/2009/07/20090722-kiehls-rare-earth-collection-590x335.jpg' style='height:300; width: 300;'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";

}else{
	echo "<div class='col'><div class='r1'>激光淨白系列</div>";
	echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'Clearly_correct'>";
	echo "<img src='http://womenlovebeauty.com/wp-content/uploads/ccwhite_group.jpg' style='height:300; width: 300;'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";

}
 if ($skin>3){
	echo "<div class='col'><div class='r1'>無油系列</div>";
	echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'Oil_free'>";
	echo "<img src='http://3.bp.blogspot.com/-GSClTUSwPUw/Th8y3RP-HAI/AAAAAAAAGuE/_bkD9_ZW8_g/s1600/Kiehls_OF_Group_4products.jpg' style='height:300; width: 300;'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";

}elseif (2018-$birthday>28){
	echo "<div class='col'><div class='r1'>去皺系列</div>";
	echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'Wrinkle_reduce'>";
	echo "<img src='https://n.nordstrommedia.com/ImageGallery/store/product/Gigantic/4/_7495364.jpg?crop=pad&pad_color=FFF&format=jpeg&w=587&h=900' style='height:300; width: 300;'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";
	

}else{
	echo "<div class='col'><div class='r1'>冰河醣蛋白系列</div>";
	echo "<form method='GET' action='showqrcode.php'>";
	echo "<input type ='hidden' name = 'pname' value = 'Ultra_facial'>";
	echo "<img src='https://glamourandgo.files.wordpress.com/2013/05/kiehls-ultra-facial-range.jpg' style='height:300; width: 300;'>";
	echo "<div><button type='submit' class='btn btn-outline-dark' name='submit'>有興趣</button></div>";
	echo "</form></div>";

}

 }
 if($fail_flag){ 
//<!--  <div class="alert alert-danger alert-dismissible" role="alert"> -->
//<!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
 echo "<script>alert('註冊失敗'); window.history.go(-1);</script>";
 exit(0);
 
  }?>
<head>
	<title>Recommend</title>
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
	font-size: 20px;
	text-align: center;
}
.r1{
	margin: 10px;
	font-size: 15px;
}
.col{
	display: block;
    text-align: center;
}
.btn{
	margin:15px;
}
</style>
  

