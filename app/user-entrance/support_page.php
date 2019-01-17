<?php
require_once "Mail.php";
if(isset($_POST['submit_button'])){
$host = "smtp.mailgun.org";
$username = "postmaster@sandbox49d368197a6d496eab9f1c6d49f3163a.mailgun.org";
$password = "2965ac05dd51206835d8cb8cad2ab3fd-060550c6-cdf8756d";
$port = "587";
$to = "ramshasajid93@gmail.com";

$email_from = $_POST['email'];
// $email_subject = "Awesome Subject line" ;
$email_body = $_POST['body'] ;
$email_address = "ramshasajid93@gmail.com";
$content = "text/html; charset=utf-8";
$mime = "1.0";

$headers = array ('From' => $email_from,
'To' => $to,
'Subject' => $email_subject,
'Reply-To' => $email_address,
'MIME-Version' => $mime,
'Content-type' => $content);

$params = array  ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password);

$smtp = Mail::factory ('smtp', $params);
$mail = $smtp->send($to, $headers, $email_body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo("<p>Thank you for your query. We will get back to you soon.</p>");
}
}
?>