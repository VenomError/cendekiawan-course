<?php

return [
    'dashboard'            => [
        [
            'title' => 'dashboard',
            'route' => 'dashboard.index',
            'icon'  => '<i class="uil-home"></i>',
            'roles' => ['admin', 'pimpinan'],
        ],
    ],
    'account'              => [
        [
            'title' => 'Pimpinan',
            'route' => 'dashboard.user.pimpinan',
            'icon'  => '<i class="ri-user-2-line"></i>',
            'roles' => ['pimpinan'],
        ],
        [
            'title' => 'Admin',
            'route' => 'dashboard.user.admin',
            'icon'  => '<i class="ri-shield-user-line"></i>',
            'roles' => ['pimpinan'],
        ],
        [
            'title' => 'Peserta',
            'route' => 'dashboard.user.peserta',
            'icon'  => '<i class="ri-account-box-line"></i>',
            'roles' => ['admin', 'pimpinan'],
        ],
    ],
    'management kursus'    => [
        [
            'title' => 'List Kursus',
            'route' => 'dashboard.kursus.list',
            'icon'  => '<i class="ri-graduation-cap-line"></i>',
            'roles' => ['admin', 'pimpinan'],
        ],
        [
            'title' => 'Create Kursus',
            'route' => 'dashboard.kursus.create',
            'icon'  => '<i class=" ri-file-add-line"></i>',
            'roles' => ['admin'],
        ],
    ],
    'management pendaftar' => [
        [
            'title' => 'List Pendaftar',
            'route' => 'dashboard.pendaftar.list',
            'icon'  => '<i class="ri-list-check"></i>',
            'roles' => ['admin', 'pimpinan'],
        ],
        [
            'title' => 'New Pendaftar',
            'route' => 'dashboard.pendaftar.new',
            'icon'  => '<i class=" ri-arrow-up-fill text-success "></i>',
            'roles' => ['admin'],
        ],
        [
            'title' => 'Cancel Pendaftar',
            'route' => 'dashboard.pendaftar.cancel',
            'icon'  => '<i class=" ri-close-circle-line text-danger"></i>',
            'roles' => ['admin'],
        ],
        [
            'title' => 'Active Pendaftar',
            'route' => 'dashboard.pendaftar.active',
            'icon'  => '<i class="ri-check-line text-info"></i>',
            'roles' => ['admin'],
        ],
    ],
    'management jadwal'    => [
        [
            'title' => 'Jadwal',
            'route' => 'dashboard.jadwal.list',
            'icon'  => '<i class="ri-calendar-event-line"></i>',
            'roles' => ['admin'],
        ],
        [
            'title' => 'Calendar',
            'route' => 'dashboard.jadwal.calendar',
            'icon'  => '<i class="ri-calendar-line"></i>',
            'roles' => ['admin'],
        ],
    ],

];
