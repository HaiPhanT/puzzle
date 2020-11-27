<?php

$tmp = "<p><h2>Thông tin Sinh Viên</h2>Họ tên: Vũ Xuân Tuấn Anh <br> MSSV: 1988004 <br> Email: vu.anh@outlook.com <br> Phone : 0988881696<br></p><p><h2>Danh Sách Các Hình Ghép</h2>";

include("dbinfo.php");
$cnn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
if (!$cnn)
{
    die ("Khong the ket noi database");
}
mysqli_set_charset($cnn, "utf8");

$sql = "SELECT * FROM hinhghep ORDER BY PID ASC";

$data = mysqli_query($cnn, $sql);
$row = "";

$tmp .= "<table border='1' cellspacing='0' cellpadding='10'><tr><td>PID</td><td>Tên</td><td>Hình</td><td>Cột</td><td>Dòng</td><td>Chọn</td></tr>";

while ($row = mysqli_fetch_assoc($data))
{
  $tenhinhghep; $pid; $url; $cot; $dong;

  $pid = $row["PID"];
  $tenhinhghep = $row["TenHinhGhep"];
  $url = $row["URL"];
  $cot = $row["Cot"];
  $dong = $row["Dong"];

  $tmp .= "<tr><td>$pid</td><td>$tenhinhghep</td><td><img src='$url' width='240' height='180'></td><td>$cot</td><td>$dong</td>
  <td><form method='GET' action='session.php'><input type='text' name='from' value='home' hidden><input type='text' name='pid' value='$pid' hidden><input type='submit' value='Chọn'></form></td></tr>";
}

$tmp .= "</table></p>";

mysqli_close($cnn);


?>