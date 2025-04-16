<?php

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
