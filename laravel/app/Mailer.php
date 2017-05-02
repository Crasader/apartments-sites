<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;
use App\Mailer\Queue;

class Mailer
{
    //
    const PROC_CATEGORY_ERROR = 'error';

    private static $_categories = [Mailer::PROC_CATEGORY_ERROR];
    public static function uniqueId(array $conf){
        return Property\Site::$instance->getEntity()->getLegacyProperty()->name . "|" . json_encode($conf) . "|";
    }

    public function send(array $conf){
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
            try {
                $mail->isSMTP(); // tell to use smtp
                $mail->CharSet = "utf-8"; // set charset to utf8
                $mail->SMTPAuth = true;  // use smpt auth
                $mail->SMTPSecure = "tls"; // or ssl
                $mail->Host = "smtp.gmail.com";
                $mail->Port =  587;
                $mail->SMTPDebug = 2;
                $mail->Debugoutput = function($str,$level) use($conf){
                    Util::log(Mailer::uniqueId($conf) . "-> $level: '$str'",['log' => 'mailer']);
                };
                $mail->Username = "wmerfalen@gmail.com";
                $mail->Password = "qrklznccerdjjudl";
                if(isset($conf['contact']['fullname'])){
                    $mail->setFrom($conf['from'], $conf['contact']['fullname']);
                }else{
                    $mail->setFrom($conf['from'], $conf['contact']['fname'] . " " . $conf['contact']['lname']);
                }
                if(isset($conf['subject'])){
                    $mail->Subject = $conf['subject'];
                }else{
                    $mail->Subject = "Contact form submitted [ " . $conf['mode'] . " ]";
                }
                $mail->MsgHTML($conf['data']);		
                foreach($conf['cc'] as $index => $emailAddress){
                    $mail->addAddress($emailAddress,$emailAddress);
                }
                if(isset($conf['cb'])){
                    $conf['cb']($mail);
                }
                $mail->addAddress($conf['to']);
                $mail->send();
            } catch (phpmailerException $e) {
                throw $e;
            } catch (Exception $e) {
                throw $e;
            }
            return true;
    }

    public static function error($to,$subject,$body,$cc=[],$from = 'error@market2-live'){
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
            try {
                $debug = '';
                $mail->isSMTP(); // tell to use smtp
                $mail->CharSet = "utf-8"; // set charset to utf8
                $mail->SMTPAuth = true;  // use smpt auth
                $mail->SMTPSecure = "tls"; // or ssl
                $mail->Host = "smtp.gmail.com";
                $mail->Port =  587;
                $mail->Username = "wmerfalen@gmail.com";
                $mail->Password = "qrklznccerdjjudl";
                $mail->setFrom($from,'ERROR ERROR');
                $mail->addAddress($to,$to);
                $mail->Subject = $subject;
                $mail->MsgHTML($body);		
                $mail->SMTPDebug = 2;
                $mail->addAddress($to);
                foreach($cc as $index => $emailAddress){
                    $mail->addAddress($emailAddress,$emailAddress);
                }
                /*
                $mail->Debugoutput = function($str,$level) use($debug){
                    Util::log("Error mailer: {$level}: {$str}",['log' => "error-mailer"]);
                };*/
                $mail->send();
            } catch (phpmailerException $e) {
                Util::log("EXCEPTION [phpmailerException] CAUGHT WHEN SENDING ERROR LOG: " . var_export($e,1));
                throw $e;
            } catch (Exception $e) {
                Util::log("EXCEPTION [Exception] CAUGHT WHEN SENDING ERROR LOG: " . var_export($e,1));
                throw $e;
            }
            return true;
    }

    public static function queueError($to,$subject,$body,$cc=['matt@marketapts.com'],$from = "error@market2-live"){
        $mq = app()->make('App\Mailer\Queue');
        $mq->to_address = $to;
        $mq->cc = json_encode($cc);
        $mq->subject = $subject;
        $mq->from_address = $from;
        $mq->body = $body;
        $mq->msg_sent = '0';
        $mq->process_category = Mailer::PROC_CATEGORY_ERROR;
        $mq->save();
    }

    public static function processQueue(string $qName){
        if(in_array($qName,self::$_categories)){
            foreach(Queue::where(['process_category','=',$qName],
                ['msg_sent','=','0'])->get() as $key => $row){
                self::error($row->to_address,$row->subject,nl2br($row->body),json_decode($row->cc,true),$row->from_address);
            }
        }else{
            Util::log('Unknown process queue category: ' . $qName,['log' => 'mailer-processQueue']);
        }
    }
}
