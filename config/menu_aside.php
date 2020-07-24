<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        //Customs
        ['section' => 'Master Records',],
        [
            'title' => 'Room Management',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Types',
                    'page' =>  'room/types'
                ],
                [
                    'title' => 'Rooms',
                    'page' => 'rooms/room'
                ],
                [
                    'title' => 'Customers',
                    'page' => 'customers'
                ]
            ]
        ],
        ['section' => 'Transactions',],
        [

        ]
    ]
];
