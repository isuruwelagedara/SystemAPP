<?php
$path_of_webpage = "http://localhost/systemapp/imgphp/upload/"; 	//Define the path of system web address ex www.headstartsystem.com/imgphp/upload/   |Sanka|


$mail->SMTPDebug = 0;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sankaheadstart@gmail.com';                 // SMTP username
$mail->Password = 'becool@12';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to




///crash
$mail->SMTPSecure = "ssl";
$mail->SMTPKeepAlive = true;
$mail->Mailer = "smtp";
//Recipients
$mail->setFrom('sankaheadstart@gmail.com', 'Headstart Leave System');
?>