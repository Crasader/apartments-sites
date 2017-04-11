<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailer extends Model
{
    //

    public function send(array $conf){
        if(ENV('DEV')){
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
		try {
			$mail->isSMTP(); // tell to use smtp
			$mail->CharSet = "utf-8"; // set charset to utf8
			$mail->SMTPAuth = true;  // use smpt auth
			$mail->SMTPSecure = "tls"; // or ssl
			$mail->Host = "smtp.gmail.com";
			$mail->Port =  587;
			$mail->Username = "wmerfalen@gmail.com";
			$mail->Password = "qrklznccerdjjudl";
			$mail->setFrom($conf['from'], $conf['contact']['fname'] . " " . $conf['contact']['lname']);
			$mail->Subject = "Contact form submitted [ " . $conf['mode'] . " ]";
			$mail->MsgHTML($conf['data']);		
            $mail->SMTPDebug = 2;
            foreach($conf['cc'] as $index => $emailAddress){
    			$mail->addAddress($emailAddress,$emailAddress);
            }
			$mail->send();
		} catch (phpmailerException $e) {
			dd($e);
		} catch (Exception $e) {
			dd($e);
		}
		die('success');
		}
    }
}
