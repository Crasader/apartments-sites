<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;
use App\Mailer\Queue;

class Mailer
{
    //
    const PROC_CATEGORY_ERROR = 'error';
    const PROC_CATEGORY_CONTACT = 'contact';

    private static $_conf;

    private static $_categories = [
        Mailer::PROC_CATEGORY_ERROR,
        Mailer::PROC_CATEGORY_CONTACT,
        ];
    public static function uniqueId(array $conf){
        return Property\Site::$instance->getEntity()->getLegacyProperty()->name . "|" . json_encode($conf) . "|";
    }

    public function send(array $conf){
        self::$_conf = $conf;
        $mail = self::configure();
        if(!$mail){
            self::log("Invalid configuration detected");
            return false;
        }
        try{
            if(isset($conf['subject'])){ 
                $mail->Subject = $conf['subject'];
            }else{
                $mail->Subject = "Contact form submitted [ " . $conf['mode'] . " ]";
            }
            $mail->MsgHTML($conf['data']);		
            
            foreach(array_unique($conf['cc']) as $index => $emailAddress){
                if($emailAddress == $conf['to'])
                    continue;
                $mail->addCC($emailAddress,$emailAddress);
            }
            $mail->addAddress($conf['to']);
            self::log("Sending...");
            $mail->setFrom($conf['from']);
            $mail->Sender = $conf['from'];
            $mail->send();
            self::log("Sent");
        } catch (phpmailerException $e) {
            self::handleException($e);
            return false;
        } catch (Exception $e) {
            self::handleException($e);
            return false;
        }
        return true;
    }

    public static function configure(){
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host = ENV("MAILER_HOST");
            $mail->Port =  ENV("MAILER_PORT");
            $mail->SMTPDebug = 4;
            if(ENV("MAILER_IS_UNSECURED_TRASH") == '1'){
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
            }
            $conf = self::$_conf;
            $mail->Debugoutput = function($str,$level) use($conf){
                self::log(Mailer::uniqueId($conf) . "-> $level: '$str'",['log' => 'mailer']);
            };
            $mail->Username = ENV("MAILER_USERNAME");
            $mail->Password = ENV("MAILER_PASSWORD");
        }catch(phpmailerException $e){
            self::handleException($e);
            return false;
        }catch(\Exception $e){
            self::handleException($e);
            return false;
        }
        return $mail;
    }

    public static function handleException($e){
        if($e instanceof phpmailerException){
            self::log("EXCEPTION [phpmailerException] CAUGHT WHEN SENDING ERROR LOG: " . $e->getMessage(),['log' => 'mailer']);
        }else{
            self::log("EXCEPTION [Exception] CAUGHT WHEN SENDING ERROR LOG: " . $e->getMessage(),['log' => 'mailer']);
        }
    }

    public static function error($to,$subject,$body,$cc=[],$from = 'error@market2-live'){
        $mail = self::configure();
        try {
            $mail->setFrom('error@amcapartments.com','ERROR ERROR');
            $mail->addAddress($to,$to);
            $mail->Subject = $subject;
            $mail->MsgHTML($body);		
            $mail->SMTPDebug = 2;
            $mail->send();
        } catch (phpmailerException $e) {
            self::handleException($e);
            return false;
        } catch (Exception $e) {
            self::handleException($e);
            return false;
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
            self::log('Unknown process queue category: ' . $qName,['log' => 'mailer-processQueue']);
        }
    }

    public static function log(string $foo){
        Util::log($foo,['log' => 'mailer']);
    }
}
