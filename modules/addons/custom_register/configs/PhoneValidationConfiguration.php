<?php

class PhoneValidationConfiguration
{

    private static int $VERIFY_CODE_WILL_EXPIRE_AFTER;
    private static int $VERIFY_CODE_TRIES_TIME;


    public static function setVerifyCodeExpirationTime(int $expireAfter)
    {
        self::$VERIFY_CODE_WILL_EXPIRE_AFTER = $expireAfter;
    }

    public static function setVerifyCodeTriesTime(int $triesTime)
    {
        self::$VERIFY_CODE_TRIES_TIME = $triesTime;
    }

    public static function getVerifyCodeExpirationTime(): int
    {
        return self::$VERIFY_CODE_WILL_EXPIRE_AFTER;
    }

    public static function getVerifyCodeTriesTime(): int
    {
        return self::$VERIFY_CODE_TRIES_TIME;
    }


}