<?php

class SmsApi
{


    public function sendSMS()
    {

    }

    public static function sendSmsByCustomText($text)
    {
        file_put_contents(__DIR__ . "/sms_report.txt", $text);
    }

}