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

        // Custom
        [
            'section' => 'Data',
        ],
        [
            'title' => 'Menu',
            'root' => true,
            'icon' => 'flaticon-open-box',
            'page' => 'menu',
            'new-tab' => false,
        ],
        // [
        //     'title' => 'Meja',
        //     'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
        //     // 'bullet' => 'line',
        //     'root' => true,
        //     'page' => 'table',
        //     'new-tab' => false,
        // ],
        [
            'title' => 'Reservasi',
            'desc' => '',
            'icon' => 'flaticon2-calendar-2',
            'bullet' => 'dot',
            'submenu' => [
                [
                    // Menampilkan jadwal dengan view kalender
                    'title' => 'Jadwal',
                    'page' => 'reservation/schedulle',
                ],

            ]
        ],

        // Custom
        [
            'section' => 'Transaksi',
        ],
        [
            // Menampilkan data pada bulan ini saja
            'title' => 'Order',
            'icon' => 'flaticon2-shopping-cart-1',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'New',
                    'page' => 'order/add',
                ],
                [
                    'title' => 'Aktif',
                    'page' => 'order/type/active',
                ],
                [
                    'title' => 'Pembayaran Terunda',
                    'page' => 'order/type/pending-payment',
                ],
                [
                    'title' => 'Pembayaran Berhasil',
                    'page' => 'order/type/success-payment',
                ],
            ],
        ],

        // Dapur
        [
            'section' => 'Dapur',
        ],
        [
            // menampilkan informasi makanan yang dipesan pembeli
            'title' => 'Pesanan Aktif',
            'icon' => 'flaticon2-delivery-package',
            'root' => true,
            'page' => 'kitchen/type/active',
            'new-tab' => false,
        ],

        // Laporan
        // https://www.merchantmaverick.com/top-5-standard-pos-reports/
        // https://www.vendhq.com/blog/retail-inventory-sales-reports/
        [
            'section' => 'Laporan',
        ],
        [
            // menampilkan laporan by date
            'title' => 'Laporan',
            'icon' => 'flaticon2-analytics-2',
            'bullet' => 'line',
            'root' => true,
            'page' => 'report',
            'new-tab' => false,
        ],
    ]

];
