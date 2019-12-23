<?php
	session_start();
  	$UID = $_SESSION['username'];

$directory = "../img";
$images = glob($directory . "/*.jpg");

foreach($images as $image)
{
  echo $image;
}

?>
