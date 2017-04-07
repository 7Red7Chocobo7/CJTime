<?php 
set_time_limit (10);
 
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';                          //Ask for HTML-friendly debug output
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 587;                                    // TCP port to connect to
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'CandJTime@gmail.com';                 // SMTP username
$mail->Password = 'Jan202012';                           // SMTP password

$mail->setFrom('from@example.com', 'RSVP');
$mail->addAddress('CandJTime@gmail.com', 'Char and Jeffrey');     // Add a recipient
$mail->addAddress('hitch723@gmail.com', 'Jeffrey');               // Name is optional
$mail->addReplyTo('DoNotReply@donotreply.com');
$mail->addCC('');
$mail->addBCC('');

$mail->addAttachment('');         // Add attachments
$mail->addAttachment('');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$name = $_POST['name'];
$attend = $_POST['attending'];
$diet = $_POST['diet'];
$email = $_POST['email'];
$kids = $_POST['kids'];
$plus = $_POST['plus'];

$mail->Subject = 'You Have a RSVP';
$mail->Body    = '<html><p>'.$name.' has sent you an RSVP<br>Attending:'.$attend.'<br>Meal Preference: '
  .$diet.'<br>Email contact: '.$email.'<br>Number of kids: '.$kids.'<p><html>';

$mail->AltBody = 'NA';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location:https://7red7chocobo7.github.io/CJTime/Thanks.html");
    exit;
}

?>
