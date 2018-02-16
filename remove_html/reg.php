<!DOCTYPE html>

    <?php
require_once 'config.php';
?>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="fonts/roboto/Roboto-Thin.ttf" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/mycss.css"/>
    <!--Let browser know website is optimized for mobile-->

    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

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
                        <input id="dob" name="dob" type="date" class="datepicker">
                        <label class="active" for="DOB">Date of Birth</label>
                        <div id="dob-data" style="color: red;"></div>
                    </div>


                    <div class="input-field col s12">
                        <input id="addres" name="addres" type="text" class="validate">
                        <label class="active" for="address">Address</label>
                        <div id="addres-data" style="color: red;"></div>

                    </div>

                    <div class="input-field col s4">
                        <input id="phoneno" name="phoneno" type="tel" class="validate">
                        <label class="active" for="Phoneno">Mobile No</label>
                        <div id="phoneno-data" style="color: red;"></div>
                    </div>
                    <div class="input-field col s4">
                        <input id="tel" name="tel" type="tel" class="validate">
                        <label class="active" for="Tel">Telephone</label>
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
                        <label>Activate or Deactivate Account</label>
                    </div>
                    <div class="input-field col s12">

                        <p>
                            <input name="group1" type="radio" id="group1" checked="checked" value ="1"/>
                            <label for="test1">Activate</label>
                        </p>
                        <p>
                            <input name="group1" type="radio" id="test2" value ="0"/>
                            <label for="test2">Deactivate</label>
                        </p>

                    </div>
                    <div class="input-field col s12" >
                        <select>
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>User Type</label>
                    </div>

                    <div class="input-field col s12" >
                        <br>
                            <input type="checkbox" id="test5" name="chk1" />
                            <label for="test5">Admin</label>
                             <input type="checkbox" id="test5" name="chk2" />
                            <label for="test5">Employee</label>

                    </div>

                </div>





<br><br>
            <input type ="submit" id ="name-submit" value="ADD"a class="waves-effect waves-light btn center">
                <a class="waves-effect waves-light btn center">Modify</a>
                <a class="waves-effect waves-light btn center">Delete</a>
                <a class="waves-effect waves-light btn center">Save</a>




            <br>

        </div>





    </div>



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
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
    echo "</div>";
?>






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

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });

        </script>
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/myscript.js"></script>

</body>
</html>


