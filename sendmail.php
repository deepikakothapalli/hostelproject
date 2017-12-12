<?php
$to      = 'ratnadeepika49@gmail.com';
$subject = 'Fake sendmail test';
$message = 'If we can read this, it means that our fake Sendmail setup works!';
$headers = 'From: rdeepikakothapalli@gmail.com' . "\r\n" .
           'Reply-To: rdeepikakothapalli@gmail.com'. "\r\n" .
           'X-Mailer: PHP/' . phpversion();
ini_set("SMTP","ssl://smtp.gmail.com");
ini_set('smtp_port',25);
if(mail($to, $subject, $message, $headers)) {
    //ini_set("SMTP","ssl://smtp.gmail.com");
    echo 'Email sent successfully!';
} else {
    die('Failure: Email was not sent!');
}
?>