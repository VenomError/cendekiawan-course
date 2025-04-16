<?php

return [
    'dashboard' => [
        [
            'title' => 'dashboard',
            'route' => 'dashboard.index',
            'icon' => '<i class="uil-home"></i>'
        ],
    ],
    'account' => [

        [
            'title' => 'Pimpinan',
            'route' => 'dashboard.user.pimpinan',
            'icon' => '<i class="ri-user-2-line"></i>'
        ],
        [
            'title' => 'Admin',
            'route' => 'dashboard.user.admin',
            'icon' => '<i class="ri-shield-user-line"></i>'
        ],
        [
            'title' => 'Peserta',
            'route' => 'dashboard.user.peserta',
            'icon' => '<i class="ri-account-box-line"></i>'
        ],
    ],
    'management kursus' => [
        [
            'title' => 'List Kursus',
            'route' => 'dashboard.kursus.list',
            'icon' => '<i class="ri-graduation-cap-line"></i>'
        ],
        [
            'title' => 'Create Kursus',
            'route' => 'dashboard.kursus.create',
            'icon' => '<i class=" ri-file-add-line"></i>'
        ],
    ],
    'management pendaftar' => [
        [
            'title' => 'List Pendaftar',
            'route' => 'dashboard.pendaftar.list',
            'icon' => '<i class="ri-list-check"></i>'
        ],
        [
            'title' => 'New Pendaftar',
            'route' => 'dashboard.pendaftar.new',
            'icon' => '<i class=" ri-arrow-up-fill text-success "></i>'
        ],
        [
            'title' => 'Cancel Pendaftar',
            'route' => 'dashboard.pendaftar.cancel',
            'icon' => '<i class=" ri-close-circle-line text-danger"></i>'
        ],
        [
            'title' => 'Active Pendaftar',
            'route' => 'dashboard.pendaftar.active',
            'icon' => '<i class="ri-check-line text-info"></i>'
        ],
    ],
    'management jadwal' => [
        [
            'title' => 'Jadwal',
            'route' => 'dashboard.kursus.list',
            'icon' => '<i class="ri-calendar-event-line"></i>'
        ],
    ],

];
