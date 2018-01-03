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
  <div class="r"> <img src="purchase.png" width="8%"></div>
<?php   
    //連接資料庫
    require 'ini.php';
  
  
    //讀會員輸入的手機號
    $phonenumber=$_POST["phonenumber"];

    $sql = "SELECT * from Customer where phone ='$phonenumber';";
    $sql1 =  "SELECT * FROM inventory";
    $result = mysqli_query($con,$sql) or die('MySQL query error');
    $stock = mysqli_query($con,$sql1) or die('MySQL query1 error');
    $number_of_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $row1 = mysqli_fetch_array($stock);
  if($phonenumber != null && $number_of_rows>0){    
    echo "<div class='info'>姓名 : " . $row['name']."</div> ";  
    echo "<div class='info'>電話 : " . $row['phone']."</div> ";  
  }else{
     echo "<script type='text/javascript'>alert('無此會員'); window.history.go(-1);</script>";
     exit(0);
      echo "請回到首頁使用非會員代碼000訂單";
  };
 
?>



  
  <h3>購買列</h3>

  <form method="post" action="get.php">  
   <input type = "hidden" name="phonenumber" value="<?php echo $phonenumber?>">
    <div class="r1">亞馬遜白泥淨緻毛孔系列 : <input type='number' name="amount1" id='amount1' min='0' value="0"></div>
    <div class="r1">冰河保濕-無油清爽系列 : <input type='number' name="amount2" id='amount2' min="0" value="0"></div>
    <div class="r1">冰河保濕系列 : <input type='number' name="amount3" id="amount3" min='0' value="0"></div>
    <div class="r1">光極淨白系列 : <input type='number' name="amount4" id="amount4" min='0' value="0"></div>
    <div class="r1">超能量抗痕彈力系列 : <input type='number' name="amount5" id='amount5' min='0' value="0"></div>
    <div class="r1">極限男性系列 : <input type='number' name="amount6" id='amount6' min='0' value="0"></div>
    <div><button type='submit' class='btn btn-outline-dark' name='submit'>送出</button>
    <a class='btn btn-outline-dark' href="findmember.php" role="button">返回</a></div>
  </form>
</body>
</html>

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
.r,h3{
    margin: 20px;
    display: block;
    text-align: center;
}
.r1{
  margin:15px;
}
form{
  position: absolute;
  left: 35%;
}
.info{
  margin:20px;
  display: block;
  text-align: center;
}
.btn{
  padding:10px 40px;
  margin:15px 20px;
}