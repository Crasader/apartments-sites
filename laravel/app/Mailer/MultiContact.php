<?php

namespace App\Mailer;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;
use App\Mailer\Queue;
use App\Mailer;
use App\Property\Site;

class MultiContact
{
    //
    private static $_conf;
    private static $_propertyConf;
    public function send(array $userConf,array $propertyConf){
        self::$_conf = $conf;
        self::$_propertyConf = $propertyConf;

        if(!$mail){
            self::log("Invalid configuration detected");
            return false;
        }
        $this->sendUserContact($userConf);
        $this->sendPropertyContact($propertyConf);
    }

    public function prepareMessage(array $conf,$mail){
        $mail->Subject = $conf['subject'];
        $mail->MsgHTML($conf['data']);		
        
        if(isset($conf['css']))
            foreach(array_unique($conf['cc']) as $index => $emailAddress){
                if($emailAddress == $conf['to'])
                    continue;
                $mail->addCC($emailAddress,$emailAddress);
            }
        $sendTo = $conf['to'];
        $from = $conf['from']['email'];

        $mail->addAddress($sendTo);
        self::log("Sending...");
        if(is_array($conf['from']['email']))
            $from = array_pop($conf['from']['email']);
        $mail->setFrom($from,$conf['from']['name']);
        //$mail->Sender = $from['from']['email'];
        return $mail;
    }

    public function sendUserContact(array $conf){
        Mailer::setConf($conf);
        try{
            $conf['from'] = self::getPropertyEmail();
            $mail = Mailer::configure();
            $proper = self::getPropertyEmail(true,null,true);
            $proper = array_shift($proper);
            $conf['from'] = ['email' => $proper, 'name' => Site::$instance->getEntity()->getLegacyProperty()->name . " Apartments"];
            $this->prepareMessage($conf,$mail)->send();
        } catch (phpmailerException $e) {
            self::handleException($e);
            return false;
        } catch (Exception $e) {
            self::handleException($e);
            return false;
        }
        return true;
    }

    /*
     * Grabs the property email. Returns Will's email if on development. 
     * TODO: Return env("DEV_EMAIL") or something like that
     */
    public static function getPropertyEmail($first=true,$except=null,$force=false) : array{
        if(Util::isDevDomain())
            return [env("DEV_EMAIL")];
        if(Util::isDev() && !$force)
            return [env("DEV_EMAIL")];
        $site = Site::$instance;
        $email = $site->getEntity()->getLegacyProperty()->email;
        $chunks = explode("~",$email);
        if(count($chunks) > 1){
            if($first)
                if($chunks[0] == $except)
                    return [];
                else
                    return [$chunks[0]]; 
            else
                if(in_array($except,$chunks)){
                    return array_filter($chunks,function($element) use($except){
                        return $except != $element;
                    });
                }
                else
                    return $chunks;
        }else{
            if($except == $email)
                 return [];
            else
                return [$email];
        }
    }

    public function sendPropertyContact(array $conf){
        Mailer::setConf($conf);
        try{
            
            if(isset($conf['cc']))
                $conf['cc'] = self::getPropertyEmail(false,$conf['to']);
            
            $dataCopy = $conf;
            /* 
             * We render the view ourselves so that all calling code doesnt have to :)
             */
            $dataCopy['to'] = self::getPropertyEmail();
            $dataCopy['to'] = array_shift($dataCopy['to']);
            $dataCopy['data'] = view($conf['view'])->with($conf['data']->getData()); //,compact($conf['data']->getData()))->__toString();
            $dataCopy['from'] = ['email' => $conf['from'],'name' => $conf['fromName']];
            $mail = Mailer::configure();
            /* This can be mis-leading. The "from" key in the conf array is the user that submitted the form */
            $this->prepareMessage($dataCopy,$mail)->send();
        } catch (phpmailerException $e) {
            self::handleException($e);
            return false;
        } catch (Exception $e) {
            self::handleException($e);
            return false;
        }
    }

    public static function configure(){
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host = env("MAILER_HOST");
            $mail->Port =  env("MAILER_PORT");
            $mail->SMTPDebug = 4;
            if(env("MAILER_IS_UNSECURED_TRASH") == '1'){
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
                self::log(Mailer::uniqueId($conf) . "-> $level: '$str'");
            };
            $mail->Username = env("MAILER_USERNAME");
            $mail->Password = env("MAILER_PASSWORD");
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
            self::log("EXCEPTION [phpmailerException] CAUGHT WHEN SENDING ERROR LOG: " . $e->getMessage());
        }else{
            self::log("EXCEPTION [Exception] CAUGHT WHEN SENDING ERROR LOG: " . $e->getMessage());
        }
    }

    public static function log(string $foo){
        Util::log('MULTICONTACT-' . $foo,['log' => 'mailer']);
    }
}
