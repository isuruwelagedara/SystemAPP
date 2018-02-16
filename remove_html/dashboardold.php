<?php
session_start();

$user = $_SESSION['user'];
if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="fonts/roboto/Roboto-Thin.ttf" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/mycss.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <ul id="navi" class="right">
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="col 6 "><h3 class="center ">To Day 2017 01 25th</h3></div>
    <div class=" col m1"></div>

    <div class=" col m10">

        <h5 class="center"> Hi Welcome <?php echo "$user"?> </h5>

        <hr>

        <div class="row center">

            <div class="col  m3"><a class="waves-effect waves-light btn-large orange accent-4 ">Leave
                Types</a></div>

            <div class="col  m3"><a class="waves-effect waves-light btn-large   teal darken-4">Create
                User</a></div>

            <div class="col  m3"><a class="waves-effect waves-light btn-large blue darken-4">Grant
                Leave</a></div>

            <div class="col  m3"><a
                    class="waves-effect waves-light btn-large deep-purple darken-1">Report</a>
            </div>


        </div>

    </div>

    <div class="col 1"></div>


</div>
<br>

<div class="container">
    <hr>
    <div class="row">

        <div class="col m6">
            <div class="card-panel teal  blue-grey darken-1">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
            </div>
        </div>

        <div class="col m6">
            <div class="card-panel teal   blue-grey darken-1">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
            </div>
        </div>


    </div>

    <a class="waves-effect waves-light btn" href="#modal1">Modal</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>



</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });

</script>

</body>
</html>


