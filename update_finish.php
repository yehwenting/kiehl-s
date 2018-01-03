<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include ("ini.php");

  mysqli_query($con,"SET NAMES UTF8");

$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$pore = $_POST['pore'];
$skin_type = $_POST['skin_type'];

//紅色字體為判斷密碼是否填寫正確
if($_SESSION['phone'] != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $id = $_SESSION['phone'];
    
        //更新資料庫資料語法
        $sql = "UPDATE customer set pwd=$pw, pore = $pore, skin_type = $skin_type where phone='$id'";
        if(mysqli_query($con,$sql))
        {
                echo "<script type='text/javascript'>alert('修改成功!'); </script>!";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member2.php>';
        }
        else
        {
                echo "<script type='text/javascript'>alert('修改失敗!'); </script>";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member2.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login3.php>';
}
?>