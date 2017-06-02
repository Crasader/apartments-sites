<?php

namespace App\Mailer;

use Illuminate\Database\Eloquent\Model;
use App\Structures\Mail as StructMail;
use App\Traits\MemberValidator;
use App\Exceptions\ParameterException;
use App\Mailer;
use App\Util\Util;

class Queue extends Model
{
    //
    protected $table = 'mailer_queue';
    protected $fillable = [
        'to_address','from_address','cc','subject',
        'body','msg_sent','process_category','environment'
        ];
    const ENVIRONMENT_DEV = 'dev';
    const ENVIRONMENT_LIVE = 'live';

    public function queueItem(StructMail $m)
    {
        $ret = $m->validateMemberVariables();
        if ($ret == \App\Traits\Constants::VALIDATE_OKAY) {
            $queue = new self();
            $queue->to_address = $m->to;
            $queue->from_address= $m->from;
            $queue->cc = $m->cc;
            $queue->subject = $m->subject;
            $queue->body = $m->htmlBody;
            $queue->msg_sent = '0';
            $queue->process_category = Mailer::PROC_CATEGORY_CONTACT;
            $queue->environment = $this->getEnvironment();
            $queue->save();
            return true;
        } else {
            dd($m);
            throw new ParameterException("Validating member variables failed: " . var_export($m, 1));
        }
    }

    public function getEnvironment()
    {
        if (Util::isDev()) {
            return Queue::ENVIRONMENT_DEV;
        } else {
            return Queue::ENVIRONMENT_LIVE;
        }
    }
}
