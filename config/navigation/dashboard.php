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
            'title' => 'New Pendaftar',
            'route' => 'dashboard.kursus.list',
            'icon' => '<i class="ri-graduation-cap-line"></i>'
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
