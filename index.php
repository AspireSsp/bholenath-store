<?php


$getpath = file_get_contents('siteplan/website.json');

// echo $_GET['page'];
// echo $getpath."";

$currentpage = "index";
 $arr=json_decode($getpath,true);
$title="";
$key = "";
$desc = "";
$content="";


$found = false;

if (isset($_GET['page'])) {
	$currentpage = $_GET['page'];
}


for ($i=0; $i < count($arr) ; $i++) { 
	if($arr[$i]["page"] == $currentpage){
		$title = $arr[$i]["title"];
		$keywords = $arr[$i]["keywords"];
		$desc = $arr[$i]["desc"];
		$content = file_get_contents($arr[$i]['path']);
		$found = true;
	}
}


if(!$found){
	$title = "Page Not Found";
	//$content = file_get_contents('greatpages/404.html');
	$content = "Page Not Found";
}



require 'header.php';

echo "".$content ;

require 'footer.php';
?>