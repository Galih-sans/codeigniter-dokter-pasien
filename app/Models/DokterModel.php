<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'data_dokter';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id',
        'nama_dokter',
        'no_telp',
        'email_dokter',
        'spesialisasi',
        'alamat'
    ];
}
