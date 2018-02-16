<?php
session_start();
if ( isset($_SESSION['user'])!="" ) {
    header("Location: dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<title>Login to Leave System</title>
<head>
    <!--Import Google Icon Font-->
    <link href="fonts/roboto/Roboto-Thin.ttf" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/mycss.css"/>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<nav>
    <div class="nav-wrapper">

    </div>
</nav>

<br>
<div class="container">
    <h5 id="hedder"  class="center"> Hi welcome Sign In.</h5>
    <div class="row">

        <div class=" col m4"></div>
        <div class=" col m4">



                <div class="col-md-12">

                    <div class="form-group">

                    </div>

                    <div class="form-group">

                    </div>



                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="number" id ="epfno" name="epf" class="form-control" placeholder="Your EPF Number" value="" maxlength="40" />
                        </div>
                        <div id="epfno-data" style="color: red;"></div>
                        <h6 class="red-text"></h6>
                    </div>

                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                        </div>
                        <div id="pass-data" style="color: red;"></div>
                        <h6 class="red-text"></h6>
                    </div>

                    <div class="form-group">

                    </div>


                    <div class="row">

                     <button type="submit" id ="name-submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
                    </div>

                    <div id="name-data" style="color: red;"></div>

                    <div class="form-group">

                    </div>
                </div>



        </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="dist/sweetalert.min.js"></script>
    <script>
        $('#hedder').addClass('animated bounceInLeft');
        $('#password').addClass('animated zoomIn');
        $('#EPFNO').addClass('animated zoomIn');
        $('#btmsub').addClass('animated bounceInUp');


    </script>
	<script>
	$("#pass").keyup(function(event){
    if(event.keyCode == 13){
        $("#name-submit").click();
    }
});

	</script>
	
	
	
    <script src="js/login.js"></script>
</div>
</body>
</html>

