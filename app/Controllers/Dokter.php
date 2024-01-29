<?php

namespace App\Controllers;

use App\Models\DokterModel;

class Dokter extends BaseController
{
    public function index()
    {
        return view('dokter/index');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $dokterModel = new DokterModel();
            $data = [
                'dokterData' => $dokterModel->findAll()
            ];

            $msg = [
                'data' => view('dokter/view', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function formTambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('dokter/create')
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
                'id_dokter' => [
                    'label' => 'ID Dokter',
                    'rules' => 'required|is_unique[data_dokter.id]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah dipakai.'
                    ]
                ],
                'nama_dokter' => [
                    'label' => 'Nama Dokter',
                    'rules' => 'required[data_dokter.nama_dokter]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'no_telp' => [
                    'label' => 'Nomor Telepon',
                    'rules' => 'required[data_dokter.no_telp]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_dokter' => $validation->getError('id_dokter'),
                        'nama_dokter' => $validation->getError('nama_dokter'),
                        'no_telp' => $validation->getError('no_telp')
                    ]
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id_dokter'),
                    'nama_dokter' => $this->request->getVar('nama_dokter'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'email_dokter' => $this->request->getVar('email_dokter'),
                    'spesialisasi' => $this->request->getVar('spesialisasi'),
                    'alamat' => $this->request->getVar('alamat'),
                ];

                $dokter = new DokterModel();
                $dokter->insert($simpandata);

                $msg = [
                    'sukses' => 'Data Dokter Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function editDokter()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $dokterModel = new DokterModel();
            $row = $dokterModel->find($id);
            $data = [
                'id' => $row['id'],
                'nama_dokter' => $row['nama_dokter'],
                'no_telp' => $row['no_telp'],
                'email_dokter' => $row['email_dokter'],
                'spesialisasi' => $row['spesialisasi'],
                'alamat' => $row['alamat'],
            ];
            $msg = [
                'sukses' => view('dokter/edit', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function updateData()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_dokter');
            $simpandata = [
                'nama_dokter' => $this->request->getVar('nama_dokter'),
                'no_telp' => $this->request->getVar('no_telp'),
                'email_dokter' => $this->request->getVar('email_dokter'),
                'spesialisasi' => $this->request->getVar('spesialisasi'),
                'alamat' => $this->request->getVar('alamat'),
            ];

            $dokter = new DokterModel();
            $dokter->update($id, $simpandata);

            $msg = [
                'sukses' => 'Data Dokter Berhasil Diupdate'
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }

    public function hapusDokter()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $dokterModel = new DokterModel();
            $dokterModel->delete($id);
            $msg = [
                'sukses' => 'Data Dokter Berhasil Dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Tidak Dapat Diproses');
        };
    }
}
