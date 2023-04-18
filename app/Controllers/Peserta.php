<?php

namespace App\Controllers;

use App\Models\PesertaModel;

class Peserta extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        $this->pesertaModel = new PesertaModel();
    }

    public function index()
    {
        $peserta = $this->pesertaModel->findAll();
        $data = ['peserta' => $peserta]; //$data['peserta'] = $peserta;
        echo view('peserta/ListPeserta', $data);
    }

    public function add()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'no_peserta' => $this->request->getPost('no_peserta'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'sekolah' => $this->request->getPost('sekolah'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'ttl' => $this->request->getPost('ttl'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor' => $this->request->getPost('nomor'),
            'prodi' => $this->request->getPost('prodi'),
            'gender' => $this->request->getPost('gender'),
            'status' => $this->request->getPost('status'),
            'ujian' => $this->request->getPost('ujian')
        );
        $this->pesertaModel->saveMhs($data);
        echo
        '<script>
            alert("Sukses Tambah Data");
            window.location="' . base_URL('Peserta') . '"
        </script>';
    }

    public function input()
    {
        $periksa = $this->validate(
            [
                'nama' => ['label' => 'nama', 'rules' => 'required|max_length[50]'],
                'no_peserta' => ['label' => 'no_peserta', 'rules' => 'required|max_length[50]'],
                'password' => ['label' => 'Password', 'rules' => 'required|min_length[6]|max_length[12]'],
                'passconf' => ['label' => 'Passconf', 'rules' => 'required|matches[password]'],
                'email'    => ['label' => 'email', 'rules' => 'required|valid_email'],
                'gender' => ['label' => 'gender', 'rules' => 'required'],
                'alamat' => ['label' => 'alamat', 'rules' => 'required'],
                'ttl' => ['label' => 'ttl', 'rules' => 'required'],
            ],
            [
                'nama'    => ['required' => 'Anda harus mengisi nama lengkap anda',],
                'no_peserta' => ['required'    => 'Anda harus mengisi Username',],
                'password'    => ['required' => 'Password min terdiri dari 6 karakter dan  max 12 karakter',],
                'passconf'    => ['required' => 'Isikan konfirmasi password dengan benar',],
                'email'    => ['required' => 'Memasukkan email yang valid',],
                'alamat'    => ['required' => 'Masukkan alamat dengan detail',],
                'gender'    => ['required' => 'Silahkan pilih gender Anda',],
                'ttl'    => ['required' => 'Memasukkan tempat dan tanggal lahir sesuai KK',],
            ]
        );

        if (!$periksa) {
            echo view('Peserta/FormPeserta', [
                'validation' => $this->validator,
            ]);
        } else {
            $this->add();
            echo view('Peserta/Success');
        }
    }

    public function detail($no_peserta)
    {
        $peserta = $this->pesertaModel->getMhs($no_peserta);
        $data['peserta'] = $peserta;
        echo view('Peserta/DetailPeserta', $data);
    }

    public function delete($no_peserta)
    {
        $this->pesertaModel->delete($no_peserta);
        echo
        '<script>
            alert("Data berhasil di hapus");
            window.location="' . base_URL('Peserta') . '"
        </script>';
    }

    public function update($no_peserta)
    {
        if (!$this->validate(
            [
                'nama' => ['label' => 'nama', 'rules' => 'required|max_length[50]'],
                'no_peserta' => ['label' => 'no_peserta', 'rules' => 'required|max_length[50]'],
                'password' => ['label' => 'Password', 'rules' => 'required|min_length[6]|max_length[12]'],
                'email'    => ['label' => 'email', 'rules' => 'required|valid_email'],
                'gender' => ['label' => 'gender', 'rules' => 'required'],
                'alamat' => ['label' => 'alamat', 'rules' => 'required'],
                'ttl' => ['label' => 'ttl', 'rules' => 'required'],
            ],
            [
                'nama'    => ['required' => 'Anda harus mengisi nama lengkap anda',],
                'no_peserta' => ['required'    => 'Anda harus mengisi Username',],
                'password'    => ['required' => 'Password min terdiri dari 6 karakter dan  max 12 karakter',],
                'email'    => ['required' => 'Memasukkan email yang valid',],
                'alamat'    => ['required' => 'Masukkan alamat dengan detail',],
                'gender'    => ['required' => 'Silahkan pilih gender Anda',],
                'ttl'    => ['required' => 'Memasukkan tempat dan tanggal lahir sesuai KK',],
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->pesertaModel->update(
            $no_peserta,
            [
                'nama' => $this->request->getPost('nama'),
                'no_peserta' => $this->request->getPost('no_peserta'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'sekolah' => $this->request->getPost('sekolah'),
                'tmp_lahir' => $this->request->getPost('tmp_lahir'),
                'ttl' => $this->request->getPost('ttl'),
                'alamat' => $this->request->getPost('alamat'),
                'nomor' => $this->request->getPost('nomor'),
                'prodi' => $this->request->getPost('prodi'),
                'gender' => $this->request->getPost('gender'),
                'status' => $this->request->getPost('status'),
                'ujian' => $this->request->getPost('ujian')
            ]
        );
        echo
        '<script>
            alert("Sukses Update Data");
            window.location="' . base_URL('Peserta') . '"
        </script>';
    }

    function edit($no_peserta)
    {
        $peserta = $this->pesertaModel->find($no_peserta);
        if (empty($peserta)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Peserta Tidak ditemukan !');
        }
        $data['peserta'] = $peserta;
        return view('Peserta/EditPeserta', $data);
    }
}
