<?php

$control = "home";
$_title = "";
$_content = "";

if (isset($_GET["control"]) == true)
{
    $control = $_GET["control"];
}

switch ($control)
{
    case "puzzle":
        include("templates/puzzle.php");
        $_title = "Ghép hình";
        $_content = $tmp;     
    break;

    case "home":
    default:
        include("templates/home.php");
        $_title = "Trang chủ";
        $_content = $tmp;
    break;
}

$fullhtml = file_get_contents("templates/layout.php");

$fullhtml = str_replace("{{TITLEX}}",$_title,$fullhtml);
$fullhtml = str_replace("{{CONTENTX}}",$_content,$fullhtml);

print($fullhtml);
?>