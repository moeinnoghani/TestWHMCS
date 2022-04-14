<?php

class ReminderConfiguration
{

    private static $PASSWORD_WILL_EXPIRE_AFTER;

    public static function setPasswordExpirationTime($password_expiration_time)
    {
        self::$PASSWORD_WILL_EXPIRE_AFTER = $password_expiration_time;
    }

    public static function getPasswordExpirationTime()
    {
        return self::$PASSWORD_WILL_EXPIRE_AFTER;
    }

    public static function passwordWillExpireAfter()
    {
        return self::$PASSWORD_WILL_EXPIRE_AFTER;
    }

}