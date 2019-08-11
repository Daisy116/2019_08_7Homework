<?php
header("content-type:text/html; charset=utf-8");
// 0. 請先建立 Class 資料庫 （SetupDB/setup_class.txt）
// 1. 連接資料庫伺服器
$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, "shopping_cart");   // select_db，選擇class資料庫
// 2. 執行 SQL 敘述
$commandText = "select * from member_account";    // students是class資料庫的資料表!
$result = mysqli_query($link, $commandText);   // 用mysqli_query()送指令!!!在$link資料庫執行$commandText指令
// 3. 處理查詢結果
while ($row = mysqli_fetch_assoc($result))   // mysqli_fetch_assoc抓一筆資料出來，用$row記住該筆資料，存成陣列內容
{  // 一直有抓到(fetch)資料，就一直執行迴圈
  echo "ID：{$row['member_id']}<br>";
  echo "Name：{$row['password']}<br>";
  echo "<HR>";
}
// 自己試著INSERT一筆資料，成功了!
// $commandText2 = "INSERT INTO students (cName,cSex,cBirthday) VALUES('鄧曉光','M','1987-06-30');";
// $result = mysqli_query($link, $commandText2);
// 4. 結束連線，用mysqli_close()
mysqli_close($link);
echo "<br />-- Done --";
?>


<!-- javascript傳值給php -->
<!-- <script>
function express(){
let value = "abc";
location.href="test.php?value=" + value;
}
</script>

<input type="button" value="button" onclick="express()">

<?php
echo $_GET['value'];
?> -->



<!-- phpjavascript傳值給javascript -->
<?php
$value="abc";
?>
<script>
var value="<?php echo $value; ?>";
document.write(value);
</script>