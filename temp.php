<?php
session_start();

$user = $_SESSION['user'];



if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}else
{
    $depart = $_SESSION['department'];
    $EPF =$_SESSION['epf_no'];
    $immediate_sup = $_SESSION['immediate_sup'];
    $supervisor =$_SESSION['supervisor'];
    $user_type = $_SESSION['user_type'];
}

?>
<!DOCTYPE html>
<html>
<head>

    <!--Import Google Icon Font-->
  <!--  <link href="fonts/roboto/Roboto-Thin.ttf" rel="stylesheet"> -->
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/mycss.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>

    <script src="js/drag.js"></script>



    <script type="text/javascript" src="js/jquery.min.js"></script>
  <!--  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>-->



    <script type="text/javascript">

        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
       tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
            if(nyear<1000) nyear+=1900;
            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

            if(nhour==0){ap=" AM";nhour=12;}
            else if(nhour<12){ap=" AM";}
            else if(nhour==12){ap=" PM";}
            else if(nhour>12){ap=" PM";nhour-=12;}

            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        }


    </script>
    <style>

        header, main, footer {
            padding-left: 300px;
        }

        @media only screen and (max-width: 992px) {
            header, main, footer {
                padding-left: 0;
            }
        }


    </style>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css'>-->

</head>

<body>

<nav>

    <div class="nav-wrapper grey darken-3">
        <a href="#!" class="brand-logo left">Headstart Leave System</a>
        <ul class="right hide-on-med-and-down">

            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown" data-beloworigin="true"><i class="material-icons right">announcement</i>Notifications<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            <li><a href="logout.php"><i class="material-icons right">perm_identity</i>logout</a></li>
        </ul>
    </div>


</nav>

<!-- Dropdown Structure -->

<ul   id="dropdown" class=  "dropdown-content collection">
    <div class="notifactionnav-container">

    </div>
</ul>


<script language="javascript">
    function updateDB2() {
        $.post('notificationnav.php',{}, function (data) {

            //refresing the the notification data after reject
            $("div.notifactionnav-container").html(data);

        });
    }
</script>

<div class="container">


    <!--<div id="frame" class="col m12">-->

    <!--&lt;!&ndash;<sidebar&ndash;&gt;-->
    <!--<ul id="slide-out" class="side-nav fixed">-->
    <!--<li>-->
    <!--<div class="userView">-->
    <!--<div class="background">-->
    <!--<img src="http://media1.santabanta.com/full1/Creative/Abstract/abstract-823a.jpg">-->
    <!--</div>-->
    <!--<a href="#!user"><img class="circle"-->
    <!--src="http://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg"></a>-->
    <!--<a href="#!name"><span class="white-text name">John Doe</span></a>-->
    <!--<a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>-->
    <!--</div>-->
    <!--</li>-->
    <!--<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>-->
    <!--<li><a href="#!">Second Link</a></li>-->
    <!--<li>-->
    <!--<div class="divider"></div>-->
    <!--</li>-->
    <!--<li><a class="subheader">Subheader</a></li>-->
    <!--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>-->
    <!--</ul>-->

    <!--</div>-->




    <div class="row">
        <div class="col m6">
            <h5 id="Datefunction"><div id="clockbox"></div></h5>
                    <h4 id="UserName">Welcome <?php echo "$user"?>!</h4>

        </div>
        <!--<div class="col m6">-->

        <!--<div class="ct-chart-pie" style="width: 100%;height: 100%;">-->
        <!--<script>var data = {-->
        <!--series: [1, 3, 4]-->
        <!--};-->

        <!--var sum = function(a, b) { return a + b };-->

        <!--new Chartist.Pie('.ct-chart-pie', data, {-->
        <!--labelInterpolationFnc: function(value) {-->
        <!--return Math.round(value / data.series.reduce(sum) * 100) + '%';-->
        <!--}-->
        <!--});</script>-->
        <!--</div>-->

        <!--</div>-->
    </div>



    <div class="row">
        <hr>


            <?php
            /*/////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
            require_once 'config.php';


            /*All Leaves*/
            $sql = "SELECT * FROM users WHERE epf_no=$EPF ";
            $query = $DBcon->prepare( $sql );
            $query->execute();
            $results = $query->fetchAll( PDO::FETCH_ASSOC );
            foreach( $results as $row ) {
                $ann = $row['anual'];
                $cas = $row['casual'];
                $med = $row['medical'];
            }
            $total = $ann+$cas+$med;

        echo'    <div class="col m12">
            <div class="col m4">
                <div class="row"><h6 class="center">Totle Leave</h6></div>
                <div id="TotleLeave" class="card-panel teal transparent ">
                    <h1 id="TotleNo" class="center">'.$total.'
                    </h1>
                </div>

            </div>';
            /*All Leaves end*/

            /*Remaining leaves*/
            $sql = "SELECT * FROM available_leaves WHERE epf_no=$EPF ";
            $query = $DBcon->prepare( $sql );
            $query->execute();
            $results = $query->fetchAll( PDO::FETCH_ASSOC );
            foreach( $results as $row ){
                $annual = $row['annual'];
                $casual = $row['casual'];
                $medical = $row['medical'];
             /*Remaining leaves end*/
                $ann = $ann-$annual;
                $cas = $cas-$casual;
                $med = $med- $medical;

        echo'
            <div class="col m4">

                <div class="row"><h6 class="center">Use Leave</h6></div>
                <div id="UseLeave" class="card-panel teal transparent">


                    <div class="col m4"><h6 id="boxMedicul">Annual Leave</h6></div>

                    <div class="col m4"><h6 id="boxAnual">Casual Leave</h6></div>

                    <div class="col m4"><h6 id="boxCasual">Medical Leave</h6></div>


                    <div class="col m4"><h2 id="boxcoler1" class="center">'.$ann.'</h2></div>

                    <div class="col m4"><h2 id="boxcoler2" class=" center">'.$cas.'</h2></div>

                    <div class="col m4"><h2 id="boxcoler3" class=" center">'.$med .'</h2></div>

                </div>
            </div>';

         echo'   <div class="col m4">
                <div class="row"><h6 class="center">Remaining Leave</h6></div>
                <div id="Remaining" class="card-panel teal transparent">


                    <div class="col m4 "><h6 id="boxAnual">Annual Leave</h6></div>

                    <div class="col m4 "><h6 id="boxCasual">Casual Leave</h6></div>

                    <div class="col m4 "><h6 id="boxMedicul">Medical Leave</h6></div>


                    <div class="col m4 "><h2 id="boxcoler1" class="center">'.$annual. '</h2></div>

                    <div class="col m4 "><h2 id="boxcoler2" class="center">'.$casual. '</h2></div>

                    <div class="col m4 "><h2 id="boxcoler3" class="center">'.$medical. '</h2></div>


                </div>


            </div>';

         }
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
            ?>
        </div>

    </div>



    <div id="buot"  class="row center">

        <div class=" col m3">
            <a  class="waves-effect waves-light btn-large light-blue"href="#modal1"><i class="material-icons left">create_new_folder</i>New Leave</a>
        </div>
        <div class=" col m3">
            <a class="waves-effect waves-light btn-large light-blue"href="#modal2"><i class="material-icons left">notifications</i>Notifications</a>
        </div>
        <div class=" col m3">

            <a class="waves-effect waves-light btn-large light-blue"href="#modal5"><i class="material-icons left">settings_applications</i>Settings</a>
        </div>

        <?Php

        if($user_type == "admin") {
            echo '
        <div class=" col m3">
            <a class="waves-effect waves-light btn-large light-blue"href="#modal3"><i class="material-icons left">assignment_turned_in</i>Report</a>
        </div>

        <div class=" col m3">
        <br>
            <a class="waves-effect waves-light btn-large light-blue"href="#modal4"><i class="material-icons left">face</i>add a user</a>
        </div>
         <div class=" col m3">
        <br>
            <a class="waves-effect waves-light btn-large light-blue"href="#modal6"><i class="material-icons left">face</i>List of users</a>
        </div>';
        }
        ?>


    </div>




</div>

<!-- Modal Trigger -->



<!--End Model 1-->

<!-- Modal New Leave -->
<div id="modal1" class="modal modal-fixed-footer">
    <nav>
        <div class="nav-wrapper">

        </div>
    </nav>
    <div class="modal-content">
        <h5 class="center"> Apply for a Leave </h5>

        <div class="input-field col s6">
            <label>Select the Leave Type</label>
        </div>

        <br>
        <br>
        <form>


            <form action="#">
        <div>

            <input name="group_time" type="radio" id="time_test1" value="1" checked class="yes"/>
            <label for="time_test1">Full</label>
            <input name="group_time" type="radio" id="time_test2" value="2"class="no"/>
            <label for="time_test2">Before 12.30 p.m</label>
            <input name="group_time" type="radio" id="time_test3" value="3" class="no"/>
            <label for="time_test3">After 12.30 p.m</label>
        </div>

        <div class="col m6">



                    <div class="input-field col s6">

                        <label>Select the Leave Type</label>
                    </div>

                    <br>
                    <br>
                    <div class="col s12 m4 ">

                            <input name="group_apply" type="radio" id="test1" value="annual"/>
                            <label for="test1">Annual</label>
                            <input name="group_apply" type="radio" id="test2" value="casual"/>
                            <label for="test2">Casual</label>
                            <input name="group_apply" type="radio" id="test3" value="medical"/>
                            <label for="test3">Medical</label>




                    </div>



                    <div class="col s12 m4 ">

                        <div id="ltype-data" style="color: red;"></div>
                        <h6 class="red-text"></h6>


                    </div>


            <p1>
                <div class="row">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="number" id ="n_days" name="n_days" class="form-control" placeholder="Number of days" value="" maxlength="1" />
                    </div>
                    <div id="n_days-data" style="color: red;"></div>
                    <h6 class="red-text"></h6>
                </div>
            </p1>
                    <div class="row">
                        <div class="col m6"><input type="text" class="datepicker" id="commence" ><label>Date of Commencement</label>
                            <div id="commence-data" style="color: red;"></div>
                            <h6 class="red-text"></h6>
                        </div>
                        <div class="col m6"><input type="text" class="datepicker" id="resuming"><label>Date of Resuming Duties</label>
                            <div id="resuming-data" style="color: red;"></div>
                            <h6 class="red-text"></h6>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col m6">
                            <select id="acceptedd"onChange="myNewFunction(this);">
                                <option value="1" disabled selected>Choose your option</option>
                                <option value="1" disabled selected ><?php echo $immediate_sup;?></option>


                            </select>
                            <label>Leave Accepted by </label>
                            <div id="accepted-data" style="color: red;"></div>
                            <h6 class="red-text"></h6>
                        </div>


                        <div class="input-field col m6">
                            <select id="approvedd" value="<?php echo $supervisor;?>">
                                <option  disabled selected><?php echo $supervisor;?></option>

                            </select>
                            <label> Leave Approved by </label>
                            <div id="approved-data" style="color: red;"></div>
                            <h6 class="red-text"></h6>
                        </div>


                    </div>

                    <div class="row">
                        <div class="input-field col m6">
                            <select  id="coverup"onChange="myNewFunction(this);">
                                <option value="notselected"  selected="selected" >Choose your option</option>
                                <?php

                                require_once 'config.php';
                                //$depart = "Marketing";
                                $sql = "SELECT * FROM users WHERE department='$depart'";
                                $query = $DBcon->prepare($sql);
                                $query->execute();
                                $list = $query->fetchAll();


                                foreach ($list as $rs) {
                                    if($EPF != $rs['epf_no'] )
                                    {
                                    echo '<option value="'.$rs['epf_no'].'"> '.$rs['name_ini'].'</option>';
                                    }
                                }



                                ?>

                            </select>
                            <label>Duty Coverup by </label>
                            <div id="coverup-data" style="color: red;"></div>
                            <h6 class="red-text"></h6>
                        </div>



                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="reason" class="materialize-textarea"></textarea>
                            <label for="textarea1">Reason for Leave</label>
                            <div id="reason-data" style="color: red;"></div>
                            <h6 class="red-text"></h6>
                        </div>

                    </div>
                    <br>
                    <br>
                    <br>
                </form>
        </div>
    </div>

    <div class="modal-footer center">

        <button class="btn waves-effect waves-light blue darken-1 center-block" type="submit" name="action" id ="newleave-submit"
                style="margin-right: 43%;">
            Submit
            <i class="material-icons right">send</i>

        </button>

    </div>

</div>

</form>

<!-- End of Modal New Leave -->
<!--start Model 2-->
<div id="modal2" class="modal modal-fixed-footer">
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






            <div class="notifaction-container">

            </div>
            <body onload="updateDB();updateDB2();">
<script language="javascript">
        function updateDB() {
            $.post('notificationcontent.php',{}, function (data) {

                //refresing the the notification data after reject
                $("div.notifaction-container").html(data);

            });

          //onload starting the clock functions
                GetClock();
                setInterval(GetClock,1000);


        }
    </script>


        </div>
    </div>

</div>
<!--End Model 2-->

<!--End Model 3 Leave Report-->
<div id="modal3" class="modal modal-fixed-footer">

    <div class="modal-content">
        <h3>Leave Report</h3>
        <div class="col m12">

<!-- httttttttttt -->



            <!-- httttttttttt -->







            <div class="row">

                <div class="col s12 m6 l3"> <label for="birthdate" class="">From</label><input type="text" class="datepicker" id="date_from" >
                    <div id="date_from-data" style="color: red;"></div>
                    <h6 class="red-text"></h6>
                </div>

                <div class="col s12 m6 l3"><label for="birthdate" class="">To</label><input type="text" class="datepicker" id="date_to">
                    <div id="date_to-data" style="color: red;"></div>
                    <h6 class="red-text"></h6>
                </div>

            </div>

            <button class="waves-effect waves-light btn center" type="submit" name="generate-submit" id ="generate-submit">Generate<i class="material-icons right">send</i></button>

            <br>
            <br>
            <br>
            <div class="demo-container">
                <div class="demo-box"></div>
            </div>





        </div>

</div>

</div>
<!--End Model 3-->


<div id="modal4" class="modal modal-fixed-footer">


    <?php
    require_once 'config.php';
    ?>





    <!--  New User Create  Modal-->
    <nav>
        <div class="nav-wrapper">

        </div>
    </nav>

    <br>
    <div class="container">
        <h5 class="center"> Create A New User </h5>
        <div class="row">


            <div class=" col m8">




                <div class="row">

                    <div class="input-field col s4">
                        <input id="epfno" name="epfno" type="number" class="validate">
                        <label class="active" for="epfno">EPF NO</label>
                        <div id="epfno-data" style="color: red;"></div>

                        <p id="demo"></p>
                    </div>

                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate">
                        <label class="active" for="inputName">Name with initial</label>
                        <div id="name-data" style="color: red;"></div>
                    </div>

                    <div class="input-field col s12">
                        <input id="nicno" name="nicno" type="text" class="validate">
                        <label class="active" for="NICNO">NIC No</label>
                        <div id="nicno-data" style="color: red;"></div>
                    </div>

                    <div class="input-field col s4">
                        <input id="dob" name="dob" type="date" class="datepicker2">
                        <label class="active" for="DOB">Date of Birth</label>
                        <div id="dob-data" style="color: red;"></div>
                    </div>

                    <div class="input-field col s4">
                        <input id="phoneno" name="phoneno" type="tel" class="validate">
                        <label class="active" for="Phoneno">Mobile No</label>

                    </div>
                    <div class="input-field col s4">
                        <input id="tel" name="tel" type="tel" class="validate">
                        <label class="active" for="Tel">Telephone</label>
                    </div>


                    <div class="input-field col s12">
                        <input id="address" name="address" type="text" class="validate">
                        <label class="active" for="address">Address</label>
                        <div id="addres-data" style="color: red;"></div>

                    </div>
                    <div class="input-field col s12">
                        <input name="user_email" name="user_email" id="user_email" type="email" class="validate">
                        <label class="active" for="Email">E-mail</label>
                        <div id="user_email-data" style="color: red;"></div>
                    </div>



                    <div class="input-field col s4">
                        <input id="join" name="join" type="date" class="datepicker">
                        <label class="active" for="DOB">Joined Date</label>
                        <div id="join-data" style="color: red;"></div>
                    </div>


                    <div class="input-field col s12">
                        <label>Department</label>
                    </div>
                    <div class="input-field col s12">

                        <select id="department"onChange="myNewFunction(this);">
                            <option value="1" disabled selected>Choose your option</option>
                            <?php

                            require_once 'config.php';
                            $sql = "SELECT * FROM departments";
                            $query = $DBcon->prepare($sql);
                            $query->execute();
                            $list = $query->fetchAll();


                            foreach ($list as $rs) {

                                echo '<option value=\"'.$rs['id'].'\"> '.$rs['department'].'</option>';
                            }



                            ?>

                        </select>
                        <div id="department-data" style="color: red;"></div>
                    </div>


                    <div class="row">
                    <div class="input-field col s12">
                        <label>Number of Supervisors</label>
                    </div>
                    </div>
                    <div class="row">

                        <div class="col s12">

                            <div class="input-field col s12" >

                                <input name="group_super" type="radio" id="super_test1" value="1" checked class="yes"/>
                                <label for="super_test1">2 Supervisors</label>
                                <input name="group_super" type="radio" id="super_test2" value="0"class="no"/>
                                <label for="super_test2">1 Supervisor</label>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <p2>
                                    <input type="text" id="autocomplete" class="autocomplete" onkeyup="autocomplet()">
                                    <label for="autocomplete">Immediate Supervisor</label>
                                        <div id="immediate-data" style="color: red;"></div>
                                    <ul id="country_list_id" ></ul>
                                        </p2>

                                </div>
                                <div class="input-field col s12">

                                    <input type="text" id="autocomplete2" class="autocomplete2" onkeyup="autocomplet2()">
                                    <label for="autocomplete2">Supervisor</label>
                                    <div id="supervisor-data" style="color: red;"></div>
                                    <ul id="country_list_id2" ></ul>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <label>Assing Leaves</label>
                    </div>
                    <br>
                    <div class="input-field col s4">
                        <input id="annual" name="annual" type="number" class="validate">
                        <label class="active" for="epfno">Annual</label>
                        <div id="annual-data" style="color: red;"></div>

                    </div>
                    <div class="input-field col s4">
                        <input id="casual" name="casual" type="number" class="validate">
                        <label class="active" for="epfno">Casual</label>
                        <div id="casual-data" style="color: red;"></div>

                    </div>
                    <div class="input-field col s4">
                        <input id="medical" name="medical" type="number" class="validate">
                        <label class="active" for="epfno">Medical</label>
                        <div id="medical-data" style="color: red;"></div>

                    </div>
                    <div class="input-field col s12">
                        <label>Account Type</label>
                    </div>
                    <div class="input-field col s12" >
                        <br>
                        <input type="checkbox" id="admin" name="admin"  />
                        <label for="admin">Admin</label>

                    </div>
                    <div class="input-field col s12">
                        <label>Activate or Deactivate Account</label>
                    </div>
                    <div class="input-field col s12">

                        <p>
                            <input name="activate_group1" type="radio" id="activate_test1" checked="1" value="1" />
                            <label for="activate_test1">Activate</label>
                        </p>
                        <p>
                            <input name="activate_group1" type="radio" id="activate_test2" value="0" />
                            <label for="activate_test2">Deactivate</label>
                        </p>

                    </div>

                </div>





                <br><br>

                <button class="waves-effect waves-light btn center" type="submit" name="action" id ="name-submit">ADD</button>
                <!--  <input type ="submit" id ="name-submit" value="ADD"a class="waves-effect waves-light btn center"> </input> -->

                <a class="waves-effect waves-light btn center">Modify</a>
                <a class="waves-effect waves-light btn center">Delete</a>
                <a class="waves-effect waves-light btn center">Save</a>




                <br>

            </div>





        </div>

        <!--  End Of New User Create -->








    </div>
    <script>
        function myFunction() {
            var inpObj = document.getElementById("EPFNO");
            if (inpObj.checkValidity() == false) {
                document.getElementById("demo").innerHTML = inpObj.validationMessage;
            } else {
                document.getElementById("demo").innerHTML = "Input OK";
            }
        }
    </script>



    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="appjs/registerchk.js"></script>
    <script src="appjs/newleavechk.js"></script>
    <script src="appjs/leavereport.js"></script>
    <script src="appjs/notification.js"></script>
    <script src="appjs/notificationcontent.js"></script>






    <div class="modal-content">
        <h4></h4>
        <p></p>
    </div>

</div>

</div>
<!--End Model 4-->
<!--Modal 6-->
<div id="modal6" class="modal modal-fixed-footer">
    <?php
    //require_once 'config.php';
    echo  '<div class="row">';

    $con = mysqli_connect('localhost','root','','leave');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"leave");
    $sql="SELECT * FROM users";
    $result = mysqli_query($con,$sql);

    echo '<table class="highlight">
    <thead>
    <tr>
        <th>#</th>
        <th>EPF No</th>
        <th>Name</th>
        <th>NIC</th>
        <th>E-mail</th>

    </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['epf_no'] . "</td>";
        echo "<td>" . $row['name_ini'] . "</td>";
        echo "<td>" . $row['nic_no'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr></tbody>";
    }
    echo "</table>";
    mysqli_close($con);
    echo "</div>";
    ?>

</div>
<!--Modal 6 End-->
<!--Modal 5-->
<div id="modal5" class="modal modal-fixed-footer">
    <nav>
        <div class="nav-wrapper">
        </div>
    </nav>

    <br>
    <div class="container">
        <div class="row">



            <div class=" col m7">

                <h5>Change profile picture</h5>


                <!-- start of image upload-->
                <!--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->
                <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
             <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
                <div class="container">
                    <div class="input-field col s12">




                                <div class="row">
                                    <div class="col m7">
                                        <div id="upload-demo" style="width:350px"></div>
                                    </div>
                                    <div class="col m7" style="width:600px">
                                        <strong>Select Image:</strong>



                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>Select</span>
                                                <input  type="file" id="upload" multiple>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Upload New Profile image">
                                            </div>
                                        </div>
                                        <button class="btn btn-success upload-result" id="upload-result">Upload Image</button>
                                    </div>

                                </div>




                    </div>
                <script type="text/javascript">
                    $uploadCrop = $('#upload-demo').croppie({
                        enableExif: true,
                        viewport: {
                            width: 200,
                            height: 200,
                            type: 'circle'
                        },
                        boundary: {
                            width: 300,
                            height: 300
                        }
                    });


                    $('#upload').on('change', function () {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $uploadCrop.croppie('bind', {
                                url: e.target.result
                            }).then(function(){
                                console.log('jQuery bind complete');
                            });

                        }
                        reader.readAsDataURL(this.files[0]);
                    });


                    $('button#upload-result').on('click', function (ev) {
                        $uploadCrop.croppie('result', {
                            type: 'canvas',
                            size: 'viewport'
                        }).then(function (resp) {


                            $.ajax({
                                url: "imgphp/ajaxpro.php",
                                type: "POST",
                                data: {"image":resp},
                                success: function (data) {
                                    html = '<img src="' + resp + '" />';
                                   // $("#upload-demo-i").html(html);
                                    alert(data);
                                }
                            });
                        });
                    });


                </script>

                <!-- End of image upload-->

  <br>
                <br>
                <h5>Change Password</h5>

                <div class="row">

                    <div class="input-field col s12">
                        <input id ="currentpass" name="currentpass" type="password" class="validate">
                        <label class="active" for="password">Current Password</label>
                    </div>
                    <div class="col s12 m4 ">
                        <div id="currentpass-data" style="color: red;"></div>
                        <h6 class="red-text"></h6>

                    </div>
                    <div class="input-field col s12">
                        <input id ="newpass" name="newpass"  type="password" class="validate">
                        <label class="active" for="password"> New Password</label>
                    </div>
                    <div class="col s12 m4 ">
                        <div id="newpass-data" style="color: red;"></div>
                        <h6 class="red-text"></h6>

                    </div>
                    <div class="input-field col s12">
                        <input id ="confirmpass" name="confirmpass"  type="password" class="validate">
                        <label class="active" for="password"> Confirm password </label>
                    </div>
                    <div class="col s12 m4 ">
                        <div id="confirmpass-data" style="color: red;"></div>
                        <h6 class="red-text"></h6>

                    </div>
                </div>
                <button class="waves-effect waves-light btn center" id ="resetpass-submit" >Reset password</button>


            </div>
            <div class="row">
                <div class=" col m4">

                    <script type="text/javascript" src="js/materialize.min.js"></script>
                    <script src="appjs/settings.js"></script>

                </div>
            </div>
        </div>
    </div>
    </div>
      </div>
    <!--end Modal 5-->


<!-- end of profile pic modal-->








<!--<script src="dist/chartist.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="js/materialize.min.js"></script>-->
<script>

    $(document).ready(function () {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        format: 'm/d/yyyy',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });


    //date picker for date of birth
    $('.datepicker2').pickadate({
        format: 'm/d/yyyy',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 153// Creates a dropdown of 15 years to control year
    });

</script>
<!--<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>-->

<script>
    $('#buot').addClass('animated fadeIn');
    $('#UserName').addClass('animated zoomIn');
    $('#Datefunction').addClass('animated fadeIn');

    $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 200, // Transition out duration
            startingTop: '4%', // Starting top style attribute

            endingTop: '10%', // Ending top style attribute
            ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                // alert("Ready");
                console.log(modal, trigger);
            },
            complete: function() { /*alert('Closed');*/ } // Callback for Modal close
        }
    );

</script>

<script>
    //$('p1').slideUp();  //to hide
    $(document).ready(function(){
        $('.yes').click(function(){
            $('p1').slideDown(); //to show
        });
        $('.no').click(function(){
            $('p1').slideUp();  //to hide
        });
    });




    //$('p2').slideUp();  //to hide
    $(document).ready(function(){
        $('.yes').click(function(){
            $('p2').slideDown(); //to show
        });
        $('.no').click(function(){
            $('p2').slideUp();  //to hide
        });
    });
</script>
<script>
    (function($) {
        $(function() {

            $('.dropdown-button').dropdown({
                    inDuration: 300,
                    outDuration: 225,
                    hover: true, // Activate on hover
                    belowOrigin: true, // Displays dropdown below the button
                    alignment: 'right' // Displays dropdown with edge aligned to the left of button
                }
            );

        }); // End Document Ready
    })(jQuery); // End of jQuery name space
</script>

<!--Import jQuery before materialize.js-->
    
    <!-- Page Content goes here -->
<script  src="appjs/autocomplete.js"></script>

</body>
</html>
