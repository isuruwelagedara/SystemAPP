<?php
session_start();
require_once 'config.php';
$EPF =$_SESSION['epf_no'];

?>

<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

   <body>
   <div class="row">
       <div class="col s12">
           <nav class="red">
               <div class="nav-wrapper">
                   <div class="left col s12 m5 l5">
                       <ul>
                           <li>
                               <a href="#!" class="email-menu">
                                   <i class="material-icons">menu</i>
                               </a>
                           </li>
                           <li><a href="#!" class="email-type">Primary</a>
                           </li>
                           <li class="right">
                               <a href="#!">
                                   <i class="material-icons">search</i>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
       </div>
       <div class="col s12">

           <?php



           $sql = "SELECT * FROM notifications WHERE to_epf_no = '$EPF' ORDER BY id DESC ";
           $query = $DBcon->prepare( $sql );
           $query->execute();
           $results = $query->fetchAll( PDO::FETCH_ASSOC );


           foreach( $results as $row ){

               $a_leaves_id = $row['applied_leaves_id'];
               $from_epf_no = $row['from_epf_no'];
               $id_not = $row['id'];


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
           }




               echo ' <ul class="collapsible" data-collapsible="accordion">

               <li>
                   <div class="collapsible-header">


                       <i> <img style="max-width: 50px;" src="imgs/user.png" alt="" class="circle"> </i>

                       <h6 style="padding: 20px;">'.$userid.'</h6>
                       <h6 style="font-family: Roboto-bold;padding: 20px;">Requesting a '.$leave_typee.' leave</h6>
                       </div>
                   <div class="collapsible-body">

                       <h5 style="font-family: Roboto-bold;" >'.$leave_typee.' leave</h5>

                       <p>'.$reason.'</p>

                       <button class="btn waves-effect waves-light green"  type="submit" id ="notiyes-submit" name="acceptbutton" value ="'.$id_not.'">Accept

                       </button>
                       
                       <button class="btn waves-effect waves-light red" type="submit" id ="notino-submit" name="action" value ="'.$id_not.'">Reject

                       </button>
                   </div>
               </li>
           </ul>';


           }







           ?>

       </div>
   </div>








     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>
   <script src="appjs/notification.js"></script>

   </body>
 </html>
