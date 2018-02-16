<?php
session_start();
$EPF =$_SESSION['epf_no'];
$name_ini =$_SESSION['user'];



require_once 'config.php';

if($_POST)
{

    $group_apply = ($_POST['group_apply']);
    $commence = ($_POST['commence']);
    $resuming = ($_POST['resuming']);
    $n_days = ($_POST['n_days']);
    $accepted = ($_POST['accepted']);
    $approved = ($_POST['approved']);
    $coverup = ($_POST['coverup']);
    $reason = ($_POST['reason']);

    $group_chk = ($_POST['group_chk']);

    //Date
    $info = getdate();
    $date = $info['mday'];
    $month = $info['mon'];
    $year = $info['year'];
    $hour = $info['hours'];
    $min = $info['minutes'];
    $sec = $info['seconds'];
    //Date end

    $leave_apply_date = "$month/$date/$year";









    try
    {
        $stmt = $DBcon->prepare("SELECT * FROM applied_leaves WHERE commence_date=:commence AND epf_no=:epf_no");
        $stmt->execute(array(
            ":commence"=>$commence,
            ":epf_no" => $EPF)
        );
        $count = $stmt->rowCount();




		
        if($count==0){


            /*Calculations for the leave deduction*/


            if ($group_chk == "annual") {

                $sql = "SELECT * FROM available_leaves WHERE epf_no=$EPF ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){
                    $ann = $row['annual'];
                }

                $ann = $ann - $n_days;
                $stmt2 = $DBcon->prepare("UPDATE available_leaves SET annual='$ann' WHERE epf_no=$EPF");
                $stmt2->execute();
            }

            if ($group_chk == "casual") {

                $sql = "SELECT * FROM available_leaves WHERE epf_no=$EPF ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){
                    $ann = $row['casual'];
                }

                $ann = $ann - $n_days;
                $stmt2 = $DBcon->prepare("UPDATE available_leaves SET casual='$ann' WHERE epf_no=$EPF");
                $stmt2->execute();
            }

            if ($group_chk == "medical") {

                $sql = "SELECT * FROM available_leaves WHERE epf_no=$EPF ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){
                    $ann = $row['medical'];
                }

                $ann = $ann - $n_days;
                $stmt2 = $DBcon->prepare("UPDATE available_leaves SET medical='$ann' WHERE epf_no=$EPF");
                $stmt2->execute();
            }
            /*Calculations for the leave deduction end*/



            $stmt = $DBcon->prepare("INSERT INTO applied_leaves(leave_type,commence_date,resuming_date,number_days,accept_by,approve_by,coverup_by,reason,leave_apply_date,epf_no,name_ini) VALUES('$group_apply','$commence','$resuming','$n_days','$accepted','$approved','$coverup','$reason','$leave_apply_date','$EPF','$name_ini')");


            if($stmt->execute())
            {



               echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

            echo "Record is already inserted for this commencement date"; //  not available
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>