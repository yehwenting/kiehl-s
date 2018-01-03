 <?php  
session_start();

include ("ini.php");
//解決網頁亂碼問題
mysqli_query($con,"SET NAMES UTF8");

$error_flag = FALSE;
$notfound_flag = FALSE;

//如果收到 POST 表單送來的登入資料，到資料庫檢査是否有這個人存在
$sql="SELECT * FROM customer";
$result=mysqli_query($con,$sql);


//如果有找到，檢査密碼是否相符
while($row = mysqli_fetch_array($result)){

 //先檢査使用者有沒有輸入資料
 if(empty($_POST["phone"])==FALSE && empty($_POST["pass"])==FALSE){

 //防範攻擊
 $phone=$_POST["phone"];
 $phone=mysqli_real_escape_string($con,$phone);
 $pass=$_POST["pass"];
 $pass=mysqli_real_escape_string($con,$pass);
 //有輸入資料的話，再來看輸入的email跟資料庫是否一致
 if($row["phone"]==$_POST["phone"]){

 if($row["pwd"]==$_POST["pass"]){
 //如果相符合，則設定 Session
 // session_start();
 $_SESSION["phone"]=$_POST["phone"];
 $_SESSION["pwd"]=$_POST["pass"];
 $_SESSION["name"]=$row["name"];
 $_SESSION["cid"]=$row["cid"];

 //讓網頁轉址的 PHP 寫法：轉到會員資料
 header('Location: member2.php');

 }else{
 //如果不符合，則設定 $error_flag 為 TRUE，繼續顯示網頁内容
 $error_flag = TRUE;
 break;
 }

 }else{
 //如果沒有找到，則設定 $notfound_flag 為 TRUE，繼續顯示網頁内容
 $notfound_flag = TRUE;
 }

 }else{
 //如果沒收到，繼續顯示網頁内容
 }
 
}
if($error_flag){ 
  // <div class="alert alert-danger alert-dismissible" role="alert">
  // <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 密碼錯誤！
  // </div>
  echo "<script type='text/javascript'>alert('密碼錯誤！'); window.history.go(-1);</script>";
  exit(0);
  $error_flag=false;
 }

 if($notfound_flag){ 
  // <div class="alert alert-danger alert-dismissible" role="alert">
  // <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 未找到本使用者，請重新確認！
  // </div>
  echo "<script type='text/javascript'>alert('未找到本使用者，請重新確認！');window.history.go(-1);</script>";
  exit(0);
  $notfound_flag=false;
 }

?>

<!DOCTYPE html>
<html>
<head>
 <title>會員登入</title>
 <link rel="Shortcut Icon" type="image/x-icon" href="logo.jpg" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
.col-md-6{
  margin: 30px 300px;
  text-align: center;
}
</style>
</head>
<body>
<!-- navbar設定 -->
  <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="mainpage.html">回首頁</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="register.html">註冊</a>
  </li>
  
</ul>
<!-- 圖片 -->
    <div class="k"> <img src="kiehls.png" width="20%">
    </div>
<!-- 會員登入 -->
<div class="container">
 <div class="row jumbotron">
 <div class="col-md-6 col-md-offset-3">
 <h2 class="text-center">會員登入</h2><br>
 <form action="login3.php" method="POST">
 <input class="form-control input-lg" id="phone" type="text" name="phone" required="TRUE" placeholder="電話"/><br/>
 <input class="form-control input-lg" id="pass" type="password" name="pass" required="TRUE" placeholder="密碼"/><br/>
 <input class="btn btn-primary btn-lg btn-block" type="submit" value="登入"/>
 <a class="btn btn-default btn-lg btn-block" href="register.html">會員註冊</a>
 </form>
 <br>
 
 </div>
 </div>
</div>
</body>
</html>


