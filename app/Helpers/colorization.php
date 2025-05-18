<?php

use App\Enum\PembayaranStatus;
use App\Enum\PendaftarStatus;


function pendaftarStatusColor(PendaftarStatus $status){

    switch ($status) {
        case PendaftarStatus::NEW:
            return 'success';
        case PendaftarStatus::ACTIVE:
            return 'info';
        case PendaftarStatus::CANCEL:
            return 'danger';

        default:
           return 'warning';
    }

}
function pembayaranStatusColor(?PembayaranStatus $status){

    switch ($status) {
        case PembayaranStatus::PENDING:
            return 'warning';
        case PembayaranStatus::SUCCESS:
            return 'success';
        case PembayaranStatus::FAILED:
            return 'danger';
        case PembayaranStatus::CANCEL:
            return 'danger';

        default:
           return 'info';
    }

}
