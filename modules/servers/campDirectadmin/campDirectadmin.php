<?php

use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined("WHMCS")) {
    exit("This file cannot be accessed directly");
}


function campDirectadmin_ConfigOptions($vars)
{

    $moduleconfig = getModuelconfig($_POST['id']);
    $packages = [];
    file_put_contents(__DIR__ . '/logs.txt', $packages);
    if ($moduleconfig->configoption1 !== '') {
        $params = getLoginParams($_POST['id']);
        $packageList = moduele_directadmin_req('CMD_API_PACKAGES_USER', [], $params);
        $packages = collect($packageList['list'])->mapWithKeys(function ($item) {
            return [
                $item => $item
            ];
        });

        file_put_contents(__DIR__ . '/logs.txt', $packages);

    }

    return array(
        // a text field type allows for single line text input
        'ip' => array(
            'Type' => 'text',
            'Description' => 'Enter API ip',
        ),
        // a password field type allows for masked text input
        'port' => array(
            'Type' => 'text',
            'Default' => '8080',
            'Description' => 'Enter Port Number',
        ),
        'domain' => array(
            'Type' => 'text',
            'Description' => 'Enter your domain',
        ),
        // the yesno field type displays a single checkbox option

        // the dropdown field type renders a select menu of options
        'packages' => array(
            'Type' => 'dropdown',
            'Options' => $packages->toArray(),
            'Description' => 'Choose one',
        ),
        // the radio field type displays a series of radio button options
        'username' => [
            'Type' => 'text',
        ],

        'password' => array(
            'Type' => 'password',
            'Description' => 'Choose your option!',
        ),

    );
}

function moduele_directadmin_req($command, $fields, $params, $post = "")
{
    $host = $params["serverhostname"] ? $params["serverhostname"] : $params["serverip"];
    $user = $params["serverusername"];
    $pass = $params["serverpassword"];
    $httpprefix = $params["serverhttpprefix"];
    $port = $params["serverport"];
    $resultsarray = array();
    $fieldstring = "";
    foreach ($fields as $key => $value) {
        $fieldstring .= (string)$key . "=" . urlencode($value) . "&";
    }
    $url = $httpprefix . "://" . $host . ":" . $port . "/" . $command;
    if (!$post) {
        $url .= "?" . $fieldstring;
    }
    $authstr = $user . ":" . $pass;
    $directadminaccterr = "";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($post) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldstring);
    }
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $curlheaders[0] = "Authorization: Basic " . base64_encode($authstr);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curlheaders);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $data = curl_exec($ch);
    if (curl_errno($ch)) {
        $resultsarray["error"] = true;
        $resultsarray["details"] = curl_errno($ch) . " - " . curl_error($ch);
        $data = curl_errno($ch) . " - " . curl_error($ch);
    }
    curl_close($ch);
    $arrayReturnPackages = array("CMD_API_PACKAGES_RESELLER", "CMD_API_PACKAGES_USER", "CMD_API_ADDITIONAL_DOMAINS", "CMD_API_SHOW_ALL_USERS", "CMD_API_SHOW_USERS", "CMD_API_SHOW_RESELLERS");
    if (!$resultsarray["error"]) {
        if (strpos($data, "DirectAdmin Login") == true) {
            $resultsarray = array("error" => "1", "details" => "Login Failed");
        } else {
            if (strpos($data, "Your IP is blacklisted") !== false) {
                $resultsarray = array("error" => "1", "details" => "WHMCS Host Server IP is Blacklisted");
            } else {
                if ($params["getip"]) {
                    $data2 = directadmin_unhtmlentities($data);
                    parse_str($data2, $output);
                    foreach ($output as $key => $value) {
                        $key = str_replace("_", ".", urldecode($key));
                        $value = explode("&", urldecode($value));
                        foreach ($value as $temp) {
                            $temp = explode("=", $temp);
                            $resultsarray[urldecode($key)][$temp[0]] = $temp[1];
                        }
                    }
                } else {
                    if (in_array($command, $arrayReturnPackages)) {
                        $data2 = directadmin_unhtmlentities($data);
                        parse_str($data2, $resultsarray);
                    } else {
                        $data = explode("&", $data);
                        foreach ($data as $temp) {
                            $temp = explode("=", $temp);
                            $temp[0] = urldecode($temp[0]);
                            $temp[1] = urldecode($temp[1]);
                            $resultsarray[$temp[0]] = $temp[1];
                        }
                    }
                }
            }
        }
    }
    logModuleCall("directadmin", $command, $url, $data, $resultsarray);
    return $resultsarray;
}

function getModuelconfig($productId)
{
    $packages = Capsule::table('tblproducts')->where('id', $productId)->first();
    return $packages;
}


function campDirectadmin_SuspendAccount($vars)
{
    $fields = array();
    $fields["action"] = "create";
    $fields["add"] = "Submit";
    $fields["user"] = $vars["username"];
    $results = directadmin_req("CMD_API_SHOW_USER_CONFIG", $fields, $vars);
    if ($results["suspended"] == "yes") {
        $result = "Account is already suspended";
    } else {
        $fields = array();
        $fields["suspend"] = "Suspend/Unsuspend";
        $fields["select0"] = $vars["username"];
        $results = directadmin_req("CMD_SELECT_USERS", $fields, $vars);
        if ($results["error"]) {
            $result = $results["details"];
        } else {
            $result = "success";
        }
    }
    return $result;
}

function campDirectdmin_changepackage($vars)
{

    $fileds = [
        'action' => $vars['action'],
        'username' => $vars['username'],
//        ''
    ];
}

function campDirectAdmin_TerminateAccount($params)
{

    $fields = [
        'confirmed' => 'confirm',
        'delete' => 'yes',
        'select0' => $vars['username']
    ];
    $results = directadmin_req("CMD_SELECT_USERS", $fields, $params);
    if ($results["error"]) {
        $result = $results["details"];
    } else {
        $result = "success";
    }
    return $result;
}

function campDirectadmin_createAccount($vars)
{


    $fileds = [
        'username' => $vars['username'],
        'passwd' => $vars['password'],
        'passwd2' => $vars['password'],
        'email' => $vars['clientsdetails']['email'],
        'domain' => $vars['domain'],
        'package' => $vars['configoption4'],
        'ip' => $vars['configoption1'],
        'notify' => 'no',
        'action' => 'create'
    ];

    $params = getLoginParams($vars);

    $respone = module_directadmin_reg();

}

function getLoginParams($moduleConfig)
{
    if (!is_array($moduleConfig)) {
        $moduleConfig = (array)$moduleConfig;
    }
    return array(
        'serverhostname' => $moduleConfig['configoption1'],
        'serverusername' => $moduleConfig['configoption3'],
        'serverpassword' => $moduleConfig['configoption5'],
        'serverhttpprefix' => 'https',
        'serverport' => $moduleConfig['configoption2'],);


}

function campdirectadmin_clientarea($vars)
{

}