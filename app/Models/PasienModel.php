<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'data_pasien';
    protected $useTimestamps = true;
    protected $allowedFields =
    [
        'id_pasien',
        'nama_pasien',
        'telp_pasien',
        'alamat_pasien',
        'id_dokter',
        'keluhan'
    ];
}
