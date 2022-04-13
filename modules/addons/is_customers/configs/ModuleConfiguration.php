<?php

class ModuleConfiguration
{

    private static $moduleEmailTemplateName;

    public static function setModuleConfig($config)
    {
        self::$moduleEmailTemplateName = $config['emailTemplateName'];
    }

    public static function getModuleConfig()
    {
        return self::$moduleEmailTemplateName;
    }

}