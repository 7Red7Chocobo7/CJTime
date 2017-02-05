<?php 
set_time_limit (10);
  
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;aspmx.l.google.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'CandJTime@gmail.com';                 // SMTP username
$mail->Password = 'Jan202012';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
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
$age = $_POST['ageO'];
$ages = $_POST['ageT'];

$mail->Subject = 'You Have a RSVP';
$mail->Body    = '<html><p>'.$name.' has sent you an RSVP<br>Attending:'.$attend.'<br>Dietary Restrictions: '
  .$diet.'<br>Email contact: '.$email.'<br>Age of first child '.$age.'<br>Age of second child '.$ages.'<p><html>';

$mail->AltBody = 'NA';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location:https://7red7chocobo7.github.io/CJTime/Thanks.html");
    exit;
}

?>
