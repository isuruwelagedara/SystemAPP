<?php

//$q = intval($_GET['q']);
//$q="1";
$date_from = ($_POST['date_from']);
$date_to = ($_POST['date_to']);

$con = mysqli_connect('localhost','root','','leave');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");
//$sql="SELECT * FROM users WHERE id = '".$q."'";

//$sql= "SELECT * FROM applied_leaves WHERE leave_apply_date BETWEEN '11/21/2017' AND  '11/24/2017' ORDER by id ASC";
$sql= "SELECT * FROM applied_leaves WHERE leave_apply_date BETWEEN '$date_from' AND  '$date_to' ORDER by id ASC";
$result = mysqli_query($con,$sql);





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





while($row = mysqli_fetch_array($result)) {



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
echo "</table>";
mysqli_close($con);



?>