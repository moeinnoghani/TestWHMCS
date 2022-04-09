<?php

function camp_registrar_MetaData()
{
    return array(
        'DisplayName' => 'Registrar Camp',
        'APIVersion' => '1.0',
        'NonLinearRegistrationPricing' => false,
    );
}

function camp_registrar_getConfigArray($params)
{
    return array(
        "username" => array(
            "FriendlyName" => "UserName",
            "Type" => "text", # Text Box
            "Size" => "25", # Defines the Field Width
            "Description" => "Textbox",
            "Default" => "Example",
        ),
        "password" => array(
            "FriendlyName" => "Password",
            "Type" => "password", # Password Field
            "Size" => "25", # Defines the Field Width
            "Description" => "Password",
            "Default" => "Example",
        ),
        "usessl" => array(
            "FriendlyName" => "Enable SSL",
            "Type" => "yesno", # Yes/No Checkbox
            "Description" => "Tick to use secure connections",
        ),
        "package" => array(
            "FriendlyName" => "Package Name",
            "Type" => "dropdown", # Dropdown Choice of Options
            "Options" => "Starter,Advanced,Ultimate",
            "Description" => "Sample Dropdown",
            "Default" => "Advanced",
        ),
        "disk" => array(
            "FriendlyName" => "Disk Space",
            "Type" => "radio", # Radio Selection of Options
            "Options" => "100MB,200MB,300MB",
            "Description" => "Radio Options Demo",
            "Default" => "200MB",
        ),
        "comments" => array(
            "FriendlyName" => "Notes",
            "Type" => "textarea", # Textarea
            "Rows" => "3", # Number of Rows
            "Cols" => "50", # Number of Columns
            "Description" => "Description goes here",
            "Default" => "Enter notes here",
        ),
    );
}

function camp_registrar_RenewDomain($params)
{
    // user defined configuration values
    $userIdentifier = $params['APIUsername'];
    $apiKey = $params['APIKey'];
    $testMode = $params['TestMode'];
    $accountMode = $params['AccountMode'];
    $emailPreference = $params['EmailPreference'];

    // registration parameters
    $sld = $params['sld'];
    $tld = $params['tld'];
    $registrationPeriod = $params['regperiod'];

    // domain addon purchase status
    $enableDnsManagement = (bool)$params['dnsmanagement'];
    $enableEmailForwarding = (bool)$params['emailforwarding'];
    $enableIdProtection = (bool)$params['idprotection'];


    $premiumDomainsEnabled = (bool)$params['premiumEnabled'];
    $premiumDomainsCost = $params['premiumCost'];

    // Build post data.
    $postfields = array(
        'username' => $userIdentifier,
        'password' => $apiKey,
        'testmode' => $testMode,
        'domain' => $sld . '.' . $tld,
        'years' => $registrationPeriod,
        'dnsmanagement' => $enableDnsManagement,
        'emailforwarding' => $enableEmailForwarding,
        'idprotection' => $enableIdProtection,
    );

    try {
        $api = new ApiClient();
        $api->call('Renew', $postfields);

        return array(
            'success' => true,
        );

    } catch (\Exception $e) {
        return array(
            'error' => $e->getMessage(),
        );
    }
}

function camp_registrar_RegisterDomain($vars)
{
    print json_encode($vars);
    die;
}