<?php
require_once 'config.php';

$date_from = ($_POST['date_from']);
$date_to = ($_POST['date_to']);



$sql = "SELECT * FROM applied_leaves WHERE leave_apply_date BETWEEN '$date_from' AND  '$date_to' ORDER by id ASC";
$query = $DBcon->prepare( $sql );
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC );


echo "<table class=\"bordered\">
 <tr>
                    <th>id</th>
                    <th>EPF No </th>
                    <th>Name </th>
                    <th>Leave Type</th>
                    <th>Commence Date</th>
                    <th>Resuming Date</th>
                    <th>Number of Dates</th>                  
                    <th>Coverup By</th>
                    <th>Applied Date</th>

                </tr>";


 foreach( $results as $row ){
     echo "<tr>";
     echo "<td>" . $row['id'] . "</td>";
     echo "<td>" . $row['epf_no'] . "</td>";
     echo "<td>" . $row['name_ini'] . "</td>";
     echo "<td>" . $row['leave_type'] . "</td>";
     echo "<td>" . $row['commence_date'] . "</td>";
     echo "<td>" . $row['resuming_date'] . "</td>";
     echo "<td>" . $row['number_days'] . "</td>";
     echo "<td>" . $row['coverup_by'] . "</td>";
     echo "<td>" . $row['leave_apply_date'] . "</td>";

     echo "</tr>";
}





?>