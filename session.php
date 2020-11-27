<?php
session_start();

$from = "";
if (isset($_GET["from"]) == true)
{
  $from = $_GET["from"];
}

if ($from == "home")
{
    $pid = "";
    if (isset($_GET["pid"]) == true)
    {
      $pid = $_GET["pid"];
    }
  
    $luotchoi = array();
    array_push($luotchoi,$pid);
    array_push($luotchoi,date("Y-m-d H:i:s"));
 
    $_SESSION["luotchoi"] = $luotchoi;     
    
    echo '<meta http-equiv = "refresh" content = "0; url = index.php?control=puzzle" />';
}
else if ($from == "puzzle")
{
  $manhghep = "";
  $hang = "";
  $cot = "";
  if (isset($_GET["manhghep"]) == true)
  {
    $manhghep = $_GET["manhghep"];
  }
  if (isset($_GET["hang"]) == true)
  {
    $hang = $_GET["hang"];
  }
  if (isset($_GET["cot"]) == true)
  {
    $cot = $_GET["cot"];
  }

  $laynoidung = explode("-",$manhghep);
  $mid =  $laynoidung[0];
  $hang_dung = $laynoidung[1];
  $cot_dung = $laynoidung[2];

  if ($hang == $hang_dung && $cot == $cot_dung)
  {
    if ($hang == 1 && $cot == 1)
    {
      $_SESSION["vitri1"] = 1;
    }
    if ($hang == 1 && $cot == 2)
    {
      $_SESSION["vitri2"] = 1;
    }
    if ($hang == 2 && $cot == 1)
    {
      $_SESSION["vitri3"] = 1;
    }
    if ($hang == 2 && $cot == 2)
    {
      $_SESSION["vitri4"] = 1;
    }


    if (isset($_SESSION["da_chon_dung"]) == true)
    {
      array_push($_SESSION["da_chon_dung"],$mid);
    }
    else
    {
      $da_chon_dung = array();
      array_push($da_chon_dung,$mid);
      $_SESSION["da_chon_dung"] = $da_chon_dung;
    }
    echo '<meta http-equiv = "refresh" content = "0; url = index.php?control=puzzle" />';
  }  
  else
  {
    echo '<meta http-equiv = "refresh" content = "0; url = index.php?control=puzzle" />';
  }  
}
else
{

}
?>