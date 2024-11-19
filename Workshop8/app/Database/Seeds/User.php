<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = ['name' => 'Admin', 'lastname'=> 'User',
        'username'    => 'admin',
        'password' => password_hash('123', PASSWORD_BCRYPT), 'role' => 'admin'];

        $this->db->table('users')->insert($data);
    }
}
