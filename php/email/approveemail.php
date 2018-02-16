<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


//Load composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

//Server settings

    require '../emailconfig.php';
//
//////Sanka///
$image_path = $path_of_webpage.''.$EPF.'.png';  //getting $path_of_webpage from emailconfig php and get $epf number from applyleave.php

///Sanka////
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
///crash

$reason ="";

// $mail->addAddress('sankalahirucz@gmail.com', 'Joe User');     // Add a recipient
//$mail->addAddress('sankaheadstart@gmail.com', 'Joe User');     // Add a recipient
$mail->addAddress($user_email, $user_name);

//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('sankalahirucz@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Headstart Leave System - Approved';
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';




$mail->Body    ='<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <title></title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]--><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">  #outlook a { padding: 0; }  .ReadMsgBody { width: 100%; }  .ExternalClass { width: 100%; }  .ExternalClass * { line-height:100%; }  body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }  table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }  p { display: block; margin: 13px 0; }
    </style>
    <!--[if !mso]><!-->
    <style type="text/css">  @media only screen and (max-width:480px) {    @-ms-viewport { width:320px; }    @viewport { width:320px; }  }
    </style>
    <!--<![endif]-->
    <!--[if mso]><xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings></xml>
    <![endif]-->
    <!--[if lte mso 11]>
    <style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style>
    <![endif]--><!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <style type="text/css">        @import url(https://fonts.googleapis.com/css?family=Roboto);  @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    </style>  <!--<![endif]--><style type="text/css">  @media only screen and (min-width:480px) {    .mj-column-per-100 { width:100%!important; }  }</style>
</head><body style="background: #FFFFFF;">
<div class="mj-container" style="background-color:#FFFFFF;">
    <!--[if mso | IE]>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="margin:0px auto;max-width:600px;">
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
            <tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                    <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="vertical-align:top;width:600px;">
                    <![endif]-->
                    <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                            <tbody>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;" align="center">
                                    <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                                        <tbody>
                                        <tr>
                                            <td style="width:156px;">
                                                <img alt="" title="" height="auto" src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5a52f9067b1c3/1515387213.jpg" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" width="156">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;">
                                    <div style="font-size:1px;line-height:50px;white-space:nowrap;">&#xA0;
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:0px 18px 0px 18px;" align="center">
                                    <div style="cursor:auto;color:#FF0000;font-family:Roboto, Tahoma, sans-serif;font-size:11px;line-height:22px;text-align:center;">
                                        <p>
                                            <span style="font-size:48px;">Hello,'.$user_name.'</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:12px 12px 12px 12px;" align="center">
                                    <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                                        <tbody>
                                        <tr>
                                            <td style="width:168px;">
                                                <img alt="" title="" height="auto" src="'.$image_path.'" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" width="168">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;">
                                    <div style="font-size:1px;line-height:50px;white-space:nowrap;">&#xA0;</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;" align="center">
                                    <div style="cursor:auto;color:#5F5F5F;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:22px;text-align:center;">
                                        <p>
                                            <span style="font-size:22px;">'.$name_ini.' is approved the leave </span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;" align="center">
                                    <div style="cursor:auto;color:#5F5F5F;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:22px;text-align:center;">
                                        <p>
<span style="font-size:16px;"><em>'.$reason.'</em>
</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:11px;padding-bottom:11px;padding-right:10px;padding-left:10px;">
                                    <p style="font-size:1px;margin:0px auto;border-top:1px solid #C7C3C3;width:100%;">
                                    </p>
                                    <!--[if mso | IE]>
                                    <table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" style="font-size:1px;margin:0px auto;border-top:1px solid #C7C3C3;width:100%;" width="600">
                                        <tr>
                                            <td style="height:0;line-height:0;"> 
                                            </td>
                                        </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;" align="center">
                                    <div style="cursor:auto;color:#8A8888;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:22px;text-align:center;">
                                        <p>Headstart (Pvt)Ltd. </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="word-wrap:break-word;font-size:0px;padding:13px 25px 13px 25px;padding-top:10px;padding-left:25px;" align="center">
                                    <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="center" border="0">
                                        <tbody>
                                        <tr>
                                            <td style="border:none;border-radius:24px;color:#fff;cursor:auto;padding:10px 25px;" align="center" valign="middle" bgcolor="#e85034">
                                                <a href="https://google.com" style="text-decoration:none;background:#e85034;color:#fff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:20px;font-weight:normal;line-height:120%;text-transform:none;margin:0px;" target="_blank">Login to Accept</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                </td></tr></tbody></table></div><!--[if mso | IE]>      </td></tr></table>      <![endif]--></div></body>
</html>';


$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
//echo 'Message has been sent';
} catch (Exception $e) {
//echo 'Message could not be sent.';
//echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>
