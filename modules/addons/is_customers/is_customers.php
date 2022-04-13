<?php
/**
 * Created by PhpStorm.
 * User: m.farzaneh
 * Date: 4/28/2018
 * Time: 10:43 AM
 */

use Illuminate\Database\Capsule\Manager as Capsule;

date_default_timezone_set("Asia/Tehran");

function is_customers_config()
{


    $postParams = array('type' => 'general');
    $generalTemplates = localAPI('GetEmailTemplates', $postParams);
    $generalTemplatesName = collect($generalTemplates['emailtemplates']['emailtemplate'])->map(
        function ($template) {
            return $template['name'];
        });

    $configarray = array(
        "name" => "مشتریان",
        "description" => "<span style='margin-top: 5px;font-size: 10px;color: green;display: inline-block;border-top: 1px solid;border-bottom: 1px solid;line-height: 25px;padding: 0 10px;'>ماژولی برای تفکیک اطلاعات مشتریان بر اساس محصولات خریداری شده</span>",
        "version" => "1.1",
        "author" => "Majid Farzaneh (iran server)",
        "fields" => array(
            'emailtemplate' => [
                'FriendlyName' => 'Email Templates',
                'Type' => 'dropdown',
                'Options' => implode(",", $generalTemplatesName->toArray()),
                'Description' => 'Choose one templates',
            ],
        )
    );
    return $configarray;
}

function is_customers_activate()
{

}

function is_customers_output($vars)
{
    define('BASE_URL', '/modules/addons/is_customers/');
    define('MODULE_URL', $vars['modulelink']);

    $action = (isset($_GET['action'])) ? $_GET['action'] : 'main/index';

    list($controller, $method) = explode('/', $action);
    $controller = trim($controller);
    $method = trim($method);
    ($controller == "") ? $controller = "main" : $controller;
    ($method == '') ? $method = "index" : $method;

    require_once __DIR__ . "/lib/functions.php"; // library functions

    require_once __DIR__ . "/controller/mainController.php";
    require_once __DIR__ . "/controller/" . $controller . '.php';
    $class = new $controller();
    return $class->$method();

}

function is_customers_clientarea($vars)
{
    ModuleConfiguration::setModuleConfig([
            'emailTemplateName' => $vars['emailtemplate']]
    );

    $action = (isset($_GET['action'])) ? $_GET['action'] : 'main/index';

    list($controller, $method) = explode('/', $action);
    $controller = trim($controller);
    $method = trim($method);
    ($controller == "") ? $controller = "main" : $controller;
    ($method == '') ? $method = "index" : $method;

    require_once __DIR__ . "/lib/functions.php"; // library functions

    require_once __DIR__ . "/controller/mainController.php";
    require_once __DIR__ . "/controller/" . $controller . '.php';
    $class = new $controller();
    return $class->$method();

}

function is_customers_upgrade($vars)
{
    $currentVersion = $vars['version'];

    if ($currentVersion < 1.1) {
        Capsule::schema()
            ->create(
                'verifyCode',
                function ($table) {
                    /** @var \Illuminate\Database\Schema\Blueprint $table */
                    $table->increments('id');
                    $table->string('email');
                    $table->integer('code');
                    $table->timestamp('verified_at');
                    $table->timestamp('expired_at')->default(\Carbon\Carbon::now()->addMinutes(3));
                    $table->timestamps();
                }
            );
    }

}