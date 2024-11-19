<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Province extends Seeder
{
    public function run()
    {
        $data = ['name' => 'Alajuela'];
        $this->db->table('provinces')->insert($data);
        $data = ['name' => 'Heredia'];
        $this->db->table('provinces')->insert($data);
        $data = ['name' => 'San Jose'];
        $this->db->table('provinces')->insert($data);

    }
}
