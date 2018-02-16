<?php
session_start();
require_once 'config.php';

$EPF =$_SESSION['epf_no'];
$name_ini =$_SESSION['user'];

$immediate_sup = $_SESSION['immediate_sup'];
$supervisor = $_SESSION['supervisor'];



$sql = "SELECT * FROM notifications WHERE to_epf_no = '$EPF' ORDER BY id DESC LIMIT 5";
$query = $DBcon->prepare( $sql );
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC );


echo'<ul class="collection" >';


foreach( $results as $row ) {

    $a_leaves_id = $row['applied_leaves_id'];
    $from_epf_no = $row['from_epf_no'];
    $id_not = $row['id'];
    $notification_state = $row['notification_state'];


    $sql2 = "SELECT * FROM users WHERE epf_no = '$from_epf_no' ";
    $query2 = $DBcon->prepare($sql2);
    $query2->execute();
    $results2 = $query2->fetchAll(PDO::FETCH_ASSOC);


    foreach ($results2 as $row2) {
        $userid = $row2['name_ini'];


    }

    $sql3 = "SELECT * FROM applied_leaves WHERE id = '$a_leaves_id' ";
    $query3 = $DBcon->prepare($sql3);
    $query3->execute();
    $results3 = $query3->fetchAll(PDO::FETCH_ASSOC);


    foreach ($results3 as $row3) {
        $leave_typee = $row3['leave_type'];
        $reason = $row3['reason'];
        $epf_no =  $row3['epf_no'];
    }

    $imagepath =$from_epf_no.'.png';
    if (file_exists('imgphp/upload/'.$imagepath)) {
        $imagepath =$from_epf_no.'.png';
    }else
    {
        $imagepath ='user.png';
    }

    echo '
    <li class="collection-item avatar">
	
        <img src="imgphp/upload/'.$imagepath.'" alt="" class="circle" >
        <span href="#modal2"class="title">'.$userid.'</span>
        <p>Requesting for a '.$leave_typee.' leave</p>
        <a href="#modal2" class="secondary-content"><i class="material-icons">contact_mail</i></a></li>
		
';
}

echo'</ul>';




?>
