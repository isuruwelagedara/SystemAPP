<?php

session_start();
$EPF =$_SESSION['epf_no'];
$name_ini =$_SESSION['user'];

$immediate_sup = $_SESSION['immediate_sup'];
$supervisor = $_SESSION['supervisor'];

//echo $immediate_sup;
//echo $supervisor;
require_once '../config.php';

if($_POST) {

    $acceptbutton = ($_POST['acceptbutton']);
    $state = ($_POST['state']);


    ///////Fiding epf no of leave reequested person
    $sql = "SELECT * FROM notifications WHERE id=$acceptbutton ";
    $query = $DBcon->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        $from_epf_no = $row['from_epf_no'];
        $applied_leaves_id = $row['applied_leaves_id'];
        $notification_type = $row['notification_type'];

    }

    ///////// finding the immidiate supervisor available or not
    $sql = "SELECT * FROM users WHERE epf_no=$from_epf_no ";
    $query = $DBcon->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        $immediate_sup = $row['immediate_sup'];
    }

    ///////// finding the user's supervisor(manager) epf no
    $sql = "SELECT * FROM users WHERE epf_no=$from_epf_no ";
    $query = $DBcon->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        $supervisor = $row['supervisor'];
    }


    ///////// finding the  supervisor epf no on manager table
    $sql = "SELECT * FROM manager_table WHERE name='$supervisor' ";
    $query = $DBcon->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        $to_epf_no = $row['epf_no'];

    }






    if ($acceptbutton != "" && $state != "") {
        //echo $acceptbutton;
        //echo $state;

        if ($immediate_sup == "") {

            if ($state == "approved") {

                $stmt2 = $DBcon->prepare("UPDATE notifications SET notification_state='approved' WHERE id=$acceptbutton");
                $stmt2->execute();
                echo "approved";

            } else {
                $stmt2 = $DBcon->prepare("UPDATE notifications SET notification_state='rejected' WHERE id=$acceptbutton");
                $stmt2->execute();
                echo "rejected";
            }
        }else{
            if ($state == "approved") {

                $stmt2 = $DBcon->prepare("UPDATE notifications SET notification_state='approved' WHERE id=$acceptbutton");
                $stmt2->execute();
                echo "approved";




                $notification_state = "waiting";


                ///////// checking already exist enter to supervisor

                $stmt = $DBcon->prepare("SELECT * FROM notifications WHERE to_epf_no=:to_epf_no AND applied_leaves_id=:applied_leaves_id");
                $stmt->execute(array(
                        ":to_epf_no"=>$to_epf_no,
                        ":applied_leaves_id" => $applied_leaves_id)
                );
                $count = $stmt->rowCount();

                if($count==0){
                    //echo $count;
                    $stmt = $DBcon->prepare("INSERT INTO notifications(from_epf_no,to_epf_no,applied_leaves_id,notification_type,notification_state) VALUES('$from_epf_no','$to_epf_no','$applied_leaves_id','$notification_type','$notification_state')");
                    $stmt->execute();

                    //sending approved notification back to employee
                    $stmt = $DBcon->prepare("INSERT INTO notifications(from_epf_no,to_epf_no,applied_leaves_id,notification_type,notification_state) VALUES('$to_epf_no','$from_epf_no','$applied_leaves_id','$notification_type','approved')");
                    $stmt->execute();
                    //Sending email to supervisior (manager)



                }else
                {
                    echo "already approved";
                    //echo $count;
                }



            } else {
                $stmt2 = $DBcon->prepare("UPDATE notifications SET notification_state='rejected' WHERE id=$acceptbutton");
                $stmt2->execute();
                echo "rejected";
            }
        }
    }

}



?>