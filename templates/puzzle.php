<?php

session_start();

$tmp = "";
$pid = "";

if (isset($_SESSION["luotchoi"]) == true)
{
  $pid = $_SESSION["luotchoi"][0];
  
  include("dbinfo.php");
  $cnn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
  if (!$cnn)
  {
      die ("Khong the ket noi database");
  }
  mysqli_set_charset($cnn, "utf8");

  $sql = "SELECT * FROM hinhghep WHERE PID='$pid'";
  $data = mysqli_query($cnn, $sql);
  $row = "";

  while ($row = mysqli_fetch_assoc($data))
  {
    $pid; $url;
    $pid = $row["PID"];
    $url = $row["URL"];
    $tmp .= "Hình ghép: <br> <img src='$url' width='240' height='180'>";
  }

  $sql3 = "SELECT COUNT(MID) AS Count FROM manhghep WHERE ThuocPID='$pid'";
  $data3 = mysqli_query($cnn, $sql3);  
  $row3 = mysqli_fetch_assoc($data3);

  $sql1 = "SELECT * FROM manhghep WHERE ThuocPID='$pid' ORDER BY RAND()";
  $data1 = mysqli_query($cnn, $sql1);
  $row1 = ""; 

  $da_chon_dung = "";
  if (isset($_SESSION["da_chon_dung"]) == true)
  {
    $da_chon_dung = $_SESSION["da_chon_dung"];
  } 
  if ($da_chon_dung != Null)
  {
    if($row3["Count"] == count($da_chon_dung))
    {
      $tmp .= "Chúc mừng hoàn thành trò chơi";
      $them_pid = $_SESSION["luotchoi"][0];
      $them_ngay = $_SESSION["luotchoi"][1];
      $them_ngaykt = date("Y-m-d H:i:s");
      $sql4 = "INSERT INTO luotchoi(ID,PID,ThoiGianBD,ThoiGianKT) VALUES (NULL,'$them_pid','$them_ngay','$them_ngaykt')";
      $data4 = mysqli_query($cnn, $sql4);
      $tmp .= "<br><p><a href='xoasession.php'>Kết thúc lượt chơi</a></p>";
    }
    else
    {
      $tmp .= "<p>Bạn đã chọn đúng mảnh ghép ";
      foreach ($da_chon_dung as $mid_dung)
      {
        $tmp .= " $mid_dung ";                             
      }
      $tmp .= "</p>";

      $tmp .= "<p><br>Chọn Mảnh ghép Tiếp theo: <form action='session.php' method='GET'><input type='text' name='from' value='puzzle' hidden>";

      $khung1 = "";
      $khung2 = "";
      $khung3 = "";
      $khung4 = "";

      while ($row1 = mysqli_fetch_assoc($data1))
      {
        $mid; $murl; $x; $y;
        $mid = $row1["MID"];
        $murl= $row1["URL"];    
        $x = $row1["x"];
        $y= $row1["y"];     
        
        if ($x == 1 && $y == 1)
        {
          $khung1 = "<img src='$murl' width='120' height='90'>";
        }
        else if ($x == 1 && $y == 2)
        {
          $khung2 = "<img src='$murl' width='120' height='90'>";
        }
        else if ($x == 2 && $y == 1)
        {
          $khung3 = "<img src='$murl' width='120' height='90'>";
        }
        else if ($x == 2 && $y == 2)
        {
          $khung4 = "<img src='$murl' width='120' height='90'>";
        }        
        else
        {
        }

        if (in_array($mid, $da_chon_dung)) 
        {
          $tmp .= "";
        }
        else
        {
          $tmp .= "<br><img src='$murl' width='120' height='90'> <input type='radio' name='manhghep' value='$mid-$x-$y'><br>";
        }
      
      }
      $tmp .= "<br>Tọa độ Hàng: <input type='text' name='hang' value=''><br><br>Tọa độ Cột: <input type='text' name='cot' value=''><br><input type='submit' value='Submit'></form></p><br>";
 
      $tmp .= "<p><br>Khung ghép: <br> <table width='240' height='180' border='1'><tr><td style='height:90px;width:120px'>";

      if (isset($_SESSION["vitri1"]) == true)
      {
        $tmp .= "$khung1";
      }

      $tmp .="</td><td style='height:90px;width:120px'>";

      if (isset($_SESSION["vitri2"]) == true)
      {
        $tmp .= "$khung2";
      }

      $tmp .="</td></tr><tr><td style='height:90px;width:120px'>";

      if (isset($_SESSION["vitri3"]) == true)
      {
        $tmp .= "$khung3";
      }
      $tmp .="</td><td style='height:90px;width:120px'>";

      if (isset($_SESSION["vitri4"]) == true)
      {
        $tmp .= "$khung4";
      }
      $tmp .="</td></tr></table></p>";      
    
      $tmp .= "<br><p><a href='xoasession.php'>Kết thúc lượt chơi</a></p>";       
    }
  }
  else
  {
    $tmp .= "<p><br>Mảnh ghép: <form action='session.php' method='GET'><input type='text' name='from' value='puzzle' hidden>";
    while ($row1 = mysqli_fetch_assoc($data1))
    {
      $mid; $murl; $x; $y;
      $mid = $row1["MID"];
      $murl= $row1["URL"];    
      $x = $row1["x"];
      $y= $row1["y"];     
      $tmp .= "<br><img src='$murl' width='120' height='90'> <input type='radio' name='manhghep' value='$mid-$x-$y'><br>";
    }
    $tmp .= "<br>Tọa độ Hàng: <input type='text' name='hang' value=''><br><br>Tọa độ Cột: <input type='text' name='cot' value=''><br><input type='submit' value='Submit'></form></p><br>";

    $tmp .= "<p><br>Khung ghép: <br><table width='240' height='180' border='1'><tr><td></td><td></td></tr><tr><td></td><td></td></tr></table></p>";
  
    $tmp .= "<br><p><a href='xoasession.php'>Kết thúc lượt chơi</a></p>";
  }
}
else
{
  $tmp .= "Vui lòng chọn hình ghép ở <a href='index.php'>Trang chủ</a>";
}


?>