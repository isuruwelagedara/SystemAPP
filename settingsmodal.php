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



 <a class="waves-effect waves-light btn-large light-blue"href="#modal7"><i class="material-icons left">face</i>List of users</a>




     <div id="profile_pic_modal"  class="modal modal-fixed-footer">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">


                     <h3>Change Profile Picture</h3>
                 </div>
                 <div class="modal-body">
                     <form id="cropimage" method="post" enctype="multipart/form-data" action="imgphp/change_pic.php">
                         <strong>Upload Image:</strong> <br><br>
                         <input type="file" name="profile-pic" id="profile-pic" />
                         <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
                         <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                         <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                         <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                         <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                         <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                         <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                         <input type="hidden" name="action" value="" id="action" />
                         <input type="hidden" name="image_name" value="" id="image_name" />

                         <div id='preview-profile-pic'></div>
                         <div id="thumbs" style="padding:5px; width:600p"></div>
                     </form>
                 </div>


                 <button type="button" id="save_crop" class="btn btn-primary">Crop & Save</button>

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



     <a class="waves-effect waves-light btn modal-trigger" href="#modal7">Modal</a>
     <button data-target="modal7" class="btn modal-trigger">Modal</button>
     <!--Modal 7-->
     <div id="modal7" class="modal modal-fixed-footer">
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
                     <div>
                         <div class="profile_picture_a-container">

                         </div>
                         <div class="profile_picture-container">

                         </div>

                         <img class="img-circle" id="profile_picture" height="128" data-src="default.jpg"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="imgphp/default.jpg"/>
                         <br><br>
                         <a type="button" class="btn btn-primary" id="change-profile-pic" href="#profile_pic_modal">:Upload:</a>

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
     </div>
         <!--end Modal 7-->
 </body>
     <script>
         $(document).ready(function(){
             // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
             $('.modal').modal();
         });
     </script>
 </html>
