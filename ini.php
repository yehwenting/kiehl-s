<?php
//資料庫設定
//資料庫位置
$db_server = "140.119.19.37";
//資料庫名稱
$db_name = "kiehls_db";
//資料庫管理者帳號
$db_user = "kiehls";
//資料庫管理者密碼
$db_passwd = "loveyou";

//對資料庫連線
$con = mysqli_connect($db_server, $db_user, $db_passwd, $db_name); 
		if(!$con){
			echo "Connection Error...".mysqli_connect_error();
		}else {
//		    echo "<h3>Database connection success</h3>";
		}

//資料庫連線採UTF8
mysqli_query($con,"SET NAMES utf8");

//選擇資料庫
mysqli_select_db($con, $db_name) or die("db selection failed");

?> 