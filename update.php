<!DOCTYPE html>
<html>
<head>
 <title>更新資料</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="Shortcut Icon" type="image/x-icon" href="logo.jpg" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
</head>
<body>
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="mainpage.html">回首頁</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="login3.html">登出</a>
  </li>
  
</ul>
<div class="k"> <img src="kiehls.png" width="20%"></div>
<hr>
  <div class="r"> <img src="edit.png" width="8%"></div>
  <h3>修改資料</h3>
  <hr>
</body>
</html>

<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include ("ini.php");

  mysqli_query($con,"SET NAMES UTF8");

if($_SESSION['phone'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['phone'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM customer where phone='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "<div class='e'>帳號： $row[phone]</div>";
        echo "<div class='e'>密碼：<input type=\"password\" name=\"pw\" value=\"$row[pwd]\" /> </div>";
        echo "<div class='e'>再一次輸入密碼：<input type=\"password\" name=\"pw2\" value=\"$row[pwd]\" /> </div>";
        echo "<div class='e'>毛孔狀況：<input type=\"text\" name=\"pore\" value=\"$row[pore]\" /> </div>";
        echo "<div class='e'>皮膚狀況：<input type=\"text\" name=\"skin_type\" value=\"$row[skin_type]\" /> </div>";
        echo "<input type=\"submit\" class='btn btn-outline-dark ' name=\"button\" value=\"確定修改\" />";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login3.php>';
}
?>




<style type="text/css">

 h3{
  text-align: center;
  margin: 30px;
 }

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
.r,h3{
    margin: 20px;
    display: block;
    text-align: center;
}
.e{
    margin: 15px 42%;
    width: 40%;
}
.btn{
    margin: 20px 42%;
    width: 15%;
}
</style>


