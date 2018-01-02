<!DOCTYPE html>
<html>
<head>
	<title>Find Member</title>
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
  <div class="r"> <img src="find.png" width="5%"></div>
	<h2>搜尋會員</h2>
	<form id="findmember" name="findmember" method="Post" action="orderpage.php">
		<label for="phonenumber">電話號碼：</label>
		<input type="text" name="phonenumber" placeholder="0963781xxx" required>
		<div><button type='submit' class='btn btn-outline-dark' name='submit'>搜尋</button></div>
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
.r,h2,#findmember{
    margin: 40px;
    display: block;
    text-align: center;
}
.btn{
	margin: 20px;
}
</style>