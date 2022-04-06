<?php

if (!defined("WHMCS")) {
    exit("This file cannot be accessed directly");
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
        'package' => $vars['configoption5'],
        'ip' => $vars['configoption1'],
        'notify' => 'no',
        'action' => 'create'
    ];

    $params = getLoginParams($vars);

    $respone = module_directadmin_reg();

}

function getLoginParams($vars)
{

}

function campdirectadmin_clientarea($vars){

}