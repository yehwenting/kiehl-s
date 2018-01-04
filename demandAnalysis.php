<?php
include ("ini.php");

  mysqli_query($con,"SET NAMES UTF8");
  // $sql2="SELECT type1 FROM record"
  // $amount = mysqli_query($con,$sql1);
  // if($amount->num_rows > 0)
  //   //output data of each row
  //   while($row = $amount->fetch_assoc()){
  //     echo "id:" .$row["id"]." - name:".$
  //   }
  //計算每項產品的點擊次數
$preR = "SELECT * FROM Preference WHERE pname='Rare_earth';";
$countR = mysqli_query($con,$preR);
if(!$countR)
        {
          echo ("Error: ".mysqli_error($con));
          // exit();
        }
$rowR=mysqli_num_rows($countR);
// echo $rowR;

$preO = "SELECT pname FROM preference WHERE pname='Oil_free'";
$countO = mysqli_query($con,$preO);
$rowO=mysqli_num_rows($countO);

$preU = "SELECT pname FROM preference WHERE pname='Ultra_facial'";
$countU = mysqli_query($con,$preU);
$rowU=mysqli_num_rows($countU);

$preC = "SELECT pname FROM preference WHERE pname='Clearly_correct'";
$countC = mysqli_query($con,$preC);
$rowC=mysqli_num_rows($countC);

$preW = "SELECT pname FROM preference WHERE pname='Wrinkle_reduce'";
$countW = mysqli_query($con,$preW);
$rowW=mysqli_num_rows($countW);

$preM = "SELECT pname FROM preference WHERE pname='men'";
$countM = mysqli_query($con,$preM);
$rowM=mysqli_num_rows($countM);

//各項產品會員購買次數
$type1S="SELECT distinct phone FROM record WHERE NOT phone = '000' AND type1 >0";
$countT1= mysqli_query($con,$type1S);
$R1=mysqli_num_rows($countT1);

$type2S="SELECT distinct phone FROM record WHERE NOT phone = '000' AND type2 >0";
$countT2= mysqli_query($con,$type2S);
$R2=mysqli_num_rows($countT2);


$type3S="SELECT distinct phone FROM record WHERE NOT phone = '000' AND type3 >0";
$countT3= mysqli_query($con,$type3S);
$R3=mysqli_num_rows($countT3);


$type4S="SELECT distinct phone FROM record WHERE NOT phone = '000' AND type4 >0";
$countT4= mysqli_query($con,$type4S);
$R4=mysqli_num_rows($countT4);


$type5S="SELECT distinct phone FROM record WHERE NOT phone = '000' AND type5 >0";
$countT5= mysqli_query($con,$type5S);
$R5=mysqli_num_rows($countT5);


$type6S="SELECT distinct phone FROM record WHERE NOT phone = '000' AND type6 >0";
$countT6= mysqli_query($con,$type6S);
$R6=mysqli_num_rows($countT6);

// 每日銷售量
$today = getdate();
  date("Y-m-d H:i");  //日期格式化
  $year = $today["year"]; //年
  $month = $today["mon"]; //月
  $day = $today["mday"];  //日
  $today_date = $year."-".$month."-".$day;

$dailyDemandOf = mysqli_query($con,"SELECT SUM(type1),SUM(type2), SUM(type3), SUM(type4), SUM(type5), SUM(type6) FROM record WHERE date = '$today_date'");
$ddRow = mysqli_fetch_array($dailyDemandOf);

$total=$ddRow['SUM(type1)']*1200+$ddRow['SUM(type2)']*800+$ddRow['SUM(type3)']*900+$ddRow['SUM(type4)']*1800+
        $ddRow['SUM(type5)']*2300+$ddRow['SUM(type6)']*900;
 
 ?>


<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>銷量分析</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="logo.jpg" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>

<body>
 <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="mainpage.html">回首頁</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="managerSelect.html">管理</a>
  </li>
  
</ul>
<div class="k"> <img src="kiehls.png" width="20%"></div>

	<!-- <div class="container"> -->
  <h2>銷售分析</h2>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">產品名稱</th>
      <th scope="col">年銷量</th>
      <th scope="col">點擊次數</th>
      <th scope="col">會員購買次數</th>
      <th scope="col">獲取率</th>
      <th scope="col"><?php echo $today_date?> 日銷量</th>  
    </tr>
  </thead>
  <tbody>
   <!-- 計算點擊每樣產品的點擊次數  -->

<!-- 計算每樣產品的銷售量  -->
  <?php 

  $add=mysqli_query($con,'SELECT SUM(type1),SUM(type2),SUM(type3),SUM(type4),SUM(type5),SUM(type6) from `record`');
 if($row1=mysqli_fetch_array($add))
  {
    $type1=$row1['SUM(type1)'];
    $type2=$row1['SUM(type2)'];  
    $type3=$row1['SUM(type3)'];
    $type4=$row1['SUM(type4)']; 
    $type5=$row1['SUM(type5)'];
    $type6=$row1['SUM(type6)']; 
 ?>
    <tr>  
    <th scope="col">1</th>
    <td scope="col">亞馬遜白泥淨緻毛孔系列</td>
    <td scope="col"><?php echo $type1 ?></td>
    <td scope="col"><?php echo $rowR ?></td>
    <td scope="col"><?php echo $R1 ?></td>
    <td scope="col"><?php echo $R1/$rowR ?></td>
    <td scope="col"><?php echo $ddRow['SUM(type1)'] ?></td>
  </tr>
  <tr>
    <th>2</th>
    <td>冰河保濕——無油清爽系列</td>
    <td><?php echo $type2 ?></td>
    <td><?php echo $rowO ?></td>
    <td><?php echo $R2 ?></td>
    <td ><?php echo $R2/$rowO ?></td>
    <td ><?php echo $ddRow['SUM(type2)'] ?></td>
  </tr>
  <tr>
    <td>3</td>
    <td>冰河保濕系列</td>
    <td><?php echo $type3 ?></td>
    <td><?php echo $rowU ?></td>
    <td><?php echo $R3 ?></td>
    <td><?php echo $R3/$rowU ?></td>
    <td><?php echo $ddRow['SUM(type3)'] ?></td>

  </tr>
  <tr>
    <td>4</td>
    <td>激光極淨白系列</td>
    <td><?php echo $type4 ?></td>
    <td><?php echo $rowC ?></td>
    <td><?php echo $R4 ?></td>
    <td><?php echo $R4/$rowC ?></td>
    <td><?php echo $ddRow['SUM(type4)'] ?></td>

  </tr>
  <tr>
    <td>5</td>
    <td>超能量抗痕彈力系列</td>
    <td><?php echo $type5 ?></td>
    <td><?php echo $rowW ?></td>
    <td><?php echo $R5 ?></td>
    <td><?php echo $R5/$rowW ?></td>
    <td><?php echo $ddRow['SUM(type5)'] ?></td>

  </tr>
  <tr>
    <td>6</td>
    <td>極限男性系列</td>
    <td><?php echo $type6 ?></td>
    <td><?php echo $rowM ?></td>
    <td><?php echo $R6 ?></td>
    <td><?php echo $R6/$rowM ?></td>
    <td><?php echo $ddRow['SUM(type6)'] ?></td>

  </tr>
  <?php } ?>
  </tbody>
</table>
  <h2>總金額 : <?php echo $total ?> 元</h2>
</body>
</html>


<!-- <p>test zone</p> -->

<!-- <?php 
// $preC = "SELECT name FROM preference WHERE name='cleary'";
// $countC = mysqli_query($con,$preC);
// $rowC=mysqli_num_rows($countC);
//   echo $rowC;


?> -->

<!-- <?php 

// $type1S="SELECT * FROM record WHERE NOT phone = '000' AND type2 >0";
// $countT1= mysqli_query($con,$type1S);
// if(!$countT1){
//   echo "Could not successfully run query ($type1S) from DB:" .mysqli_error($con);
//   exit;
// }
// if(mysqli_num_rows($countT1)==0){
//   echo "No rows found, nothing to print";
//   exit;
// }
// $R1=mysqli_num_rows($countT1);
// echo $R1;

 ?> -->

<!-- <p></p> 
<?php 
// $preR = "SELECT name > 0 FROM preference WHERE name='rareEarth'";
// $countR = mysqli_query($con,$preR);
// if(!$countR){
//   echo "Could not successfully run query ($preR) from DB:" .mysqli_error($con);
//   exit;
// }
// if(mysqli_num_rows($countR)==0){
//   echo "No rows found, nothing to print";
//   exit;
// }
// $rowR=mysqli_num_rows($countR);
 
?> -->



<style type="text/css">
h2{
  text-align: center;
  margin: 20px;
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
</style>
