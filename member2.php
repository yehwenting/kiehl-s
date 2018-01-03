
<?php session_start(); 
include ("ini.php");
//解決網頁亂碼問題
mysqli_query($con,"SET NAMES UTF8");
$username = $_SESSION['phone'];
    
        //將資料庫裡的會員資料顯示在畫面上
        $sql = "SELECT * FROM customer where phone  = '$username' ";
        $result = mysqli_query($con,$sql);
         //將資料庫裡的所有會員record顯示在畫面上
        $sql2 = "SELECT rid,type1,type2,type3,type4,type5,type6,date FROM record WHERE phone = '$username' order by date desc ";
        $result2 = mysqli_query($con,$sql2);

?>


<!DOCTYPE html>
<html>
<head>
 <title>會員中心</title>
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
    <a class="nav-link active" href="login3.php">登出</a>
  </li>
  
</ul>
<div class="k"> <img src="kiehls.png" width="20%"></div>
<div class="container">
 <div class="row jumbotron">
 <div class="col-md-offset-3 col-md-6  test"> 
  <div class="k"> <img src="user.png" width="10%"></div>
 <h3 class="text-center">會員資料</h3>

 <?php
//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['phone'] != null)
{
 
        while($row = mysqli_fetch_array($result)){
        if($row['sex']==1){
          $sex="女";
        }else{
          $sex="男";
        }
        echo "<div class='r'>會員ID： $row[cid] </div>
              <div class='r'>名字： $row[name]</div> " . 
              "<div class='r'>性別： $sex</div> 
              <div class='r'>電話： $row[phone]</div>
              <div class='r'> 生日： $row[birthday]</div>
              <div class='r'> 毛孔狀態: $row[pore] </div>
              <div class='r1'>毛孔粗大程度(5是最大 1是最小)</div>
              <div class='r'>膚質: $row[skin_type]</div>
              <div class='r1'>膚質(5是最油 1是最乾)</div>"
              ;
        ?>

      <?php   }

        echo '<div class="r"><a href="update.php" class="btn btn-outline-info">修改</a></div>    ';
}
else
{
        echo '您無權限觀看此頁面!';
        // echo '<meta http-equiv=REFRESH CONTENT=2;url=login3.php>';
}


?>


 </div>
</div>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">亞馬遜白泥淨緻毛孔系列</th>
      <th scope="col">冰河保濕——無油清爽系列</th>
      <th scope="col">冰河保濕系列</th>
      <th scope="col">激光極淨白系列</th>
      <th scope="col">超能量抗痕彈力系列</th>
      <th scope="col">極限男性系列</th>
      <th scope="col">購買時間</th>
    </tr>
  </thead>
  <tbody>

<h3>購買歷史紀錄</h3>

<?php
for($i=1;$i<=mysqli_num_rows($result2);$i++)
{ $rs=mysqli_fetch_row($result2);
?><tr>
<td><?php echo $rs[0]?></td>
<td><?php echo $rs[1]?></td>
<td><?php echo $rs[2]?></td>
<td><?php echo $rs[3]?></td>
<td><?php echo $rs[4]?></td>
<td><?php echo $rs[5]?></td>
<td><?php echo $rs[6]?></td>
<td><?php echo $rs[7]?></td>
</tr>
<?php }?>

</tbody>
</table>
</div>
</body>
</html>


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
.r{
  margin: 10px 38%;
}
.r1{
  font-size: 13px;
  color: grey;
  margin: -10px 38%;
  margin-bottom: 5px;
}
.col-md-6{
  flex: none;
  max-width: none;
}
.btn{
  width: 60%;
  margin: 20px;
}

 </style>