<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $allowedFields = ['nama_lengkap', 'alamat', 'username', 'email', 'password', 'jk', 'no_hp', 'is_admin'];

    public function getUser($id = false)
    {
        if ($id === false) {
            $this->orderBy('id', 'desc');
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
