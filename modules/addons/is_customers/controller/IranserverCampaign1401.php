<?php

use Illuminate\Database\Capsule\Manager as Capsule;

include __DIR__ . "/../lib/returner.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../EmailValidator.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../api/EmailApi.php";

class IranserverCampaign1401
{

    private $clientEmail;
    private $cliendId;

    public function getClientHistory()
    {

    }

    public function getOfferCode()
    {

    }

    public function register()
    {
        if ($this->clientEmailValidation($_POST['email'])) {
            $validationCode = $this->genrateValidationCode();

            $api = new EmailApi($this->clientEmail, $validationCode, $this->clientId);
            $api->send();
        }


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

}