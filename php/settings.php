<?php
require_once '../config.php';
session_start();
$EPF =$_SESSION['epf_no'];
if($_POST) {

    $currentpass = ($_POST['currentpass']);
    $newpass = ($_POST['newpass']);
    $confirmpass = ($_POST['confirmpass']);
}

$sql = "SELECT password FROM users WHERE epf_no=$EPF ";
$query = $DBcon->prepare( $sql );
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC );

foreach( $results as $row ){
    $password = $row['password'];
}



$hash = hash('sha256', $currentpass); // password hashing using SHA256
//echo $hash;


if($hash != $password)
{
    echo "incorrect";
}else
{
    if($newpass!="" && $confirmpass!="") {
        if ($newpass == $confirmpass) {

            $hashpass = hash('sha256', $newpass); // password hashing using SHA256


            $stmt2 = $DBcon->prepare("UPDATE users SET password='$hashpass' WHERE epf_no=$EPF");
            if($stmt2->execute()) {
                echo "updated";
            }
        }
    }
}


?>