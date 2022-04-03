<?php

return [
    'website' => 'sampitechgroup.net',
    'package' => [
        'name' => 'Zeus Webpanel',
        'title' => 'Ζεύς',
        'timezone' => 'Asia/Tehran',
        'curreny' => 'تومان',
        'currency_decimals' => 0,
        'logo' => 'images/zeus-images/zeus-logoart.png'
    ],
    'controllers' => [
        'namespace' => 'Zeus\\Http\\Controllers',
        'route_prefix' => 'zeus.'
    ],
    'database' => [
        'hidden_tables' => ['sessions'],
        'date_format' => 'Y-m-d H:i:s',
    ],
    'settings' => [
      'cache-prefix' => 'site-settings.'  
    ],

    'roles' => [
        'full-access' => 'superadmin'
    ],

    'custom' => [
        'routes' => base_path('routes/custom.php'),
        'api-routes' => base_path('routes/custom-api.php')
    ],

    'developers' => [
        [
            'name' => 'Yoonus Tehrani',
            'email' => 'yoonustehrani28@gmail.com',
            'links' => [
                'telegram' => [
                    'icon' => 'fas fa-paper-plane',
                    'link' => 'https://t.me/yoonustehrani'
                ],
                'instagram' => [
                    'icon' => 'fab fa-instagram',
                    'link' => 'https://instagram.com/yoonsutehrani'
                ],
                'linkedin' => [
                    'icon' => 'fab fa-linkedin',
                    'link' => 'https://linkedin.com/in/yoonustehrani'
                ]
            ]
        ],
        [
            'name' => 'Amir Mansoorian',
            'email' => 'amirreza.mansoorian2003@gmail.com',
            'links' => [
                'telegram' => [
                    'icon' => 'fas fa-paper-plane',
                    'link' => 'https://t.me/Amir_Reza_Mansoorian'
                ],
                'instagram' => [
                    'icon' => 'fab fa-instagram',
                    'link' => 'https://instagram.com/amir.reza.mns'
                ],
                'linkedin' => [
                    'icon' => 'fab fa-linkedin',
                    'link' => 'https://linkedin.com/in/amir-mansoorian-5098281a6'
                ]
            ]
        ]
    ],
    'copyright' => 'ZeusPanel %d by <a>Sampi Tech Group</a>',
    'menus' => [
        'main' => 'admin'
    ],
    'media' => [
        // The allowed mimetypes to be uploaded through the media-manager.
        'allowed_mimetypes' => '*', //All types can be uploaded
        /*
        'allowed_mimetypes' => [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/bmp',
            'video/mp4',
        ],
        */
        //Path for media-manager. Relative to the filesystem.
        'path'                => '/',
        'show_folders'        => true,
        'allow_upload'        => true,
        'allow_move'          => true,
        'allow_delete'        => true,
        'allow_create_folder' => true,
        'allow_rename'        => true,
        /*'watermark'           => [
            'source'         => 'watermark.png',
            'position'       => 'bottom-left',
            'x'              => 0,
            'y'              => 0,
            'size'           => 15,
        ],
        'thumbnails'          => [
            [
                'type'  => 'fit',
                'name'  => 'fit-500',
                'width' => 500,
                'height'=> 500
            ],
        ]*/
    ],
    // 'extentions' => [
    //     ZeusMailMarketer::class
    // ]
];