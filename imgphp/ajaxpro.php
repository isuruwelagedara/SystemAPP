<?php
session_start();
$EPF =$_SESSION['epf_no'];

$data = $_POST['image'];



list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);


$data = base64_decode($data);
//$imageName = time().'.png';
//$imageName = "1.png";
$imageName =$EPF.'.png';
file_put_contents('upload/'.$imageName, $data);


echo 'uploaded';
?>