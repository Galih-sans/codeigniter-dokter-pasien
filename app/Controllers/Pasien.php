<?php

namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\DokterModel;

class Pasien extends BaseController
{
    public function index()
    {
        return view('pasien/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $pasienModel = new PasienModel();
            $pasienModel = $pasienModel->join('data_dokter', 'data_dokter.id = data_pasien.id_dokter');
            $data = [
                'pasienData' => $pasienModel->findAll()
            ];

            $msg = [
                'data' => view('pasien/view', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function formTambah()
    {
        if ($this->request->isAJAX()) {
            $dokterModel = new DokterModel();
            $dokter = [
                'dokterData' => $dokterModel->findAll()
            ];
            $msg = [
                'data' => view('pasien/create', $dokter)
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function simpanData()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'id_pasien' => [
                    'label' => 'ID Pasien',
                    'rules' => 'required|is_unique[data_pasien.id_pasien]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah dipakai.'
                    ]
                ],
                'nama_pasien' => [
                    'label' => 'Nama Pasien',
                    'rules' => 'required[data_pasien.nama_pasien]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'telp_pasien' => [
                    'label' => 'Nomor Telepon',
                    'rules' => 'required[data_pasien.telp_pasien]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_pasien' => $validation->getError('id_pasien'),
                        'nama_pasien' => $validation->getError('nama_pasien'),
                        'telp_pasien' => $validation->getError('telp_pasien')
                    ]
                ];
            } else {
                $simpandata = [
                    'id_pasien' => $this->request->getVar('id_pasien'),
                    'nama_pasien' => $this->request->getVar('nama_pasien'),
                    'telp_pasien' => $this->request->getVar('telp_pasien'),
                    'id_dokter' => $this->request->getVar('id_dokter'),
                    'keluhan' => $this->request->getVar('keluhan'),
                    'alamat_pasien' => $this->request->getVar('alamat_pasien'),
                ];

                $pasien = new PasienModel();
                $pasien->insert($simpandata);

                $msg = [
                    'sukses' => 'Data Pasien Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function editPasien()
    {
        if ($this->request->isAJAX()) {
            $id_pasien = $this->request->getVar('id_pasien');
            $pasienModel = new PasienModel();
            $row = $pasienModel->where('id_pasien', $id_pasien)->first();
            $dokterModel = new DokterModel();
            $data = [
                'dokterData' => $dokterModel->findAll(),
                'id_pasien' => $row['id_pasien'],
                'nama_pasien' => $row['nama_pasien'],
                'telp_pasien' => $row['telp_pasien'],
                'id_dokter' => $row['id_dokter'],
                'dokter' => $dokterModel->where('id', $row['id_dokter'])->first(),
                'keluhan' => $row['keluhan'],
                'alamat_pasien' => $row['alamat_pasien'],
            ];
            $msg = [
                'sukses' => view('pasien/edit', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function updateData()
    {
        if ($this->request->isAJAX()) {
            $id_pasien = $this->request->getVar('id_pasien');
            $simpandata = [
                'id_pasien' => $this->request->getVar('id_pasien'),
                'nama_pasien' => $this->request->getVar('nama_pasien'),
                'telp_pasien' => $this->request->getVar('telp_pasien'),
                'id_dokter' => $this->request->getVar('id_dokter'),
                'keluhan' => $this->request->getVar('keluhan'),
                'alamat_pasien' => $this->request->getVar('alamat_pasien'),
            ];

            $pasienModel = new PasienModel();
            $pasienModel->where('id_pasien', $id_pasien);
            $pasienModel->delete();
            $pasienModel->insert($simpandata);

            $msg = [
                'sukses' => 'Data Pasien Berhasil Diupdate'
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function hapusPasien()
    {
        if ($this->request->isAJAX()) {
            $id_pasien = $this->request->getVar('id_pasien');
            $pasienModel = new PasienModel();
            $pasienModel->where('id_pasien', $id_pasien);
            $pasienModel->delete();
            $msg = [
                'sukses' => 'Data Pasien Berhasil Dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }
}
