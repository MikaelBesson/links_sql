<?php

namespace Mika\App\Classes\Controller;


use Mika\App\Classes\renderController;

class MailController extends renderController
{

    /**
     * display a form mail to send a mail
     */
    public function displayMail(){
        $this->render('mail');
    }

    public function sendMail()
    {
        $to = 'besson.mikael04@gmail.com';
        $subject = 'message from links_handler';
        $message = $_POST['message'];
        $header = 'From: '.$_POST['name'] .' '.$_POST['first_name']."\r\n" .
            'Reply-To :' . $_POST['mail'] . "\r\n";

        mail($to, $subject, $message, $header);
    }
}