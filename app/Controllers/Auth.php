<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        if (!$this->request->is('post')) {
            return view('auth/login', ['title' => 'Masuk Sekarang']);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->um->where([
            'username' => $username,
        ])->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'id_user' => $user['id'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'jk' => $user['jk'],
                    'no_hp' => $user['no_hp'],
                    'is_admin' => $user['is_admin'],
                    'logged_in' => TRUE
                ]);
                session()->setFlashdata('success', 'Berhasil masuk!');
                if ($user['is_admin'] == 1) {
                    return redirect()->to(base_url('dashboard'));
                } else {
                    return redirect()->to(base_url());
                }
            } else {
                session()->setFlashdata('error', 'Username & Password tidak sesuai');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak terdaftar');
            return redirect()->back();
        }
    }

    public function register()
    {
        if (!$this->request->is('post')) {
            return view('auth/register', ['title' => 'Bergabung Sekarang']);
        }

        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus dipilih',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Gagal mendaftar!');
            session()->setFlashdata('errorList', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->um->insert([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jk' => $this->request->getVar('jk'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'is_admin' => 0
        ]);
        session()->setFlashdata('success', 'Berhasil mendaftar!');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Berhasil keluar!');
        return redirect()->to(base_url());
    }
}
