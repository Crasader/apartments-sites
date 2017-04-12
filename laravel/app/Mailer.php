<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailer extends Model
{
    //

    public function send(array $conf){
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
            try {
                $mail->isSMTP(); // tell to use smtp
                $mail->CharSet = "utf-8"; // set charset to utf8
                $mail->SMTPAuth = true;  // use smpt auth
                $mail->SMTPSecure = "tls"; // or ssl
                $mail->Host = "smtp.gmail.com";
                $mail->Port =  587;
                if(env('DEV')){
                    $mail->Username = "wmerfalen@gmail.com";
                    $mail->Password = "qrklznccerdjjudl";
                }else{
                    //TODO: !launch get this stuff filled out in the .env
                    $mail->Username = env('MAILER_EMAIL');
                    $mail->Password = env('MAILER_PASSWORD');
                }
                if(isset($conf['contact']['fullname'])){
                    $mail->setFrom($conf['from'], $conf['contact']['fullname']);
                }else{
                    $mail->setFrom($conf['from'], $conf['contact']['fname'] . " " . $conf['contact']['lname']);
                }
                $mail->Subject = "Contact form submitted [ " . $conf['mode'] . " ]";
                $mail->MsgHTML($conf['data']);		
                foreach($conf['cc'] as $index => $emailAddress){
                    $mail->addAddress($emailAddress,$emailAddress);
                }
                $mail->send();
            } catch (phpmailerException $e) {
                throw $e;
            } catch (Exception $e) {
                throw $e;
            }
            return true;
    }
}
