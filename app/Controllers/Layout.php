<?php

namespace App\Controllers;
use App\Models\DokterModel;

class Layout extends BaseController
{
    public function index()
    {
        return view('layout/beranda');
    }
}
