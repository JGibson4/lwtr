<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = 'No phone entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Message</td>
    <td><?=$message;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

$to = 'J.Gibson@classoncreative.com';
$email = 'email@example.com';
$fromaddress = "J.Gibson@classoncreative.com";
$fromname = "Online Contact";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "J.Gibson@classoncreative.com";
$mail->FromName = "Contact Form";
$mail->AddAddress("J.Gibson@classoncreative.com","Living Word"); // Put your email
$mail->AddAddress("another_address@example.com","Name 2"); // addresses here

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Demo Form:  Contact form submitted";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'J.Gibson@classoncreative.com';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: J.Gibson@classoncreative.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
