<?php
namespace App\MyFunctions;

class MailManager extends \Nette\Object
{
    /** @var \Nette\Mail\Message */
    public $mail;
    
    public function __construct($from, $to, $subject, $htmlBody){
	$this->mail = new \Nette\Mail\Message;
	$this->mail->setFrom($from)
	    ->addTo($to)
	    ->setSubject($subject)
	    ->setHTMLBody($htmlBody);
    }
    
    public function send()
    {
	try{
	    $mailer = new \Nette\Mail\SendmailMailer();
	    $mailer->send($this->mail);
	    
	    return true;
	}
	catch(\Nette\Mail\SendException $e) //mail nelze odeslat
	{
	    return false;
	}
    }
}