<?php

class OrderConfiguration
{

    private static array $regions = [
        [
            'id' => 1, 'name' => 'iran'
        ],
        [
            'id' => 2, 'name' => 'german'
        ]
    ];

    private static array $operatingSystems = [
        [
            'id' => 1, 'name' => 'ubuntu'
        ],

        [
            'id' => 2, 'name' => 'debian'
        ],

        [
            'id' => 3, 'name' => 'WindowsServer'
        ]

    ];

    private static array $servicePlans = [
        [
            'id' => 1,
            'name' => 'PlanA',
            'price' => '35',
            'region' => 'german',
            'configs' => [
                'disk' => [
                    'type' => 'SSD',
                    'space' => '2GB'
                ],
                'RAM' => '4GB',
                'os' => 'ubuntu'
            ]
        ],

        [
            'id' => 2,
            'name' => 'PlanB',
            'price' => '15',
            'region' => 'iran',
            'configs' => [
                'disk' => [
                    'type' => 'NVMe',
                    'space' => '3GB'
                ],
                'RAM' => '4GB',
                'os' => 'WindowsServer'
            ]
        ]
    ];

    private static array $disks = [
        [
            'id' => 1, 'name' => 'SSD'
        ],
        ['id' => 2, 'name' => 'NVMe']
    ];


    public static function indexOperationSystems($region)
    {
        return self::$operatingSystems;

    }


    public static function indexServicePlans()
    {
        return self::$servicePlans;

    }

    public static function indexDisks()
    {
        return self::$disks;
    }


}