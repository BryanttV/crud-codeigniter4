<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersonSeed extends Seeder
{
    public function run()
    {
        // Reinicia la tabla
        $this->db->table('persons')->truncate();

        for ($i = 0; $i < 10; $i++) {

            // Crea los datos
            $data = [
                'name' => 'name ' . ($i + 1),
                'lastname' => 'lastname ' . ($i + 1),
                'age' => ($i + 1),
                'photo' => 'photo' . ($i + 1),
            ];

            // Almancena los datos en un registro de la BD
            $this->db->table('persons')->insert($data);
        }
    }
}
