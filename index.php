<?php 
header("content-type:text/html; charset=utf-8");

$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, "shopping_cart");

if (isset($_COOKIE["userName"])){
    $sUserName = $_COOKIE["userName"];

    if (isset($_GET['value'])){    
        $n1 = $_GET['value'];
        $commandText = "INSERT INTO transaction (member_id,p_id,howmany) VALUES('$sUserName','1','$n1');";
        $result = mysqli_query($link, $commandText); 
    }  
    if (isset($_GET['value2'])){
        $n2 = $_GET['value2'];
        $commandText2 = "INSERT INTO transaction (member_id,p_id,howmany) VALUES('$sUserName','2',$n2);";
        $result = mysqli_query($link, $commandText2); 
    }  
    if (isset($_GET['value3'])){
        $n3 = $_GET['value3'];
        $commandText3 = "INSERT INTO transaction (member_id,p_id,howmany) VALUES('$sUserName','3',$n3);";
        $result = mysqli_query($link, $commandText3); 
    } 

}else{
    $sUserName = "Guest"; 
    if (isset($_GET['value']) || isset($_GET['value2']) || isset($_GET['value3'])){
        echo "<script> alert('尚未登入'); </script>";
        header("Location: login.php");
    }
}
?>

<script>

function Buyx3(){
    let n1 = document.getElementById("c1").value;
    let n2 = document.getElementById("c2").value;
    let n3 = document.getElementById("c3").value;
    test.innerText += n1;
    test.innerText += "  " + n2;
    test.innerText += "  " + n3;
    location.href="index.php?value=" + n1 + "&value2=" + n2 + "&value3=" + n3;


}
</script>

<!DOCTYPE html>
<html  lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>歡迎光臨購物網站</title>
</head>
<body>

<table width="250" border="0" align="right" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr> 
  <?php if ($sUserName == "Guest"): ?>
    <td align="center" valign="baseline"><a href="login.php">登入</a> 
  <?php else: ?>
    <td align="center" valign="baseline"><a href="login.php?logout=1">登出</a>
  <?php endif; ?>
    
    | <a href="secret.php">購物車清單</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC"><?php echo "歡迎 " . $sUserName . "來到購物網站" ?> </td>
  </tr>
</table>


<div data-role="header" style="width:60%;">
    <h1 style="font-family:fantasy;font-size:40px;color:orange;text-align: right;">Commodity Catalog</h1>
</div>

<div style="position: absolute;top: 75%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)">
    <img src="image1.jfif" alt="" style="vertical-align:middle">
    <a href="Commodity_Detail.php" style="font-size:24px;text-decoration:none;color:black">anello--熱賣商品     優惠價：390元</a>
    <input type="text" id="c1" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
    <br><br>
    <img src="image2.jfif" alt="" style="vertical-align:middle"><a href="#" style="font-size:24px;text-decoration:none;color:black">時尚百搭多功能防盜背包     優惠價：590元</a>
    <input type="text" id="c2" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
    <br><br>
    <img src="image3.jfif" alt="" style="vertical-align:middle"><a href="#" style="font-size:24px;text-decoration:none;color:black">多口袋手提後背兩用包     優惠價：490元</a>
    <input type="text" id="c3" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
</div>

<input type="button" value="確定送出" onclick="Buyx3()">
<span id="test"></span>

</body>
</html>