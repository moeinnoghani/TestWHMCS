<?php

use Illuminate\Database\Capsule\Manager as Capsule;

//include __DIR__ . DIRECTORY_SEPARATOR . "../configs/VerifyCodeConfiguration.php";

class ClientModel
{


    public function insertClientRegistrationData($registrationData)
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
                'expired_at' => \Illuminate\Support\Carbon::now('Asia/Tehran')
                    ->addMinutes(VerifyCodeConfiguration::getVerifyCodeExpirationTime())
            ]
        );
    }

    public function insertClientVerifyCode($clientEmail, $verifyCode)
    {
        Capsule::table('registration_data')
            ->where('email', $clientEmail)
            ->update([
                'verify_code' => $verifyCode
            ]);
    }

    public function getClientVerifyCode($clientPhoneNumber)
    {
        return (Capsule::table('registration_data')
            ->where('phone_number', $clientPhoneNumber)
            ->first('verify_code'))->verify_code;
    }

    public function getClientRegistrationData($clientPhoneNumber)
    {
        return Capsule::table('registration_data')
            ->where('phone_number', $clientPhoneNumber)->first();
    }

    public function getClientVerifyCodeExpirationTime($clientPhoneNumber)
    {
        return (Capsule::table('registration_data')
            ->where('phone_number', $clientPhoneNumber)
            ->first('expired_at'))->expired_at;
    }

    public function getClientVerifyTriesTime($clientPhoneNumber)
    {
        return (Capsule::table('registration_data')
            ->where('phone_number', $clientPhoneNumber)
            ->first('tries_time'))->tries_time;
    }

    public function isClientExists($clientEmail, $clientPhoneNumber): bool
    {
        return (Capsule::table('tblclients')->where('phonenumber', $clientPhoneNumber)->exists() ||
            Capsule::table('tblclients')->where('email', $clientEmail)->exists());
    }


    public function isClientExistsByPhoneNumber($clientPhoneNumber): bool
    {
        return Capsule::table('tblclients')->where('phonenumber', $clientPhoneNumber)->exists();
    }

    public function isClientSubmittedByPhoneNumber($clientPhoneNumber): bool
    {
        return Capsule::table('registration_data')->where('phone_number', $clientPhoneNumber)->exists();

    }

    public function increaseClientVerifyTriesTime($clientPhoneNumber, $increaseValue = null)
    {
        $triesTime = $this->getClientVerifyTriesTime($clientPhoneNumber);
        if (isset($increaseValue)) {

            Capsule::table('registration_data')
                ->where('phone_number', $clientPhoneNumber)
                ->update([
                    'tries_time' => $triesTime + $increaseValue
                ]);
        }

        Capsule::table('registration_data')
            ->where('phone_number', $clientPhoneNumber)
            ->update([
                'tries_time' => $triesTime + 1
            ]);
    }

    public function addNewClient($clientPhoneNumber)
    {
        $clientRegistrationData = $this->getClientRegistrationData($clientPhoneNumber);

        $postData = array(
            'firstname' => $clientRegistrationData->firstname,
            'lastname' => $clientRegistrationData->lastname,
            'email' => $clientRegistrationData->email,
            'country' => "IR",
            'phonenumber' => $clientRegistrationData->phone_number,
            'password2' => openssl_decrypt($clientRegistrationData->password, "AES-256-CBC", 'secret')
    );

        $results = localAPI('AddClient', $postData);
        file_put_contents(__DIR__ . "/AddClientAPI_Report.json", json_encode($results));

        Capsule::table('registration_data')->where('phone_number', $clientPhoneNumber)->update([
            'verified_at' => \Illuminate\Support\Carbon::now('Asia/Tehran')
        ]);
    }

}