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



    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

     <script src="imgphp/dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
     <script src="imgphp/dist_files/jquery.form.js"></script>
     <link rel="stylesheet" href="imgphp/dist_files/imgareaselect.css">
     <script src="imgphp/functions.js"></script>

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

   <h5>Change profile picture</h5>


       <!-- start of image upload-->
       <div class="container">
           <div class="panel panel-default">
               <div class="panel-heading">Profile Picture/div>
                   <div class="panel-body">


                       <div class="row">
                           <div class="col-md-4 text-center">
                               <div id="upload-demo" style="width:350px"></div>
                           </div>
                           <div class="col-md-4" style="padding-top:30px;">
                               <strong>Select Image:</strong>
                               <br/>
                               <input type="file" id="upload">
                               <br/>
                               <button class="btn btn-success upload-result">Upload Image</button>
                           </div>

                       </div>


                   </div>
               </div>
           </div>

       <!-- End of image upload-->


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
     <body onload="updateimg();">
     <script language="javascript">
         function updateimg() {
             $.post('imgphp/updateimg.php',{}, function (data) {

                 //refresing the the notification data after reject
                // $("div.profile_picture-container").html("");
                 //$("div.profile_picture-container").html(data);
                $("#profile_picture").attr("src", "imgphp/images/tmp/avatar_1.jpg?timestamp=" + new Date().getTime());

             });




         }
     </script>
 </body>
 </html>
