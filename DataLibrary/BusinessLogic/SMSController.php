<?php

namespace DataLibrary;
set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
require_once 'Forgein/vendor/autoload.php';

use Smsapi\Client\SmsapiHttpClient;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;

class SMSProcessor
{
    const APITOKEN = 'zchS2oqNrUwj8I74H8Xd987J6UDgJbyzwsN3Vf09_';

    public static function send(SMSModel $sms)
    {

        $request = (new SmsapiHttpClient())
            ->smsapiPlService(self::APITOKEN)
            ->smsFeature()
            ->sendSms(SendSmsBag::withMessage($sms->getReceiver(), $sms->getMessage()));
    }
}



