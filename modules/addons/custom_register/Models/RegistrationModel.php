<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class RegistrationModel
{

    public function increaseClientVerifyTriesTime($clientPhoneNumber, $increaseValue = null)//Move
    {
        $triesTime = $this->getClientVerifyTriesTime($clientPhoneNumber);

        $id = Capsule::table('registration_data')->orderByDesc('id')
            ->where('phone_number', $clientPhoneNumber)
            ->first('id')->id;

        Capsule::table('registration_data')
            ->where('id', $id)
            ->update([
                'tries_time' => (isset($increaseValue)) ? $triesTime + $increaseValue : $triesTime + 1,
                'updated_at' => \Illuminate\Support\Carbon::now('Asia/Tehran')
            ]);

    }


    public function getClientVerifyTriesTime($clientPhoneNumber) //Move
    {
        $id = Capsule::table('registration_data')->orderByDesc('id')
            ->where('phone_number', $clientPhoneNumber)
            ->first('id')->id;

        return (Capsule::table('registration_data')
            ->where('id', $id)
            ->first('tries_time'))->tries_time;
    }

    public function getClientVerifyCodeExpirationTime($clientPhoneNumber) //Move
    {
        $id = Capsule::table('registration_data')->orderByDesc('id')
            ->where('phone_number', $clientPhoneNumber)
            ->first('id')->id;

        return (Capsule::table('registration_data')
            ->where('id', $id)
            ->first('expired_at'))->expired_at;
    }

    public function insertClientRegistrationData($registrationData) //Move
    {
        Capsule::table('registration_data')->insert(
            [
                'firstname' => $registrationData['firstname'],
                'lastname' => $registrationData['lastname'],
                'email' => $registrationData['email'],
                'phone_number' => $registrationData['phone_number'],
                'password' => openssl_encrypt($registrationData['password'], "AES-256-CBC", 'secret'),
                'verify_code' => $registrationData['verify_code'],
                'tries_time' => 0,
                'created_at' => \Illuminate\Support\Carbon::now('Asia/Tehran'),
                'expired_at' => \Illuminate\Support\Carbon::now('Asia/Tehran')
                    ->addMinutes(VerifyCodeConfiguration::getVerifyCodeExpirationTime())
            ]
        );
    }

    public function insertClientVerifyCode($clientEmail, $verifyCode) //Move
    {
        $id = Capsule::table('registration_data')->orderByDesc('id')
            ->where('email', $clientEmail)
            ->first('id')->id;

        Capsule::table('registration_data')
            ->where('id', $id)
            ->update([
                'verify_code' => $verifyCode
            ]);
    }

    public function getClientVerifyCode($clientPhoneNumber) //Move
    {
        $id = Capsule::table('registration_data')->orderByDesc('id')
            ->where('phone_number', $clientPhoneNumber)
            ->first('id')->id;

        return (Capsule::table('registration_data')
            ->where('id', $id)
            ->first('verify_code'))->verify_code;
    }

    public function getClientRegistrationData($clientPhoneNumber) //Move
    {
        return Capsule::table('registration_data')
            ->where('phone_number', $clientPhoneNumber)->first();
    }


}