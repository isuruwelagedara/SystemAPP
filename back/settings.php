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
    </div>
</nav>

<br>
<div class="container">
<div class="row">
  <div id="card-alert" class="card red lighten-5">
      <div class="passred-container">

      </div>

    </div>

  <div class="col m2">
  </div>
  <div class=" col m7">


  <img class="" width="20%" src="http://www.theheadshotguy.co.uk/wp-content/uploads/2014/12/Screen-Shot-2014-12-02-at-11.14.42.png">
  <h5>Profile Name</h5>
  <form action="#">
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload New Profile image">
      </div>
    </div>
    <a class="waves-effect waves-light btn center">Change image</a>
      </form>

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
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>
               <script src="appjs/settings.js"></script>
        </div>
  </div>
</div>
</body>
</html>
