<?php 
if (!isset($_COOKIE["userName"]))
{
	setcookie("lastPage", "secret.php");
	header("Location: login.php");
	exit();	
}else{
    $sUserName = $_COOKIE["userName"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>購物車清單</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">已加入購物車的有 : </font></td>
  </tr>
  <tr>
    <td align="center" valign="baseline"><a href="index.php">回首頁</a></td>
  </tr>
</table>
<?php $link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
        $result = mysqli_query($link, "set names utf8");
        mysqli_select_db($link, "shopping_cart"); 
        $commandText = "SELECT p_name AS '商品名稱',howmany AS '購買數量'
        FROM `transaction` LEFT JOIN `selling_product` ON `transaction`.`p_id` = selling_product.p_id
        WHERE member_id = '$sUserName'";
        $result = mysqli_query($link, $commandText);

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "商品：{$row['商品名稱']}<br>";
            echo "數量：{$row['購買數量']}<br>";
            echo "<HR>";
        }
?>

</body>
</html>