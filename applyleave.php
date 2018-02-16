<?php

session_start();
$EPF =$_SESSION['epf_no'];
$name_ini =$_SESSION['user'];

$immediate_sup = $_SESSION['immediate_sup'];
$supervisor = $_SESSION['supervisor'];

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
                //////insert data to notification////////

                $notification_type = "leave";
                $notification_state = "waiting";

                if($immediate_sup== '')
                {
                    $immediate_sup = $supervisor;
                    $sql = "SELECT epf_no FROM manager_table WHERE name ='$immediate_sup' ";
                    $query = $DBcon->prepare( $sql );
                    $query->execute();
                    $results = $query->fetchAll( PDO::FETCH_ASSOC );


                    foreach( $results as $row ){

                        $to_epf_no = $row['epf_no'];
                        //echo $to_epf_no;

                    }
                }else
                {

                    $sql = "SELECT epf_no FROM immediate_table WHERE name ='$immediate_sup' ";
                    $query = $DBcon->prepare( $sql );
                    $query->execute();
                    $results = $query->fetchAll( PDO::FETCH_ASSOC );


                    foreach( $results as $row ){

                        $to_epf_no = $row['epf_no'];
                        //echo $to_epf_no;

                    }


                }


                $sql = "SELECT id FROM applied_leaves WHERE epf_no ='$EPF' ORDER BY id DESC LIMIT 1 ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){

                    $applied_leaves_id = $row['id'];
                    //echo $applied_leaves_id ;

                    $stmt = $DBcon->prepare("INSERT INTO notifications(from_epf_no,to_epf_no,applied_leaves_id,notification_type,notification_state) VALUES('$EPF','$to_epf_no','$applied_leaves_id','$notification_type','$notification_state')");
                    $stmt->execute();
                }
/////////////////////////// Sending email/////////////////////////////////////////
                $sql = "SELECT id FROM applied_leaves WHERE epf_no ='$EPF' ORDER BY id DESC LIMIT 1 ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){

                    $applied_leaves_id = $row['id'];
                }

///// Retrieving data from applied_leaves///////
                $sql = "SELECT * FROM applied_leaves WHERE id ='$applied_leaves_id' ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){

                    $reason = $row['reason'];
                }

                ///// Retrieving data from userers email address///////
                $sql = "SELECT * FROM users WHERE epf_no ='$to_epf_no' ";
                $query = $DBcon->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC );

                foreach( $results as $row ){

                    $email = $row['email'];
                }


/////////////////////////// Sending email /////////////////////////////////////////

include_once 'php/email/applyleaveemail.php';

/////////////////////////// Sending email end/////////////////////////////////////////

                //////insert data to notification end////////


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