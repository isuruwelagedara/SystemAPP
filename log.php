<?php
//echo "aa";
ob_start();
session_start();
require_once 'config.php';
// it will never let you open index(login) page if session is set
/*
if ( isset($_SESSION['user'])!="" ) {
   header("Location: dashboard.php");
    exit;
}*/

//if($_POST) {

    $EPF = ($_POST['epfno']);
    $pass = ($_POST['pass']);
   // echo $name_ini;

//$EPF = "75";
//$pass = "1234";

//echo $EPF;
//$pass

    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs



    // if there's no error, continue to login


        $password = hash('sha256', $pass); // password hashing using SHA256






$db = mysqli_connect($DBhost,$DBuser,$DBpass,$DBname);


$sql = "SELECT epf_no,name_ini,password,department,immediate_sup,supervisor,user_type FROM users WHERE epf_no='$EPF'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);





        if( $row['password']==$password ) {
            $_SESSION['user'] = $row['name_ini'];
            $_SESSION['epf_no'] = $row['epf_no'];
            $_SESSION['department'] = $row['department'];
            $_SESSION['immediate_sup'] = $row['immediate_sup'];
            $_SESSION['supervisor'] = $row['supervisor'];
			$_SESSION['user_type'] = $row['user_type'];

            //header("Location: control.php");
            echo "ok";
        } else {
            echo "Incorrect Credentials, Try again...";
        }






//}


?>