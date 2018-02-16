<?php
session_start();
require_once 'config.php';

$EPF =$_SESSION['epf_no'];
$name_ini =$_SESSION['user'];

$immediate_sup = $_SESSION['immediate_sup'];
$supervisor = $_SESSION['supervisor'];



            $sql = "SELECT * FROM notifications WHERE to_epf_no = '$EPF' ORDER BY id DESC ";
            $query = $DBcon->prepare( $sql );
            $query->execute();
            $results = $query->fetchAll( PDO::FETCH_ASSOC );


            foreach( $results as $row ){

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
                $query3 = $DBcon->prepare( $sql3 );
                $query3->execute();
                $results3 = $query3->fetchAll( PDO::FETCH_ASSOC );


                foreach( $results3 as $row3 ){
                    $leave_typee =  $row3['leave_type'];
                    $reason =  $row3['reason'];
                    $epf_no =  $row3['epf_no'];
                }
                $imagepath =$epf_no.'.png';
                if (file_exists('imgphp/upload/'.$imagepath)) {
                    $imagepath =$epf_no.'.png';
                     }else
                {
                    $imagepath ='user.png';
                }



                echo ' <ul class="collapsible" data-collapsible="accordion">

               <li>
                   <div class="collapsible-header">

                       <i> <img style="max-width: 50px;" src="imgphp/upload/'.$imagepath.'" alt="" class="circle"> </i>
                        
                       <h6 style="padding: 20px;">' .$userid.'</h6>
                       <h6 style="font-family: Roboto-bold;padding: 20px;">Requesting a '.$leave_typee.' leave</h6>
                       <h6 style="font-family: Roboto-bold;padding: 20px;">'.$notification_state.' </h6>
                       
                       </div>';


if($notification_state!="approved" && $notification_state!="rejected") {

    echo ' <div class="collapsible-body">

                       <h5 style="font-family: Roboto-bold;" >' . $leave_typee . ' leave</h5>

                       <p>' . $reason . '</p>

                       <button class="btn waves-effect waves-light green"  type="submit" id ="notiyes-submit" name="acceptbutton" value ="' . $id_not . '">Accept

                       </button>
                       
                       <button class="btn waves-effect waves-light red" type="submit" id ="notino-submit" name="action" value ="' . $id_not . '">Reject

                       </button>
                   </div>
               </li>
           </ul>';
}

            }




         echo'<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
             <script  src="appjs/notification.js"></script>';


            ?>