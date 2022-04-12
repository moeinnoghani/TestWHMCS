<?php

use Illuminate\Database\Capsule\Manager as Capsule;

include __DIR__ . "/../lib/returner.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../EmailValidator.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../api/EmailApi.php";

date_default_timezone_set("Asia/Tehran");

class ClientHistory extends mainController
{
    private $clientEmail;
    private $clientId;
    private $verifiedUser;

    const EXPIRED_AFTER = 3;

    public function __construct()
    {
//        $this->clientEmail = $_POST['email'];
    }

    public function showPassedDays()
    {

        if ($_POST['validationCode'] && $_POST['email']) {

            $this->clientEmail = $_POST['email'];

            echo $this->checkValidationCode($_POST['validationCode']);
            die();

        }

//        if ($this->clientEmailValidation($_POST['email'])) {
//
//            //            $validationCode_rules = [
////                'digits' => '4',
//////                'min' => '',
//////                'max' => ''
////            ];
//
//            $validationCode = $this->genrateValidationCode();
//
//            $api = new EmailApi($this->clientEmail, $validationCode, $this->clientId);
//            $api->send();
//        }


    }

    private function clientEmailValidation($email)
    {
        if (!$email || !EmailValidator::is_valid($email)) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Your Email is incorrect'
            ]);
            die();
        } else {
            $user = Capsule::table('tblclients')->where('email', $email)->first();

            if ($user) {
                $this->clientEmail = $_POST['email'];
                $userId = Capsule::table('tblclients')->where('email', $this->clientEmail)->first('id');
                $this->clientId = $userId->id;
                return 1;
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'message' => "you're not a Iranserver client"
                ]);
                die();
            }
        }

    }

    private function checkValidationCode($validationCode)
    {
        if ($this->clientEmailValidation($this->clientEmail)) {

            $validationObj = Capsule::table('verifycode')
                ->where('code', $validationCode)
                ->where('email',$this->clientEmail)
                ->first();

            if (is_null($validationObj)) {
                echo 'your code is invalid';
                die;
            }

            $expired_at = \Carbon\Carbon::parse($validationObj->expired_at);
            $now = \Carbon\Carbon::now();

            if ($expired_at->gt($now)) {
                return true;
            } else {
                echo 'your validation code is expired';
                die;
            }
        }
    }

    private function genrateValidationCode($rules = null)
    {
        $validationCode = rand(1000, 9999);

        try {
            $insert_data = [
                'email' => $this->clientEmail,
                'code' => $validationCode,
                'verified_at' => \Carbon\Carbon::now(),
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ];

            Capsule::table('verifycode')
                ->insert($insert_data);

        } catch (\Illuminate\Database\QueryException $ex) {
            echo $ex->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $validationCode;
    }

    private function getClientHistoryInDays()
    {
        $user = Capsule::table('tblclients')
            ->where('email', $this->clientEmail)
            ->first();

        $startTime = new \Carbon\Carbon($user->created_at);
        $nowTime = \Carbon\Carbon::now();
        $timeDifference = $nowTime->diffInDays($startTime);

        return $timeDifference;
    }


}