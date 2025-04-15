<?php

use App\Enum\PendaftarStatus;


function pendaftarStatusColor(PendaftarStatus $status){

    switch ($status) {
        case PendaftarStatus::ACTIVE:
            return 'success';
        case PendaftarStatus::CANCEL:
            return 'danger';

        default:
           return 'warning';
    }

}
