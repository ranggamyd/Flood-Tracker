<?php

namespace App\Controllers\Admin;

use CodeIgniter\Exceptions\PageNotFoundException;

class User extends \App\Controllers\BaseController
{
    public function index()
    {
        $data = [
            'users' => $this->um->getUser(),
            'title' => 'Kelola Data Pengguna',
        ];

        return view('admin/users/index', $data);
    }

    public function view($id = null)
    {
        $data = [
            'users' => $this->um->getUser($id)
        ];

        if (empty($data['users'])) {
            throw new PageNotFoundException('Cannot find the item: ' . $id);
        }

        $data['title'] = $data['users']['nama_lengkap'];

        return view('admin/users/view', $data);
    }

    public function create()
    {
        if (!$this->request->is('post')) {
            $data['title'] = 'Tambah Data';
            return view('admin/users/create', $data);
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
            session()->setFlashdata('error', $this->validator->listErrors());
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
            'is_admin' => 1
        ]);
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/users'));
    }

    public function update($id)
    {
        $users = $this->um->getUser($id);

        if (!$this->request->is('put')) {
            $data['title'] = 'Edit Data';
            $data['users'] = $users;
            return view('admin/users/update', $data);
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
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->um->save([
            'id' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jk' => $this->request->getVar('jk'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password') ? password_hash($this->request->getVar('password'), PASSWORD_BCRYPT) : $users['password'],
            'is_admin' => 1
        ]);
        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->to(base_url('admin/users'));
    }

    public function delete($id)
    {
        $this->um->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->to(base_url('admin/users'));
    }
}
