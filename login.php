<?php 
header("content-type:text/html; charset=utf-8");

$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, "shopping_cart");

if (isset($_GET["logout"]))
{
	setcookie("userName", "Guest", time() - 3600);
	header("Location: index.php");
	exit();
}

if (isset($_POST["btnHome"]))
{
	header("Location: index.php");
	exit();
}

if (isset($_POST["btnOK"]))
{
    $sUserName = $_POST["txtUserName"];
    $sUserPwd = $_POST["txtPassword"];
	if (trim($sUserName) != "" && trim($sUserPwd) != "")
	{
        $commandText = "select * from member_account where member_id = '$sUserName'";
        $result = mysqli_query($link, $commandText);
        while ($row = mysqli_fetch_assoc($result))   
        {
            // echo gettype($sUserPwd);
            // echo gettype($row['password']);

            if($row['password'] == $sUserPwd)
            {
                // echo "帳號：{$row['member_id']}<br>";
                // echo "密碼：{$row['password']}<br>"; 
                setcookie("userName", $sUserName);  
            }else{
                echo "登入失敗，無此帳號存在!!";
                exit();
            }
            
            if (isset($_COOKIE["lastPage"]))
            header(sprintf("Location: %s", $_COOKIE["lastPage"]));
            else
            header("Location: index.php");            
        }
	}
}
?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>登入系統</title>
</head>
<body>
<form method="post" action="login.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
</form>

</body>
</html>