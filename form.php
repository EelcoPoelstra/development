<?php
/*******************************************
 * THIS IS THE ENGLISH LANGUAGE PAGE!!!!   *
 *******************************************/
$mailSuccess = null;
$mailFailed = null;
$mailMessage = null;
$redirect   = "http://www.wittedraak.nl";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function sendMail()
    {
        global $mailFailed, $mailSuccess, $mailMessage;
        if (empty($_POST['email'])) {
            $mailFailed = true;
            $mailMessage = 'Your email address is required';
            return;
        } 
        if (empty($_POST['comment'])) {
            $mailFailed = true;
            $mailMessage = 'A comment is required';
            return;
        }
        if (empty($_POST['name'])) {
            $mailFailed = true;
            $mailMessage = 'Your name is required';
            return;
        }
        $name = trim($_POST['name']);
        $useremail = trim($_POST['email']);
        $email = 'eelco.poelstra@gmail.com';
        $usercomment = trim($_POST['comment']);
        $message = "Name: $name<br>Email: $useremail<br>Comment: $usercomment";
        $from = ($name) ? $name . ' <' . $email . '>' : $email;
        $headers = "From: {$from}\r\nReply-To: {$from}\r\n";
        $headers .= "Content-type: text/html\r\n";
        $title = 'Example title';
        if (mail($to = 'eelco.poelstra@gmail.com', $title, $message, $headers)) {
            $mailSuccess = true;
            
            
        } else {
            $mailFailed = true;
            $mailMessage = 'Email sending failed';
        }
    }

    sendMail();
     header("Location: $redirect");
}
?>