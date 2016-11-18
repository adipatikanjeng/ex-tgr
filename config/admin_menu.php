<?php

return [
    'menu2' => [
        'id' => 'website',
        'action' => 'view',
        'title' => 'Website',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => '#',
        'subs' => [
            [
                'id' => 'articles',
                'action' => 'view',
                'title' => 'Articles',
                'route' => '#',
                'subs' => [
                    [
                'id' => 'articles.index',
                'action' => 'view',
                'title' => 'Articles',
                'route' => 'articles',
                    ],
                    [
                'id' => 'articles.comments',
                'action' => 'view',
                'title' => 'Article Comments',
                'route' => 'articles/comments',
                    ],
                     [
                'id' => 'articles.categories',
                'action' => 'view',
                'title' => 'Article Categories',
                'route' => 'articles/categories',
                    ],
                ],
            ],
            [
                'id' => 'awards',
                'action' => 'view',
                'title' => 'Awards',
                'route' => 'awards',
            ],
            [
                'id' => 'contacts',
                'action' => 'view',
                'title' => 'Contacts',
                'route' => 'contacts',
            ],
            [
                'id' => 'galleries',
                'action' => 'view',
                'title' => 'Galleries',
                'route' => 'galleries',
                'subs' => [
                    [
                    'id' => 'galleries.index',
                    'action' => 'view',
                    'title' => 'Galleries',
                    'route' => 'galleries',
                    ],
                    [
                    'id' => 'images',
                    'action' => 'view',
                    'title' => 'Images',
                    'route' => 'galleries/images',
                    ],
                    [
                    'id' => 'galleries.comments',
                    'action' => 'view',
                    'title' => 'Comments',
                    'route' => 'galleries/comments',
                    ],
                ],
            ],
                [
                'id' => 'headers',
                'action' => 'view',
                'title' => 'Headers',
                'route' => 'headers',
            ],
            [
                'id' => 'side-menus',
                'action' => 'view',
                'title' => 'Side Menus',
                'route' => 'side-menus',
            ],
            [
                'id' => 'home',
                'action' => 'view',
                'title' => 'Home',
                'route' => '#',
                'subs' => [
                    [
                        'id' => 'home.slider',
                        'action' => 'view',
                        'title' => 'Slider',
                        'route' => 'home/sliders',
                    ],
                ],
            ],
            [
                'id' => 'testimonial',
                'action' => 'view',
                'title' => 'Testimonies',
                'route' => 'testimonies',
            ],
            [
                'id' => 'pages',
                'action' => 'view',
                'title' => 'Pages',
                'route' => 'pages',
            ],
        ],
    ],
    'menu3' => [
        'id' => 'e-commerce',
        'action' => 'view',
        'title' => 'E-commerce',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => '#',
        'subs' => [
            [
                'id' => 'e-commerce.order',
                'action' => 'view',
                'title' => 'Orders',
                'route' => 'orders',
            ],
             [
                'id' => 'e-commerce.order-products',
                'action' => 'view',
                'title' => 'Order Product',
                'route' => 'orders/products',
            ],
            [
                'id' => 'e-commerce.order-partials',
                'action' => 'view',
                'title' => 'Order Partials',
                'route' => 'orders/partials',
            ],
            [
                'id' => 'e-commerce.order-partials-products',
                'action' => 'view',
                'title' => 'Order Partials Products',
                'route' => 'orders/partials/products',
            ],
            [
                 'id' => 'payments',
                'action' => 'view',
                'title' => 'Payment Confirmations',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'payments/confirmations',
            ],
             [
                'id' => 'customers',
                'action' => 'view',
                'title' => 'Customers',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'customers',
            ],
                   [
                'id' => 'shippings',
                'action' => 'view',
                'title' => 'Shippings',
                'route' => 'shippings',
                'subs' =>[
                    [
                        'id' => 'shippings.fee',
                        'action' => 'view',
                        'title' => 'Fees',
                        'route' => 'shippings/fees',
                        ],
                    ]
            ],
              [
                'id' => 'branches',
                'action' => 'view',
                'title' => 'Branches',
                'route' => 'branches',
                'subs' =>[
                    [
                        'id' => 'branches',
                        'action' => 'view',
                        'title' => 'Branches',
                        'route' => 'branches',
                        ],
                        [
                        'id' => 'branches.coverages',
                        'action' => 'view',
                        'title' => 'Coverages',
                        'route' => 'branches/coverages',
                    ]
                ]
            ],
        ],
    ],
    'menu4' => [
        'id' => 'products',
        'action' => 'view',
        'title' => 'Products',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => 'products',
        'subs' => [
            [
                'id' => 'products.index',
                'action' => 'view',
                'title' => 'Products',
                'route' => 'products',
            ],
            [
                'id' => 'products.categories',
                'action' => 'view',
                'title' => 'Categories',
                'route' => 'products/categories',
            ],
            [
                'id' => 'products.contents',
                'action' => 'view',
                'title' => 'Contents',
                'route' => 'products/contents',
            ],
            [
                'id' => 'products.discount',
                'action' => 'view',
                'title' => 'Discounts',
                'route' => 'products/discounts',
            ],
            [
                'id' => 'products.pricelist',
                'action' => 'view',
                'title' => 'Pricelists',
                'route' => 'products/pricelists',
            ],
            [
                'id' => 'products.group-pricelist',
                'action' => 'view',
                'title' => 'Group Pricelists',
                'route' => 'products/group-pricelists',
            ],
            [
                'id' => 'products.pricelist.setting',
                'action' => 'view',
                'title' => 'Pricelists Settings',
                'route' => 'products/pricelists/settings',
            ]
        ],
    ],
    'menu5' => [
        'id' => 'events',
        'action' => 'view',
        'title' => 'Activities',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => 'events',
        'subs' => [
            [
                'id' => 'events',
                'action' => 'view',
                'title' => 'Events',
                'route' => 'events',
            ],
            [
                'id' => 'events.comments',
                'action' => 'view',
                'title' => 'Event Comments',
                'route' => 'events/comments',
            ],
            [
                'id' => 'csr-activities',
                'action' => 'view',
                'title' => 'Csr Activities',
                'route' => '#',
                'subs' => [
                     [
                    'id' => 'csr-activities',
                    'action' => 'view',
                    'title' => 'Csr Activities',
                    'route' => 'csr-activities',
                    ],
                     [
                        'id' => 'csr-activities.comments',
                        'action' => 'view',
                        'title' => 'Comments',
                        'route' => 'csr-activities/comments',
                    ],
                ]
            ],
            [
                'id' => 'seminars',
                'action' => 'view',
                'title' => 'Seminars',
                'route' => '#',
                'subs' => [
                    [
                        'id' => 'seminars.request',
                        'action' => 'view',
                        'title' => 'Request',
                        'route' => 'seminars/requests',
                    ],
                    [
                        'id' => 'seminars.join',
                        'action' => 'view',
                        'title' => 'Joins',
                        'route' => 'seminars/joins',
                    ],
                    [
                        'id' => 'seminars.places',
                        'action' => 'view',
                        'title' => 'Places',
                        'route' => 'seminars/places',
                    ],
                    [
                        'id' => 'seminars.topics',
                        'action' => 'view',
                        'title' => 'Topics',
                        'route' => 'seminars/topics',
                    ],
                ],
            ]
        ],
    ],
    'menu6' => [
        'id' => 'join-teams',
        'action' => 'view',
        'title' => 'Join Teams',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => 'join-teams',
    ],
    'menu7' => [
        'id' => 'covered-areas',
        'action' => 'view',
        'title' => 'Covered Areas',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => 'covered-areas',
    ],
    'menu7' => [
        'id' => 'contracts',
        'action' => 'view',
        'title' => 'Contracts',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => '#',
        'subs' => [
            [
            'id' => 'contracts',
            'action' => 'view',
            'title' => 'Contracts',
            'icon' => 'mdi-navigation-apps i-20',
            'route' => 'contracts',
            ],
            [
            'id' => 'contracts.range-discounts',
            'action' => 'view',
            'title' => 'Range Discounts',
            'icon' => 'mdi-navigation-apps i-20',
            'route' => 'range-discounts',
            ],
        ]
    ],
    'menu8' => [
        'id' => 'user',
        'action' => 'view',
        'title' => 'Users',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => '#',
        'subs' => [
                [
                'id' => 'user',
                'action' => 'view',
                'title' => 'EPC Users',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'users',
                ],
                [
                'id' => 'user.sales-services',
                'action' => 'view',
                'title' => 'Sales Service Users',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'users/sales-services',
                ],
        ]
    ],
    'menu9' => [
        'id' => 'global',
        'action' => 'view',
        'title' => 'Globals',
        'icon' => 'mdi-navigation-apps i-20',
        'route' => '#',
        'subs' => [
            [
                'id' => 'global.cities',
                'action' => 'view',
                'title' => 'Cities',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'cities',
            ],
            [
                'id' => 'global.provinces',
                'action' => 'view',
                'title' => 'Provinces',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'provinces',
            ],
            [
                'id' => 'global.subdistricts',
                'action' => 'view',
                'title' => 'Subdistricts',
                'icon' => 'mdi-navigation-apps i-20',
                'route' => 'subdistricts',
            ],
             [
             'id' => 'global.banks',
             'action' => 'view',
             'title' => 'Banks',
             'route' => 'banks',
            ],
             [
             'id' => 'global.sources',
             'action' => 'view',
             'title' => 'Sources',
             'route' => 'sources',
            ],
             [
             'id' => 'global.subjects',
             'action' => 'view',
             'title' => 'Subjects',
             'route' => 'subjects',
            ]
        ]
    ],
];
