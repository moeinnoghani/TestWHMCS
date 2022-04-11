<?php

class EmailValidator
{

    static function is_valid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}