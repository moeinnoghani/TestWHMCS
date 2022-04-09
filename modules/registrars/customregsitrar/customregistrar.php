<?php


function customregister_RenewDomain($params)
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
