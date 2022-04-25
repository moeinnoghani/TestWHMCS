<?php

class OrderConfiguration
{

    private static array $regions = ["iran-tabriz", "iran-mashhad", "iran-tehran", "us-washington"];

    private static array $operatingSystems = ["Debian", "Ubuntu", "WindowsServer", "CentOs"];

    private static array $HDDs = ["SSD", "NVME", "HDD"];

    public static function getRegions(): array
    {
        return self::$regions;
    }

    public static function getOS($region)
    {
        switch ($region) {
            case "iran-tabriz":
                return ["Ubuntu", "WindowsServer"];
            case "iran-mashhad":
                return ["WindowsServer", "CentOs"];
            case "iran-tehran":
            case "us-washington":
                return ["Debian", "Ubuntu", "WindowsServer", "CentOs"];
        }
    }

    public static function getHDDs()
    {
        return self::$HDDs;
    }


}