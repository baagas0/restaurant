<?php
// Header menu
return [

    'items' => [
        [],
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/',
            'new-tab' => false,
        ],
        [
            'section' => 'Data',
        ],
        [
            'title' => 'Menu',
            'root' => true,
            'page' => 'menu',
            'new-tab' => false,
        ],
        [
            'title' => 'Reservasi',
            'desc' => '',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Jadwal',
                    'page' => 'reservation/schedulle',
                ],

            ]
        ],

        [
            'section' => 'Transaksi',
        ],
        [
            'title' => 'Order',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'New',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'dot',
                    'page' => 'order/add',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Aktif',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'dot',
                    'page' => 'order/type/active',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Pembayaran Terunda',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'dot',
                    'page' => 'order/type/pending-payment',
                    'new-tab' => false,
                ],
                [
                    'title' => 'Pembayaran Berhasil',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                    'bullet' => 'dot',
                    'page' => 'order/type/success-payment',
                    'new-tab' => false,
                ],
            ],
        ],
        [
            'section' => 'Dapur',
        ],
        [
            'title' => 'Pesanan Aktif',
            'root' => true,
            'page' => 'kitchen/type/active',
            'new-tab' => false,
        ],
        [
            'section' => 'Laporan',
        ],
        [
            'title' => 'Laporan',
            'bullet' => 'line',
            'root' => true,
            'page' => 'report',
            'new-tab' => false,
        ],
    ]

];
